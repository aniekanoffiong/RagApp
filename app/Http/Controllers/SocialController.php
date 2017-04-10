<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\User;
use App\Profile;
use App\SocialLogin;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SocialController extends Controller
{
    /**
     * Redirect the user to the Social authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        if ($provider == 'google' || $provider == 'facebook') {
            return Socialite::driver($provider)->redirect();
        } else {
            return abort(404);
        }
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        if ($provider == 'google' || $provider == 'facebook') {
            try {
                $user = Socialite::driver($provider)->user();
                // Login User if previously used social login
                $socialRecord = SocialLogin::where('provider_id', $user->getId())->first();
                if ($socialRecord) {
                    Auth::login(User::find($socialRecord->user_id));
                    return redirect('/home');
                } else {
                    // Check if any user with email exist
                    $findUser = User::where('email', $user->getEmail())->first();
                    if ($findUser) {
                        if ($this->addSocialLogin($findUser, $provider, $user)) {
                            Auth::login($findUser);
                            return redirect('/home');
                        } else {
                            redirect('/login')->with(['message' => 'Social SignUp/Login Failed, Please Use Manual Method']);
                        }
                    // Create a New Instance of User
                    } else {
                        $newUser = new User;
                        $user_id = Uuid::uuid5(Uuid::NAMESPACE_DNS, str_random(20))->toString();
                        $newUser->id = $user_id;
                        $newUser->first_name = ($provider == 'facebook') ? $user->user['first_name'] : $user->user['name']['givenName'];
                        $newUser->last_name = ($provider == 'facebook') ? $user->user['last_name'] : $user->user['name']['familyName'];
                        $newUser->email = $user->getEmail();
                        if ($newUser->save()) {
                            $profile = new Profile;
                            $profile->user_id = $user_id;
                            $profile->username = $user->getNickname();
                            $fileContents = file_get_contents($user->getAvatar());
                            $profile->avatar = Storage::putFile('avatars', $fileContents);
                            $profile->gender = (isset($user->user['gender'])) ? $user->user['gender'] : '';
                            if ($profile->save()) {
                                Auth::login($newUser);
                                return redirect('/home');
                            }
                        }
                    }
                }
            } catch (Exception $e) {

            }
        } else {
            return abort(404);
        }
    }

    protected function addSocialLogin($findUser, $provider, $user)
    {
        $socialLogin = new SocialLogin;
        $socialLogin->provider_id = $user->getId();
        $socialLogin->user_id = $findUser->id;
        $socialLogin->provider = $provider;
        return $socialLogin->save();
    }
}

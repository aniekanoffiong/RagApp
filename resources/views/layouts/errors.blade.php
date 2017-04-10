<div id="messages">
    @if(isset($errors) && $errors->any())
    <div class="col-md-offset-2 col-md-8 alert alert-danger text-center">
        <h4>Kindly fix the following form errors</h4>
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif 
    @if(Session::has("message"))
    <div class="col-md-offset-2 col-md-8 alert alert-success text-center">{{ Session::get("message") }}</div>
    @endif 
    @if(Session::has("error"))
    <div class="col-md-offset-2 col-md-8 alert alert-danger text-center">{{ Session::get("error") }}</div>
    @endif 
    @if(Session::has("info"))
    <div class="col-md-offset-2 col-md-8 alert alert-info text-center">{{ Session::get("info") }}</div>
    @endif 
    @if(Session::has("warning"))
    <div class="col-md-offset-2 col-md-8 alert alert-warning text-center">{{ Session::get("warning") }}</div>
    @endif
</div>

<!-- resources/views/auth/login.blade.php -->
@include('head')
<div class="container">
    <form method="POST" action="login">
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" name="username" value="{{ old('username') }}" id="username">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
        </div>
<!--    
        <div >
            <input type="checkbox" name="remember"> Remember Me
        </div>
--> 
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>
@include('foot')
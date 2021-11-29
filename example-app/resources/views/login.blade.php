<!DOCTYPE html>
<html>
<body>

<h2>LogIn Forms</h2>
@if (session('success'))
    <h1>{{session('success')}}</h1>
@endif
<form action="loginaction" method="post">
  @csrf
  <label for="email">Email</label><br>
  <input type="text" id="email" name="email" ><br>
  <label for="password">Password</label><br>
  <input type="password" id="password" name="password" ><br><br>
  {{--
  <input type="radio" name="role" value="admin">Admin 
  <input type="radio" name="role" value="user">User 
  <input type="radio" name="role" value="guest">Guest
 <br>
 --}}
  <input type="submit" value="LOGIN">
</form> 



</body>
</html>


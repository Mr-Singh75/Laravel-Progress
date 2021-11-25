<!DOCTYPE html>
<html>
<body>

<h2>HTML Forms</h2>

<form action="user/create" method="post">
@csrf
<label for="email">Email</label><br>
  <input type="text" id="email" name="email" ><br>
  <span style="color:red"> @error('email'){{$message}}@enderror</span>
  <br>
  <label for="name">Name:</label><br>
  <input type="text" id="name" name="name" ><br>
  <span style="color:red"> @error('fname'){{$message}}@enderror</span>
  <br>
  
  <label for="password">Password</label><br>
  <input type="password" id="password" name="password" ><br>
  <span style="color:red"> @error('passward'){{$message}}@enderror</span>
  <br>
  
  <input type="submit" value="Submit">
</form> 



</body>
</html>
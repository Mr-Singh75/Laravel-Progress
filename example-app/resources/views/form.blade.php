<!DOCTYPE html>
<html>
<body>

<h2>HTML Forms</h2>

<form action="upload" method="post">
@csrf
<label for="email">Email</label><br>
  <input type="text" id="email" name="email" ><br>
  <span style="color:red"> @error('email'){{$message}}@enderror</span>
  <br>
  <label for="fname">First name:</label><br>
  <input type="text" id="fname" name="fname" ><br>
  <span style="color:red"> @error('fname'){{$message}}@enderror</span>
  <br>
  <label for="lname">Last name:</label><br>
  <input type="text" id="lname" name="lname" ><br>
  <span style="color:red"> @error('lname'){{$message}}@enderror</span><br>
  
  <label for="passward">Passward</label><br>
  <input type="password" id="passward" name="passward" ><br>
  <span style="color:red"> @error('passward'){{$message}}@enderror</span>
  <br>
  <label for="salary">Salary</label><br>
  <input type="number" id="salary" name="salary" ><br>
  <span style="color:red"> @error('salary'){{$message}}@enderror</span><br>
  <label for="address">Address</label><br>
  <input type="text" id="address" name="address" ><br>
  <span style="color:red"> @error('address'){{$message}}@enderror</span><br>
  <input type="submit" value="Submit">
</form> 



</body>
</html>
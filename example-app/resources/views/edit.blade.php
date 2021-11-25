<!DOCTYPE html>
<html>
<body>

<h2>Edit</h2>

<form action="/{{$data->user_id}}/update" method="post">
@csrf

  <label for="fname">First name:</label><br>
  <input type="text" id="fname" name="fname" value="{{$data->FirstName}}" ><br>
  <span style="color:red"> @error('fname'){{$message}}@enderror</span>
  <br>
  <label for="lname">Last name:</label><br>
  <input type="text" id="lname" name="lname" value="{{$data->LastName}}"><br>
  <span style="color:red"> @error('lname'){{$message}}@enderror</span><br>
  <label for="salary">Salary</label><br>
  <input type="number" id="salary" name="salary" value="{{$data->Salary}}" ><br>
  <span style="color:red"> @error('salary'){{$message}}@enderror</span><br>
  <label for="address">Address</label><br>
  <input type="text" id="address" name="address" value="{{$data->address}}"><br>
  <span style="color:red"> @error('address'){{$message}}@enderror</span><br>
  <input type="submit" value="Save">
</form> 



</body>
</html>
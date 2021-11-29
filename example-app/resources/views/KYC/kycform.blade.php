<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>KYC Form</title>
</head>
<body>
    @if(Session::get('success'))
    <h2 style="color:red">{{Session::get('success')}}</h2>
    @endif
<form action="kycaction" method="post">
    @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Aadhar Number</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="aadhar_no" aria-describedby="emailHelp" placeholder="Enter Aadhar">
    <small id="emailHelp" class="form-text text-muted">We'll never share your details with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Pan Number</label>
    <input type="text" class="form-control" name="pan_no" id="exampleInputPassword1" placeholder="Enter Pan No">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
<a href="logout">Logout</a>

</form>
</body>
</html>
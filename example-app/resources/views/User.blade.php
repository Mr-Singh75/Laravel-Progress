<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h2>HTML Table</h2>

<table>
  <tr>
    <th>FirstName</th>
    <th>LastName</th>
    <th>Salary</th>
    <th>Address</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>
  @foreach($data as $i)
  <tr>
    <td>{{$i->FirstName}}</td>
    <td>{{$i->LastName}}</td>
    <td>{{$i->Salary}}</td>
    <td>{{$i->address}}</td>
    <td><a href="/{{$i->user_id}}/edit">Edit</a></td>
    <td><a href="/{{$i->id}}/delete">Delete</a></td>
  </tr>
  @endforeach
</table>
<a href='form'>Add User</a>
</body>
</html>


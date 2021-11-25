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
    <th>Name</th>
    <th>Salary</th>
    <th>Email</th>
    <th>Company</th>
    <th>Mobile</th>
  </tr>
  @foreach($data as $i)
  <tr>
    <td>{{$i->name}}</td>
    <td>{{$i->salary}}</td>
    <td>{{$i->email}}</td>
    <td>{{$i->company}}</td>
    <td>{{$i->model}}</td>
  </tr>
  @endforeach
</table>

</body>
</html>


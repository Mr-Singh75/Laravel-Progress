<h2>Hii {{session('username')}}</h2>
@php
$data=session('data')
@endphp
<h3>Your KYC status is pending</h3>
<h4>Aadhar No: {{$data->aadhar_no}}</h4>
<h4>Pan No: {{$data->pan_no}}</h4>
<a href="logout">Logout</a>

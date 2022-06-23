<!DOCTYPE html>
<html>
<head>
    <title>User report</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h1 class="text-center">{{ $title }}</h1>
    <p>Date: {{ $date }}</p>
    <p>
		Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    	tempor incididunt ut labore et dolore magna aliqua.
	</p>
	<br />
    <h4>Your Account Information</h4>
	<br />
    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Email</th>
            <th>Email</th>
            <th>Email</th>
            <th>Email</th>
            <th>Email</th>
            <th>Email</th>
            <th>Email</th>
            <th>Email</th>
        </tr>
        <tr>
            <td>{{ $user['first_name'] }} {{ $user['last_name'] }}</td>
            <td>{{ $user['email'] }}</td>
        </tr>
    </table>
</body>
</html>
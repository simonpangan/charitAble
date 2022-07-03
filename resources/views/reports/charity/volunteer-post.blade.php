<!DOCTYPE html>
<html>
<head>
    <title>User report</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h1 class="text-center">{{ $post->name }}</h1>
    <p><b>Date:</b> {{ now()->toDayDateTimeString() }}</p>
	<br />
    <br />
    <h4>List of Interested</h4>
	<br />
    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Message</th>
            <th>Email</th>
            <th>Date</th>
        </tr>
		@foreach ($post->interests as $interest)
        <tr>
			<td>{{ $interest->first_name  . ' ' . $interest->last_name}}</td>
            <td>{{ $interest->pivot->message }}</td>
            <td>{{ $interest->user->email }}</td>
            <td>{{ $interest->pivot->created_at_formatted }}</td>
        </tr>
		@endforeach
    </table>
	<br />
</body>
</html>
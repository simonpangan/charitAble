<!DOCTYPE html>
<html>
<head>
    <title>User report</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body>
    <h1 class="text-center">{{ $program->name }}</h1>
    <p><b>Date:</b> {{ now()->toDayDateTimeString() }}</p>
	<br />
    <br />
    <h4>Your Account Information</h4>
	<br />
    <table class="table table-bordered">
        <tr>
            <th>Total Donors</th>
            <th>Total Donation Amount</th>
            <th>Total Withdrawn Amount</th>
            <th>Total Needed Amount</th>
        </tr>
        <tr>
            <td>{{ $programStats['total_donors'] }}</td>
            <td>{{ $programStats['total_donation'] }}</td>
            <td>{{ $program->total_withdrawn_amount }}</td>
            <td>{{ $program->total_needed_amount }}</td>
        </tr>
    </table>
    <br />
    <div class="page-break"></div>
    <h4>List of Donors</h4>
	<br />
    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Amount</th>
            <th>Date</th>
        </tr>
		@foreach ($program->supporters as $supporter)
        <tr>
			<td>{{ $supporter->benefactor->first_name  . ' ' . $supporter->benefactor->last_name}}</td>
            <td>{{ $supporter->amount }}</td>
            <td>{{ $supporter->donated_at_formatted }}</td>
        </tr>
		@endforeach
    </table>
	<br />
</body>
</html>
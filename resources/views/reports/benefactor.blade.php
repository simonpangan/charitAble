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
            <th>Gender</th>
            <th>Age</th>
        </tr>
        <tr>
            {{-- <td>{{ $user['first_name'] }} {{ $user['last_name'] }}</td>
            <td>{{ $user['email'] }}</td>
            <td>{{ $user['gender'] }}</td>
            <td>{{ $user['age'] }}</td> --}}

            <td>{{ $user->benefactor->first_name }} {{ $user->benefactor->last_name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->benefactor->gender }}</td>
            <td>{{ $user->benefactor->gender }}</td>
        </tr>
    </table>
    <br />
    <h4>Your Donations</h4>
	<br />
    <table class="table table-bordered">
        <tr>
            <th>Total Donation</th>
            <th>Total Charities Donated</th>
            <th>Total Charities Followed</th>
            <th>Total Number of Donations</th>
        </tr>
        <tr>
            <td>{{ $user->benefactor->total_donation }}</td>
            <td>{{ $user->benefactor->total_charities_donated }}</td>
            <td>{{ $user->benefactor->total_charities_followed }}</td>
            <td>{{ $user->benefactor->total_number_donations }}</td>
        </tr>
    </table>
	<br />
    <div class="page-break"></div>
    <h4>Your Donations History</h4>
	<br />
    <table class="table table-bordered">
        <tr>
            <th class="text-center">#</th>
            <th class="text-center">Program Name</th>
            <th class="text-center">Amount</th>
            <th class="text-center">Donated At</th>
        </tr>
        @foreach ($user->benefactor->programDonations()
            ->latest()
            ->get(['name', 'program_donations.amount', 'program_donations.created_at']) 
            as $donation)
        <tr>
            <td>{{ $loop->index + 1}}</td>
            <td>{{ $donation->name }}</td>
            <td>{{ $donation->pivot->amount }}</td>
            <td>{{ $donation->pivot->created_at->toDayDateTimeString() }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
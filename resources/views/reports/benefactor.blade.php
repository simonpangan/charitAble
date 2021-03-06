<!DOCTYPE html>
<html>
<head>
    <title>User report</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .page-break {
            page-break-after: always;
        }
        /** 
            Set the margins of the page to 0, so the footer and the header
            can be of the full height and width !
            **/
        @page {
            margin: 0cm 0cm;
        }

        /** Define now the real margins of every page in the PDF **/
        body {
            margin-top: 2cm;
            margin-left: 2cm;
            margin-right: 2cm;
            margin-bottom: 2cm;
        }

        /** Define the header rules **/
        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;

            margin-bottom: 2rem;
                
            text-align: center;
            line-height: 1.5cm;
        }

        /** Define the footer rules **/
        footer {
            position: fixed; 
            bottom: 0cm; 
            left: 0cm; 
            right: 0cm;
            height: 2cm;

            /** Extra personal styles **/
            background-color: #03a9f4;
            color: white;
            text-align: center;
            line-height: 1.5cm;
        }
    </style>    
        
</head>
<body>
    <header>
        <img src="{{ public_path('logo/with-name.jpg') }}" width="75px" height="75px"/>
    </header>

    <footer>
        Copyright &copy; <?php echo date("Y");?> 
    </footer>


    <h1 class="text-center">{{ $title }}</h1>
    <p>Date: {{ $date }}</p>
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
            <td>{{ round($benefactor['total_donation'], 2) }}</td>
            <td>{{ $benefactor['total_charities_donated'] }}</td>
            <td>{{ $benefactor['total_charities_followed'] }}</td>
            <td>{{ $benefactor['total_number_donations'] }}</td>
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
        @foreach ($donations as $donation)
        <tr>
            <td>{{ $loop->index + 1}}</td>
            <td>{{ $donation->name }}</td>
            <td>{{ $donation->pivot->amount }}</td>
            <td class="text-center">{{ $donation->pivot->donated_at_formatted }}</td>
        </tr>
        @endforeach
    </table>
    <div class="page-break"></div>
    <h4>Charities you have donated</h4>
    <br />
    <table class="table table-bordered">
        <tr>
            <th class="text-center">#</th>
            <th class="text-center">Charity Name</th>
        </tr>
        @foreach ($donatedCharities as $charities)
        <tr>
            <td>{{ $loop->index + 1}}</td>
            <td>{{ $charities->name }}</td>
        </tr>
        @endforeach
    </table>
	<br />
</body>
</html>
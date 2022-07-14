<!DOCTYPE html>
<html>
<head>
    <title>Program report</title>
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
            <td>{{ round($programStats['total_donation'], 2) }}</td>
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
			<td>
                @if ($supporter->is_anonymous)
                    Anonymous User
                @else
                    {{ $supporter->benefactor->first_name  . ' ' . $supporter->benefactor->last_name}}
                @endif
            </td>
            <td>{{ round($supporter->amount, 2) }}</td>
            <td>{{ $supporter->donated_at_formatted }}</td>
        </tr>
		@endforeach
    </table>
	<br />
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Booking Report</title>

    <style>
        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: sans-serif;
        }
        h1,h2,h3,h4,h5,h6,p,span,label {
            font-family: sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0px !important;
        }
        table thead th {
            height: 28px;
            text-align: left;
            font-size: 16px;
            font-family: sans-serif;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
            margin-top: 30px;
        }

        .heading {
            font-size: 24px;
            margin-top: 12px;
            margin-bottom: 12px;
            font-family: sans-serif;
        }
        .small-heading {
            font-size: 18px;
            font-family: sans-serif;
        }
        .total-heading {
            font-size: 18px;
            font-weight: 700;
            font-family: sans-serif;
        }
        .order-details tbody tr td:nth-child(1) {
            width: 20%;
        }
        .order-details tbody tr td:nth-child(3) {
            width: 20%;
        }

        .text-start {
            text-align: left;
        }
        .text-end {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .company-data span {
            margin-bottom: 4px;
            display: inline-block;
            font-family: sans-serif;
            font-size: 14px;
            font-weight: 400;
        }
        .no-border {
            border: 1px solid #fff !important;
        }
        .bg-blue {
            background-color: #414ab1;
            color: #fff;
        }
    </style>
</head>
<body>

    <table class="order-details">
        <thead>
            <tr>
                <th width="50%" colspan="2">
                    <h2 class="text-start">Booking Report</h2>
                </th>
                <th width="50%" colspan="2" class="text-end company-data">
                    <span>Report :
                        <?php
                        // Prints the day, date, month, year
                        echo date("l jS \of F Y  ") . "<br>";
                        ?> 
                    </span> <br>
                    <span>Tel : +609 431 5000</span> <br>
                    <span>Address: Universiti Malaysia Pahang,26600 Pekan,Pahang, Malaysia</span> <br>
                </th>
            </tr>
            <tr class="bg-blue">
                <th width="50%" colspan="2">Student Details</th>
                <th width="50%" colspan="2">Owner Details</th>
            </tr>
        </thead>
        @foreach($bookings as $booking)
        <tbody>
            <tr>
                <td style="background-color: #ebebe0">No</td>
                <td style="background-color: #ebebe0">{{$loop->iteration}}</td>

                <td style="background-color: #ebebe0">Owner Name</td>
                <td style="background-color: #ebebe0">{{$booking->owner_name}}</td>
            </tr>
            <tr>
                <td>Student Name</td>
                <td>{{$booking->name}}</td>

                <td>House Address</td>
                <td>{{$booking->location}}</td>
            </tr>
            <tr>
                <td>Student Email</td>
                <td>{{$booking->email}}</td>

                <td>Booking Date</td>
                <td>{{$booking->booking_date}}</td>
            </tr>
        </tbody>
        @endforeach
    </table>

    <table>
        <thead>
            <tr>
                <th class="no-border text-start heading" colspan="5">
                    Total Bookings
                </th>
            </tr>
            <tr class="bg-blue" >
                <th>Bookings</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td width="20%">{{count($bookings)}}</td>
            </tr>
            
        </tbody>
    </table>

    <br>
    <p class="text-center">
        Have a nice day!!!
    </p>

</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>Laporan Finance FO</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 70px;
        }
        .header p {
            font-size: 14px;
        }
        .logo {
            max-width: 150px;
            float: right; /* Add this line to float the image to the right */
        }
        .invoice-info {
            text-align: left;
            margin-top: 10px;
        }
        .invoice-info p {
            font-size: 14px; /* Adjust the font size as needed */
        }
        .invoice-details {
            margin-top: 20px;
        }
        .invoice-details table {
            width: 100%;
            border-collapse: collapse;
        }
        .invoice-details th, .invoice-details td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        .footer {
            text-align: left;
            font-size: 14px;
        }
        .invoice-sign {
            text-align: center;
            margin-top: 20px;
        }
        .invoice-sign-row {
            margin-top: 20px;
            margin-bottom: 100px;
        }
        .invoice-sign-column {
            width: 45%; /* Use col-xs-4 equivalent width for each column */
            display: inline-block;
        }
        .invoice-sign-column p {
            margin: 0;
            font-size: 14px;
        }
        
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ public_path('assets/img/logo cabin hotel.png') }}" alt="Company Logo" class="logo">
            <p>Yogyakarta, {{ \Carbon\Carbon::now()->timezone('Asia/Bangkok')->isoFormat('DD MMMM YYYY') }}</p>
        </div>
        <div class="invoice-info">
            <center><h3>Report Finance Pendapatan Kamar</h3></center>
            <p>Cabang: <b>{{ $branchName }}</b></p>
            <p>Dari : <b>{{ \Carbon\Carbon::parse($from ?? '')->timezone('Asia/Bangkok')->isoFormat('DD MMMM YYYY') }}</b></p>
            <p>Sampai : <b>{{ \Carbon\Carbon::parse($to ?? '')->timezone('Asia/Bangkok')->isoFormat('DD MMMM YYYY') }}</b></p>
        </div>
        <div class="invoice-details">
            <table>
                <tr>
                    <th rowspan="1">ID Bill</th>
                    <th rowspan="1">Tgl Bayar</th>
                    <th rowspan="1">Status</th>
                    <th rowspan="1">Harga</th>
                    <th rowspan="1">Bayar</th>
                    <th rowspan="1">Sisa Bayar</th>
                    
                </tr>
                
                @foreach($payment as $payments)
                <tr>
                    <td>{{ $payments->payment_code }}</td>
                    <td>{{ \Carbon\Carbon::parse($payments->created_at ?? '')->timezone('Asia/Bangkok')->isoFormat('DD MMMM YYYY') }}</td>
                    <td>{{ $payments->payment_status }}</td>
                    <td>Rp. {{ number_format($payments->total_price - $payments->discount + $payments->total_price_amenities ?? 0, 0, ',', '.') }}</td>
                    <td>Rp. {{ number_format($payments->total_price - $payments->discount + $payments->total_price_amenities ?? 0, 0, ',', '.') }}</td>
                    <td>Rp. {{ number_format($payments->total_price - $payments->discount - $payments->total_payment ?? 0, 0, ',', '.') }}</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="4"><b>Total Pendapatan Kamar</b></td>
                    <td colspan="4"> Rp. {{ $totalPayment }} </td>
                </tr>
            </table>
        </div>
        </div>
    </div>
</body>
</html>

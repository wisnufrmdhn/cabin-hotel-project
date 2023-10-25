<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
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
            <img src="https://thecabinhoteljogja.com/logo.png" alt="Company Logo" class="logo">
            <p>Yogyakarta, {{ isset($invoice->created_at) ? date('d/m/Y', strtotime($invoice->created_at)) : '' }}</p>
        </div>
        <div class="invoice-info">
            <p>No Nota: <b>{{ $invoice->payment->payment_code ?? '' }}</b></p>
            <p>Nama: <b>{{ $invoice->customer->customer_title ?? '' }} {{ $invoice->customer->customer_name ?? '' }}</b></p>
            <p>Check in: <b>{{ $invoice->reservation_start_date ?? '' }}</b></p>
            <p>Check out: <b>{{ $invoice->reservation_end_date ?? '' }}</b></p>
        </div>
        <div class="invoice-details">
            <table>
                <tr>
                    <th>No Cabin</th>
                    <th>Jenis Cabin</th>
                    <th>Jml Org</th>
                    <th>Harga/Cabin</th>
                </tr>
                @foreach($hotelRoomReserved as $rooms)
                <tr>
                    <td>{{ $rooms->hotelRoomNumber->room_number ?? '' }}</td>
                    <td>{{ $rooms->hotelRoomNumber->hotelRoom->room_type ?? '' }}</td>
                    <td>{{ $rooms->total_guest ?? '' }}</td>
                    <td> Rp. {{ $rooms->price ?? '' }}</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="3"><b>Subtotal</b></td>
                    <td> Rp. {{ $subtotal ?? 0 }} </td>
                </tr>
                @if(count($paymentAmenities) > 0)
                <tr>
                    <td><b>No</b></td>
                    <td><b>Additional</b></td>
                    <td><b>Jumlah</b></td>
                    <td><b>Total Harga</b></td>
                </tr>
                @endif
                @foreach($paymentAmenities as $additionals)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $additionals->amenities->amenities ?? '' }}</td>
                    <td>{{ $additionals->amount ?? 0 }}</td>
                    <td>Rp. {{ $additionals->total_price ?? 0 }}</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="3"><b>Diskon</b></td>
                    <td> Rp. {{ $discount ?? 0 }} </td>
                </tr>
                <tr>
                    <td colspan="3"><b>DP & Extra</b></td>
                    <td> Rp. {{ $invoice->payment->downPayment->down_payment ?? 0 }} </td>
                </tr>
                <tr>
                    <td colspan="3"><b>Total</b></td>
                    <td> Rp. {{ ($subtotal ?? 0) + $subtotalAmenities - $discount - ($invoice->payment->downPayment->down_payment ?? 0) }} </td>
                </tr>
            </table>
        </div>
        <div class="footer">
            <p>Pernyataan saya menyatakan</p>
            <p>1. Tidak membawa atau mengkonsumsi narkoba dan turunannya</p>
            <p>2. Tidak merokok di dalam kamar, jika ketahuan merokok bersedia membayar denda sebesar Rp.500.000</p>
        </div>
        <div class="invoice-sign">
            <div class="invoice-sign-row">
                <div class="invoice-sign-column">
                    <p>Kasir</p>
                </div>
            
                <div class="invoice-sign-column">
                    <p>Tamu</p>
                </div>
            </div>
            <div class="invoice-sign-row">
                <div class="invoice-sign-column">
                    <p><b>{{ $cashier ?? '' }}</b></p>
                    <hr width="70%">
                </div>
                
                <div class="invoice-sign-column">
                    <p><b>{{ $invoice->customer->customer_title ?? '' }} {{ $invoice->customer->customer_name ?? '' }}</b></p>
                    <hr width="70%">
                </div>
            </div>
        </div>
    </div>
</body>
</html>

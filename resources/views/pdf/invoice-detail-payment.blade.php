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
            <img src="{{ public_path('assets/img/logo cabin hotel.png') }}" alt="Company Logo" class="logo">
            <p>Yogyakarta, {{ isset($invoice->created_at) ? date('d/m/Y', strtotime($invoice->created_at)) : '' }}</p>
        </div>
        <div class="invoice-info">
            <p>No Nota: <b>{{ $invoice->payment->payment_code ?? '' }}</b></p>
            <p>No Reservasi: <b>{{ $invoice->reservation_code ?? '' }}</b></p>
            <p>Nama: <b>{{ $invoice->customer->customer_title ?? '' }} {{ $invoice->customer->customer_name ?? '' }}</b></p>
            <p>Check in: <b>{{ $invoice->reservation_start_date ?? '' }}</b></p>
            <p>Check out: <b>{{ $invoice->reservation_end_date ?? '' }}</b></p>
            <p>Status Pembayaran: <b>{{ $invoice->Payment->payment_status ?? '' }}</b></p>
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
                    <td> Rp. {{ number_format($rooms->price ?? 0, 0, ',', '.') }}</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="3"><b>Subtotal</b></td>
                    <td> Rp. {{ number_format($subtotal ?? 0, 0, ',', '.') }} </td>
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
                    <td>Rp. {{ number_format($additionals->total_price ?? 0, 0, ',', '.') }} </td>
                </tr>
                @endforeach
                <tr>
                        <td colspan="3"><b>Diskon</b></td>
                        <td> Rp. {{ number_format($discount ?? 0, 0, ',', '.') }} </td>
                </tr>
                <tr>
                        <td colspan="3"><b>Total Pembayaran</b></td>
                        <td> Rp. {{  number_format(($subtotal ?? 0) + $subtotalAmenities - $discount ?? 0 ?? 0, 0, ',', '.') }} </td>
                </tr>
            </table>
        </div>
        <div class="invoice-info">
            <p>Rincian Pembayaran : </p>     
        </div>
        <div class="invoice-details">
            <table>
                <tr>
                    <th>Tanggal Pembayaran</th>
                    <th>Metode Pembayaran</th>
                    <th>Nominal Pembayaran</th>
                </tr>
                @foreach($invoice->Payment->PaymentDetail as $paymentDetails)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($paymentDetails->updated_at ?? '')->timezone('Asia/Bangkok') }}</td>
                    <td>{{ $paymentDetails->paymentMethod->payment_method ?? '' }}</td>
                    <td>Rp. {{ number_format($paymentDetails->payment_detail_value ?? 0, 0, ',', '.') }}</td>
                </tr>
                @endforeach
                @if($invoice->Payment->PaymentPaid)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($invoice->Payment->PaymentPaid->updated_at ?? '')->timezone('Asia/Bangkok') }}</td>
                        <td>{{ $invoice->Payment->PaymentPaid->paymentMethod->payment_method ?? '' }}</td>
                        <td>Rp. {{ number_format($invoice->Payment->PaymentPaid->payment_paid_value ?? 0, 0, ',', '.') }}</td>
                    </tr>
                @endif
            </table>
        </div>
    </div>
</body>
</html>

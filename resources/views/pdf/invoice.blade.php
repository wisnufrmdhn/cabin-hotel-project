<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> <!-- Include Bootstrap CSS -->
    <title>Invoice</title>
    <style>
        /* Define your custom CSS styles here */
        body {
            font-family: Arial, sans-serif;
        }
        .invoice-header {
            text-align: center;
            padding: 20px;
        }
        .invoice-title {
            font-size: 24px;
            font-weight: bold;
        }
        .invoice-details {
            margin-top: 20px;
            text-align: left;
        }
        .invoice-items {
            margin-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .invoice-summary {
            margin-top: 20px;
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="invoice-header">
        <div class="invoice-title">
            Invoice
        </div>
        <div class="invoice-details">
            <p>No Nota: {{ $invoice->payment->payment_code ?? '' }}</p>
            <p>Nama: {{ $invoice->customer->customer_name ?? '' }}</p>
            <p>Check in: {{ $invoice->reservation_start_date ?? '' }}</p>
            <p>Check out: {{ $invoice->reservation_end_date ?? '' }}</p>
        </div>
    </div>
    <!-- <div class="invoice-items">
        <table>
            <thead>
                <tr>
                    <th>No Cabin</th>
                    <th>Jenis Cabin</th>
                    <th>Jml Org</th>
                    <th>Harga/Cabin</th>
                    <th>Diskon</th>
                    <th>Dp&Extra</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
            </tbody>
        </table>
    </div>
    <div class="invoice-summary">
        <p>Total : </p>
    </div> -->
    <div class="invoice-details">
            <p>Pernyataan saya menyatakan</p>
            <p>1. Tidak membawa atau mengkonsumsi narkoba dan turunannya</p>
            <p>2. Tidak merokok di dalam kamar, jika ketahuan merokok bersedia membayar denda sebesar Rp.50.000</p>
    </div>
</body>
</html>

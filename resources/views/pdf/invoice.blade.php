<!-- Your HTML and CSS for the invoice layout -->
<p>No Nota: {{ $invoice->payment->payment_code }}</p>
<p>Nama: {{ $invoice->customer->customer_name }}</p>
<p>Check in: {{ $invoice->reservation_start_date }}</p>
<p>Check out: {{ $invoice->reservation_end_date }}</p>
<!-- Other invoice details -->

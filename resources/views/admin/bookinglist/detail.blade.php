@extends('layout.template')
@section('content')
<!-- Header Start -->
<div class="py-4">
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-0 mb-lg-0">
            <h3 class="h4">Detail Reservation Data</h3>
        </div>
    </div>
</div>
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <span class="fas fa-bullhorn me-1">{{ session('success') }}</span>
    <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if($errors->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="fas fa-bullhorn me-1"></span>
            <strong>{{ $errors->first('error') }}</strong>
            <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
@endif
<!-- Header End -->
    <div class="row">
                <div class="col-12 mb-4">
                    <div class="card border-0 shadow components-section">
                        <div class="card-body">     
                        <div class="d-flex px-0 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-between">
                            <h4>Data Tamu</h4>
                        </div>
                        </br>
                            <div class="row">
                                <div class="col-lg-6 col-sm-6">
                                    <!-- Form -->
                                    <div class="mb-4">
                                        <label for="email">Foto Tamu</label>
                                        <img class="rounded img-thumbnail" width="1000" height="100" src="{{ asset($reservationDetail->customer->customer_photo_url) ?? 'https://images.unsplash.com/photo-1575936123452-b67c3203c357?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8aW1hZ2V8ZW58MHx8MHx8fDA%3D&w=1000&q=80' }}" alt="change avatar">
                                    </div>
                                    <!-- End of Form -->
                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    <!-- Form -->
                                    <div class="mb-4">
                                        <label for="email">Foto KTP</label>
                                        <img class="rounded img-thumbnail" width="1000" height="100" src="{{ asset($reservationDetail->customer->customer_identity_photo_url) ?? 'https://images.unsplash.com/photo-1575936123452-b67c3203c357?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8aW1hZ2V8ZW58MHx8MHx8fDA%3D&w=1000&q=80' }}" alt="change avatar">
                                    </div>
                                    <!-- End of Form -->
                                </div>
                                <div class="col-lg-1 col-sm-1">
                                    <!-- Form -->
                                    <div class="mb-4">
                                        <label for="email">Gelar</label>
                                        <input type="text" class="form-control" id="email" value="{{ $reservationDetail->customer->customer_title }}" aria-describedby="emailHelp" disabled>
                                    </div>
                                    <!-- End of Form -->
                                </div>
                                <div class="col-lg-2 col-sm-2">
                                    <!-- Form -->
                                    <div class="mb-4">
                                        <label for="email">Nama</label>
                                        <input type="text" class="form-control" id="email" value="{{ $reservationDetail->customer->customer_name }}" aria-describedby="emailHelp" disabled>
                                    </div>
                                    <!-- End of Form -->
                                </div>
                                <div class="col-lg-2 col-sm-2">
                                    <!-- Form -->
                                    <div class="mb-4">
                                        <label for="email">Jenis Kelamin</label>
                                        @if($reservationDetail->customer->customer_title == 'Mr')
                                            <input type="text" class="form-control" id="email" value="Laki Laki" aria-describedby="emailHelp" disabled>
                                        @else
                                            <input type="text" class="form-control" id="email" value="Perempuan" aria-describedby="emailHelp" disabled>
                                        @endif
                                    </div>
                                    <!-- End of Form -->
                                </div>
                                <div class="col-lg-2 col-sm-2">
                                    <!-- Form -->
                                    <div class="mb-4">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email" value="{{ $reservationDetail->customer->customer_email }}" aria-describedby="emailHelp" disabled>
                                    </div>
                                    <!-- End of Form -->
                                </div>
                                <div class="col-lg-2 col-sm-2">
                                    <!-- Form -->
                                    <div class="mb-4">
                                        <label for="email">No Handphone</label>
                                        <input type="text" class="form-control" id="email" value="{{ $reservationDetail->customer->customer_phone }}" aria-describedby="emailHelp" disabled>
                                    </div>
                                    <!-- End of Form -->
                                </div>
                                <div class="col-lg-3 col-sm-3">
                                    <!-- Form -->
                                    <div class="mb-4">
                                        <label for="email">Alamat</label>
                                        <input type="text" class="form-control" id="email" value="{{ $reservationDetail->customer->customer_address }}" aria-describedby="emailHelp" disabled>
                                    </div>
                                    <!-- End of Form -->
                                </div>
                                </br></br></br>
                                <div class="col-lg-12 col-sm-12">
                                    <div class="d-flex px-0 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-between">
                                        <h4>Data Reservasi</h4>
                                    </div>
                                </div>
                                </br></br></br>
                                <div class="col-lg-2 col-sm-2">
                                    <!-- Form -->
                                    <div class="mb-4">
                                        <label for="email">Metode Reservasi</label>
                                        <input type="text" class="form-control" value="{{ $reservationDetail->reservationMethod->reservation_method }}" aria-describedby="emailHelp" disabled>
                                    </div>
                                    <!-- End of Form -->
                                </div>
                                <div class="col-lg-2 col-sm-2">
                                    <!-- Form -->
                                    <div class="mb-4">
                                        <label for="email">Kode Booking OTA</label>
                                        <input type="text" class="form-control" value="{{ $reservationDetail->booking_number ?? '-' }}" aria-describedby="emailHelp" disabled>
                                    </div>
                                    <!-- End of Form -->
                                </div>
                                <div class="col-lg-2 col-sm-2">
                                    <!-- Form -->
                                    <div class="mb-4">
                                        <label for="email">Kode Reservasi</label>
                                        <input type="text" class="form-control" value="{{ $reservationDetail->reservation_code }}" aria-describedby="emailHelp" disabled>
                                    </div>
                                    <!-- End of Form -->
                                </div>
                                <div class="col-lg-3 col-sm-3">
                                    <!-- Form -->
                                    <div class="mb-4">
                                        <label for="email">Checkin</label>
                                        <input type="text" class="form-control" value="{{ $reservationDetail->reservation_start_date }}" aria-describedby="emailHelp" disabled>
                                    </div>
                                    <!-- End of Form -->
                                </div>
                                <div class="col-lg-3 col-sm-3">
                                    <!-- Form -->
                                    <div class="mb-4">
                                        <label for="email">Checkout</label>
                                        <input type="text" class="form-control" value="{{ $reservationDetail->reservation_end_date }}" aria-describedby="emailHelp" disabled>
                                    </div>
                                    <!-- End of Form -->
                                </div>

                                <div class="col-lg-3 col-sm-3">
                                    <!-- Form -->
                                    <div class="mb-4">
                                        <label for="email">Kategori Hari Reservasi</label>
                                        <input type="text" class="form-control" value="{{ $reservationDetail->reservation_day_category }}" aria-describedby="emailHelp" disabled>
                                    </div>
                                    <!-- End of Form -->
                                </div>
                                <div class="col-lg-3 col-sm-3">
                                    <!-- Form -->
                                    <div class="mb-4">
                                        <label for="email">Status</label>
                                        <input type="text" class="form-control" value="{{ $reservationDetail->status }}" aria-describedby="emailHelp" disabled>
                                    </div>
                                    <!-- End of Form -->
                                </div>
                                <div class="col-lg-3 col-sm-3">
                                    <!-- Form -->
                                    <div class="mb-4">
                                        <label for="email">Breakfast</label>
                                        <input type="text" class="form-control" value="{{ $reservationDetail->breakfast_status }}" aria-describedby="emailHelp" disabled>
                                    </div>
                                    <!-- End of Form -->
                                </div>
                                <div class="col-lg-3 col-sm-3">
                                    <!-- Form -->
                                    <div class="mb-4">
                                        <label for="email">Tanggal Reservasi</label>
                                        <input type="text" class="form-control" value="{{ $reservationDetail->created_at }}" aria-describedby="emailHelp" disabled>
                                    </div>
                                    <!-- End of Form -->
                                </div>
                                </br></br></br>
                                <div class="col-lg-12 col-sm-12">
                                    <div class="d-flex px-0 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-between">
                                        <h4>Rincian Kamar</h4>
                                    </div>
                                </div>
                                </br></br></br>
                                <div class="col-lg-12 col-sm-12">
                                    <table style="text-align: center" class="table table-hover table-bordered">
                                        <thead style="vertical-align: middle">
                                            <tr>
                                                <th rowspan="1" class="border-gray-200">Nomer Kamar</th>
                                                <th rowspan="1" class="border-gray-200">Tipe Kamar</th>
                                                <th colspan="1" class="border-gray-200">Harga Kamar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Item -->
                                            <tr>
                                                @foreach($reservationDetail->hotelRoomReserved as $roomDetails)
                                                    <td><span class="fw-bold">{{ $roomDetails->hotelRoomNumber->room_number }}</span></td>
                                                    <td><span class="fw-normal">{{ $roomDetails->hotelRoomNumber->hotelRoom->room_type }}</span></td>
                                                    <td><span class="fw-normal">Rp. {{ $roomDetails->price }}</span></td>
                                                @endforeach
                                            </tr>
                                            <!-- Item -->
                                        </tbody>
                                    </table>
                                </div>
                                </br></br></br></br>
                                <div class="col-lg-12 col-sm-12">
                                    <div class="d-flex px-0 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-between">
                                        <h4>Data Pembayaran</h4>
                                    </div>
                                </div>
                                </br></br></br>
                                <div class="col-lg-2 col-sm-2">
                                    <!-- Form -->
                                    <div class="mb-4">
                                        <label for="email">Total Harga Kamar</label>
                                        <input type="text" class="form-control" value="Rp. {{ $reservationDetail->payment->total_price }}" aria-describedby="emailHelp" disabled>
                                    </div>
                                    <!-- End of Form -->
                                </div>
                                <div class="col-lg-2 col-sm-2">
                                    <!-- Form -->
                                    <div class="mb-4">
                                        <label for="email">Diskon</label>
                                        <input type="text" class="form-control" value="Rp. {{ $reservationDetail->payment->discount }}" aria-describedby="emailHelp" disabled>
                                    </div>
                                    <!-- End of Form -->
                                </div>
                                <div class="col-lg-2 col-sm-2">
                                    <!-- Form -->
                                    <div class="mb-4">
                                        <label for="email">Biaya Amenities</label>
                                        <input type="text" class="form-control" value="Rp. {{ $reservationDetail->payment->total_price_amenities }}" aria-describedby="emailHelp" disabled>
                                    </div>
                                    <!-- End of Form -->
                                </div>
                                <div class="col-lg-2 col-sm-2">
                                    <!-- Form -->
                                    <div class="mb-4">
                                        <label for="email">Total Pembayaran</label>
                                        <input type="text" class="form-control" value="Rp. {{ $reservationDetail->payment->total_payment }}" aria-describedby="emailHelp" disabled>
                                    </div>
                                    <!-- End of Form -->
                                </div>

                                <div class="col-lg-2 col-sm-2">
                                    <div class="mb-4">
                                        <label for="email">Kembalian</label>
                                        <input type="text" class="form-control" value="Rp. {{ $reservationDetail->payment->change }}" aria-describedby="emailHelp" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-2">
                                    <!-- Form -->
                                    <div class="mb-4">
                                        <label for="email">Status</label>
                                        <input type="text" class="form-control" value="{{ $reservationDetail->payment->payment_status }}" aria-describedby="emailHelp" disabled>
                                    </div>
                                    <!-- End of Form -->
                                </div>
                                </br></br></br>
                                <div class="col-lg-12 col-sm-12">
                                    <div class="d-flex px-0 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-between">
                                        <h4>Rincian Pembayaran</h4>
                                    </div>
                                </div>
                                </br>
                                <div class="col-lg-12 col-sm-12">
                                    <!-- Button to open modal -->
                                    @if($reservationDetail->payment->payment_status == 'DP' || $reservationDetail->payment->payment_status == 'DP 2')
                                        <button type="button" class="btn btn-secondary"data-bs-toggle="modal" data-bs-target="#addModal">Tambah Pembayaran</button>
                                    @endif 
                                    <a href="{{ route('pdf.invoices.detail-payment', $reservationDetail->reservation_code) }}" target="_blank" class="btn btn btn-danger">Invoice PDF Rincian Pembayaran</a>
                                    <table style="text-align: center" class="table table-hover table-bordered">
                                        <thead style="vertical-align: middle">
                                            <tr>
                                                <th rowspan="1" class="border-gray-200">Tanggal Pembayaran</th>
                                                <th rowspan="1" class="border-gray-200">Metode Pembayaran</th>
                                                <th colspan="1" class="border-gray-200">Pembayaran</th>
                                                <th rowspan="1" class="border-gray-200">No Transaksi</th>
                                                <th rowspan="1" class="border-gray-200">No Referensi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Item -->
                                            @foreach($reservationDetail->payment->paymentDetail as $paymentDetail)
                                            <tr>
                                                <td><span class="fw-bold">{{ \Carbon\Carbon::parse($paymentDetail->updated_at ?? '')->timezone('Asia/Bangkok') }}</span></td>
                                                <td><span class="fw-normal">{{ $paymentDetail->paymentMethod->payment_method }}</span></td>
                                                <td><span class="fw-normal">Rp. {{ $paymentDetail->payment_detail_value }}</span></td>
                                                <td><span class="fw-normal">{{ $paymentDetail->card_number ?? '-' }}</span></td>
                                                <td><span class="fw-bold">{{ $paymentDetail->reference_number ?? '-' }}</span></td>
                                            </tr>
                                            @endforeach
                                            @if($reservationDetail->payment->paymentPaid)
                                            <tr>
                                                <td><span class="fw-bold">{{ \Carbon\Carbon::parse($reservationDetail->payment->paymentPaid->updated_at ?? '')->timezone('Asia/Bangkok') }}</span></td>
                                                <td><span class="fw-normal">{{ $reservationDetail->payment->paymentPaid->paymentMethod->payment_method }}</span></td>
                                                <td><span class="fw-normal">Rp. {{ $reservationDetail->payment->paymentPaid->payment_paid_value }}</span></td>
                                                <td><span class="fw-normal">{{ $reservationDetail->payment->paymentPaid->card_number ?? '-' }}</span></td>
                                                <td><span class="fw-bold">{{ $reservationDetail->payment->paymentPaid->reference_number ?? '-' }}</span></td>
                                            </tr>
                                            @endif
                                            <!-- Item -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    </div>
                </div>
            </div>

    <div aria-hidden="true" aria-labelledby="modal-default" class="modal fade" id="addModal" role="dialog" tabindex="-1">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h2 class="h6 modal-title">Tambah Pembayaran</h2><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
				</div>
				<div class="modal-body">
                <form method="POST" action="{{ route('admin.bookinglist.store-new-payment') }}"">
                @csrf
                <input type="hidden" id="payment_id" name="payment_id" class="form-control mb-2" value="{{ $reservationDetail->payment_id }}">
                <div class="col">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="payment_method_cash" name="payment_method_cash">
                                <p>Cash</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-2">
                            <label for="gender">Sisa Pembayaran</label>
                                <input type="text" name="remaining_payment" class="form-control "
                                    id="remaining_payment" placeholder=" Rp. {{ $currentPayment }}" disabled>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-2">
                            <label for="gender">Nominal Bayar</label>
                                <input type="text" name="payment_cash_value" class="form-control "
                                    id="payment_cash_value" placeholder="{{ $currentPayment }}" aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-4">
                            <label for="gender">Nominal Kembali</label>
                                <input type="text" name="change" id="change" class="form-control " id="email"
                                    placeholder="Nominal Kembali" aria-describedby="emailHelp">
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="payment_method_non_cash" name="payment_method_non_cash">
                                <p>Non Cash</p>
                            </div>
                        </div>
                    <select class="form-select w-100 mb-2" id="paymentMethod" name="paymentMethod" aria-label="paymentMethod">
                        <option selected value="">Metode Pembayaran</option>
                        <option value="Card">Card</option>
                        <option value="Qris">QRIS</option>
                        <option value="Transfer">Transfer</option>
                        <option value="VA">Virtual Account</option>
                    </select>
                    <!-- Form select untuk transfer -->
                    <div class="col paymentOption" id="transferOptions" style="display: none;">
                            <select class="form-select w-100 mb-2" id="payment_category_transfer" name="payment_category_transfer" aria-label="transferBank" style="margin-bottom: 10px;">
                                <option selected value="">Pilih Bank Transfer</option>
                                    @foreach($paymentTransfer as $transfer)
                                        <option value="{{ $transfer->id }}">{{ $transfer->payment_method }}</option>
                                    @endforeach
                            </select>
                            <label for="gender">Nominal Bayar</label>
                            <input type="text" id="payment_transfer_value" name="payment_transfer_value" class="form-control mb-2" placeholder="{{ $currentPayment }}">
                            <label for="gender">No Referensi Transfer</label>
                            <input type="text" id="payment_method_transfer_reference" name="payment_method_transfer_reference" class="form-control mb-2" placeholder="Nomor Referensi Transaksi Transfer">
                        </div>

                        <!-- Form select untuk virtual account -->
                        <div class="col paymentOption" id="VAOptions" style="display: none;">
                            <select class="form-select w-100 mb-2"  id="payment_category_va" name="payment_category_va" aria-label="virtualAccount" style="margin-bottom: 10px;">
                                <option selected value="">Pilih Virtual Account</option>
                                    @foreach($paymentVA as $va)
                                        <option value="{{ $va->id }}">{{ $va->payment_method }}</option>
                                    @endforeach
                            </select>
                            <label for="gender">Nominal Bayar</label>
                            <input type="text" id="payment_va_value" name="payment_va_value" class="form-control mb-2" placeholder="{{ $currentPayment }}">
                            <label for="gender">No Referensi VA</label>
                            <input type="text" id="payment_method_va_reference" name="payment_method_va_reference" class="form-control mb-2" placeholder="Nomor Referensi Transaksi Virtual Account">
                        </div>

                        <!-- Form select untuk card -->
                        <div class="col paymentOption" id="cardOptions" style="display: none;">
                            <select class="form-select w-100 mb-2" id="payment_category_card" name="payment_category_card" aria-label="cardType">
                                <option selected value>Pilih Jenis Kartu</option>
                                @foreach($paymentCard as $card)
                                    <option value="{{ $card->id }}">{{ $card->payment_method }}</option>
                                @endforeach
                            </select>
                            <label for="gender">Nominal Bayar</label>
                            <input type="text" id="payment_card_value" name="payment_card_value" class="form-control mb-2"ih  placeholder="{{ $currentPayment }}">
                            <label for="gender">No Transaksi</label>
                            <input type="text" id="payment_method_card_number" name="payment_method_card_number" class="form-control mb-2" placeholder="Nomor Transaksi">
                        </div>

                        <!-- Form select untuk qris -->
                        <div class="col paymentOption" id="qrisOptions" style="display: none;">
                            <select class="form-select w-100 mb-2" id="payment_category_qris" name="payment_category_qris" aria-label="qrisType">
                                <option selected value>Pilih Jenis QRIS</option>
                                    @foreach($paymentQris as $qris)
                                        <option value="{{ $qris->id }}">{{ $qris->payment_method }}</option>
                                    @endforeach
                            </select>
                            <label for="gender">Nominal Bayar</label>
                            <input type="text" id="payment_qris_value" name="payment_qris_value" class="form-control mb-2" placeholder="{{ $currentPayment }}">
                            <label for="gender">No Referensi Qris</label>
                            <input type="text" id="payment_method_qris_reference" name="payment_method_qris_reference" class="form-control mb-2" placeholder="Nomor Referensi Transaksi QRIS">
                        </div>
				</div>
				<div class="modal-footer">
                    <button class="btn btn-secondary" type="submit">Submit</button>
				</div>
                </form>
			</div>
		</div>
	</div><!-- End of Modal Content -->
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#paymentMethod').change(function() {
            $('.paymentOption').hide(); // Sembunyikan semua form select tambahan

            // Tampilkan form select tambahan sesuai dengan metode pembayaran yang dipilih
            if ($(this).val() === 'Transfer') {
                $('#transferOptions').show();
                $('#payment_category_transfer').attr('required', 'required');
                $('#payment_transfer_value').attr('required', 'required');
                $('#payment_method_transfer_reference').attr('required', 'required');
                $('#payment_category_card').removeAttr('required');
                $('#payment_card_value').removeAttr('required');
                $('#payment_method_card_number').removeAttr('required');
                $('#payment_category_qris').removeAttr('required');
                $('#payment_qris_value').removeAttr('required');
                $('#payment_method_qris_reference').removeAttr('required');
            } else if ($(this).val() === 'Card') {
                $('#cardOptions').show();
                $('#payment_category_card').attr('required', 'required');
                $('#payment_card_value').attr('required', 'required');
                $('#payment_method_card_number').attr('required', 'required');
                $('#payment_category_qris').removeAttr('required');
                $('#payment_qris_value').removeAttr('required');
                $('#payment_method_qris_reference').removeAttr('required');
                $('#payment_category_transfer').removeAttr('required');
                $('#payment_transfer_value').removeAttr('required');
                $('#payment_method_transfer_reference').removeAttr('required');
            } else if ($(this).val() === 'Qris') {
                $('#qrisOptions').show();
                $('#payment_category_qris').attr('required', 'required');
                $('#payment_qris_value').attr('required', 'required');
                $('#payment_method_qris_reference').attr('required', 'required');
                $('#payment_category_transfer').removeAttr('required');
                $('#payment_transfer_value').removeAttr('required');
                $('#payment_method_transfer_reference').removeAttr('required');
                $('#payment_category_card').removeAttr('required');
                $('#payment_card_value').removeAttr('required');
                $('#payment_method_card_number').removeAttr('required');
            } else if ($(this).val() === 'Cash') {
                $('#cashOptions').show();
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#paymentMethod').change(function() {
            $('.paymentOption').hide(); // Sembunyikan semua form select tambahan

            // Tampilkan form select tambahan sesuai dengan metode pembayaran yang dipilih
            if ($(this).val() === 'Transfer') {
                $('#transferOptions').show();
            } else if ($(this).val() === 'Card') {
                $('#cardOptions').show();
            } else if ($(this).val() === 'Qris') {
                $('#qrisOptions').show();
            }else if ($(this).val() === 'VA') {
                $('#VAOptions').show();
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
            $('#payment_method_cash').attr('required', 'required');
            $('#payment_method_non_cash').attr('required', 'required');
        });
</script>
<script>
    $(document).ready(function() {
            $('#payment_method_cash').on('change', function() {
                // Tampilkan atau sembunyikan elemen-elemen tergantung pada nilai checkbox
                if (this.checked) {
                    $('#payment_method_non_cash').prop('disabled', true);
                    $('#paymentMethod').prop('disabled', true);
                    $('#payment_method_non_cash').removeAttr('required');
                    $('#payment_cash_value').attr('required', 'required');
                    $('#change').attr('required', 'required');
                } else {
                    $('#payment_method_non_cash').prop('disabled', false);
                    $('#paymentMethod').prop('disabled', false);
                    $('#payment_method_non_cash').attr('required', 'required');
                    $('#payment_cash_value').removeAttr('required');
                    $('#change').removeAttr('required');
                }
            });
        });
</script>
<script>
    $(document).ready(function() {
            $('#payment_method_non_cash').on('change', function() {
                // Tampilkan atau sembunyikan elemen-elemen tergantung pada nilai checkbox
                if (this.checked) {
                    $('#payment_method_cash').prop('disabled', true);
                    $('#payment_cash_value').prop('disabled', true);
                    $('#change').prop('disabled', true);
                    $('#payment_method_cash').removeAttr('required');
                    $('#paymentMethod').attr('required', 'required');
                } else {
                    $('#payment_method_cash').prop('disabled', false);
                    $('#payment_cash_value').prop('disabled', false);
                    $('#change').prop('disabled', false);
                    $('#payment_method_cash').attr('required', 'required');
                    $('#paymentMethod').removeAttr('required');
                    $('#payment_category_va').removeAttr('required', 'required');
                    $('#payment_va_value').removeAttr('required', 'required');
                    $('#payment_method_va_reference').removeAttr('required', 'required');
                    $('#payment_category_transfer').removeAttr('required');
                    $('#payment_transfer_value').removeAttr('required');
                    $('#payment_method_transfer_reference').removeAttr('required');
                    $('#payment_category_card').removeAttr('required');
                    $('#payment_card_value').removeAttr('required');
                    $('#payment_method_card_number').removeAttr('required');
                    $('#payment_category_qris').removeAttr('required');
                    $('#payment_qris_value').removeAttr('required');
                    $('#payment_method_qris_reference').removeAttr('required');
                    $('.paymentOption').hide();
                }
            });
        });
</script>
<script>
$(document).ready(function() {
    // Function to format the input as currency
    function inputRupiah(input) {
        // Remove non-numeric characters
        var number = input.replace(/\D/g, '');

        // Add thousands separator (.,) and currency symbol (Rp) if it's a valid number
        if (!isNaN(number)) {
            var formatted = 'Rp ' + number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            return formatted;
        }

        return input; // Return the original input if it's not a valid number
    }

    $('#payment_cash_value').on('input', function() {
            var inputVal = $(this).val();
            var formattedVal = inputRupiah(inputVal);
            $(this).val(formattedVal);
        });

        $('#change').on('input', function() {
            var inputVal = $(this).val();
            var formattedVal = inputRupiah(inputVal);
            $(this).val(formattedVal);
        });

        $('#payment_card_value').on('input', function() {
            var inputVal = $(this).val();
            var formattedVal = inputRupiah(inputVal);
            $(this).val(formattedVal);
        });

        $('#payment_transfer_value').on('input', function() {
            var inputVal = $(this).val();
            var formattedVal = inputRupiah(inputVal);
            $(this).val(formattedVal);
        });

        $('#payment_qris_value').on('input', function() {
            var inputVal = $(this).val();
            var formattedVal = inputRupiah(inputVal);
            $(this).val(formattedVal);
        });

        $('#payment_va_value').on('input', function() {
            var inputVal = $(this).val();
            var formattedVal = inputRupiah(inputVal);
            $(this).val(formattedVal);
        });
});
</script>

<!-- JavaScript to handle form submission -->
<!-- <script> 

@endpush
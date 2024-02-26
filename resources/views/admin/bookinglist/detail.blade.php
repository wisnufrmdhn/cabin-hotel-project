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
                                        <label for="email">Total Biaya Amenities</label>
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
                                    <!-- Form -->
                                    <div class="mb-4">
                                        <label for="email">Kembalian</label>
                                        <input type="text" class="form-control" value="Rp. {{ $reservationDetail->payment->change }}" aria-describedby="emailHelp" disabled>
                                    </div>
                                    <!-- End of Form -->
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
                                    <button type="button" class="btn btn-secondary"data-bs-toggle="modal" data-bs-target="#addModal">Tambah Pembayaran</button> 
                                    <table style="text-align: center" class="table table-hover table-bordered">
                                        <thead style="vertical-align: middle">
                                            <tr>
                                                <th rowspan="1" class="border-gray-200">Tanggal Pembayaran</th>
                                                <th rowspan="1" class="border-gray-200">Metode Pembayaran</th>
                                                <th colspan="1" class="border-gray-200">Pembayaran</th>
                                                <th rowspan="1" class="border-gray-200">No Kartu</th>
                                                <th rowspan="1" class="border-gray-200">No Referensi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Item -->
                                            <tr>
                                                @foreach($reservationDetail->payment->paymentDetail as $paymentDetail)
                                                <td><span class="fw-bold">{{ $paymentDetail->updated_at }}</span></td>
                                                <td><span class="fw-normal">{{ $paymentDetail->paymentMethod->payment_method }}</span></td>
                                                <td><span class="fw-normal">Rp. {{ $paymentDetail->payment_detail_value }}</span></td>
                                                <td><span class="fw-normal">{{ $paymentDetail->card_number ?? '-' }}</span></td>
                                                <td><span class="fw-bold">{{ $paymentDetail->reference_number ?? '-' }}</span></td>
                                                @endforeach
                                            </tr>
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
				    <label for="email">Nominal Pembayaran</label>
                    <input type="text" class="form-control" value="" aria-describedby="emailHelp" disabled>
                    </br>
                    <label for="email">Metode Pembayaran</label>
                    <input type="text" class="form-control" value="" aria-describedby="emailHelp" disabled>
				</div>
				<div class="modal-footer">
                    <button class="btn btn-secondary" type="button">Submit</button>
				</div>
			</div>
		</div>
	</div><!-- End of Modal Content -->
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- <script type="text/javascript">
        function zoom() {
            document.body.style.zoom = "75%" 
        }
</script> -->
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
@endpush
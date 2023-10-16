<style>
    .reservasi {
        background-color: rgb(255, 255, 255);
        color: rgb(0, 0, 0);
        border-radius: 15px;
        box-shadow: 5px 5px 8px #888888;
        padding: 20px;
        margin-bottom: 30px;
    }
</style>
@extends('admin.layout.template')
@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')
    <div class="py-4">
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h5 class="h4">Form Reservasi</h5>
            </div>
        </div>
    </div>
    <div class="reservasi">
        <div class="row">
            <div class="col p-3 bg-dark border-end">
                <div class="container p-2 mb-2">
                    <h5 style="font-size: 25px">Guest Detail</h5>
                    <hr class="garis">
                    <form method="POST" action="{{ route('admin.reservation.store-customer') }}"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        </br>
                        <div class="col">
                            <label for="exampleInputIconLeft">Jenis Tamu</label>
                        </div>
                        <div class="col">
                            <select class="form-select w-100 mb-2" id="reservation_method_id"
                                name="reservation_method_id" aria-label="State select example">
                                @foreach ($reservationMethod as $methods)
                                    <option value="{{ $methods->id }}">
                                        {{ $methods->reservation_method }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <div class="mb-4">
                                <input type="text" class="form-control" name="booking_number"
                                    id="booking_number" placeholder="Booking Number" aria-describedby="booking_number" style="display: none;">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="customer_check" name="customer_check">
                                <label for="daftar_tamu">Pilih Dari Daftar Tamu</label>
                            </div>
                        </div>
                        <div class="col">
                            <select class="form-select w-100 mb-0" id="customer_id" name="customer_id" aria-label="customer_id" disabled>
                                <option value="">Daftar Tamu</option>
                            </select>
                        </div>
                        </br>
                        <div class="col">
                            <label for="exampleInputIconLeft">Isi Data Tamu</label>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-sm-4">
                                <select class="form-select w-100 mb-0" id="customer_title" name="customer_title" aria-label="customer_title">
                                    <option value="Mr">Mr</option>
                                    <option value="Mrs">Mrs</option>
                                </select>
                            </div>
                            <div class="col col-sm-8">
                                <div class="mb-2">
                                    <input type="text" class="form-control " placeholder="Nama"
                                        id="customer_name" name="customer_name" aria-describedby="customer_name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-sm-4">
                                <select class="form-select w-100 mb-0" id="state"
                                    name="customer_identity_type" aria-label="State select example">
                                    <option value="KTP">KTP</option>
                                    <option value="SIM">SIM</option>
                                </select>
                            </div>
                            <div class="col-lg-8 col-sm-8">
                                <div class="mb-2">
                                    <input class="form-control" name="customer_identity_photo" type="file" placeholder="Foto" id="formFile">
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-4">
                            </div>
                        </div>
                        <div class="col">
                            <label for="webcamCapture">Take Photo Tamu</label>
                            <div class="mb-2">
                                <input type="button" class="btn w-100 btn-secondary" value="Take Photo Tamu" id="startWebcamTamuButton">
                                <input type="button" class="btn w-100 btn-secondary" value="Capture" id="captureTamuButton" style="display: none;">
                                <br><br>
                                <input type="button" class="btn w-100 btn-secondary" value="Close Webcam" id="closeWebcamTamuButton" style="display: none;">
                                <input type="hidden" name="customer_photo" id="webcamCaptureTamu">
                                <div id="photoPreviewTamu"></div>
                                <video id="webcamFeedTamu" style="display:none; transform: scaleX(-1);"></video>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-2">
                                <input type="text" name="customer_address" class="form-control "
                                    id="customer_address" placeholder="Domisili" aria-describedby="customer_address">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-2">
                                <input type="text" class="form-control " name="customer_phone"
                                    id="customer_phone" placeholder="Nomor Handphone" aria-describedby="customer_phone">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-2">
                                <input type="text" name="customer_email" class="form-control "
                                    id="customer_email" placeholder="Email" aria-describedby="customer_email">
                            </div>
                        </div>
                        </br>
                        <div class="col">
                            <div class="mb-2">
                                <button class="btn w-100 btn-secondary " type="submit">Tambah
                                    Tamu</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col p-3 bg-dark border-end">
                <div class="container p-2 mb-2">
                    <h5 style="font-size: 25px">Room Order</h5>
                    <hr class="garis">
                    <form method="POST" action="{{ route('admin.reservation.store-room-order') }}"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        </br>
                        <div class="col">
                            <div class="mb-2">
                                <label for="email">Check In</label>
                                <input type="datetime-local" class="form-control " name="reservation_start_date_daily"
                                    id="reservation_start_date" aria-describedby="emailHelp">
                            </div>
                        </div>
                        </br>
                        <div class="col">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="daily" name="daily">
                                <p>Checkout dengan pilih tanggal & jam</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-2">
                                <label for="email">Check Out</label>
                                <input type="datetime-local" class="form-control " name="reservation_end_date_daily"
                                    id="reservation_end_date_daily" aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-2">
                                <label for="result_daily_reservation_end_date" style="display: none;">Durasi menginap
                                    berdasarkan tanggal & jam</label>
                                <input type="text" class="form-control " id="result_daily_reservation_end_date"
                                    style="display: none;" disabled>
                            </div>
                        </div>
                        </br>
                        <div class="col">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="mixed" name="mixed">
                                <p>Checkout dengan pilih durasi</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-2">
                                    <label for="email">Hari</label>
                                    <select class="form-select w-100 mb-0 " id="mixed_time_day" name="mixed_day"
                                        aria-label="State select example">
                                        @for ($i = 0; $i <= 30; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-2">
                                    <label for="email">Jam</label>
                                    <select class="form-select w-100 mb-0 " id="mixed_time_hour" name="mixed_hour"
                                        aria-label="State select example">
                                        @for ($i = 0; $i <= 24; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col" style="display: none;" id="result_mix_reservation">
                            <div class="mb-0">
                                <label for="result_mix_reservation_end_date">Perhitungan waktu checkout dengan pilih durasi</label>
                                <input type="datetime-local" id="result_mix_reservation_end_date" class="form-control" disabled>
                            </div>
                        </div>
                        </br>
                        <div class="col">
                            <select class="form-select w-100 mt-0 " id="reservation_day_category"
                                name="reservation_day_category" aria-label="reservation_day_category">
                                <option value="Weekday">Weekday</option>
                                <option value="Weekend">Weekend</option>
                                <option value="Weekend">Middle Day</option>
                                <option value="High Season">High Season</option>
                            </select>
                        </div>
                        </br>
                        <div class="col">
                            <label for="exampleInputIconLeft">Data Kamar</label>
                        </div>
                        <div class="col">
                            <div class="mb-2">
                                <select class="form-select w-100 mb-0 " id="hotel_room_id" name="hotel_room_id"
                                    aria-label="State select example">
                                    <option selected value="">Tipe Kamar</option>
                                    @foreach ($hotelRooms as $roomType)
                                        <option value="{{ $roomType->id }}">{{ $roomType->room_type }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-2">
                                <select class="form-select w-100 mb-0 " id="hotel_room_number_id"
                                    name="hotel_room_number_id" aria-label="State select example" disabled>
                                    <option value="">Pilih Nomer Kamar</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-2">
                                <select class="form-select w-100 mb-0 " id="total_guest" name="total_guest"
                                    aria-label="State select example">
                                    <option selected value="">Jumlah Orang</option>
                                    @for ($i = 1; $i <= 4; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        </br>
                        <div class="col">
                            <div class="mb-2">
                                <button class="btn w-100 btn-secondary" type="submit">Tambah Kamar</button>
                            </div>
                        </div>
                    </form>
                    <form method="POST" action="{{ route('admin.reservation.store-amenities') }}"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        </br>
                        <h5 style="font-size: 25px"><u>Tambahan Additional</u></h5>
                        <div class="col">
                            <div class="mb-2">
                                <label for="email">Breakfast</label>
                                    <select class="form-select w-100 mb-0" id="breakfast" name="breakfast" aria-label="State select example">
                                    <option selected value="None">None</option>
                                    <option value="Include">Include</option>
                                    <option value="Exclude">Exclude</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-sm-3">
                                <div class="input-group mb-4">
                                    <select class="form-select w-100 mb-0" id="total_breakfast" name="total_breakfast" aria-label="State select example" disabled>
                                        @for ($i = 1; $i <= 4; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-9 col-sm-9">
                                <div class="input-group mb-4">
                                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                                        <input type="text" name="breakfast_price" class="form-control" id="breakfast_price" aria-describedby="emailHelp" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-2">
                            <label for="email">Extra Person & Extra Bed</label>
                                <select class="form-select w-100 mb-0" id="extra_person_bed" name="extra_person_bed" aria-label="State select example">
                                <option value="Extraperson">Extraperson</option>
                                <option value="Extrabed">Extrabed</option>
                            </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-sm-3">
                                <div class="input-group mb-4">
                                    <select class="form-select w-100 mb-0" id="total_extra_person_bed" name="total_extra_person_bed" aria-label="State select example">
                                        @for ($i = 1; $i <= 4; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        <div class="col-lg-9 col-sm-9">
                            <div class="input-group mb-4">
                                <span class="input-group-text" id="basic-addon1">Rp.</span>
                                    <input type="text" name="extra_person_bed_price" class="form-control" id="extra_person_bed_price" aria-describedby="emailHelp">
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-2">
                                <button class="btn w-100 btn-secondary" type="submit">Tambah Additional</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col p-3 bg-dark">
                <div class="container p-2 mb-2">
                    <h5 style="font-size: 25px">Payment</h5>
                    <hr class="garis">
                    <form method="POST" action="{{ route('admin.reservation.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        </br>
                        <div class="col">
                            <label for="discount">Diskon</label>
                            <div class="mb-2">
                                <select class="form-select w-100 mb-2 " id="discount_type" name="discount_type"
                                    aria-label="discount_type">
                                    <option selected value="">Jenis Diskon</option>
                                    <option value="Nominal">Nominal</option>
                                    <option value="Persen">Persen (%)</option>
                            </div>
                            <div class="mb-2">
                                <input type="text" name="discount" placeholder="Diskon" class="form-control " id="discount"
                                    aria-describedby="emailHelp">
                            </div>
                            </select>
                        </div>
                        <div class="col">
                            <div class="mb-2">
                                <b>Total Price :</b>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-4">
                                @if ($totalPrice)
                                    <input type="text" name="total_price" class="form-control " id="total_price"
                                        value="{{ number_format($totalPrice, 0, ',', '.') }}"
                                        aria-describedby="total_price" disabled>
                                @else
                                    <input type="text" name="total_price" class="form-control " id="total_price"
                                        aria-describedby="total_price" disabled>
                                @endif
                            </div>
                        </div>

                        <hr color="black">
                        <div class="col">
                            <label>Tipe Pembayaran</label>
                            <select class="form-select w-100 mb-0 " id="payment_category" name="payment_category"
                                aria-label="payment_category">
                                <option selected value="">Tipe Pembayaran</option>
                                <option value="Down Payment">Down Payment</option>
                                <option value="Lunas">Lunas</option>
                            </select>
                        </div>
                        <hr color="black">
                        <div class="col">
                            <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="payment_method_ota" name="payment_method_ota">
                                <p>Pay At OTA</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-2">
                                <select class="form-select w-100 mb-0" id="payment_category_ota" name="payment_category_ota" aria-label="payment_category_ota">
                                    <option selected value="">Jenis OTA</option>
                                    @foreach($paymentOTA as $OTA)
                                    <option value="{{ $OTA->id }}">{{ $OTA->payment_method }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-2">
                                <input type="text" class="form-control " id="payment_ota_value"
                                    name="payment_ota_value" placeholder="Nominal Bayar" aria-describedby="emailHelp">
                            </div>
                        </div>
                        <hr color="black">
                        <div class="col">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="payment_method_cash" name="payment_method_cash">
                                <p>Cash</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-2">
                                <input type="text" name="payment_cash_value" class="form-control "
                                    id="payment_cash_value" placeholder="Nominal Bayar" aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-4">
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
                        <div class="col">
                        <div class="mb-2">
                            <select class="form-select w-100 mb-0" id="paymentMethod" name="paymentMethod" aria-label="paymentMethod">
                                <option selected value="">Metode Pembayaran</option>
                                <option value="Card">Card</option>
                                <option value="Qris">QRIS</option>
                                <option value="Transfer">Transfer</option>
                            </select>
                        </div>
                        </div>

                        <!-- Form select untuk transfer -->
                        <div class="col paymentOption" id="transferOptions" style="display: none;">
                            <select class="form-select w-100 mb-2" name="payment_category_transfer" aria-label="transferBank" style="margin-bottom: 10px;">
                                <option selected value="">Pilih Bank Transfer</option>
                                    @foreach($paymentTransfer as $transfer)
                                        <option value="{{ $transfer->id }}">{{ $transfer->payment_method }}</option>
                                    @endforeach
                            </select>
                            <input type="text" id="payment_transfer_value" name="payment_transfer_value" class="form-control mb-2" placeholder="Nominal Pembayaran">
                            <input type="text" name="payment_method_transfer_reference" class="form-control mb-2" placeholder="Nomor Referensi Transaksi Transfer">
                        </div>

                        <!-- Form select untuk card -->
                        <div class="col paymentOption" id="cardOptions" style="display: none;">
                            <select class="form-select w-100 mb-2" name="payment_category_card" aria-label="cardType">
                                <option selected value="">Pilih Jenis Kartu</option>
                                @foreach($paymentCard as $card)
                                    <option value="{{ $card->id }}">{{ $card->payment_method }}</option>
                                @endforeach
                            </select>
                            <input type="text" id="payment_card_value" name="payment_card_value" class="form-control mb-2" placeholder="Nominal Pembayaran">
                            <input type="text" name="payment_method_card_number" class="form-control mb-2" placeholder="Nomor Kartu">
                        </div>

                        <!-- Form select untuk qris -->
                        <div class="col paymentOption" id="qrisOptions" style="display: none;">
                            <select class="form-select w-100 mb-2" name="payment_category_qris" aria-label="qrisType">
                                <option selected value="">Pilih Jenis QRIS</option>
                                    @foreach($paymentQris as $qris)
                                        <option value="{{ $qris->id }}">{{ $qris->payment_method }}</option>
                                    @endforeach
                            </select>
                            <input type="text" id="payment_qris_value" name="payment_qris_value" class="form-control mb-2" placeholder="Nominal Pembayaran">
                            <input type="text" name="payment_method_qris_reference" class="form-control mb-2" placeholder="Nomor Referensi Transaksi QRIS">
                        </div>

                        <!-- End of Form -->

                </div>
            </div>
        </div>
    </div>

    <div class="reservasi">
        <div class="row">
            @if ($customerTmp)
                <div class="col-12">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 col-sm-6">
                                <h5 style="font-size: 25px"><u>Order Summary</u></h5>
                                </br>
                                <!-- Form -->
                                <div class="row">
                                    @if ($customerTmp)
                                        <div class="col-lg-12 col-sm-12">
                                            <label for="email">Data Pelanggan</label>
                                            <div class="table-responsive">
                                                <table class="table table-centered table-hover mb-0 rounded">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th class="border-0">Nama Pelanggan</th>
                                                            <th class="border-0">Email</th>
                                                            <th class="border-0">Nomor Handphone</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>{{ $customerTmp->customer_name }}</td>
                                                            <td>{{ $customerTmp->customer_email }}</td>
                                                            <td>{{ $customerTmp->customer_phone }}</td>
                                                        </tr>
                                                        <!-- End of Item -->
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($hotelRoomReservedTmp)
                                        <div class="col-lg-12 col-sm-12">
                                            </br>
                                            <label for="email">Data Reservasi Kamar</label>
                                            <div class="table-responsive">
                                                <table class="table table-centered table-hover mb-0 rounded">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th class="border-0 rounded-start">Tipe Kamar</th>
                                                            <th class="border-0">Nomor Kamar</th>
                                                            <th class="border-0">Total Tamu</th>
                                                            <th class="border-0">Total Harga Kamar</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($hotelRoomReservedTmp as $reservationData)
                                                            <tr>
                                                                <td>{{ $reservationData->hotelRoomNumber->hotelRoom->room_type }}
                                                                </td>
                                                                <td>{{ $reservationData->hotelRoomNumber->room_number }}
                                                                </td>
                                                                <td>{{ $reservationData->total_guest }}</td>
                                                                <td>{{ number_format($reservationData->price, 2, ',', '.') }}
                                                                </td>
                                                            </tr>
                                                            <!-- End of Item -->
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="col-lg-12 col-sm-12">
                                    </div>
                                    @if ($amenitiesTmp)
                                        <div class="col-lg-12 col-sm-12">
                                            </br>
                                            <label for="email">Data Amenities</label>
                                            <div class="table-responsive">
                                                <table class="table table-centered table-hover mb-0 rounded">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th class="border-0 rounded-start">Amenities</th>
                                                            <th class="border-0">Kuantitas</th>
                                                            <th class="border-0">Total Harga Amenities</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($amenitiesTmp as $amenities)
                                                            <tr>
                                                                <td>{{ $amenities->amenities->amenities }}</td>
                                                                <td>{{ $amenities->amount }}</td>
                                                                <td>Rp.
                                                                    {{ number_format($amenities->total_price, 2, ',', '.') }}
                                                                </td>
                                                            </tr>
                                                            <!-- End of Item -->
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="col-lg-12 col-sm-12">
                                        </br></br>
                                        <button class="btn w-100 btn-default btn-secondary" type="submit">Simpan</button>
                                    </div>
                                    </form>
                                </div>
                                <!-- End of Form -->
                            </div>
                        </div>
                    </div>
            @endif

            <!-- End of Form -->
        </div>
    </div>
    </div>
@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        const customerCheck = $('#customer_check');
        customerCheck.on('change', function() {
                // Tampilkan atau sembunyikan elemen-elemen tergantung pada nilai checkbox
                if (this.checked) {
                    $('#customer_id').removeAttr('disabled');
                } else {
                    $('#customer_id').prop('disabled', true);
                }
        });
    });
</script>
<script>
        $(document).ready(function() {
            $('#customer_id').select2({
                ajax: {
                    placeholder: 'Daftar Tamu',
                    url: "{{ route('ajax.list-customers') }}",
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            term: params.term
                        };
                    },
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: item.customer_name + ' - ' + item.customer_phone,
                                    id: item.id
                                };
                            })
                        };
                    },
                    cache: true
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
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#breakfast').change(function() {
            console.log($(this).val())

            // Tampilkan form select tambahan sesuai dengan metode pembayaran yang dipilih
            if ($(this).val() === 'Exclude') {
                console.log('exclue')
                $('#total_breakfast').prop('disabled', false);
                $('#breakfast_price').prop('disabled', false);
            } else {
                $('#total_breakfast').prop('disabled', true);
                $('#breakfast_price').prop('disabled', true);
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
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        const reservationMethod = $('#reservation_method_id');
        reservationMethod.on('change', function() {
                // Tampilkan atau sembunyikan elemen-elemen tergantung pada nilai checkbox
                if (reservationMethod.val() == 1 || reservationMethod.val() == 2 || reservationMethod.val() == "" ) {
                    $('#booking_number, label[for="booking_number"]').hide();
                } else {
                    $('#booking_number, label[for="booking_number"]').show();
                }
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('#hotel_room_id').change(function () {
            const hotelRoom = $(this).val();
            const hotelRoomNumberSelect = $('#hotel_room_number_id');

            hotelRoomNumberSelect.empty().prop('disabled', true);
            if (hotelRoom) {
                $.ajax({
                    url: `/ajax/getRoomNumbers/${hotelRoom}`,
                    method: 'GET',
                    success: function (data) {
                        data.forEach(function (hotelRoomNumber) {
                            hotelRoomNumberSelect.append($('<option>', {
                                value: hotelRoomNumber.id,
                                text: hotelRoomNumber.room_number
                            }));
                        });
                        hotelRoomNumberSelect.prop('disabled', false);
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    });
</script>
<script>
        $(document).ready(function() {
            $('#daily').on('change', function() {
                // Tampilkan atau sembunyikan elemen-elemen tergantung pada nilai checkbox
                if (this.checked) {
                    $('#result_daily_reservation_end_date, label[for="result_daily_reservation_end_date"]').show();
                    $('#mixed').prop('disabled', true);
                    $('#mixed_time_day').prop('disabled', true);
                    $('#mixed_time_hour').prop('disabled', true);
                } else {
                    $('#result_daily_reservation_end_date, label[for="result_daily_reservation_end_date"]').hide();
                    $('#mixed').prop('disabled', false);
                    $('#mixed_time_day').prop('disabled', false);
                    $('#mixed_time_hour').prop('disabled', false);
                }
            });

            // Menangani perubahan pada input datetime check-in dan check-out
            $('#reservation_end_date_daily').on('change', function() {
                // Mendapatkan nilai dari input datetime check-in dan check-out
                var checkinValue = new Date($('#reservation_start_date').val());
                var checkoutValue = new Date($('#reservation_end_date_daily').val());
                
                // Mengatur zona waktu ke GMT+7 (Indonesia Barat)
                checkinValue.setHours(checkinValue.getHours() + 7);
                checkoutValue.setHours(checkoutValue.getHours() + 7);

                // Menghitung selisih waktu dalam milidetik
                var timeDifference = checkoutValue - checkinValue;

                // Menghitung selisih waktu dalam hari dan jam
                var days = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
                var hours = Math.floor((timeDifference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));

                // Mengatur nilai hasil dalam format "Hari:Jam"
                var formattedResult = days + " Hari : " + hours + " Jam";

                 // Mengatur nilai hasil dalam format tanggal dan jam
                $('#result_daily_reservation_end_date').val(formattedResult);
            });
        });
</script>
<script>
        $(document).ready(function() {
            $('#mixed').on('change', function() {
                // Tampilkan atau sembunyikan elemen-elemen tergantung pada nilai checkbox
                if (this.checked) {
                    $('#result_mix_reservation').show();
                    $('#daily').prop('disabled', true);
                    $('#reservation_end_date_daily').prop('disabled', true);
                } else {
                    $('#result_mix_reservation').hide();
                    $('#daily').prop('disabled', false);
                    $('#reservation_end_date_daily').prop('disabled', false);
                }
            });

            // Menangani perubahan pada input datetime, select hari, dan select jam
            $('#mixed_time_day, #mixed_time_hour').on('change', function() {
                // Mendapatkan nilai dari input datetime, select hari, dan select jam
                var datetimeValue = new Date($('#reservation_start_date').val());
                var addDays = parseInt($('#mixed_time_day').val());
                var addHours = parseInt($('#mixed_time_hour').val());

                // Menambahkan hari dan jam ke datetime awal
                datetimeValue.setDate(datetimeValue.getDate() + addDays);
                datetimeValue.setHours(datetimeValue.getHours() + addHours);

                // Format hasil dalam format tanggal dan jam dengan zona waktu GMT+7 (Indonesia Barat)
                var formattedResult = datetimeValue.getFullYear() + '-' + padZero(datetimeValue.getMonth() + 1) + '-' + padZero(datetimeValue.getDate()) + 'T' + padZero(datetimeValue.getHours()) + ':' + padZero(datetimeValue.getMinutes());

                 // Mengatur nilai hasil dalam format tanggal dan jam
                $('#result_mix_reservation_end_date').val(formattedResult);
            });

            // Fungsi untuk menambahkan nol di depan angka jika diperlukan
            function padZero(num) {
                return (num < 10 ? '0' : '') + num;
            }
        });
</script>
<script>
    $(document).ready(function() {
            $('#payment_method_ota').on('change', function() {
                // Tampilkan atau sembunyikan elemen-elemen tergantung pada nilai checkbox
                if (this.checked) {
                    $('#payment_category').prop('disabled', true);
                    $('#payment_method_cash').prop('disabled', true);
                    $('#payment_cash_value').prop('disabled', true);
                    $('#change').prop('disabled', true);
                    $('#payment_method_non_cash').prop('disabled', true);
                    $('#paymentMethod').prop('disabled', true);
                } else {
                    $('#payment_category').prop('disabled', false);
                    $('#payment_method_cash').prop('disabled', false);
                    $('#payment_cash_value').prop('disabled', false);
                    $('#change').prop('disabled', false);
                    $('#payment_method_non_cash').prop('disabled', false);
                    $('#paymentMethod').prop('disabled', false);
                }
            });
        });
</script>
<script>
    $(document).ready(function() {
            $('#payment_method_cash').on('change', function() {
                // Tampilkan atau sembunyikan elemen-elemen tergantung pada nilai checkbox
                if (this.checked) {
                    $('#payment_method_ota').prop('disabled', true);
                    $('#payment_category_ota').prop('disabled', true);
                    $('#payment_ota_value').prop('disabled', true);
                    $('#payment_method_non_cash').prop('disabled', true);
                    $('#paymentMethod').prop('disabled', true);
                } else {
                    $('#payment_method_ota').prop('disabled', false);
                    $('#payment_category_ota').prop('disabled', false);
                    $('#payment_ota_value').prop('disabled', false);
                    $('#payment_method_non_cash').prop('disabled', false);
                    $('#paymentMethod').prop('disabled', false);
                }
            });
        });
</script>
<script>
    $(document).ready(function() {
            $('#payment_method_non_cash').on('change', function() {
                // Tampilkan atau sembunyikan elemen-elemen tergantung pada nilai checkbox
                if (this.checked) {
                    $('#payment_method_ota').prop('disabled', true);
                    $('#payment_category_ota').prop('disabled', true);
                    $('#payment_ota_value').prop('disabled', true);
                    $('#payment_method_cash').prop('disabled', true);
                    $('#payment_cash_value').prop('disabled', true);
                    $('#change').prop('disabled', true);
                } else {
                    $('#payment_method_ota').prop('disabled', false);
                    $('#payment_category_ota').prop('disabled', false);
                    $('#payment_ota_value').prop('disabled', false);
                    $('#payment_method_cash').prop('disabled', false);
                    $('#payment_cash_value').prop('disabled', false);
                    $('#change').prop('disabled', false);
                }
            });
        });
</script>
<script>
    var input2Value = $('#total_price').val() || 0;

    function formatRupiah(amount) {
        var formatter = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR'
        });
        
        return formatter.format(amount);
    }

    function calculateResult() {
        var discountCategory = $('#discount_type').val()
        var input1Value = parseFloat($('#discount').val().replace(/[^0-9]/g, '')) || 0;
        var totalPrice = parseInt(input2Value.replace(/\./g, ''), 10);

        if(discountCategory == 'Nominal'){
            var result = totalPrice - input1Value;
        }else{
            var result = totalPrice * (1 - (input1Value / 100));
        }
            var formattedResult = formatRupiah(result.toFixed(2)); // Format with 2 decimal places
            $('#total_price').val(formattedResult);
        }
    
    $(document).ready(function () {
        $('#discount').on('input', function () {
            calculateResult();
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

    // Add input event listener to apply formatting as the user types
        $('#discount').on('input', function() {
            var discountType = $('#discount_type').val()
            if(discountType == 'Nominal'){
                console.log('rupiah')
                var inputVal = $(this).val();
                var formattedVal = inputRupiah(inputVal);
                $(this).val(formattedVal);
            }
        });

        $('#payment_ota_value').on('input', function() {
            var inputVal = $(this).val();
            var formattedVal = inputRupiah(inputVal);
            $(this).val(formattedVal);
        });

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
});
</script>
<script>
        $(document).ready(function() {
            const startWebcamButton = document.getElementById('startWebcamTamuButton');
            const captureButton = document.getElementById('captureTamuButton');
            const closeWebcamButton = document.getElementById('closeWebcamTamuButton');
            const photoPreview = document.getElementById('photoPreviewTamu');
            const webcamFeed = document.getElementById('webcamFeedTamu');
            const photoForm = document.getElementById('photoFormTamu');
            const webcamCaptureInput = document.getElementById('webcamCaptureTamu');

            let stream = null;

            startWebcamButton.addEventListener('click', function() {
                navigator.mediaDevices.getUserMedia({ video: true })
                    .then(function(webcamStream) {
                        stream = webcamStream;
                        webcamFeed.style.display = 'block';
                        webcamFeed.srcObject = stream;
                        webcamFeed.play();
                        startWebcamButton.style.display = 'none';
                        captureButton.style.display = 'inline-block';
                        closeWebcamButton.style.display = 'inline-block';
                    })
                    .catch(function(err) {
                        console.error('Error accessing the webcam:', err);
                    });
            });

            closeWebcamButton.addEventListener('click', function() {
                if (stream) {
                    const tracks = stream.getTracks();
                    tracks.forEach(function(track) {
                        track.stop();
                    });
                    webcamFeed.style.display = 'none';
                    startWebcamButton.style.display = 'inline-block';
                    captureButton.style.display = 'none';
                    closeWebcamButton.style.display = 'none';
                    photoForm.reset();
                    photoPreview.innerHTML = '';
                }
            });

            captureButton.addEventListener('click', function() {
                if (stream) {
                    const canvas = document.createElement('canvas');
                    const context = canvas.getContext('2d');
                    canvas.width = webcamFeed.videoWidth;
                    canvas.height = webcamFeed.videoHeight;
                     // Apply horizontal flip before drawing the video frame
                    context.translate(canvas.width, 0);
                    context.scale(-1, 1);
                    
                    context.drawImage(webcamFeed, 0, 0, canvas.width, canvas.height);

                    // Convert the captured image to a Data URL without mirroring
                    const dataURL = canvas.toDataURL('image/jpeg');
                    const base64Data = dataURL.split(',')[1]; // Extract base64 data
                    webcamCaptureInput.value = base64Data;

                    const img = document.createElement('img');
                    img.src = dataURL;
                    img.className = 'img-thumbnail';

                    // Reset the canvas transformation
                    context.setTransform(1, 0, 0, 1, 0, 0);
                    photoPreview.innerHTML = '';
                    photoPreview.appendChild(img);
                }
            });
        });
</script>
@endpush
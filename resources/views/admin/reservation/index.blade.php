@extends('admin.layout.template')
@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content') 
        <div class="py-4">
                
                <div class="d-flex justify-content-between w-100 flex-wrap">
                    <div class="mb-3 mb-lg-0">
                        <h1 class="h4">Form Reservasi</h1>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-4 mb-4">
                    <div class="card border-0 shadow components-section">
                        <div class="card-body">     
                            <div class="row">
                                <div class="col-lg-12 col-sm-6">
                                <h1 class="h5"><u>Guest Detail</u></h1>
                                </br>
                                <form method="POST" action="{{route('admin.reservation.store-customer')}}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                    <!-- Form -->
                                    <div class="row">
                                        </br></br>
                                        <div class="col-lg-12 col-sm-12">
                                            <label for="exampleInputIconLeft">Jenis Tamu</label>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <select class="form-select w-100 mb-0" id="reservation_method_id" name="reservation_method_id" aria-label="State select example">
                                            <option selected value="">Jenis Reservasi</option>
                                                @foreach ($reservationMethod as $methods)
                                                    <option value="{{ $methods->id }}">{{ $methods->reservation_method }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        </br></br>
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="mb-4">
                                                    <input type="text" class="form-control" name="booking_number" id="booking_number" placeholder="Booking Number" aria-describedby="booking_number" style="display: none;">
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-sm-2">
                                            <div class="mb-4">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="customer_check" name="customer_check" id="flexSwitchCheckDefault">
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <div class="mb-2">
                                                <label for="daftar_tamu">Pilih Dari Daftar Tamu</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12" id="customer_select_id">
                                            <select class="form-select w-100 mb-0" id="customer_id" name="customer_id" aria-label="customer_id" disabled>
                                                <option value="">Daftar Tamu</option>
                                            </select>
                                        </div>
                                        </br></br></br>
                                        <div class="col-lg-12 col-sm-12">
                                            <label for="exampleInputIconLeft">Isi Data Tamu</label>
                                        </div>
                                        <div class="col-lg-4 col-sm-4">
                                            <select class="form-select w-100 mb-0" id="customer_title" name="customer_title" aria-label="customer_title">
                                                <option value="Mr">Mr</option>
                                                <option value="Mrs">Mrs</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-8 col-sm-8">
                                            <div class="mb-4">
                                                    <input type="text" class="form-control" placeholder="Nama" id="customer_name" name="customer_name" aria-describedby="customer_name">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-4">
                                            <select class="form-select w-100 mb-0" id="state" name="customer_identity_type" aria-label="State select example">
                                                <option value="KTP">KTP</option>
                                                <option value="SIM">SIM</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-8 col-sm-8">
                                            <div class="mb-4">
                                                <input class="form-control" name="customer_identity_photo" type="file" placeholder="Foto" id="formFile">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="mb-4">
                                                    <input type="text" name="customer_address" class="form-control" id="customer_address" placeholder="Domisili" aria-describedby="customer_address">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="mb-4">
                                                    <input type="text" class="form-control" name="customer_phone" id="customer_phone" placeholder="Nomor Handphone" aria-describedby="customer_phone">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="mb-4">
                                                    <input type="text" name="customer_email" class="form-control" id="customer_email" placeholder="Email" aria-describedby="customer_email">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                        <label for="exampleInputIconLeft">Foto</label>
                                            <div class="mb-4">
                                                <input class="form-control" name="customer_photo" type="file" placeholder="Foto" id="formFile">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="mb-4">
                                                <button class="btn w-100 btn-secondary" type="submit">Tambah Tamu</button>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                    </br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
                                    <!-- End of Form -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-4">
                    <div class="card border-0 shadow components-section">
                        <div class="card-body">     
                            <div class="row">
                                <div class="col-lg-12 col-sm-6">
                                <h1 class="h5"><u>Room Order</u></h1>
                                </br>
                                <form method="POST" action="{{route('admin.reservation.store-room-order')}}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                    <!-- Form -->
                                    <div class="row">
                                    @if($reservationTmp)
                                    <input type="hidden" id="daily" name="daily" value="1"> 
                                    <input type="hidden" id="reservation_start_date_daily" name="reservation_start_date_daily" value="{{ $reservationTmp->reservation_start_date }}"> 
                                    <input type="hidden" id="reservation_end_date_daily" name="reservation_end_date_daily" value="{{ $reservationTmp->reservation_end_date }}"> 
                                    <input type="hidden" id="reservation_day_category" name="reservation_day_category" value="{{ $reservationTmp->reservation_day_category }}"> 
                                        <div class="col-lg-12 col-sm-12">
                                                <div class="mb-4">
                                                    <label for="email">Check In</label>
                                                    <input type="datetime-local" class="form-control" name="reservation_start_date_daily" id="reservation_start_date" aria-describedby="emailHelp" value="{{ $reservationTmp->reservation_start_date }}" disabled>
                                                </div>
                                        </div>
                                        <div class="col-lg-2 col-sm-2">
                                            <div class="mb-4">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="daily" name="daily" id="flexSwitchCheckDefault" value="1" disabled>
                                            </div>
                                            </div>
                                        </div>
            
                                        <div class="col-lg-8 col-sm-12">
                                            <div class="mb-4">
                                                <p>Checkout dengan pilih tanggal & jam</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="mb-4">
                                                <label for="email">Check Out</label>
                                                <input type="datetime-local" class="form-control" name="reservation_end_date_daily" id="reservation_end_date_daily" aria-describedby="emailHelp" value="{{ $reservationTmp->reservation_end_date }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="mb-4">
                                                <label for="result_daily_reservation_end_date">Perhitungan waktu checkout dengan pilih tanggal & jam</label>
                                                <input type="text" class="form-control" id="result_daily_reservation_end_date" value="{{ $diffResult }}" disabled>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-2 col-sm-2">
                                            <div class="mb-4">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="mixed" name="mixed" id="flexSwitchCheckDefault" disabled>
                                            </div>
                                            </div>
                                        </div>
            
                                        <div class="col-lg-8 col-sm-12">
                                            <div class="mb-4">
                                                <p>Checkout dengan pilih durasi</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="mb-4">
                                                <label for="email">Hari</label>
                                                <select class="form-select w-100 mb-0" id="mixed_time_day" name="mixed_day" aria-label="State select example" disabled>
                                                    @for ($i = 0; $i <= 30; $i++)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="mb-4">
                                                <label for="email">Jam</label>
                                                <select class="form-select w-100 mb-0" id="mixed_time_hour" name="mixed_hour" aria-label="State select example" disabled>
                                                    @for ($i = 0; $i <= 24; $i++)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12" style="display: none;" id="result_mix_reservation">
                                            <div class="mb-2">
                                                <label for="result_mix_reservation_end_date">Perhitungan waktu checkout dengan pilih durasi</label>
                                                <input type="datetime-local" id="result_mix_reservation_end_date" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <select class="form-select w-100 mb-0" id="reservation_day_category" name="reservation_day_category" aria-label="reservation_day_category" disabled>
                                                <option value="Weekday" {{ $dayCategory === "Weekday" ? 'selected' : '' }}>Weekday</option>
                                                <option value="Weekend" {{ $dayCategory === "Weekend" ? 'selected' : '' }}>Weekend</option>
                                                <option value="Weekend" {{ $dayCategory === "Middle Day" ? 'selected' : '' }}>Middle Day</option>
                                                <option value="High Season" {{ $dayCategory === "High Season" ? 'selected' : '' }}>High Season</option>
                                            </select>
                                        </div>
                                    @else
                                        <div class="col-lg-12 col-sm-12">
                                                <div class="mb-4">
                                                    <label for="email">Check In</label>
                                                    <input type="datetime-local" class="form-control" name="reservation_start_date_daily" id="reservation_start_date" aria-describedby="emailHelp">
                                                </div>
                                        </div>
                                        <div class="col-lg-2 col-sm-2">
                                            <div class="mb-4">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="daily" name="daily" id="flexSwitchCheckDefault">
                                            </div>
                                            </div>
                                        </div>
            
                                        <div class="col-lg-8 col-sm-12">
                                            <div class="mb-4">
                                                <p>Checkout dengan pilih tanggal & jam</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="mb-4">
                                                <label for="email">Check Out</label>
                                                <input type="datetime-local" class="form-control" name="reservation_end_date_daily" id="reservation_end_date_daily" aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="mb-4">
                                                <label for="result_daily_reservation_end_date" style="display: none;">Perhitungan waktu checkout dengan pilih tanggal & jam</label>
                                                <input type="text" class="form-control" id="result_daily_reservation_end_date" style="display: none;" disabled>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-2 col-sm-2">
                                            <div class="mb-4">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="mixed" name="mixed" id="flexSwitchCheckDefault">
                                            </div>
                                            </div>
                                        </div>
            
                                        <div class="col-lg-8 col-sm-12">
                                            <div class="mb-4">
                                                <p>Checkout dengan pilih durasi</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="mb-4">
                                                <label for="email">Hari</label>
                                                <select class="form-select w-100 mb-0" id="mixed_time_day" name="mixed_day" aria-label="State select example">
                                                    @for ($i = 0; $i <= 30; $i++)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="mb-4">
                                                <label for="email">Jam</label>
                                                <select class="form-select w-100 mb-0" id="mixed_time_hour" name="mixed_hour" aria-label="State select example">
                                                    @for ($i = 0; $i <= 24; $i++)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12" style="display: none;" id="result_mix_reservation">
                                            <div class="mb-2">
                                                <label for="result_mix_reservation_end_date">Perhitungan waktu checkout dengan pilih durasi</label>
                                                <input type="datetime-local" id="result_mix_reservation_end_date" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <select class="form-select w-100 mb-0" id="reservation_day_category" name="reservation_day_category" aria-label="reservation_day_category">
                                                <option value="Weekday">Weekday</option>
                                                <option value="Weekend">Weekend</option>
                                                <option value="Middle Day">Middle Day</option>
                                                <option value="High Season">High Season</option>
                                            </select>
                                        </div>
                                    @endif
                                        

                                        <!-- <div class="col-lg-2 col-sm-2">
                                            <div class="mb-4">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" name="hourly" id="flexSwitchCheckDefault">
                                            </div>
                                            </div>
                                        </div> -->
            
                                        <!-- <div class="col-lg-8 col-sm-12">
                                            <div class="mb-4">
                                                <p>Transit</p>
                                            </div>
                                        </div>
                                    
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="mb-4">
                                                <label for="email">Check In</label>
                                                <input type="time" class="form-control" name="reservation_start_date_hourly" aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="mb-4">
                                                <label for="email">Check Out</label>
                                                <input type="time" name="reservation_end_date_hourly" class="form-control" aria-describedby="emailHelp">
                                            </div>
                                        </div> -->
                                        </br></br></br>
                                        <div class="col-lg-12 col-sm-12">
                                            <label for="exampleInputIconLeft">Data Kamar</label>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="mb-4">
                                                <select class="form-select w-100 mb-0" id="hotel_room_id" name="hotel_room_id" aria-label="State select example">
                                                <option selected value="">Tipe Kamar</option>
                                                @foreach ($hotelRooms as $roomType)
                                                    <option value="{{ $roomType->id }}">{{ $roomType->room_type }}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="mb-4">
                                                <select class="form-select w-100 mb-0" id="hotel_room_number_id" name="hotel_room_number_id" aria-label="State select example" disabled>
                                                        <option value="">Pilih Nomer Kamar</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="mb-4">
                                                <select class="form-select w-100 mb-0" id="total_guest" name="total_guest" aria-label="State select example">
                                                        <option selected value="">Jumlah Orang</option>
                                                        @for ($i = 1; $i <= 4; $i++)
                                                            <option value="{{ $i }}">{{ $i }}</option>
                                                        @endfor
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="mb-4">
                                                <button class="btn w-100 btn-secondary" type="submit">Tambah Kamar</button>
                                            </div>
                                        </div>
                                        </form>
                                        </br></br>
                                        <form method="POST" action="{{route('admin.reservation.store-amenities')}}" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <h1 class="h5"><u>Tambahan Amenities</u></h1>
                                        </br>
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="mb-4">
                                                <label for="email">Breakfast</label>
                                                <select class="form-select w-100 mb-0" id="amount_breakfast" name="amount_breakfast" aria-label="State select example">
                                                <option selected value="">Breakfast</option>
                                                    @for ($i = 0; $i <= 10; $i++)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="mb-4">
                                            <label for="email">Extra Bed</label>
                                                <select class="form-select w-100 mb-0" id="state" name="amount_extra_bed" aria-label="State select example">
                                                    <option selected value="">Extra Bed</option>
                                                    @for ($i = 0; $i <= 10; $i++)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="mb-4">
                                                <button class="btn w-100 btn-secondary" type="submit">Tambah Amenities</button>
                                            </div>
                                        </div>
                                        </br></br></br></br></br>
                                        </form>
                                    </div>
                                    <!-- End of Form -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-4">
                    <div class="card border-0 shadow components-section">
                        <div class="card-body">     
                            <div class="row">
                                <div class="col-lg-12 col-sm-6">
                                <h1 class="h5"><u>Payment</u></h1>
                                </br>
                                    <!-- Form -->
                                    <form method="POST" action="{{route('admin.reservation.store')}}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="row">
                                    <div class="col-lg-12 col-sm-12">
                                            <label for="discount">Diskon</label>
                                                <div class="mb-2">  
                                                    <select class="form-select w-100 mb-2" id="discount_type" name="discount_type" aria-label="discount_type">
                                                    <option selected value="">Jenis Diskon</option>
                                                    <option value="Nominal">Nominal</option>
                                                    <option value="Persen">Persen (%)</option>
                                                </div>
                                                <div class="mb-4">
                                                    <input type="text" name="discount" class="form-control" id="discount" aria-describedby="emailHelp">
                                                </div>
                                            </select>
                                            </div>
                                            <div class="col-lg-12 col-sm-12">
                                                <div class="mb-4">
                                                    <p><b>Total Price :</p></b>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-sm-12">
                                                <div class="mb-4">
                                                    @if($totalPrice)
                                                    <input type="text" name="total_price" class="form-control" id="total_price" value="{{ number_format($totalPrice, 0, ',', '.') }}" aria-describedby="total_price" disabled>
                                                    @else
                                                    <input type="text" name="total_price" class="form-control" id="total_price"  aria-describedby="total_price" disabled>
                                                    @endif
                                                </div>
                                            </div>
                                    
                                        <div class="col-lg-2 col-sm-2">
                                            <div class="mb-4">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="payment_method_ota">
                                            </div>
                                            </div>
                                        </div>
            
                                        <div class="col-lg-10 col-sm-12">
                                            <div class="mb-4">
                                                <p>Pay at OTA</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <select class="form-select w-100 mb-0" id="payment_category_ota" name="payment_category_ota" aria-label="payment_category_ota">
                                                <option selected value="">Jenis OTA</option>
                                                @foreach($paymentOTA as $OTA)
                                                    <option value="{{ $OTA->id }}">{{ $OTA->payment_method }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        </br></br>
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="mb-4">
                                                <input type="text" class="form-control" id="payment_ota_value" name="payment_ota_value" placeholder="Nominal Bayar" aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                        </br>
                                        <label>Pay At Hotel </label>
                                        </br></br>
                                        <div class="col-lg-12 col-sm-12">
                                        <label>Tipe Pembayaran</label>
                                            <select class="form-select w-100 mb-0" id="payment_category" name="payment_category" aria-label="payment_category">
                                                <option selected value="">Tipe Pembayaran</option>
                                                    <option value="Down Payment">Down Payment</option>
                                                    <option value="Lunas">Lunas</option>
                                            </select>
                                        </div>
                                        </br></br></br></br>
                                        <div class="col-lg-2 col-sm-2">
                                            <div class="mb-4">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="payment_method_cash">
                                            </div>
                                            </div>
                                        </div>
            
                                        <div class="col-lg-10 col-sm-12">
                                            <div class="mb-4">
                                                <p>Cash</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="mb-2">
                                                <input type="text" name="payment_cash_value" class="form-control" id="payment_cash_value" placeholder="Nominal Bayar" aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="mb-4">
                                                <input type="text" name="change" class="form-control" id="email" placeholder="Nominal Kembali" aria-describedby="emailHelp">
                                            </div>
                                        </div>

                                        <div class="col-lg-2 col-sm-2">
                                            <div class="mb-4">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="payment_method_non_cash" name="payment_method_non_cash">
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <div class="mb-4">
                                                <p>Non Cash</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <select class="form-select w-100 mb-0" id="paymentMethod" name="paymentMethod" aria-label="paymentMethod">
                                                <option selected value="">Metode Pembayaran</option>
                                                <option value="Card">Card</option>
                                                <option value="Qris">QRIS</option>
                                                <option value="Transfer">Transfer</option>
                                            </select>
                                        </div>
                                        <br><br>

                                        <!-- Form select untuk transfer -->
                                        <div class="col-lg-12 col-sm-12 paymentOption" id="transferOptions" style="display: none;">
                                            <select class="form-select w-100 mb-2" name="payment_category_transfer" aria-label="transferBank" style="margin-bottom: 10px;">
                                                <option selected value="">Pilih Bank Transfer</option>
                                            @foreach($paymentTransfer as $transfer)
                                                <option value="{{ $transfer->id }}">{{ $transfer->payment_method }}</option>
                                            @endforeach
                                            </select>
                                            <input type="text" name="payment_transfer_value" class="form-control mb-2" placeholder="Nominal Pembayaran">
                                            <input type="text" name="payment_method_transfer_reference" class="form-control mb-2" placeholder="Nomor Referensi Transaksi Transfer">
                                        </div>

                                        <!-- Form select untuk card -->
                                        <div class="col-lg-12 col-sm-12 paymentOption" id="cardOptions" style="display: none;">
                                            <select class="form-select w-100 mb-2" name="payment_category_card" aria-label="cardType">
                                                <option selected value="">Pilih Jenis Kartu</option>
                                            @foreach($paymentCard as $card)
                                                <option value="{{ $card->id }}">{{ $card->payment_method }}</option>
                                            @endforeach
                                            </select>
                                            <input type="text" name="payment_card_value" class="form-control mb-2" placeholder="Nominal Pembayaran">
                                            <input type="text" name="payment_method_card_number" class="form-control mb-2" placeholder="Nomor Kartu">
                                        </div>

                                        <!-- Form select untuk qris -->
                                        <div class="col-lg-12 col-sm-12 paymentOption" id="qrisOptions" style="display: none;">
                                            <select class="form-select w-100 mb-2" name="payment_category_qris" aria-label="qrisType">
                                                <option selected value="">Pilih Jenis QRIS</option>
                                            @foreach($paymentQris as $qris)
                                                <option value="{{ $qris->id }}">{{ $qris->payment_method }}</option>
                                            @endforeach
                                            </select>
                                            <input type="text" name="payment_qris_value" class="form-control mb-2" placeholder="Nominal Pembayaran">
                                            <input type="text" name="payment_method_qris_reference" class="form-control mb-2" placeholder="Nomor Referensi Transaksi QRIS">
                                        </div>
                                    
                                        </br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
                                    </div>
                                    <!-- End of Form -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if($customerTmp)
                    <div class="col-12">
                        <div class="card border-0 shadow components-section">
                            <div class="card-body">     
                                <div class="row">
                                <div class="col-lg-12 col-sm-6">
                                    <h1 class="h5"><u>Order Summary</u></h1>
                                    </br>
                                        <!-- Form -->
                                        <div class="row">
                                        @if($customerTmp)
                                        <div class="col-lg-12 col-sm-12">
                                            <label for="email">Data Pelanggan</label>
                                            <div class="table-responsive">
                                            <table class="table table-centered table-nowrap mb-4 rounded">
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
                                        @if($hotelRoomReservedTmp)
                                        <div class="col-lg-12 col-sm-12">
                                        </br></br>
                                            <label for="email">Data Reservasi Kamar</label>
                                            <div class="table-responsive">
                                            <table class="table table-centered table-nowrap mb-0 rounded">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th class="border-0 rounded-start">Tipe Kamar</th>
                                                    <th class="border-0">Nomor Kamar</th>
                                                    <th class="border-0">Total Tamu</th>
                                                    <th class="border-0">Total Harga Kamar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($hotelRoomReservedTmp as $reservationData)
                                                <tr>
                                                    <td>{{ $reservationData->hotelRoomNumber->hotelRoom->room_type }}</td>
                                                    <td>{{ $reservationData->hotelRoomNumber->room_number }}</td>
                                                    <td>{{ $reservationData->total_guest }}</td>
                                                    <td>{{ number_format($reservationData->price, 2, ",", ".") }}</td>
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
                                        @if($amenitiesTmp)
                                        <div class="col-lg-12 col-sm-12">
                                        </br></br>
                                            <label for="email">Data Amenities</label>
                                                <div class="table-responsive">
                                                <table class="table table-centered table-nowrap mb-0 rounded">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th class="border-0 rounded-start">Amenities</th>
                                                        <th class="border-0">Kuantitas</th>
                                                        <th class="border-0">Total Harga Amenities</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($amenitiesTmp as $amenities)
                                                    <tr>
                                                        <td>{{ $amenities->amenities->amenities }}</td>
                                                        <td>{{ $amenities->amount }}</td>
                                                        <td>Rp. {{ number_format($amenities->total_price, 2, ",", ".")}}</td>
                                                    </tr>
                                                    <!-- End of Item -->
                                                @endforeach
                                                </tbody>
                                                </table>
                                                </div>
                                            </div>
                                            @endif
                                            
                                            <div class="col-lg-12 col-sm-12">
                                            </br>
                                                <button class="btn w-100 btn-default btn-secondary" type="submit">Simpan</button>
                                            </div>
                                            </form>
                                        </div>
                                        <!-- End of Form -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- End of Form -->
                </div>
            </div>
        </div>
            </div>
            </div>
            </div>

            <div class="theme-settings card bg-gray-800 pt-2 collapse" id="theme-settings">
    <div class="card-body bg-gray-800 text-white pt-4">
        <button type="button" class="btn-close theme-settings-close" aria-label="Close" data-bs-toggle="collapse"
            href="#theme-settings" role="button" aria-expanded="false" aria-controls="theme-settings"></button>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <p class="m-0 mb-1 me-4 fs-7">Open source <span role="img" aria-label="gratitude">💛</span></p>
            <a class="github-button" href="https://github.com/themesberg/volt-bootstrap-5-dashboard"
                data-color-scheme="no-preference: dark; light: light; dark: light;" data-icon="octicon-star"
                data-size="large" data-show-count="true"
                aria-label="Star themesberg/volt-bootstrap-5-dashboard on GitHub">Star</a>
        </div>
        <a href="https://themesberg.com/product/admin-dashboard/volt-bootstrap-5-dashboard" target="_blank"
            class="btn btn-secondary d-inline-flex align-items-center justify-content-center mb-3 w-100">
            Download 
            <svg class="icon icon-xs ms-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M2 9.5A3.5 3.5 0 005.5 13H9v2.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 15.586V13h2.5a4.5 4.5 0 10-.616-8.958 4.002 4.002 0 10-7.753 1.977A3.5 3.5 0 002 9.5zm9 3.5H9V8a1 1 0 012 0v5z" clip-rule="evenodd"></path></svg>
        </a>
        <p class="fs-7 text-gray-300 text-center">Available in the following technologies:</p>
        <div class="d-flex justify-content-center">
            <a class="me-3" href="https://themesberg.com/product/admin-dashboard/volt-bootstrap-5-dashboard"
                target="_blank">
                <img src="../../assets/img/technologies/bootstrap-5-logo.svg" class="image image-xs">
            </a>
            <a href="https://demo.themesberg.com/volt-react-dashboard/#/" target="_blank">
                <img src="../../assets/img/technologies/react-logo.svg" class="image image-xs">
            </a>
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
                } else {
                    $('#result_daily_reservation_end_date, label[for="result_daily_reservation_end_date"]').hide();
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
                } else {
                    $('#result_mix_reservation').hide();
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
    function formatRupiah(amount) {
            var formatter = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR'
            });
            return formatter.format(amount);
    }
    
    $(document).ready(function () {
            var input2Value = $('#total_price').val() || 0;

            $('#discount').on('input', function () {
                calculateResult();
            });

            function calculateResult() {
                var input1Value = parseFloat($('#discount').val()) || 0;
                var totalPrice = parseInt(input2Value.replace(/\./g, ''), 10);
                console.log(totalPrice);
                var result = totalPrice - input1Value;
                var formattedResult = formatRupiah(result.toFixed(2)); // Format with 2 decimal places
                $('#total_price').val(formattedResult);
            }
    });
    </script>
@endpush
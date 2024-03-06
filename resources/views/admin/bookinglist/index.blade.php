@extends('layout.template')
@section('content')
<!-- Header Start -->
<div class="py-4">
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-0 mb-lg-0">
            <h3 class="h4">Booking List</h3>
        </div>
    </div>
</div>
<!-- Header End -->

<!-- Widget Start -->
<div class="row mb-0">
    <div class="col-12 col-sm-6 col-xl-4 mb-4">
        <div class="card border-0 shadow">
            <div class="card-body">
                <div class="row d-block d-xl-flex align-items-center">
                    <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                        <div class="icon-shape icon-shape-primary rounded me-4 me-sm-0">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--! Font Awesome Pro 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                <path d="M224 0a128 128 0 1 1 0 256A128 128 0 1 1 224 0zM178.3 304h91.4c20.6 0 40.4 3.5 58.8 9.9C323 331 320 349.1 320 368c0 59.5 29.5 112.1 74.8 144H29.7C13.3 512 0 498.7 0 482.3C0 383.8 79.8 304 178.3 304zM352 368a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-80c-8.8 0-16 7.2-16 16v64c0 8.8 7.2 16 16 16h48c8.8 0 16-7.2 16-16s-7.2-16-16-16H512V304c0-8.8-7.2-16-16-16z" />
                            </svg>
                        </div>
                        <div class="d-sm-none">
                            <h2 class="h5">Reservasi</h2>
                            <h3 class="fw-extrabold mb-1">{{ $countReservationToday }}</h3>
                        </div>
                    </div>
                    <div class="col-12 col-xl-7 px-xl-0">
                        <div class="d-none d-sm-block">
                            <h2 class="h6 text-gray-400 mb-0">Reservasi</h2>
                            <h3 class="fw-extrabold mb-2 fw-bold text-info">{{ $countReservationToday }} Reservasi</h3>
                        </div>
                        <small class="d-flex align-items-center text-gray-500">
                            Dalam {{ $dateNow }}
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-4 mb-4">
        <div class="card border-0 shadow">
            <div class="card-body">
                <div class="row d-block d-xl-flex align-items-center">
                    <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                        <div class="icon-shape icon-shape-secondary rounded me-4 me-sm-0">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--! Font Awesome Pro 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                <path d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM625 177L497 305c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L591 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                            </svg>
                        </div>
                        <div class="d-sm-none">
                            <h2 class="fw-extrabold h5">Check-In</h2>
                            <h3 class="mb-1">{{ $countCheckInToday }}</h3>
                        </div>
                    </div>
                    <div class="col-12 col-xl-7 px-xl-0">
                        <div class="d-none d-sm-block">
                            <h2 class="h6 text-gray-400 mb-0">Check-in</h2>
                            <h3 class="fw-extrabold mb-2 fw-bold text-success">{{ $countCheckInToday }} Reservasi</h3>
                        </div>
                        <small class="d-flex align-items-center text-gray-500">
                            Dalam {{ $dateNow }}
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-4 mb-4">
        <div class="card border-0 shadow">
            <div class="card-body">
                <div class="row d-block d-xl-flex align-items-center">
                    <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                        <div class="icon-shape icon-shape-tertiary rounded me-4 me-sm-0">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                <path d="M432 96a48 48 0 1 0 0-96 48 48 0 1 0 0 96zM347.7 200.5c1-.4 1.9-.8 2.9-1.2l-16.9 63.5c-5.6 21.1-.1 43.6 14.7 59.7l70.7 77.1 22 88.1c4.3 17.1 21.7 27.6 38.8 23.3s27.6-21.7 23.3-38.8l-23-92.1c-1.9-7.8-5.8-14.9-11.2-20.8l-49.5-54 19.3-65.5 9.6 23c4.4 10.6 12.5 19.3 22.8 24.5l26.7 13.3c15.8 7.9 35 1.5 42.9-14.3s1.5-35-14.3-42.9L505 232.7l-15.3-36.8C472.5 154.8 432.3 128 387.7 128c-22.8 0-45.3 4.8-66.1 14l-8 3.5c-32.9 14.6-58.1 42.4-69.4 76.5l-2.6 7.8c-5.6 16.8 3.5 34.9 20.2 40.5s34.9-3.5 40.5-20.2l2.6-7.8c5.7-17.1 18.3-30.9 34.7-38.2l8-3.5zm-30 135.1l-25 62.4-59.4 59.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L340.3 441c4.6-4.6 8.2-10.1 10.6-16.1l14.5-36.2-40.7-44.4c-2.5-2.7-4.8-5.6-7-8.6zM256 274.1c-7.7-4.4-17.4-1.8-21.9 5.9l-32 55.4L147.7 304c-15.3-8.8-34.9-3.6-43.7 11.7L40 426.6c-8.8 15.3-3.6 34.9 11.7 43.7l55.4 32c15.3 8.8 34.9 3.6 43.7-11.7l64-110.9c1.5-2.6 2.6-5.2 3.3-8L261.9 296c4.4-7.7 1.8-17.4-5.9-21.9z" />
                            </svg>
                        </div>
                        <div class="d-sm-none">
                            <h2 class="fw-extrabold h5">Check-Out</h2>
                            <h3 class="mb-1">{{ $countCheckOutToday }}</h3>
                        </div>
                    </div>
                    <div class="col-12 col-xl-7 px-xl-0">
                        <div class="d-none d-sm-block">
                            <h2 class="h6 text-gray-400 mb-0">Check-Out</h2>
                            <h3 class="fw-extrabold mb-2 text-danger">{{ $countCheckOutToday }} Reservasi</h3>
                        </div>
                        <small class="d-flex align-items-center text-gray-500">
                            Dalam {{ $dateNow }}
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Widget End -->

<!-- Tabel Room Income Start -->
<div class="card mb-4 card-body border-0 shadow table-wrapper table-responsive">
        <div class="d-flex px-0 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-between">
            <h3>Data Reservasi</h3>
        </div>
        </br>
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="fas fa-bullhorn me-1">{{ session('success') }}</span>
            <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="table-responsive">
            <table style="text-align: center" class="table table-hover table-bordered">
                <thead style="vertical-align: middle">
                    <tr>
                        <th rowspan="2" class="border-gray-200">ID Bill</th>
                        <th rowspan="2" class="border-gray-200">Nama</th>
                        <th colspan="2" class="border-gray-200">Tanggal</th>
                        <th rowspan="2" class="border-gray-200">Type Tamu</th>
                        <th rowspan="2" class="border-gray-200">Status Pembayaran</th>
                        <th rowspan="2" class="border-gray-200">Status</th>
                        <th rowspan="2" class="border-gray-200">Invoice</th>
                    </tr>
                    <tr>
                        <th>Check-In</th>
                        <th>Check-Out</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Item -->
                    @foreach($reservationData as $reservation)
                    <tr>
                        <td><span class="fw-bold"><a href="{{ route('admin.bookinglist.show', $reservation->reservation_code) }}" target="_blank" class="text-sm text-info">{{ $reservation->reservation_code }}</a></span></td>
                        <td><span class="fw-normal">{{ $reservation->customer->customer_name }}</span></td>
                        <td><span class="fw-normal">{{ $reservation->reservation_start_date }}</span></td>
                        <td><span class="fw-normal">{{ $reservation->reservation_end_date }}</span></td>
                        <td><span class="fw-normal">{{ $reservation->reservationMethod->reservation_method }}</span></td>
                        <td><span class="fw-bold">{{ $reservation->payment->payment_status }}</span></td>
                        <td><span class="fw-bold text-info">{{ $reservation->status }}</span></td>
                        <td><span class="fw-bold text-info"><a href="{{ route('pdf.invoices', $reservation->reservation_code) }}" target="_blank" class="btn btn-sm px-3 btn-danger ms-3">PDF</a></span></td>
                    </tr>
                    <!-- Item -->
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="card-footer px-3 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-between">
            <nav aria-label="Page navigation example">
                <ul class="pagination mb-0">
                    {{ $reservationData->links('vendor.pagination.default') }}
                </ul>
            </nav>
            <!-- <div class="align-item-right"><b>Pendapatan Total Hari Ini : </b><b class="text-success">Rp 100.000.000</b></div> -->
        </div>
    </div>
    <!-- Tabel Room Income End -->
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript">
        function zoom() {
            document.body.style.zoom = "75%" 
        }
</script>
@endpush
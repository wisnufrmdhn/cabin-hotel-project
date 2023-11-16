@extends('admin.layout.template')
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
                            <h3 class="fw-extrabold mb-1">10 Orang</h3>
                        </div>
                    </div>
                    <div class="col-12 col-xl-7 px-xl-0">
                        <div class="d-none d-sm-block">
                            <h2 class="h6 text-gray-400 mb-0">Reservasi</h2>
                            <h3 class="fw-extrabold mb-2 fw-bold text-info">10 Orang</h3>
                        </div>
                        <small class="d-flex align-items-center text-gray-500">
                            Feb 1 - Apr 1,
                            <svg class="icon icon-xxs text-gray-500 ms-2 me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM4.332 8.027a6.012 6.012 0 011.912-2.706C6.512 5.73 6.974 6 7.5 6A1.5 1.5 0 019 7.5V8a2 2 0 004 0 2 2 0 011.523-1.943A5.977 5.977 0 0116 10c0 .34-.028.675-.083 1H15a2 2 0 00-2 2v2.197A5.973 5.973 0 0110 16v-2a2 2 0 00-2-2 2 2 0 01-2-2 2 2 0 00-1.668-1.973z" clip-rule="evenodd"></path>
                            </svg>
                            USA
                        </small>
                        <div class="small d-flex mt-1">
                            <div>Since last month <svg class="icon icon-xs text-success" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd"></path>
                                </svg><span class="text-success fw-bolder">22%</span></div>
                        </div>
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
                            <h3 class="mb-1">15 Orang</h3>
                        </div>
                    </div>
                    <div class="col-12 col-xl-7 px-xl-0">
                        <div class="d-none d-sm-block">
                            <h2 class="h6 text-gray-400 mb-0">Check-in</h2>
                            <h3 class="fw-extrabold mb-2 fw-bold text-success">15 Orang</h3>
                        </div>
                        <small class="d-flex align-items-center text-gray-500">
                            Feb 1 - Apr 1,
                            <svg class="icon icon-xxs text-gray-500 ms-2 me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM4.332 8.027a6.012 6.012 0 011.912-2.706C6.512 5.73 6.974 6 7.5 6A1.5 1.5 0 019 7.5V8a2 2 0 004 0 2 2 0 011.523-1.943A5.977 5.977 0 0116 10c0 .34-.028.675-.083 1H15a2 2 0 00-2 2v2.197A5.973 5.973 0 0110 16v-2a2 2 0 00-2-2 2 2 0 01-2-2 2 2 0 00-1.668-1.973z" clip-rule="evenodd"></path>
                            </svg>
                            GER
                        </small>
                        <div class="small d-flex mt-1">
                            <div>Since last month <svg class="icon icon-xs text-danger" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg><span class="text-danger fw-bolder">2%</span></div>
                        </div>
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
                            <h3 class="mb-1">5 Orang</h3>
                        </div>
                    </div>
                    <div class="col-12 col-xl-7 px-xl-0">
                        <div class="d-none d-sm-block">
                            <h2 class="h6 text-gray-400 mb-0">Check-Out</h2>
                            <h3 class="fw-extrabold mb-2 text-danger">5 Orang</h3>
                        </div>
                        <small class="text-gray-500">
                            Feb 1 - Apr 1
                        </small>
                        <div class="small d-flex mt-1">
                            <div>Since last month <svg class="icon icon-xs text-success" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd"></path>
                                </svg><span class="text-success fw-bolder">4%</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Widget End -->

<!-- Tabel User List Start -->
<div class="card mb-4 card-body border-0 shadow table-wrapper table-responsive">
    <div class="d-flex px-0 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-between">
        <h3>Daftar Tamu</h3>
        <!-- <div class="d-flex mb-3">
            <select class="form-select me-3 pe-5 fmxw-200" aria-label="Message select example">
                <option selected>Filter Date</option>
                <option value="1">Send Email</option>
                <option value="2">Change Group</option>
                <option value="3">Delete User</option>
            </select>
            <select class="form-select me-3 pe-5 fmxw-200" aria-label="Message select example">
                <option selected>Filter Payment</option>
                <option value="1">Send Email</option>
                <option value="2">Change Group</option>
                <option value="3">Delete User</option>
            </select>
            <select class="form-select pe-5 fmxw-200" aria-label="Message select example">
                <option selected>Filter Name</option>
                <option value="1">Send Email</option>
                <option value="2">Change Group</option>
                <option value="3">Delete User</option>
            </select>
            <button class="btn btn-sm px-3 btn-secondary ms-3">Apply</button>
        </div> -->
    </div>
    <div class="table-responsive">
        <table style="text-align: center" class="table table-hover table-bordered">
            <thead style="vertical-align: middle">
                <tr>
                    <th rowspan="2" class="border-gray-200">ID Bill</th>
                    <th rowspan="2" class="border-gray-200">Nama</th>
                    <th colspan="2" class="border-gray-200">Tanggal</th>
                    <th rowspan="2" class="border-gray-200">Type Tamu</th>
                    <th rowspan="2" class="border-gray-200">Type Kamar</th>
                    <th rowspan="2" class="border-gray-200">No <br>Kamar</th>
                    <th rowspan="2" class="border-gray-200">Type Pembayaran</th>
                    <th rowspan="2" class="border-gray-200">Status</th>
                </tr>
                <tr>
                    <th>Check-In</th>
                    <th>Check-Out</th>
                </tr>
            </thead>
            <tbody style="vertical-align: middle">
                <!-- Item -->
                <tr>
                    <td><span class="fw-normal">Nota_00001223</span></td>
                    <td><span class="fw-normal">Anang</span></td>
                    <td><span class="fw-normal">27-Oct-23 7:05 AM</span></td>
                    <td><span class="fw-normal">31-Oct-23 7:05 AM</span></td>
                    <td><span class="fw-normal">Reservation Guest</span></td>
                    <td><span class="fw-bold">Deluxe</span></td>
                    <td><span class="fw-bold">110</span></td>
                    <td><span class="fw-bold">Lunas</span></td>
                    <td><span data-bs-toggle="modal" data-bs-target="#modal-detail" class="fw-bold text-info">Check-In</span></td>
                </tr>
                <tr>
                    <td><span class="fw-normal">Nota_00001223</span></td>
                    <td><span class="fw-normal">Anang</span></td>
                    <td><span class="fw-normal">27-Oct-23 7:05 AM</span></td>
                    <td><span class="fw-normal">31-Oct-23 7:05 AM</span></td>
                    <td><span class="fw-normal">Reservation Guest</span></td>
                    <td><span class="fw-bold">Deluxe</span></td>
                    <td><span class="fw-bold">110</span></td>
                    <td><span class="fw-bold">Lunas</span></td>
                    <td><span data-bs-toggle="modal" data-bs-target="#modal-detail" class="fw-bold text-info">Check-In</span></td>
                </tr>
                <tr>
                    <td><span class="fw-normal">Nota_00001223</span></td>
                    <td><span class="fw-normal">Anang</span></td>
                    <td><span class="fw-normal">27-Oct-23 7:05 AM</span></td>
                    <td><span class="fw-normal">31-Oct-23 7:05 AM</span></td>
                    <td><span class="fw-normal">Reservation Guest</span></td>
                    <td><span class="fw-bold">Deluxe</span></td>
                    <td><span class="fw-bold">110</span></td>
                    <td><span class="fw-bold">Lunas</span></td>
                    <td><span data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tooltip on left class" class="fw-bold text-success">Reservasi</span></td>
                                        </tr>
                                        <!-- Item -->
                                    </tbody>
                                </table>
                            </div>

                            <div class=" card-footer px-3 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-between">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination mb-0">
                                    <li class="page-item">
                                        <a class="page-link" href="#">Previous</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">1</a>
                                    </li>
                                    <li class="page-item active">
                                        <a class="page-link" href="#">2</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">3</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">4</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">5</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>
    </div>
</div>
<!-- Tabel Room Income End -->

<!-- Modal Content -->
<div class="modal fade" id="modal-detail">
    <div class="modal-dialog modal-xl" style="max-width: 70%;">
        <div class="modal-content">
            {{-- <div class="modal-header">
                <h4 class="modal-title">Rincian Tamu</h4>
            </div> --}}
            <div class="card-body">
                <div class="card mb-2 card-primary card-outline">
                    <div class="modal-content">
                        <div class="modal-header bg-warning">
                            <h5 class="h5 modal-title">Data Diri Tamu</h5>
                        </div>
                        <div class="modal-body" style="vertical-align: middle">
                            <div class="row">
                                <div class="col">
                                    <div class="card card-body border-0 shadow mb-2 mt-4">
                                        <h2 class="h5 mb-4">Profile Photo</h2>
                                        <div class="d-flex align-items-center">
                                            <!-- Avatar -->
                                            <img class="rounded img-thumbnail" src="https://images.unsplash.com/photo-1575936123452-b67c3203c357?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8aW1hZ2V8ZW58MHx8MHx8fDA%3D&w=1000&q=80" alt="change avatar">
                                        </div>
                                    </div>
                                </div>
                                <div class="col">   
                                    <div class="card card-body border-0 shadow mb-2 mt-4">
                                        <h2 class="h5 mb-4">KTP Photo</h2>
                                        <div class="d-flex align-items-center">
                                            <!-- Avatar -->
                                            <img class="rounded img-thumbnail" src="https://images.unsplash.com/photo-1575936123452-b67c3203c357?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8aW1hZ2V8ZW58MHx8MHx8fDA%3D&w=1000&q=80" alt="change avatar">
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-4">
                                        <label for="email">Nama</label>
                                        <input class="form-control" id="email" type="email" placeholder="Wisnu Febri Ramadhan" disabled>
                                    </div>
                                    <div class="mb-4">
                                        <label for="gender">Gender</label>
                                        <select disabled class="form-select mb-0" id="gender" aria-label="Gender select example">
                                            <option selected>Gender</option>
                                            <option value="Female">Female</option>
                                            <option value="Male">Male</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <label for="email">Email</label>
                                        <input class="form-control" id="email" type="email" placeholder="name@company.com" disabled>
                                    </div>
                                    <div class="mb-0">
                                        <label for="email">No Handphone</label>
                                        <input class="form-control" id="email" type="email" placeholder="081231214" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="email">Alamat</label>
                                <input class="form-control" id="email" type="email" placeholder="Jl. Gandekan Lor No.2, Sosromenduran, Gedong Tengen, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55271" disabled>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card mb-2 mt-4 card-primary card-outline">
                    <div class="modal-content">
                        <div class="modal-header bg-warning">
                            <h5 class="h5 modal-title">Rincian Kamar</h5>
                            {{-- <button class="btn btn-sm px-3 btn-success ms-3" style="vertical-align: middle">Edit</button> --}}
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3 mt-4">
                                        <label for="email">Tipe Kamar</label>
                                        <input class="form-control" id="email" type="email" placeholder="Deluxe" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="gender">Check In</label>
                                        <select disabled class="form-select mb-0" id="gender" aria-label="Gender select example">
                                            <option selected>30-10-2023 05.00</option>
                                            <option value="Female">Female</option>
                                            <option value="Male">Male</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email">Breakfast</label>
                                        <input class="form-control" id="email" type="email" placeholder="Include" disabled>
                                    </div>
                                    <div class="mb-3 mt-4">
                                        <label for="status">Status</label>
                                        <input class="form-control" id="email" type="email" placeholder="Reservation" disabled>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3 mt-4">
                                        <label for="email">No Kamar</label>
                                        <input class="form-control" id="email" type="email" placeholder="100" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="gender">Check Out</label>
                                        <select disabled class="form-select mb-0" id="gender" aria-label="Gender select example">
                                            <option selected>04-11-2023 05.00</option>
                                            <option value="Female">Female</option>
                                            <option value="Male">Male</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email">Extra Person & Extra Bed</label>
                                        <input class="form-control" id="email" type="email" placeholder="2 Orang" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Keterangan</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" disabled></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between" style="vertical-align: middle">
                            <button type="button" class="btn btn-outline-info" data-dismiss="modal">Update</button>
                            <button type="button" class="btn btn-outline-success">Save changes</button>
                        </div>
                    </div>
                </div>

                <div class="card mb-2 mt-4 card-primary">
                    <div class="modal-content">
                        <div class="modal-header bg-warning">
                            <h5 class="h5 modal-title">Rincian Pembayaran</h5>
                            {{-- <button class="btn btn-sm px-3 btn-success ms-3" style="vertical-align: middle">Update</button> --}}
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3 mt-4">
                                        <label for="email">Diskon</label>
                                        <input class="form-control" id="email" type="email" placeholder="Rp. 100.000" disabled>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="email">Total Harga</label>
                                        <input class="form-control" id="email" type="email" placeholder="Rp. 200.000" disabled>
                                    </div>
                                    <div class="mb-3 mt-4">
                                        <label for="status">Biaya Tambahan</label>
                                        <input class="form-control" id="email" type="email" placeholder="Rp. 0" disabled>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3 mt-4">
                                        <label for="email">Tipe Pembayaran</label>
                                        <input class="form-control" id="email" type="email" placeholder="Lunas" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email">Jenis Pembayaran</label>
                                        <input class="form-control" id="email" type="email" placeholder="Cash" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Keterangan</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" disabled></textarea>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3 mt-4">
                                        <label for="email">Tipe Pembayaran</label>
                                        <input class="form-control" id="email" type="email" placeholder="Lunas" disabled>
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="email">Metode Pembayaran</label>
                                        <select class="form-select w-100 mb-0" id="paymentMethod" name="paymentMethod" aria-label="paymentMethod">
                                            <option selected value="">Metode Pembayaran</option>
                                            <option value="Cash">Cash</option>
                                            <option value="Card">Card</option>
                                            <option value="Qris">QRIS</option>
                                            <option value="Transfer">Transfer</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 mt-2">
                                                                                    <!-- Form select untuk cash -->
                                    <div class="=col paymentOption" id="cashOptions" style="display: none">
                                        <div class="col">
                                            <div class="mb-2">
                                                <input type="text" name="payment_cash_value" class="form-control "
                                                    id="payment_cash_value" placeholder="Nominal Bayar" aria-describedby="emailHelp" >
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-4">
                                                <input type="text" name="change" id="change" class="form-control " id="email"
                                                    placeholder="Nominal Kembali" aria-describedby="emailHelp" >
                                            </div>
                                        </div>
                                    </div>
                                            <!-- Form select untuk transfer -->
                                    <div class="col paymentOption" id="transferOptions" style="display: none;">
                                        <select class="form-select w-100 mb-2"  id="payment_category_transfer" name="payment_category_transfer" aria-label="transferBank" style="margin-bottom: 10px;">
                                            <option selected value="">Pilih Bank Transfer</option>
                                                @foreach($paymentTransfer as $transfer)
                                                    <option value="{{ $transfer->id }}">{{ $transfer->payment_method }}</option>
                                                @endforeach
                                        </select>
                                        <input type="text" id="payment_transfer_value" name="payment_transfer_value" class="form-control mb-2" placeholder="Nominal Pembayaran">
                                        <input type="text" id="payment_method_transfer_reference" name="payment_method_transfer_reference" class="form-control mb-2" placeholder="Nomor Referensi Transaksi Transfer">
                                    </div>
            
                                    <!-- Form select untuk card -->
                                    <div class="col paymentOption" id="cardOptions" style="display: none;">
                                        <select class="form-select w-100 mb-2" id="payment_category_card" name="payment_category_card" aria-label="cardType">
                                            <option selected value>Pilih Jenis Kartu</option>
                                            @foreach($paymentCard as $card)
                                                <option value="{{ $card->id }}">{{ $card->payment_method }}</option>
                                            @endforeach
                                        </select>
                                        <input type="text" id="payment_card_value" name="payment_card_value" class="form-control mb-2" placeholder="Nominal Pembayaran">
                                        <input type="text" id="payment_method_card_number" name="payment_method_card_number" class="form-control mb-2" placeholder="Nomor Kartu">
                                    </div>
            
                                    <!-- Form select untuk qris -->
                                    <div class="col paymentOption" id="qrisOptions" style="display: none;">
                                        <select class="form-select w-100 mb-2" id="payment_category_qris" name="payment_category_qris" aria-label="qrisType">
                                            <option selected value>Pilih Jenis QRIS</option>
                                                @foreach($paymentQris as $qris)
                                                    <option value="{{ $qris->id }}">{{ $qris->payment_method }}</option>
                                                @endforeach
                                        </select>
                                        <input type="text" id="payment_qris_value" name="payment_qris_value" class="form-control mb-2" placeholder="Nominal Pembayaran">
                                        <input type="text" id="payment_method_qris_reference" name="payment_method_qris_reference" class="form-control mb-2" placeholder="Nomor Referensi Transaksi QRIS">
                                    </div>
                                    {{-- @endif --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between" style="vertical-align: middle">
                            <button type="button" class="btn btn-outline-info" data-dismiss="modal">Update</button>
                            <button type="button" class="btn btn-outline-success">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> --}}
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- End of Modal Content -->
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript">
        function zoom() {
            document.body.style.zoom = "75%" 
        }
</script>
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
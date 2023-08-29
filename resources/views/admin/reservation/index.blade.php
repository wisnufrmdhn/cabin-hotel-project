@extends('admin.layout.template')
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
                            <div class="row mb-4">
                                <div class="col-lg-12 col-sm-6">
                                <h1 class="h5"><u>Room Order</u></h1>
                                </br>
                                    <!-- Form -->
                                    <div class="row mb-4">
                                        <div class="col-lg-2 col-sm-2">
                                            <div class="mb-4">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                            </div>
                                            </div>
                                        </div>
            
                                        <div class="col-lg-8 col-sm-12">
                                            <div class="mb-4">
                                                <p>Harian</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="mb-4">
                                                <label for="email">Check In</label>
                                                <input type="date" class="form-control" id="email" aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="mb-4">
                                                <label for="email">Check Out</label>
                                                <input type="date" class="form-control" id="email" aria-describedby="emailHelp">
                                            </div>
                                        </div>

                                        <div class="col-lg-2 col-sm-2">
                                            <div class="mb-4">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                            </div>
                                            </div>
                                        </div>
            
                                        <div class="col-lg-8 col-sm-12">
                                            <div class="mb-4">
                                                <p>Transit</p>
                                            </div>
                                        </div>
                                    
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="mb-4">
                                                <label for="email">Check In</label>
                                                <input type="time" class="form-control" id="email" aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="mb-4">
                                                <label for="email">Check Out</label>
                                                <input type="time" class="form-control" id="email" aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-2 col-sm-2">
                                            <div class="mb-4">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                            </div>
                                            </div>
                                        </div>
            
                                        <div class="col-lg-8 col-sm-12">
                                            <div class="mb-4">
                                                <p>Durasi Campuran</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="mb-4">
                                                <label for="email">Hari</label>
                                                <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="mb-4">
                                                <label for="email">Jam</label>
                                                <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <select class="form-select w-100 mb-0" id="state" name="state" aria-label="State select example">
                                                <option value="AL">Weekday</option>
                                                <option value="AL">Weekend</option>
                                            </select>
                                        </div>
                                        </br></br>
                                        <div class="col-lg-12 col-sm-12">
                                            <label for="exampleInputIconLeft">Jenis Tamu</label>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <select class="form-select w-100 mb-0" id="state" name="state" aria-label="State select example">
                                                <option value="AL">Walkin</option>
                                            </select>
                                        </div>
                                        </br></br>
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="mb-4">
                                                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                        <h1 class="h5"><u>Guest Detail</u></h1>
                                        </br></br>
                                        <div class="col-lg-4 col-sm-4">
                                            <select class="form-select w-100 mb-0" id="state" name="state" aria-label="State select example">
                                                <option value="AL">Mr</option>
                                                <option value="AL">Mrs</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-8 col-sm-8">
                                            <div class="mb-4">
                                                    <input type="email" class="form-control" placeholder="Nama" id="email" aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-4">
                                            <select class="form-select w-100 mb-0" id="state" name="state" aria-label="State select example">
                                                <option value="AL">KTP</option>
                                                <option value="AL">SIM</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-8 col-sm-8">
                                            <div class="mb-4">
                                                    <input type="email" class="form-control" id="email" placeholder="No Identitas" aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="mb-4">
                                                    <input type="email" class="form-control" id="email" placeholder="Domisili" aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="mb-4">
                                                    <input type="email" class="form-control" id="email" placeholder="Telepon" aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="mb-4">
                                                    <input type="email" class="form-control" id="email" placeholder="Email" aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="mb-4">
                                                    <input type="email" class="form-control" id="email" placeholder="Lama Menginap" aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                        <label for="exampleInputIconLeft">Foto</label>
                                            <div class="mb-4">
                                                <input class="form-control" type="file" placeholder="Foto" id="formFile">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="mb-4">
                                                <button class="btn w-100 btn-secondary" type="button">Tambah Tamu</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Form -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-4 mb-4">
                    <div class="card border-0 shadow components-section">
                        <div class="card-body">     
                            <div class="row mb-4">
                                <div class="col-lg-12 col-sm-6">
                                <h1 class="h5"><u>Room Order</u></h1>
                                </br>
                                    <!-- Form -->
                                    <div class="row mb-4">
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="mb-4">
                                                <select class="form-select w-100 mb-0" id="state" name="state" aria-label="State select example">
                                                    <option selected>Jenis Kamar</option>
                                                    <option value="AL">Standard</option>
                                                    <option value="AL">Deluxe</option>
                                                    <option value="AL">Superior</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="mb-4">
                                                <select class="form-select w-100 mb-0" id="state" name="state" aria-label="State select example">
                                                        <option selected>Nomor Kamar</option>
                                                        <option value="AL">102</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="mb-4">
                                                <select class="form-select w-100 mb-0" id="state" name="state" aria-label="State select example">
                                                        <option selected>Jumlah Orang</option>
                                                        <option value="AL">1</option>
                                                        <option value="AL">2</option>
                                                        <option value="AL">3</option>
                                                        <option value="AL">4</option>
                                                        <option value="AL">5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="mb-4">
                                                <button class="btn w-100 btn-secondary" type="button">Tambah Kamar</button>
                                            </div>
                                        </div>
                                        
                                        <h1 class="h5"><u>Tambahan Amenities</u></h1>
                                        </br></br>
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="mb-4">
                                                <select class="form-select w-100 mb-0" id="state" name="state" aria-label="State select example">
                                                            <option selected>Include Breakfast</option>
                                                            <option value="AL">1</option>
                                                            <option value="AL">2</option>
                                                            <option value="AL">3</option>
                                                            <option value="AL">4</option>
                                                            <option value="AL">5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="mb-4">
                                                <select class="form-select w-100 mb-0" id="state" name="state" aria-label="State select example">
                                                            <option selected>Extra Bed</option>
                                                            <option value="AL">1</option>
                                                            <option value="AL">2</option>
                                                            <option value="AL">3</option>
                                                            <option value="AL">4</option>
                                                            <option value="AL">5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="mb-4">
                                                <select class="form-select w-100 mb-0" id="state" name="state" aria-label="State select example">
                                                            <option selected>Extra Person</option>
                                                            <option value="AL">1</option>
                                                            <option value="AL">2</option>
                                                            <option value="AL">3</option>
                                                            <option value="AL">4</option>
                                                            <option value="AL">5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="mb-4">
                                                <button class="btn w-100 btn-secondary" type="button">Tambah Amenities</button>
                                            </div>
                                        </div>
                                        </br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
                                    </div>
                                    <!-- End of Form -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-4 mb-4">
                    <div class="card border-0 shadow components-section">
                        <div class="card-body">     
                            <div class="row mb-4">
                                <div class="col-lg-12 col-sm-6">
                                <h1 class="h5"><u>Payment</u></h1>
                                </br>
                                    <!-- Form -->
                                    <div class="row mb-4">
                                        <div class="col-lg-2 col-sm-2">
                                            <div class="mb-4">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                            </div>
                                            </div>
                                        </div>
            
                                        <div class="col-lg-8 col-sm-12">
                                            <div class="mb-4">
                                                <p>Cash</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="mb-4">
                                                <input type="email" class="form-control" id="email" placeholder="Bayar" aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="mb-4">
                                                <input type="email" class="form-control" id="email" placeholder="Kembali" aria-describedby="emailHelp">
                                            </div>
                                        </div>

                                        <div class="col-lg-2 col-sm-2">
                                            <div class="mb-4">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <div class="mb-4">
                                                <p>Card</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="mb-4">
                                                <input type="email" class="form-control" id="email" placeholder="Bayar" aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="mb-4">
                                                <input type="email" class="form-control" id="email" placeholder="Bank" aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="mb-4">
                                                <input type="email" class="form-control" id="email" placeholder="No Kartu" aria-describedby="emailHelp">
                                            </div>
                                        </div>

                                        <div class="col-lg-2 col-sm-2">
                                            <div class="mb-4">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <div class="mb-4">
                                                <p>Qris</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="mb-4">
                                                <input type="email" class="form-control" id="email" placeholder="Bayar" aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="mb-4">
                                                <input type="email" class="form-control" id="email" placeholder="No Ref" aria-describedby="emailHelp">
                                            </div>
                                        </div>

                                        <div class="col-lg-2 col-sm-2">
                                            <div class="mb-4">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-sm-12">
                                            <div class="mb-4">
                                                <p>Transfer</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="mb-4">
                                                <input type="email" class="form-control" placeholder="Bayar" id="email" aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="mb-4">
                                                <input type="email" class="form-control" placeholder="Bank" id="email" aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="mb-4">
                                                <input type="email" class="form-control" placeholder="No Ref" id="email" aria-describedby="emailHelp">
                                            </div>
                                        </div>

                                        </br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
                                        </br></br></br></br></br></br></br></br></br>
                                    </div>
                                    <!-- End of Form -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col- mb-4">
                        <div class="card border-0 shadow components-section">
                            <div class="card-body">     
                                <div class="row mb-4">
                                <div class="col-lg-12 col-sm-6">
                                    <h1 class="h5"><u>Order Summary</u></h1>
                                    </br>
                                        <!-- Form -->
                                        <div class="row mb-4">
                                            <div class="col-lg-12 col-sm-12">
                                            <label for="email">Diskon</label>
                                                <div class="mb-4">
                                                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-sm-12">
                                            <label for="email">DP & Tambahan</label>
                                                <div class="mb-4">
                                                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-sm-12">
                                                <div class="mb-4">
                                                    <p><b>Total Price :</p></b>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-sm-12">
                                                <div class="mb-4">
                                                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End of Form -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- End of Form -->
                </div>
            </div>
        </div>
    </div>
                
                <div class="col-lg-12 col-sm-12">
                    <div class="mb-4">
                        <button class="btn w-100 btn-secondary" type="button">Selanjutnya</button>
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
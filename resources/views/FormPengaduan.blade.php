<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>LAPOR PUSBIN</title>
        <!-- Favicon-->
        <link rel="icon" type="image/png" sizes="96x96" href="{{asset('assets/img/bpkp.png')}}" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
        <script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>

        <style type="text/css">
            .bounce {
              -moz-animation: bounce 2s infinite;
              -webkit-animation: bounce 2s infinite;
              animation: bounce 2s infinite;
            }

            @keyframes bounce {
              0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
              }
              40% {
                transform: translateY(-30px);
              }
              60% {
                transform: translateY(-15px);
              }
            }
        </style>
        <style>
            /* untuk menghilangkan spinner  */
            .spinner {
                display: none;
            }
        </style>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-dark text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <!-- <a class="navbar-brand" href="#page-top" style="font-size: 18px;">WBS PUSBIN JFA</a> -->
                <a class="navbar-brand" href="#page-top" style="font-size: 18px;">PUSBIN JFA - BPKP</a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#about">Tentang</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#formulir">Formulir Pengaduan</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#tracking"><i>Tracking</i></a></li>
                    </ul>
                </div>
            </div>
        </nav>

        @if(Session('NoTiket'))
        <script>
            swal(`No Tiket Anda : {{session('NoTiket')}}`, "Terima Kasih. Pengaduan Anda telah terkirim. Mohon untuk mencatat NO TIKET diatas untuk tracking tindak lanjut pengaduan Anda.", "success");
        </script>
        @endif

        @if(Session('Gagal1'))
        <script>
            swal(`No Tiket tidak ditemukan!`, "Silakan periksa kembali No Tiket Anda", "error");
        </script>
        @endif

        <!-- Masthead-->
        <header class="masthead bg-light text-white text-center">
            <div class="container d-flex align-items-center flex-column">
                <!-- Masthead Avatar Image-->
                <img class="masthead-avatar mb-5" src="assets/img/bpkp.png" alt="..." />
                <!-- Masthead Heading-->
                <h1 class="masthead-heading text-uppercase mb-0" style="color: black;">LAPOR PUSBIN</h1>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light" style="color:black;">
                    <div class="divider-custom-line" style="background-color: black;"></div>
                    <div class="divider-custom-icon" style="color: black;"><i class="fas fa-bullhorn"></i></div>
                    <div class="divider-custom-line" style="background-color: black;"></div>
                </div>
                <!-- Masthead Subheading-->
                <p class="masthead-subheading font-weight-light mb-0" style="color: black;"><b>MEDIA LAYANAN PENGADUAN <i>ONLINE</i></b></p>
                <p class="masthead-subheading font-weight-light mb-0" style="color: black;font-size: 24px;">PUSAT PEMBINAAN JABATAN FUNGSIONAL AUDITOR</p>
            </div>
        </header>
        <!-- About Section-->
        <section class="page-section portfolio" style="background-color: #2c3e50" id="about">
            <div class="container">
                <!-- Portfolio Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary text-white mb-0">Tentang Lapor Pusbin</h2>
                <h4 class="page-section-heading text-center text-uppercase text-secondary text-white mb-0" style="font-size:20px; margin-top: 8px;">Media Layanan Pengaduan <i>Online</i></h4>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line" style="background-color: white;"></div>
                    <div class="divider-custom-icon" style="color: white;"><i class="fas fa-info-circle"></i></div>
                    <div class="divider-custom-line" style="background-color: white;"></div>
                </div>
                <!-- Portfolio Grid Items-->
                <p class="mb-4" style="font-size: 22px;text-align: justify;color: white;">Lapor Pusbin! adalah sarana yang disediakan oleh Pusbin JFA BPKP bagi Anda yang ingin menyampaikan informasi dan melaporkan ketidakpuasan dan pelanggaran dalam Layanan Pusbin JFA maupun pelanggaran yang dilakukan oleh pegawai Pusbin JFA.</p>
                <br>
                <div class="text-center"><a class="btn btn-secondary btn-xl text-uppercase text-secondary text-white" style="border-color: white;" href="#formulir">Isi Formulir Pengaduan
                    <br>
                    <br>
                    <i class="fas fa-angle-double-down fa-2x bounce"></i></a>
                </div>
            </div>
        </section>
        <!-- Form Section-->
        <section class="page-section bg-light text-white mb-0" id="formulir">
            <div class="container">
                <!-- About Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-dark">Formulir Pengaduan</h2>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line" style="background-color: black;"></div>
                    <div class="divider-custom-icon" style="color:black;"><i class="fas fa-user-circle"></i></div>
                    <div class="divider-custom-line" style="background-color: black;"></div>
                </div>
                <!-- About Section Content-->
                <div>
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                        <!-- left column -->
                        <div class="col-md-12">
                          <!-- general form elements -->
                          <div class="card card-primary">
                            <!-- /.card-header -->
                            <!-- form start -->
                                    <form class="needs-validation form-prevent" action="{{ action('App\Http\Controllers\PengaduanController@CreatePengaduan') }}" method="POST" enctype="multipart/form-data" novalidate>
                                      @csrf
                                      <div class="card-body">
                                        <div class="rows text-center" style="margin-top: 10px; margin-bottom: 5px;font-size: 24px;">
                                            <div class="col-md-12" style="background-color:lightgray;">
                                            <label style="color:black;"><b>DATA PELAPOR</b></label>
                                            </div>
                                        </div>
                                        <div class="rows" style="margin-top: 0px; margin-bottom: 15px;font-size: 12px;">
                                            <div class="col-md-12">
                                            <label style="color:red;"><b>Data Pelapor tidak wajib diisi. Data Pelapor diperlukan untuk tindak lanjut apabila diperlukan bukti tambahan untuk mendukung pengaduan. Data yang diisi akan dijamin kerahasiannya.</b></label>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 10px;">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                  <label style="color:black;">Nama / Alias Pelapor</label>
                                                </div>
                                            </div>
                                            <div class="col-md-1" style="color:black;">:</div>
                                            <div class="col-md-6"><input name="nama" type="text" class="form-control" id="exampleInputnama" placeholder="Tuliskan nama / alias"></div>
                                            <div class="col-md-1"></div>
                                        </div>
                                        <div class="row" style="margin-bottom: 10px;">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                  <label style="color:black;">Nomor Telepon</label>
                                                </div>
                                            </div>
                                            <div class="col-md-1" style="color:black;">:</div>
                                            <div class="col-md-6"><input name="no_hp" type="text" class="form-control" id="exampleInputnohp" placeholder="Tuliskan nomor telepon"></div>
                                            <div class="col-md-1"></div>
                                        </div>
                                        <div class="row" style="margin-bottom: 2px;">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                  <label style="color:black;">Email</label>
                                                </div>
                                            </div>
                                            <div class="col-md-1" style="color:black;">:</div>
                                            <div class="col-md-6"><input name="email" type="email" class="form-control" id="exampleInputEmail" placeholder="Tuliskan email"></div>
                                            <div class="col-md-1"></div>
                                        </div>
                                        <div class="rows text-center" style="margin-top: 20px; margin-bottom: 15px;font-size: 24px;">
                                            <div class="col-md-12" style="background-color:lightgray;">
                                            <label style="color:black;"><b>DATA TERLAPOR</b></label>
                                            </div>
                                        </div>
                                        <div class="create-post-wrapper">
                                            <div class="row" style="margin-bottom: 10px;">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                      <label style="color:black;">Pegawai / Layanan yang Dilaporkan*</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-1" style="color:black;">:</div>
                                                <div class="col-md-6"><input name="terlapor" type="text" class="form-control post-input" id="validationCustom01" placeholder="Tuliskan nama orang / layanan yang dilaporkan" required><div class="invalid-feedback" style="color:red"><b>Mohon diisi.</b></div></div>
                                                <div class="col-md-1">
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 10px;">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                      <label style="color:black;">Satuan Kerja*</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-1" style="color:black;">:</div>
                                                <div class="col-md-6"><input name="satuan_kerja" type="text" class="form-control post-input" id="exampleInputnamaterlapor" placeholder="Tuliskan satuan kerja" required><div class="invalid-feedback" style="color:red"><b>Mohon diisi.</b></div></div>
                                                <div class="col-md-1">
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 10px;">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                      <label style="color:black;">Waktu Kejadian*</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-1" style="color:black;">:</div>
                                                <div class="col-md-6"><input name="waktu_kejadian" id="waktu_kejadian" type="date" class="form-control post-input" required><div class="invalid-feedback" style="color:red"><b>Mohon diisi.</b></div></div>
                                                <div class="col-md-1">
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 10px;">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                      <label style="color:black;">Tempat Kejadian*</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-1" style="color:black;">:</div>
                                                <div class="col-md-6"><input name="tempat_kejadian" type="text" class="form-control post-input" id="exampleInputnamaterlapor" placeholder="Tuliskan tempat kejadian" required><div class="invalid-feedback" style="color:red"><b>Mohon diisi.</b></div></div>
                                                <div class="col-md-1">
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 10px;">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                      <label style="color:black;">Hal yang Ingin Dilaporkan*</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-1" style="color:black;">:</div>
                                                <div class="col-md-6"><textarea  name="judul_pelanggaran" type="text" class="form-control post-input" id="exampleInputnamaterlapor" rows="3" placeholder="Tuliskan pelanggaran yang dilaporkan" required></textarea><div class="invalid-feedback" style="color:red"><b>Mohon diisi.</b></div></div>
                                                <div class="col-md-1">
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 10px;">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                      <label style="color:black;">Detail Pengaduan*</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-1" style="color:black;">:</div>
                                                <div class="col-md-6"></div>
                                                <div class="col-md-1"></div>
                                            </div>
                                            <div class="row" style="margin-bottom: 10px;">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-10">
                                                    <textarea  name="detail_pelanggaran" class="form-control post-input summernote" id="summernote" required=""></textarea>
                                                    <!-- <div class="invalid-feedback" style="color:red"><b>Mohon diisi.</b></div> -->
                                                    <span class="error" style="color: #a80000;font-weight: bold;"></span>
                                                </div>
                                                <div class="col-md-1">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                      <label style="color:black;">Bukti Pendukung (Opsional)</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-1" style="color:black;">:</div>
                                                <div class="col-md-6" style="color:black;"><input type="file" name="files[]" multiple>
                                                </div>
                                                <div class="col-md-1">
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 10px;">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                      <label style="color:black;font-size: 10px;"><b>Bukti yang diupload dapat lebih dari 1 file</b></label>
                                                    </div>
                                                </div>
                                                <div class="col-md-1" style="color:black;"></div>
                                                <div class="col-md-6" style="color:black;"></div>
                                                <div class="col-md-1"></div>
                                            </div>
                                          </div>
                                          <!-- /.card-body -->
                                          <div class="col text-center">
                                              <div class="card-footer" >
                                                <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                                                <button class="btn btn-info button-prevent" type="submit" id="submitButton">
                                                    <!-- spinner-border adalah component bawaan bootstrap untuk menampilakn roda berputar  -->
                                                    <div class="spinner"><i role="status" class="spinner-border spinner-border-sm"></i> Submit </div>
                                                    <div class="hide-text">Submit</div>
                                                </button>
                                              </div>
                                          </div>
                                        </div>
                                    </form>
                          </div>
                          <!-- /.card -->
                        </div>
                        <!--/.col (left) -->
                        <!-- right column -->
                        <!--/.col (right) -->
                      </div>
                      <div class="col-md-1"></div>
                      <!-- /.row -->
                    </div><!-- /.container-fluid -->
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact Section-->
        <section class="page-section" style="background-color: #2c3e50" id="tracking">
            <div class="container">
                <!-- Contact Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary text-white mb-0"><i>TRACKING</i> PENGADUAN</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line" style="background-color:white;"></div>
                    <div class="divider-custom-icon" style="color:white;"><i class="fas fa-search"></i></div>
                    <div class="divider-custom-line" style="background-color:white;"></div>
                </div>
                <!-- Contact Section Form-->
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <form class="form-prevent" action="{{ action('App\Http\Controllers\PengaduanController@tracking') }}" method="GET">
                            <!-- Name input-->
                            <div class="form-floating mb-1">
                                <input class="form-control" id="NoTiket" name="NoTiket" type="text" placeholder="Masukkan No Tiket" style="border-radius: 12px;" value="{{ old('NoTiket') }}" required />
                                <label for="phone">No Tiket Pengaduan</label>
                            </div>
                            <!-- Submit success message-->
                            <!---->
                            <!-- This is what your users will see when the form-->
                            <!-- has successfully submitted-->
                            <!-- <div class="d-none" id="submitSuccessMessage">
                                <div class="text-center mb-3">
                                    <div class="fw-bolder">Form submission successful!</div>
                                    To activate this form, sign up at
                                    <br />
                                    <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                                </div>
                            </div> -->
                            <!-- Submit error message-->
                            <!---->
                            <!-- This is what your users will see when there is-->
                            <!-- an error submitting the form-->
                            <!-- <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div> -->
                            <!-- Submit Button-->
                            <div class="form-floating mb-3" style="text-align: center;">
                                <button class="btn btn-info btn-lg button-prevent" id="submitButton2" type="submit">
                                      <!-- spinner-border adalah component bawaan bootstrap untuk menampilakn roda berputar  -->
                                      <div class="spinner"><i role="status" class="spinner-border spinner-border-sm"></i> Cari </div>
                                      <div class="hide-text">Cari</div>
                                  </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Copyright Section-->
        <div class="copyright py-4 bg-dark text-center text-white">
            <div class="container"><small>Copyright &copy; 2022 PUSBIN JFA BPKP. <i> Developed by </i><b>Sibijak DevTeam</b>.</small></div>
        </div>
        <!-- Portfolio Modals-->
        <!-- Portfolio Modal 1-->
        <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" aria-labelledby="portfolioModal1" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Log Cabin</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- Portfolio Modal - Image-->
                                    <img class="img-fluid rounded mb-5" src="{{asset('assets/img/portfolio/cabin.png')}}" alt="..." />
                                    <!-- Portfolio Modal - Text-->
                                    <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.</p>
                                    <button class="btn btn-primary" href="#!" data-bs-dismiss="modal">
                                        <i class="fas fa-times fa-fw"></i>
                                        Close Window
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{asset('js/scripts.js')}}"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script> -->
        <script>
            let postBtn = document.querySelector('.button-prevent');
            let wrapper = document.querySelector('.create-post-wrapper');
            let inputs = [...wrapper.querySelectorAll('.post-input')];

            function validate() {
              let isIncomplete = inputs.some(input => !input.value);
              postBtn.disabled = isIncomplete;
              postBtn.style.cursor = isIncomplete ? 'not-allowed' : 'pointer';
            }

            wrapper.addEventListener('input', validate);
            validate();
        </script>
        <script>
            $(function() {
                $('#submitButton2').prop('disabled', true);
                $('#NoTiket').on('input', function(e) {
                    if(this.value.length === 12) {
                        $('#submitButton2').prop('disabled', false);
                    } else {
                        $('#submitButton2').prop('disabled', true);
                    }
                });
            });
        </script>

        <script>
            $(document).ready(function() {
                $('#summernote').summernote();
            });

            $('#summernote').summernote({
              height: 120,
              placeholder: 'Tuliskan detail pelanggaran',
              toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
              ]
            });
        </script>
        <script>
              // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function () {
              'use strict'

              // Fetch all the forms we want to apply custom Bootstrap validation styles to
              var forms = document.querySelectorAll('.needs-validation')

              // Loop over them and prevent submission
              Array.prototype.slice.call(forms)
                .forEach(function (form) {
                  form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                      event.preventDefault()
                      event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                  }, false)
                })
            })()
        </script>

        <script>
          $(function () {  
          $('.error').hide();
          $(document).on('click', '#submitButton', chkSubmit);
            function chkSubmit() {
                var msg = $('.summernote').val();
                var textmsg = $.trim($(msg).text());
                  if (textmsg == '') {
                    //alert('nogo');
                    $('.error').show();
                    $('.error').html('Mohon untuk mengisi detail pengaduan');
                    return false;
                  }
                  else{
                    //alert(textmsg);
                    $('.error').hide();
                    $('.error').html('');
                  }
              }
          }); 
        </script>

        <script>
        // jika form-prevent disubmit maka disable button-prevent dan tampilkan spinner
        (function () {
            $('.form-prevent').on('submit', function () {
                $('.button-prevent').attr('disabled', 'true');
                $('.spinner').show();
                $('.hide-text').hide();
            })
        })();
        </script> 
    </body>
</html>

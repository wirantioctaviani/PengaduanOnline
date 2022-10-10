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


            .timeline-steps {
                display: flex;
                justify-content: center;
                flex-wrap: wrap
            }

            .timeline-steps .timeline-step {
                align-items: center;
                display: flex;
                flex-direction: column;
                position: relative;
                margin: 1rem
            }

            @media (min-width:768px) {
                .timeline-steps .timeline-step:not(:last-child):after {
                    content: "";
                    display: block;
                    border-top: .25rem dotted #3b82f6;
                    width: 3.46rem;
                    position: absolute;
                    left: 7.5rem;
                    top: .3125rem
                }
                .timeline-steps .timeline-step:not(:first-child):before {
                    content: "";
                    display: block;
                    border-top: .25rem dotted #3b82f6;
                    width: 3.8125rem;
                    position: absolute;
                    right: 7.5rem;
                    top: .3125rem
                }
            }

            .timeline-steps .timeline-content {
                width: 10rem;
                text-align: center
            }

            .timeline-steps .timeline-content .inner-circle {
                border-radius: 1.5rem;
                height: 1rem;
                width: 1rem;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                background-color: #3b82f6
            }

            .timeline-steps .timeline-content .inner-circle:before {
                content: "";
                background-color: #3b82f6;
                display: inline-block;
                height: 3rem;
                width: 3rem;
                min-width: 3rem;
                border-radius: 6.25rem;
                opacity: .5
            }
        </style>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-dark text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top" style="font-size: 18px;">LAPOR PUSBIN</a>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href=""></a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href=""></a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{action('App\Http\Controllers\PengaduanController@FormPengaduan')}}"><i>HOMEPAGE</i></a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Masthead-->
        <header class="masthead bg-light text-white text-center">
            <div class="container d-flex align-items-center flex-column">
                <label class="masthead-heading text-uppercase text-secondary mb-0" style="font-size:44px;color:black"><b><i>Tracking</i> 
                Pengaduan</b></label>
                <!-- <h2 class="font-weight-bold text-uppercase" style="color:black">Track & Trace</h2> -->
                <br>
                <br>
                <!-- Masthead Heading-->
                <form class="form-prevent">
                    <div class="container">
                          <div class="row">
                            <div class="col-md-9">
        <!--                             <div class="form-floating mb-1">
                                        <input class="form-control" id="NoTiket" name="NoTiket" type="text" placeholder="Masukkan No Tiket" style="border-radius: 12px" value="{{ old('NoTiket') }}" required />
                                        <label for="phone">No Tiket Pengaduan</label>
                                    </div> -->
                                    <input class="form-control" id="NoTiket" name="NoTiket" type="text" placeholder="Masukkan No Tiket" style="border-radius: 12px" value="{{ old('NoTiket') }}" required />
                            </div>
                            <div class="col-md-2">
                                    <div class="form-floating mb-1" style="text-align: center;">
                                        <button class="btn btn-info btn-md button-prevent" id="submitButton" type="submit">
                                              <!-- spinner-border adalah component bawaan bootstrap untuk menampilakn roda berputar  -->
                                              <div class="spinner"><i role="status" class="spinner-border spinner-border-sm"></i> Cari </div>
                                              <div class="hide-text">Cari</div>
                                        </button>
                                    </div>
                            </div>
                          </div>
                    </div>
                </form>
            </div>

            <br>
            <hr style="color:black;">

            <br>

            <div class="container">                      
                <div class="row text-center justify-content-center mb-5">\
                        <!-- <h2 class="font-weight-bold" style="color:black">Track & Trace</h2> -->
                        <div class="row">
                            <div class="col-md-4"> :</div>
                            <div class="col-md-1" style="justify-content-center">
                                <label style="color: black;text-align: right;font-size: 18px">No Tiket</label>
                            </div>
                            <div class="col-md-1" style="color:black">:</div>
                            <div class="col-md-2">
                                <p class="masthead-subheading font-weight-light mb-0" style="color: black;text-align: left;font-size: 18px">{{$NoTiket}}</p>
                            </div>
                            <div class="col-md-4"> :</div>
                        </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                                
                                    <div class="timeline-step">
                                        <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="And here's some amazing content. It's very engaging. Right?" data-original-title="2003">
                                            <div class="inner-circle"></div>
                                            <p class="h6 mt-3 mb-1" style="color:black">{{date("d M Y H:i", strtotime($diterima->created_at))}}</p>
                                            <p class="h6 text-muted mb-0 mb-lg-0">Pengaduan Diterima</p>
                                        </div>
                                    </div>
                                @if(!is_null($diproses))
                                    <div class="timeline-step">
                                        <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="And here's some amazing content. It's very engaging. Right?" data-original-title="2004">
                                            <div class="inner-circle"></div>
                                            <p class="h6 mt-3 mb-1" style="color:black">{{date("d M Y H:i", strtotime($diproses->created_at))}}</p>
                                            <p class="h6 text-muted mb-0 mb-lg-0">Pengaduan Diproses</p>
                                        </div>
                                    </div>
                                @endif
                                @if(!is_null($selesai))
                                    <div class="timeline-step">
                                        <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="And here's some amazing content. It's very engaging. Right?" data-original-title="2004">
                                            <div class="inner-circle"></div>
                                            <p class="h6 mt-3 mb-1" style="color:black">{{date("d M Y H:i", strtotime($selesai->created_at))}}</p>
                                            <p class="h6 text-muted mb-0 mb-lg-0">Pengaduan Selesai Diproses</p>
                                        </div>
                                    </div>
                                @endif
                        </div>
                    </div>
                </div>
                <br>

                    @if(!is_null($selesai))
                        @if(is_null($finalanswer))
                              <div class="container-fluid" style="margin-left: 85px;margin-right: 85px;width: auto;border: 2px solid black;">
                                <div class="row" style="margin-top: 20px;">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                                            <label style="color:black;text-align: left;font-size: 26px;"><b>Hasil Tindak Lanjut :</b></label>
                                            <br>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <div class="row" style="margin-bottom: 20px;">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                                            <label style="color:black;text-align: justify;">Mohon maaf pengaduan Anda kami close karena : {{$selesai->keterangan}}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                              </div>
                        @else
                            <div class="container-fluid" style="margin-left: 85px;margin-right: 85px;width: auto;border: 2px solid black;">
                                <div class="row" style="margin-top: 20px;">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                                            <label style="color:black;text-align: left;font-size: 26px;"><b>Hasil Tindak Lanjut :</b></label>
                                            <br>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <div class="row"></div>
                                <div class="row" >
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                                            <label style="color:black;text-align: justify;">{!!$finalanswer->final_answer!!}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <br>
                                  @if($dokumen->isEmpty())
                                  <!-- <label style="color:black">kosong</label> -->
                                  @else
                                  <!-- <label style="color:black">isi</label> -->
                                    <div class="row">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-6">
                                            <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                                                <label style="color:black;font-size: 26px"><b>Dokumen Pendukung : </b></label>
                                            </div>
                                        </div>
                                        <div class="col-md-3"></div>
                                    </div>
                                    @foreach($dokumen as $dokumen)
                                    <div class="row" style="margin-bottom: 15px;">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-6">
                                            <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                                                <a href="{{ url('/').'/dokumen/'.$dokumen->nama_file }}" style="text-align:left;">Dokumen #{{ $loop->iteration }}</a>
                                            </div>
                                        </div>
                                        <div class="col-md-3"></div>
                                    </div>
                                    @endforeach
                                  @endif
                              </div>
                        @endif
                    @else
                        @if(!is_null($diproses))
                            <div class="container-fluid" style="margin-left: 85px;margin-right: 85px;width: auto;border: 2px solid black;">
                                    <div class="row">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-6">
                                            <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                                                <label style="color:black;text-align: left;margin-top: 20px;font-size: 26px;"><b>Keterangan :</b></label>
                                            </div>
                                        </div>
                                        <div class="col-md-3"></div>
                                    </div>
                                    <div class="row" style="margin-bottom: 20px;">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
                                            <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                                                <label style="color:black;text-align: justify;">Pengaduan Anda sedang diproses. Mohon untuk melakukan <i>tracking</i> secara berkala. Hasil pengaduan akan ditampilkan di halaman ini ketika pengaduan Anda selesai diproses.</label>
                                            </div>
                                        </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                  </div>
                        @else
                              <div class="container-fluid" style="margin-left: 85px;margin-right: 85px;width: auto;border: 2px solid black;">
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                                            <label style="color:black;text-align: left;font-size: 26px;"><b>Keterangan :</b></label>
                                        </div>
                                    </div>
                                    <div class="col-md-3"></div>
                                </div>
                                <div class="row" style="margin-bottom: 20px;">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                                            <label style="color:black;text-align: justify;">Pengaduan Anda sudah diterima dan sedang menunggu untuk diproses. Mohon untuk melakukan <i>tracking</i> secara berkala. Hasil pengaduan akan ditampilkan di halaman ini ketika pengaduan Anda selesai diproses.</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                              </div>
                        @endif
                    @endif
                
                
                    
            </div>

        </header>
        <!-- Copyright Section-->
        <div class="copyright py-4 bg-dark text-center text-white">
            <div class="container"><small>Copyright &copy; 2022 PUSBIN JFA BPKP. <i> Developed by </i><b>Sibijak DevTeam</b>.</small></div>
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

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{asset('js/scripts.js')}}"></script>
        <script>
            $(function() {
                $('#submitButton').prop('disabled', true);
                $('#NoTiket').on('input', function(e) {
                    if(this.value.length === 12) {
                        $('#submitButton').prop('disabled', false);
                    } else {
                        $('#submitButton').prop('disabled', true);
                    }
                });
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

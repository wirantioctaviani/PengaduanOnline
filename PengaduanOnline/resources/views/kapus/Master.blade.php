<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pusbin JFA - WBS</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="icon" type="image/png" sizes="96x96" href="{{asset('assets/img/bpkp.png')}}" />
  <link href="{{asset('bizland/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/font-awesome-4.7.0/css/font-awesome.min.css')}}">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->

  <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  
  <!-- include summernote css/js -->
  <!-- <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script> -->
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

  <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <!-- Vendor CSS Files -->
  <link href="{{asset('bizland/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('bizland/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('bizland/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('bizland/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('bizland/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('bizland/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('bizland/assets/css/style.css')}}" rel="stylesheet">

  <!-- DataTables -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
  <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css"> -->

  <script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>

  <style>
      /* untuk menghilangkan spinner  */
      .spinner {
          display: none;
      }
  </style> 


  <!-- =======================================================
  * Template Name: BizLand - v3.3.0
  * Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="{{ action('App\Http\Controllers\KoorController@HomeKoor') }}" class="logo"><img src="{{asset('assets/img/bpkp.png')}}" alt=""></a>
      <h1 class="logo">Pusat Pembinaan Jabatan Fungsional Auditor<span>.</span></h1>

      <nav id="navbar" class="navbar">
        <ul>
          </li>
          <li><a href="{{ action('App\Http\Controllers\LoginController@logout') }}" class="nav-link">LOG OUT</a></li>
        </ul>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <img src="{{asset('assets/img/whistle.png')}}" style="width:170px;height:180px;">
      <h1>Selamat Datang di <span>Lapor Pusbin</span></h1>
      <h2>{{request()->session()->get('namalengkap')}} - Kepala Pusat Pembinaan JFA</h2>
      <h2>{{date('d M Y')}} <span id="span"></span></h2>
    </div>
  </section><!-- End Hero -->
  
@yield('content')


<!-- ======= Footer ======= -->
  <footer id="footer" style="background-color:#82b2ff">
    <div class="container py-4">
      <div class="copyright" >
       2021 &copy; Copyright <strong><span>Pusbin JFA</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bizland-bootstrap-business-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
  <!-- Vendor JS Files -->
  <script src="{{asset('bizland/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('bizland/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('bizland/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('bizland/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('bizland/assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('bizland/assets/vendor/purecounter/purecounter.js')}}"></script>
  <script src="{{asset('bizland/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('bizland/assets/vendor/waypoints/noframework.waypoints.js')}}"></script>

  <!-- DataTables -->
  <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
  <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/fixedheader/3.2.0/js/dataTables.fixedHeader.min.js"></script>
  @yield('js-plus')
  <!-- Template Main JS File -->
  <script src="{{asset('bizland/assets/js/main.js')}}"></script>
  <script type="text/javascript">
      $(document).ready(function() {
          $('#example').DataTable();
      } );
  </script>
  <script>
            $(document).ready(function() {
                $('#summernote').summernote('disable');
            });

            // $('#summernote').summernote({
            //   height: 120,
            //   toolbar: [
            //     // [groupName, [list of button]]
            //     ['style', ['bold', 'italic', 'underline', 'clear']],
            //     ['font', ['strikethrough', 'superscript', 'subscript']],
            //     ['fontsize', ['fontsize']],
            //     ['color', ['color']],
            //     ['para', ['ul', 'ol', 'paragraph']],
            //     ['height', ['height']]
            //   ]
            // });
    </script>
    <script>
            $(document).ready(function() {
                $('#summernote').summernote('disable');
            });

            // $('#summernote').summernote({
            //   height: 120,
            //   toolbar: [
            //     // [groupName, [list of button]]
            //     ['style', ['bold', 'italic', 'underline', 'clear']],
            //     ['font', ['strikethrough', 'superscript', 'subscript']],
            //     ['fontsize', ['fontsize']],
            //     ['color', ['color']],
            //     ['para', ['ul', 'ol', 'paragraph']],
            //     ['height', ['height']]
            //   ]
            // });
    </script>
    
    <script>
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
    <script type="text/javascript">
        $(document).ready(function() {
          $(".add-more").click(function(){ 
              var html = $(".copy").html();
              $(".after-add-more").after(html);
          });

          // saat tombol remove dklik control group akan dihapus 
          $("body").on("click",".remove",function(){ 
              $(this).parents(".form-group").remove();
          });
        });
    </script>
    <script>
      var span = document.getElementById('span');

      function time() {
        var d = new Date();
        var s = d.getSeconds();
        var m = d.getMinutes();
        var h = d.getHours();
        span.textContent = 
          ("0" + h).substr(-2) + ":" + ("0" + m).substr(-2) + ":" + ("0" + s).substr(-2);
      }

      setInterval(time, 1000);
    </script>

</body>

</html>
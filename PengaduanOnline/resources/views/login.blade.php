<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('asset_login/fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{asset('asset_login/css/owl.carousel.min.css')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('asset_login/css/bootstrap.min.css')}}">
    
    <!-- Style -->
    <link rel="stylesheet" href="{{asset('asset_login/css/style.css')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('assets/img/bpkp.png')}}" />

    <title>Login Page</title>
    <style>
      /* untuk menghilangkan spinner  */
      .spinner {
          display: none;
      }
    </style> 
  </head>
  <body>
  
    @if (session('error'))
     <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
         </button>
    </div>
    @endif

    @if (session('error2'))
     <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('error2') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
         </button>
    </div>
    @endif

    @if (session('error3'))
     <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('error3') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
         </button>
    </div>
    @endif

    @if (session('error4'))
     <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('error4') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
         </button>
    </div>
    @endif

    @if (session('errory'))
     <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('errory') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
         </button>
    </div>
    @endif
  
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="{{asset('assets/img/whistle.png')}}" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3 class="text-center">SELAMAT DATANG</h3>
              <p class="mb-4" style="text-align:justify;">Silahkan Login menggunakan username dan password <b>warga.bpkp.go.id</b></p>
            </div>
            <form class="form-prevent" action="{{ action('App\Http\Controllers\LoginController@otentikasi') }}" method="post">
              @csrf
              <div class="form-group first">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" id="username">

              </div>
              <div class="form-group last mb-4">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password">
                
              </div>
              
<!--               <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                  <input type="checkbox" checked="checked"/>
                  <div class="control__indicator"></div>
                </label>
                <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span> 
              </div> -->

                  <!-- <button class="btn btn-info btn-md button-prevent" id="submitButton" type="submit">
                        spinner-border adalah component bawaan bootstrap untuk menampilakn roda berputar 
                        <div class="spinner"><i role="status" class="spinner-border spinner-border-sm"></i> Log In </div>
                        <div class="hide-text">Log In</div>
                  </button> -->
                  <input type="submit" value="Log In" class="btn btn-block btn-primary">
                  <br>
                  <div class="text-center">
                  <a href="{{ action('App\Http\Controllers\LoginAdminController@index') }}">Login sebagai Admin</a>
                  </div>
            </form>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>

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


    <script src="{{asset('asset_login/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('asset_login/js/popper.min.js')}}"></script>
    <script src="{{asset('asset_login/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('asset_login/js/main.js')}}"></script>
  </body>
</html>
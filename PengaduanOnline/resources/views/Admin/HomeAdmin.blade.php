@extends('Admin.Master')

@section('content')
  <main id="main">

    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-3 col-md-4">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon text-center"><i class="bx bx-file"></i></div>
              <h4 class="title text-center"><a href="{{ action('App\Http\Controllers\AdminController@PengaduanBaru') }}">Pengaduan <br>Baru</a></h4>
              <p class="description text-center" style="font-size:36px"><span data-purecounter-start="0" data-purecounter-end={{$pengaduan_new}} data-purecounter-duration="1" class="purecounter"></span></p>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon text-center"><i class="bx bx-pencil"></i></div>
              <h4 class="title text-center"><a href="{{ action('App\Http\Controllers\AdminController@PengaduanDitindaklanjuti') }}">Pengaduan<br> Ditindaklanjuti</a></h4>
              <p class="description text-center" style="font-size:36px"><span data-purecounter-start="0" data-purecounter-end={{$pengaduan_ditl}} data-purecounter-duration="1" class="purecounter"></span></p>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
              <div class="icon text-center"><i class="bx bx-time"></i></div>
              <h4 class="title text-center"><a href="{{ action('App\Http\Controllers\AdminController@PengaduanDiproses') }}"><i>Monitoring</i> <br>Pengaduan</a></h4>
              <p class="description text-center" style="font-size:36px"><span data-purecounter-start="0" data-purecounter-end={{$pengaduan_onprocess}} data-purecounter-duration="1" class="purecounter"></span></p>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
              <div class="icon text-center"><i class="bx bx-check-circle"></i></div>
              <h4 class="title text-center"><a href="{{ action('App\Http\Controllers\AdminController@PengaduanSelesai') }}">Pengaduan <br><i>Closed</i></a></h4>
              <p class="description text-center" style="font-size:36px"><span data-purecounter-start="0" data-purecounter-end={{$pengaduan_closed}} data-purecounter-duration="1" class="purecounter"></span></p>
            </div>
          </div>

          <!-- <div class="col-lg-3 col-md-6">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
              <div class="icon text-center"><i class="bx bx-no-entry"></i></div>
              <h4 class="title text-center"><a href="{{ action('App\Http\Controllers\PengaduanController@PengaduanDitolak') }}">Pengaduan Ditolak</a></h4>
              <p class="description text-center" style="font-size:36px"><span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span></p>
            </div>
          </div> -->
        </div>
        <br>
        <div class="row">
          <div class="col-lg-3 col-md-6">
          </div>
          <div class="col-lg-3 col-md-3">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon text-center"><i class="bx bx-user-circle"></i></div>
              <h4 class="title text-center"><a href="{{ action('App\Http\Controllers\AdminController@ManageAdmin') }}"><i>Manage</i> Admin</a></h4>
              <p class="description text-center" style="font-size:36px"></p>
            </div>
          </div>
          <div class="col-lg-3 col-md-3">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon text-center"><i class="bx bx-user"></i></div>
              <h4 class="title text-center"><a href="{{ action('App\Http\Controllers\AdminController@ManageUser') }}"><i>Manage User</i></a></h4>
              <p class="description text-center" style="font-size:36px"></p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Featured Services Section -->
  </main><!-- End #main -->

  @endsection

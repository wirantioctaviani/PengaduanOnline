@extends('koordinator.Master')

@section('content')
  <main id="main">
    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
      <div class="container text-center">
        <a href="{{ action('App\Http\Controllers\KoorController@HomeKoor') }}"><i class="fas fa-home fa-2x"></i></a>
        <br>  
        <br>
      </div>
      <div class="container" style="border: 5px">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12 border bg-light" style="height: 100%">
                <br>
                <h2 class="text-center">PENGADUAN SELESAI DIPROSES</h2>
                <br>
                  <table id="example" class="table table-striped table-bordered dt-responsive">
                    <thead class="text-center" style="background-color: #82b2ff;">
                        <tr>
                            <th>No</th>
                            <th>No Tiket</th>
                            <th>Pihak / Layanan yang Dilaporkan</th>
                            <th>Waktu Pelaporan</th>
                            <th>Waktu Update</th>
                            <th>Kategori Pengaduan</th>
                            <th>Status</th>
                            <th>TL by</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pengaduan_selesai as $DetailPengaduan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$DetailPengaduan->no_tiket}}</td>
                            <td>{{$DetailPengaduan->oranglayanan_terlapor}}</td>
                            <td>{{date("d M Y H:i", strtotime($DetailPengaduan->waktu_pelaporan))}}</td>
                            <td>{{date("d M Y H:i", strtotime($DetailPengaduan->tanggal_update))}}</td>
                            @if($DetailPengaduan->kategori_pengaduan == 'layanan')
                            <td>Layanan</td>
                            @else
                            <td>Personal</td>
                            @endif
                            <td>{{$DetailPengaduan->keterangan}}</td>
                            <td>{{$DetailPengaduan->nama_role}}</td>
                            <td>
                              <div class="btn-group-vertical" role="group" aria-label="Basic example">
                                <a href="{{ action('App\Http\Controllers\KoorController@PengaduanDetail', [encrypt($DetailPengaduan->mstr_pengaduan_id)]) }}" class="btn btn-info">Detail</a>
                              </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                  <br>
              </div>
            </div>
          </div>
      </div>
    </section><!-- End Featured Services Section -->
  </main><!-- End #main -->


@endsection
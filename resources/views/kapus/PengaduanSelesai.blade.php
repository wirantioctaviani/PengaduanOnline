@extends('kapus.Master')

@section('content')
  <main id="main">
    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
      <div class="container text-center">
        <a href="{{ action('App\Http\Controllers\KapusController@HomeKapus') }}"><i class="fas fa-home fa-2x"></i></a>
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
                            <th>TL Oleh</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pengaduan_selesai as $DetailPengaduan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$DetailPengaduan->no_tiket}}</td>
                            <td>{{$DetailPengaduan->oranglayanan_terlapor}}</td>
                            <td>{{date("d M Y H:i", strtotime($DetailPengaduan->created_at))}}</td>
                            <td>{{date("d M Y H:i", strtotime($DetailPengaduan->updated_at))}}</td>
                            @if($DetailPengaduan->kategori_pengaduan == 'layanan')
                            <td>Layanan</td>
                            @else
                            <td>Personal</td>
                            @endif
                            <td>{{$DetailPengaduan->keterangan}}</td>
                            @if(!empty($DetailPengaduan->nama_role))
                                <td>{{$DetailPengaduan->nama_role}}</td>
                            @else
                                <td style="color:red"><b>Tiket di close</b></td>
                            @endif
                            <td>
                              <div class="btn-group-vertical" role="group" aria-label="Basic example">
                                <a href="{{ action('App\Http\Controllers\KapusController@PengaduanDetail', [encrypt($DetailPengaduan->id)]) }}" class="btn btn-info">Detail</a>
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
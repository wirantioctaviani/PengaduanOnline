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

      @if(Session('Sukses'))
        <script>
            swal(`Berhasil!`, "Subkoor Penanggung Jawab Berhasil Dipilih", "success");
        </script>
      @endif

      @if(Session('Sukses2'))
        <script>
            swal(`Berhasil!`, "Pengaduan akan ditindaklanjuti oleh Koordinator", "success");
        </script>
      @endif

      @if(Session('Sukses3'))
        <script>
            swal(`Berhasil!`, "Hasil Tindaklanjut Berhasil Diupdate", "success");
        </script>
      @endif

      <div class="container" style="border: 5px">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12 border bg-light" style="height: 100%">
                <br>
                <h2 class="text-center">PENGADUAN DITINDAKLANJUTI</h2>
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
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pengaduan_ditindaklanjuti as $pengaduan_ditindaklanjuti)
                        <tr class="text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$pengaduan_ditindaklanjuti->no_tiket}}</td>
                            <td>{{$pengaduan_ditindaklanjuti->oranglayanan_terlapor}}</td>
                            <td>{{date("d M Y H:i", strtotime($pengaduan_ditindaklanjuti->created_at))}}</td>
                            <td>{{date("d M Y H:i", strtotime($pengaduan_ditindaklanjuti->koor_updated_at))}}</td>
                            @if($pengaduan_ditindaklanjuti->kategori_pengaduan == 'layanan')
                            <td>Layanan</td>
                            @else
                            <td>Personal</td>
                            @endif
                            <td>{{$pengaduan_ditindaklanjuti->keterangan}}</td>
                            @if($pengaduan_ditindaklanjuti->status_pic == 1 || $pengaduan_ditindaklanjuti->status_pic == 2)
                                <td>
                                <a href="{{ action('App\Http\Controllers\KoorController@ProsesPengaduan', [encrypt($pengaduan_ditindaklanjuti->id)]) }}" class="btn btn-warning">Update</a>
                                </td>
                            @elseif($pengaduan_ditindaklanjuti->status_pic == 3 || $pengaduan_ditindaklanjuti->status_pic == 4)
                                <td>
                                  Anda telah menyelesaikan proses tindak lanjut<br>
                                <a href="{{ action('App\Http\Controllers\KoorController@ProsesPengaduan', [encrypt($pengaduan_ditindaklanjuti->id)]) }}" class="btn btn-info">Detail</a>
                                </td>
                            @endif
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
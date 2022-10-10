@extends('Admin.Master')

@section('content')
  <main id="main">
    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
      <div class="container text-center">
        <a href="{{ action('App\Http\Controllers\AdminController@HomeAdmin') }}"><i class="fas fa-home fa-2x"></i></a>
        <br>  
        <br>
      </div>
      <div class="container" style="border: 5px">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12 border bg-light" style="height: 100%">
                <br>
                <h2 class="text-center">PENGADUAN DALAM PROSES</h2>
                <br>
                  <table id="example" class="table table-striped table-bordered dt-responsive">
                    <thead class="text-center" style="background-color: #82b2ff;">
                        <tr>
                            <th>No</th>
                            <th>No Tiket</th>
                            <th>Pihak / Layanan yang Dilaporkan</th>
                            <th>Waktu Pelaporan</th>
                            <th>Waktu Update Pengaduan</th>
                            <th>Kategori Pengaduan</th>
                            <th>Status</th>
                            <th>TL Oleh</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                      @foreach($pengaduan_new as $pengaduan_new)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$pengaduan_new->no_tiket}}</td>
                            <td>{{$pengaduan_new->oranglayanan_terlapor}}</td>
                            <td>{{date("d M Y H:i", strtotime($pengaduan_new->tanggal_submit))}}</td>
                            <td>{{date("d M Y H:i", strtotime($pengaduan_new->tanggal_update))}}</td>
                            @if($pengaduan_new->kategori_pengaduan == 'layanan')
                            <td>Layanan</td>
                            @else
                            <td>Personal</td>
                            @endif
                            <td>{{$pengaduan_new->ket_status}}</td>
                            @if($pengaduan_new->status_pengaduan == 2)
                            <td>Kepala Pusbin JFA</td>
                            @elseif($pengaduan_new->status_pengaduan == 3)
                            <td>Koordinator</td>
                            @elseif($pengaduan_new->status_pengaduan == 4)
                            <td>Subkoordinator</td>
                            @else
                            <td>{{$pengaduan_new->nama_role}}</td>
                            @endif
                            <td>
                              <div class="btn-group-vertical" role="group" aria-label="Basic example">
                                <!-- <a href="{{ action('App\Http\Controllers\AdminController@PengaduanView', [encrypt($pengaduan_new->id_pengaduan)]) }}" class="btn btn-info">Edit</a> -->
                                <a href="{{ action('App\Http\Controllers\AdminController@PengaduanView', [encrypt($pengaduan_new->id_pengaduan)]) }}" class="btn btn-primary">Detail</a>
                                <!-- <button 
                                  type="button" 
                                  class="btn icon btn-danger"
                                  data-toggle="modal" 
                                  data-target="#close-{{ $pengaduan_new->id }}">Close Tiket
                                </button> -->
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

                    
                    @foreach($pengaduan_new2 as $pengaduan_new)
                    <div class="modal fade" id="close-{{ $pengaduan_new->id }}" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h3 class="modal-title text-center" id="exampleModalLabel">Kategori Pengaduan</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form action="" enctype="multipart/form-data" method="POST">
                              <div class="modal-body">
                              @csrf
                                <div class="form-group">
                                  <label for="exampleInputEmail1" class="form-label">No Tiket</label>
                                  <input name="no_tiket" type="text" class="form-control" id="no_tiket" value="{{ $pengaduan_new->no_tiket }}" disabled>
                                  <input name="id" type="text" class="form-control" id="id" value="{{ $pengaduan_new->id }}" hidden>
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1" class="form-label">Pihak / Layanan yang Dilaporkan</label>
                                  <input name="oranglayanan_terlapor" type="text" class="form-control" id="oranglayanan_terlapor" value="{{ $pengaduan_new->oranglayanan_terlapor }}" disabled>
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1" class="form-label">Waktu Kejadian</label>
                                  <input name="waktu_kejadian" type="text" class="form-control" id="waktu_kejadian" value="{{ date('d M Y', strtotime($pengaduan_new->waktu_kejadian)) }}" disabled>
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1" class="form-label">Hal yang Dilaporkan</label>
                                  <input name="judul_pelanggaran" type="text" class="form-control" id="judul_pelanggaran" value="{{ $pengaduan_new->judul_pelanggaran }}" disabled>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                              </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    @endforeach

@endsection
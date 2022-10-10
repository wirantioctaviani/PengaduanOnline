@extends('pic.Master')

@section('content')
  <main id="main">
    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
      <div class="container text-center">
        <a href=""><i class="fas fa-home fa-2x"></i></a>
        <br>  
        <br>
      </div>
      <div class="container" style="border: 5px">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12 border bg-light" style="height: 100%">
                <br>
                <h2 class="text-center">PROSES PENGADUAN</h2>
                <br>
                @foreach($DetailPengaduan as $DetailPengaduan)
                <!-- 2 ROW -->
                <div class="row">
                      <div class="col-md-1">
                      </div>  
                      <div class="col-md-4">
                        <label style="color:black;">Nomor Tiket : </label>
                      </div>
                      <div class="col-md-2">
                      </div>
                      <div class="col-md-4">
                        <label style="color:black;">Waktu Pengaduan : </label>
                      </div>
                      <div class="col-md-1">
                      </div>
                </div>
                <div class="row">
                      <div class="col-md-1">
                      </div>  
                      <div class="col-md-4">
                        <input name="nama" type="no_tiket" class="form-control" id="exampleInputnama" value="{{$DetailPengaduan->no_tiket}}" readonly>
                      </div>
                      <div class="col-md-2">
                      </div>
                      <div class="col-md-4">
                        <input name="created_at" type="text" class="form-control" id="exampleInputnama" value="{{date('d M Y H:i:s', strtotime($DetailPengaduan->created_at))}}" readonly>
                      </div>
                      <div class="col-md-1">
                      </div>
                </div>
                <br>
                <!-- END ROW -->
                <div class="row">
                  <div class="col-md-1"></div>
                  <div class="col-md-10">
                    <label style="color:black;font-size: 28px;"><b><u>PELAPOR</u></b></label>
                  </div>
                  <div class="col-md-1"></div>
                </div>
                <!-- 2 ROW -->
                <div class="row">
                      <div class="col-md-1">
                      </div>  
                      <div class="col-md-4">
                        <label style="color:black;">Nama/Alias Pelapor : </label>
                      </div>
                      <div class="col-md-2">
                      </div>
                      <div class="col-md-4">
                        <label style="color:black;">Nomor Telepon : </label>
                      </div>
                      <div class="col-md-1">
                      </div>
                </div>
                <div class="row">
                      <div class="col-md-1">
                      </div>  
                      <div class="col-md-4">
                        <input name="nama_pelapor" type="text" class="form-control" id="exampleInputnama" value="{{$DetailPengaduan->nama_pelapor}}" readonly>
                      </div>
                      <div class="col-md-2">
                      </div>
                      <div class="col-md-4">
                        <input name="telp_pelapor" type="telp_pelapor" class="form-control" id="exampleInputnama" value="{{$DetailPengaduan->telp_pelapor}}" readonly>
                      </div>
                      <div class="col-md-1">
                      </div>
                </div>
                <!-- END ROW -->
                <!-- 2 ROW -->
                <div class="row">
                      <div class="col-md-1">
                      </div>  
                      <div class="col-md-4">
                        <label style="color:black;">Email : </label>
                      </div>
                      <div class="col-md-2">
                      </div>
                      <div class="col-md-4">
                      </div>
                      <div class="col-md-1">
                      </div>
                </div>
                <div class="row">
                      <div class="col-md-1">
                      </div>  
                      <div class="col-md-4">
                        <input name="email_pelapor" type="text" class="form-control" id="exampleInputnama" value="{{$DetailPengaduan->email_pelapor}}" readonly>
                      </div>
                      <div class="col-md-2">
                      </div>
                      <div class="col-md-4">
                      </div>
                      <div class="col-md-1">
                      </div>
                </div>
                <br>
                <!-- END ROW -->
                <div class="row">
                  <div class="col-md-1"></div>
                  <div class="col-md-10">
                    <label style="color:black;font-size: 28px;"><b><u>YANG DILAPORKAN</u></b></label>
                  </div>
                  <div class="col-md-1"></div>
                </div>
                <!-- 2 ROW -->
                <div class="row">
                      <div class="col-md-1">
                      </div>  
                      <div class="col-md-4">
                        <label style="color:black;">Nama/Layanan yang Dilaporkan : </label>
                      </div>
                      <div class="col-md-2">
                      </div>
                      <div class="col-md-4">
                        <label style="color:black;">Satuan Kerja : </label>
                      </div>
                      <div class="col-md-1">
                      </div>
                </div>
                <div class="row">
                      <div class="col-md-1">
                      </div>  
                      <div class="col-md-4">
                        <input name="oranglayanan_terlapor" type="text" class="form-control" id="exampleInputnama" value="{{$DetailPengaduan->oranglayanan_terlapor}}" readonly>
                      </div>
                      <div class="col-md-2">
                      </div>
                      <div class="col-md-4">
                        <input name="satuan_kerja" type="text" class="form-control" id="exampleInputnama" value="{{$DetailPengaduan->satuan_kerja}}" readonly>
                      </div>
                      <div class="col-md-1">
                      </div>
                </div>
                <!-- END ROW -->
                <!-- 2 ROW -->
                <div class="row">
                      <div class="col-md-1">
                      </div>  
                      <div class="col-md-4">
                        <label style="color:black;">Waktu Kejadian : </label>
                      </div>
                      <div class="col-md-2">
                      </div>
                      <div class="col-md-4">
                        <label style="color:black;">Tempat Kejadian : </label>
                      </div>
                      <div class="col-md-1">
                      </div>
                </div>
                <div class="row">
                      <div class="col-md-1">
                      </div>  
                      <div class="col-md-4">
                        <input name="waktu_kejadian" type="text" class="form-control" id="exampleInputnama" value="{{date('d M Y H:i:s', strtotime($DetailPengaduan->waktu_kejadian))}}" readonly>
                      </div>
                      <div class="col-md-2">
                      </div>
                      <div class="col-md-4">
                        <input name="tempat_kejadian" type="text" class="form-control" id="exampleInputnama" value="{{$DetailPengaduan->tempat_kejadian}}" readonly>
                      </div>
                      <div class="col-md-1">
                      </div>
                </div>
                <!-- END ROW -->
                <!-- 2 ROW -->
                <div class="row">
                      <div class="col-md-1">
                      </div>  
                      <div class="col-md-10">
                        <label style="color:black;">Pelanggaran yang Dilaporkan : </label>
                      </div>
                      <div class="col-md-1">
                      </div>
                </div>
                <div class="row">
                      <div class="col-md-1">
                      </div>  
                      <div class="col-md-10">
                        <textarea readonly cols="111" name="judul_pelanggaran" rows="2">{{$DetailPengaduan->judul_pelanggaran}}</textarea>
                      </div>
                      <div class="col-md-1">
                      </div>
                </div>
                <!-- END ROW -->
                <!-- 2 ROW -->
                <div class="row">
                      <div class="col-md-1">
                      </div>  
                      <div class="col-md-10">
                        <label style="color:black;">Detail Pelanggaran : </label>
                      </div>
                      <div class="col-md-1">
                      </div>
                </div>
                <div class="row">
                      <div class="col-md-1">
                      </div>  
                      <div class="col-md-10">
                        <textarea  name="detail_pelanggaran" class="form-control" id="summernote">{!!$DetailPengaduan->detail_pelanggaran!!}</textarea>
                      </div>
                      <div class="col-md-1">
                      </div>
                </div>
                @endforeach
                <!-- END ROW -->
                <br>
                @foreach($BuktiPengaduan as $BuktiPengaduan)
                <div class="row">
                      <div class="col-md-1">
                      </div>  
                      <div class="col-md-10">
                        <label style="color:black;">Bukti Pendukung : </label>
                        <a href="{{ url('/').'/bukti/'.$BuktiPengaduan->nama_file }}">Bukti {{ $loop->iteration }}</a>
                      </div>
                      <div class="col-md-1">
                      </div>
                </div>
                <!-- <div class="row">
                      <div class="col-md-1">
                      </div>  
                      <div class="col-md-10">
                        <label style="color:black;"> Status Pengaduan : </label>
                        <input type="" name="" readonly>
                      </div>
                      <div class="col-md-1">
                      </div>
                </div> -->
                @endforeach
                <hr>
                <div class="row">
                  <div class="col-md-1"></div>
                  <div class="col-md-10">
                    <label style="color:black;font-size: 28px;"><b><u>TINDAK LANJUT</u></b></label>
                  </div>
                  <div class="col-md-1"></div>
                </div>
                <div class="row">
                  <div class="col-md-1"></div>
                  <div class="col-md-10">
                    <label style="color:black;"><u>7 OKT 2021 15.37 - SATGAS PENGADUAN #ABC123</u></label>
                  </div>
                  <div class="col-md-1"></div>
                </div>
                <div class="row">
                  <div class="col-md-2"></div>
                  <div class="col-md-9">
                    <label style="color:black;">Terima kasih atas perhatiannya.</label>
                  </div>
                  <div class="col-md-1"></div>
                </div>
                <br>
              <div class="row">
                  <div class="col-md-1"></div>
                  <div class="col-md-10">
                    <label style="color:black;"><u>7 OKT 2021 07.10 - SATGAS PENGADUAN #ABC123</u></label>
                  </div>
                  <div class="col-md-1"></div>
              </div>
                <div class="row">
                  <div class="col-md-2"></div>
                  <div class="col-md-9">
                    <label style="color:black;">Terima kasih atas perhatiannya.</label>
                  </div>
                  <div class="col-md-1"></div>
                </div>
                <br>
                <div class="row">
                      <div class="col-md-3">
                      </div> 
                      <div class="col-md-6 text-center">
                        <a href="{{ action('App\Http\Controllers\AdminController@PengaduanDiproses') }}" class="btn btn-secondary">Kembali</a>
                        <button type="button" class="btn btn-info" data-toggle='modal' data-target="#ModalHasilTindakLanjut">Input Hasil Tindak Lanjut</button>
                      </div>
                      <div class="col-md-3">
                      </div>
                </div>
                <br>
                <hr>
                <br>
                <h4>Status Tindaklanjut PIC</h4>
                  <table id="example2" class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                          <th>No</th>
                          <th>Bidang</th>
                          <th>Subbid</th>
                          <th>Status Tindaklanjut</th>
                          <th>Update at</th>
                        </tr>
                        </thead> 
                        <tbody>
                        @foreach($PIC as $PIC)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $PIC->nama_bidang }}</td>
                          <td>{{ $PIC->pic_subbid }}</td>
                          @if($PIC->status_tindaklanjut != 1 && $PIC->status_tindaklanjut != 2)
                          <td><button type="button" class="btn btn-success">{{$PIC->keterangan}}</button></td>
                          @else
                          <td><button type="button" class="btn btn-danger">{{$PIC->keterangan}}</button>
                          @endif
                          <td>{{date('d M Y H:i:s', strtotime($PIC->updated_at))}}</td>
                        </tr>
                        </tbody>
                      @endforeach
                  </table>
                <br>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Featured Services Section -->
  </main><!-- End #main -->

                    @foreach($TrhPengaduan as $tindaklanjut)
                    <div class="modal fade" id="ModalHasilTindakLanjut" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLabel">Hasil Tindak Lanjut</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                          <form action="{{ action('App\Http\Controllers\PicController@AddTindaklanjut') }}" method="POST">
                            {{csrf_field()}}
                              <div class="form-group">
                                  <label for="exampleInputEmail1" class="form-label">Status Tindaklanjut</label>
                                  <br/>
                                  <select class="form-control form-select" name="status_tindaklanjut" id="kategori_pengaduan">
                                    <option value="1" selected>Pemeriksaan Bukti</option>
                                    <option value="2">Proses Tindak Lanjut</option>
                                    <option value="3">Closed - Diterima</option>
                                    <option value="4">Closed - Ditolak</option>
                                  </select>
                                </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Detail Tindak Lanjut</label>
                                <textarea  name="tindaklanjut" class="form-control" id="tindaklanjut"></textarea>
                                <input name="trh_pengaduan_id" type="text" class="form-control" id="id" value="{{ $tindaklanjut->id }}" hidden>
                                <input name="mstr_pengaduan_id" type="text" class="form-control" id="id" value="{{ $tindaklanjut->mstr_pengaduan_id }}" hidden>
                              </div>
                              <div class="form-group after-add-more">
                                <label for="exampleInputEmail1" class="form-label">Upload File</label>
                                <div class="col-md-6" style="color:black;">
                                  <input type="file" name="files[]" multiple required>
                                <button class="btn btn-success add-more" type="button">
                                  <i class="glyphicon glyphicon-plus">+</i> 
                                </button>
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
                  </div>
                  @endforeach

                  <div class="copy invisible">
                    <div class="form-group">
                      <label for="exampleInputEmail1" class="form-label">Upload File</label>
                      <div class="col-md-6" style="color:black;">
                        <input type="file" name="files[]" multiple required>
                        <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> x</button>
                      </div>
                    </div>
                  </div>

@endsection
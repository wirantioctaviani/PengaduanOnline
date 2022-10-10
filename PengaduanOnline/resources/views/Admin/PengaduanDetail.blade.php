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
                <h2 class="text-center">DETAIL PENGADUAN</h2>
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
                        <input name="no_tiket" type="text" class="form-control" id="exampleInputnama" value="{{$DetailPengaduan->no_tiket}}" readonly>
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
                        <input name="telp_pelapor" type="text" class="form-control" id="exampleInputnama" value="{{$DetailPengaduan->telp_pelapor}}" readonly>
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
                        <input name="email_pelapor" type="email" class="form-control" id="exampleInputnama" value="{{$DetailPengaduan->email_pelapor}}" readonly>
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
                        <input name="waktu_kejadian" type="text" class="form-control" id="exampleInputnama" value="{{date('d M Y', strtotime($DetailPengaduan->waktu_kejadian))}}" readonly>
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
                        <textarea style="width:100%">{{$DetailPengaduan->judul_pelanggaran}}</textarea>
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
                <div class="row" style="margin-top: 10px">
                      <div class="col-md-1">
                      </div>  
                      <div class="col-md-10">
                        <label style="color:black;">Jenis Pengaduan : </label>
                        @if($DetailPengaduan->kategori_pengaduan == 'layanan')
                        <label>Pengaduan Layanan</label>
                        @elseif($DetailPengaduan->kategori_pengaduan == 'personal')
                        <label>Pengaduan Personal</label>
                        @else
                        <label>-</label>
                        @endif
                      </div>
                      <div class="col-md-1">
                      </div>
                </div>
                <!-- END ROW -->
                @endforeach

                <div class="row">
                      <div class="col-md-1">
                      </div>  
                      <div class="col-md-10">
                        <label style="color:black;">Bukti Pendukung : </label>
                      </div>
                      <div class="col-md-1">
                      </div>
                </div>

                  @forelse($BuktiPengaduan as $BuktiPengaduan)
                  <div class="row">
                        <div class="col-md-2">
                        </div>  
                        <div class="col-md-8">
                          Bukti {{ $loop->iteration }} :
                          <a href="{{ url('/').'/bukti/'.$BuktiPengaduan->nama_file }}"> {{$BuktiPengaduan->nama_file}}</a>
                        </div>
                        <div class="col-md-2">
                        </div>
                  </div>
                  @empty
                  <div class="row">
                        <div class="col-md-2">
                        </div>  
                        <div class="col-md-8">
                          <label>Tidak ada bukti pendukung</label>
                        </div>
                        <div class="col-md-2">
                        </div>
                  </div>
                  @endforelse

                    @forelse($subbid as $subbid)
                        <hr>
                        <div class="row">
                          <div class="col-md-1"></div>
                          <div class="col-md-10">
                            <label style="color:black;font-size: 28px;"><b><u>HASIL TINDAK LANJUT</u></b></label>
                          </div>
                          <div class="col-md-1"></div>
                        </div>
                        @foreach($Tindaklanjut as $Tindaklanjuts)
                            @if($Tindaklanjuts->tl_by == 2)
                              @if($Tindaklanjuts->bidang_id == substr($subbid->subbid,1,1))
                                  <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-10">
                                      <label style="color:black;"><u>{{date('d M Y H:i', strtotime($Tindaklanjuts->created_at))}} - SATGAS PENGADUAN #{{$Tindaklanjuts->bidang_id}}{{$Tindaklanjuts->user_id}}</u></label>
                                    </div>
                                    <div class="col-md-1"></div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-9">
                                      <label style="color:black;">{!!$Tindaklanjuts->tindak_lanjut!!}</label>
                                      @foreach($dokumenpendukung as $dokumen)
                                      @if($dokumen->trd_tindaklanjut_id == $Tindaklanjuts->id_tindaklanjut)
                                          <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-10">
                                              <label style="color:black;">Dokumen Pendukung : </label>
                                                  <a href="{{ url('/').'/dokumen/'.$dokumen->nama_file }}">{{ $dokumen->nama_file }}</a>
                                            </div>
                                            <div class="col-md-1"></div>
                                          </div>
                                      @endif
                                      @endforeach
                                    </div>
                                    <div class="col-md-1"></div>
                                  </div> 
                              @endif
                            @elseif($Tindaklanjuts->tl_by == 3 || $Tindaklanjuts->tl_by == 4)
                              @if($Tindaklanjuts->subbid_id == $subbid->subbid)
                                  <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-10">
                                      <label style="color:black;"><u>{{date('d M Y H:i', strtotime($Tindaklanjuts->created_at))}} - SATGAS PENGADUAN #{{$Tindaklanjuts->subbid_id}}{{$Tindaklanjuts->user_id}}</u></label>
                                    </div>
                                    <div class="col-md-1"></div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-9">
                                      <label style="color:black;">{!!$Tindaklanjuts->tindak_lanjut!!}</label>
                                      @foreach($dokumenpendukung as $dokumen)
                                      @if($dokumen->trd_tindaklanjut_id == $Tindaklanjuts->id_tindaklanjut)
                                          <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-10">
                                              <label style="color:black;">Dokumen Pendukung : </label>
                                                  <a href="{{ url('/').'/dokumen/'.$dokumen->nama_file }}">{{ $dokumen->nama_file }}</a>
                                            </div>
                                            <div class="col-md-1"></div>
                                          </div>
                                      @endif
                                      @endforeach
                                    </div>
                                    <div class="col-md-1"></div>
                                  </div>
                              @endif
                            @elseif($Tindaklanjuts->tl_by == 5)
                                      <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-10">
                                          <label style="color:black;"><u>{{date('d M Y H:i', strtotime($Tindaklanjuts->created_at))}} - SATGAS PENGADUAN #00{{$Tindaklanjuts->subbid_id}}{{$Tindaklanjuts->user_id}}</u></label>
                                        </div>
                                        <div class="col-md-1"></div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-9">
                                          <label style="color:black;">{!!$Tindaklanjuts->tindak_lanjut!!}</label>
                                          @foreach($dokumenpendukung as $dokumen)
                                          @if($dokumen->trd_tindaklanjut_id == $Tindaklanjuts->id_tindaklanjut)
                                              <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-10">
                                                  <label style="color:black;">Dokumen Pendukung : </label>
                                                      <a href="{{ url('/').'/dokumen/'.$dokumen->nama_file }}">{{ $dokumen->nama_file }}</a>
                                                </div>
                                                <div class="col-md-1"></div>
                                              </div>
                                          @endif
                                          @endforeach
                                        </div>
                                        <div class="col-md-1"></div>
                                      </div> 
                                      <br>
                            @endif
                        @endforeach
                    @empty
                          <hr>
                          <div class="row">
                                      <div class="col-md-3">
                                      </div> 
                                      <div class="col-md-6 text-center">
                                        <label><b>Tiket di close karena : </b> {{ $history->keterangan }}</label>
                                      </div>
                                      <div class="col-md-3">
                                      </div>
                          </div>
                          <hr>
                          <div class="row">
                                      <div class="col-md-3">
                                      </div> 
                                      <div class="col-md-6 text-center">
                                        <a href="{{ action('App\Http\Controllers\AdminController@PengaduanSelesai') }}" class="btn btn-secondary">Kembali</a>
                                      </div>
                                      <div class="col-md-3">
                                      </div>
                          </div>
                          <br>
                    @endforelse

                              @if($DetailPengaduan->tl_by == 2)
                                <hr>
                                <h4>Status Tindak Lanjut Pengaduan</h4>
                                  <table id="example2" class="table table-bordered table-striped text-center">
                                  <thead>
                                      <tr>
                                        <th>No</th>
                                        <th>PIC</th>
                                        <th>Bidang</th>
                                        <th>Status Tindak Lanjut</th>
                                        <th>Waktu Lapor Pengaduan</th>
                                        <th>Waktu Update Tindak Lanjut</th>
                                        <th>Assigned By</th>
                                      </tr>
                                      </thead> 
                                      <tbody>
                                      @foreach($koordinator as $koordinators)
                                      <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>Koordinator</td>
                                        <td>{{ $koordinators->bidang_id }}</td>
                                        @if($koordinators->status_pic == 3)
                                          <td><button type="button" class="btn btn-success">{{$koordinators->mstr_status_pic_ket}}</button></td>
                                          @elseif($koordinators->status_pic == 4)
                                          <td><button type="button" class="btn btn-danger">{{$koordinators->mstr_status_pic_ket}}</button></td>
                                        @endif
                                        <td>{{date('d M Y H:i', strtotime($koordinators->created_at))}}</td>
                                        <td>{{date('d M Y H:i', strtotime($koordinators->koor_updated_at))}}</td>
                                        <td>{{$koordinators->nama_role}}</td>
                                      </tr>
                                      @endforeach
                                      </tbody>
                                  </table>
                                  <hr>
                                            <div class="row">
                                                        <div class="col-md-3">
                                                        </div> 
                                                        <div class="col-md-6 text-center">
                                                          <a href="{{ action('App\Http\Controllers\KapusController@PengaduanSelesai') }}" class="btn btn-secondary">Kembali</a>
                                                          <button type="button" class="btn btn-success" data-toggle='modal' data-target="#ModalFinalAnswer">Lihat Jawaban Final</button>
                                                        </div>
                                                        <div class="col-md-3">
                                                        </div>
                                            </div>
                                            <br>

                                      <div class="modal fade" id="ModalFinalAnswer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <h3 class="modal-title" id="exampleModalLabel">Jawaban Final</h3>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                      </div>
                                                      <div class="modal-body">
                                                        <form action="" method="POST" enctype="multipart/form-data">
                                                          @foreach($final_answer as $finalanswer)
                                                            <div class="form-group">
                                                              <label for="exampleInputEmail1" class="form-label"><b>Jawaban Final</b></label>
                                                              <textarea class="tiny" name="final_answer">
                                                                {!!$finalanswer->final_answer!!}
                                                              </textarea>
                                                            </div>
                                                          @endforeach
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1" class="form-label"><b>Dokumen Pendukung yang ditampilkan</b></label>
                                                                <br/>
                                                                @foreach($dokumenpendukung2 as $dokumen2)
                                                                      <div class="row">
                                                                        <div class="col-md-1"></div>
                                                                        <div class="col-md-10">
                                                                          <!-- <input type="checkbox" value="{{ $dokumen2->id_dokumen }}" name="id_dokumen[]" id="id_dokumen" hidden /> -->
                                                                          <input type="checkbox" name="is_send[]" value="{{ $dokumen2->id_dokumen }}" id="is_send" checked disabled="" />
                                                                              <a href="{{ url('/').'/dokumen/'.$dokumen2->nama_file }}">{{ $dokumen2->nama_file }}</a>
                                                                        </div>
                                                                        <div class="col-md-1"></div>
                                                                      </div>
                                                                @endforeach
                                                            </div>
                                                          <div class="modal-footer" style="justify-content: center;">
                                                            <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                          </div>
                                                        </form>
                                                      </div>
                                                  </div>
                                      </div>
                              @elseif($DetailPengaduan->tl_by == 3)
                                <hr>
                                <h4>Status Tindak Lanjut Pengaduan</h4>
                                  <table id="example2" class="table table-bordered table-striped text-center">
                                  <thead>
                                      <tr>
                                        <th>No</th>
                                        <th>PIC</th>
                                        <th>Subbid</th>
                                        <th>Status Tindak Lanjut</th>
                                        <th>Waktu Lapor Pengaduan</th>
                                        <th>Waktu Update Tindak Lanjut</th>
                                      </tr>
                                      </thead> 
                                      <tbody>
                                      @foreach($subkoordinator as $subkoordinator)
                                      <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>Subkoordinator</td>
                                        <td>{{ $subkoordinator->subbid_id }}</td>
                                        @if($subkoordinator->status_pic == 3)
                                          <td><button type="button" class="btn btn-success">{{$subkoordinator->mstr_status_pic_ket}}</button></td>
                                          @elseif($subkoordinator->status_pic == 4)
                                          <td><button type="button" class="btn btn-danger">{{$subkoordinator->mstr_status_pic_ket}}</button></td>
                                        @endif
                                        <td>{{date('d M Y H:i', strtotime($subkoordinator->created_at))}}</td>
                                        <td>{{date('d M Y H:i', strtotime($subkoordinator->subkoor_updated_at))}}</td>
                                      </tr>
                                      @endforeach
                                    </tbody>
                                  </table>
                                  <hr>
                                            <div class="row">
                                                        <div class="col-md-3">
                                                        </div> 
                                                        <div class="col-md-6 text-center">
                                                          <a href="{{ action('App\Http\Controllers\KapusController@PengaduanSelesai') }}" class="btn btn-secondary">Kembali</a>
                                                          <button type="button" class="btn btn-success" data-toggle='modal' data-target="#ModalFinalAnswer">Lihat Jawaban Final</button>
                                                        </div>
                                                        <div class="col-md-3">
                                                        </div>
                                            </div>
                                            <br>

                                      <div class="modal fade" id="ModalFinalAnswer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <h3 class="modal-title" id="exampleModalLabel">Jawaban Final</h3>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                      </div>
                                                      <div class="modal-body">
                                                        <form action="" method="POST" enctype="multipart/form-data">
                                                          @foreach($final_answer as $finalanswer)
                                                            <div class="form-group">
                                                              <label for="exampleInputEmail1" class="form-label"><b>Jawaban Final</b></label>
                                                              <textarea class="tiny" name="final_answer">
                                                                {!!$finalanswer->final_answer!!}
                                                              </textarea>
                                                            </div>
                                                          @endforeach
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1" class="form-label"><b>Dokumen Pendukung yang ditampilkan</b></label>
                                                                <br/>
                                                                @foreach($dokumenpendukung2 as $dokumen2)
                                                                      <div class="row">
                                                                        <div class="col-md-1"></div>
                                                                        <div class="col-md-10">
                                                                          <!-- <input type="checkbox" value="{{ $dokumen2->id_dokumen }}" name="id_dokumen[]" id="id_dokumen" hidden /> -->
                                                                          <input type="checkbox" name="is_send[]" value="{{ $dokumen2->id_dokumen }}" id="is_send" checked disabled="" />
                                                                              <a href="{{ url('/').'/dokumen/'.$dokumen2->nama_file }}">{{ $dokumen2->nama_file }}</a>
                                                                        </div>
                                                                        <div class="col-md-1"></div>
                                                                      </div>
                                                                @endforeach
                                                            </div>
                                                          <div class="modal-footer" style="justify-content: center;">
                                                            <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                          </div>
                                                        </form>
                                                      </div>
                                                  </div>
                                      </div>
                              @elseif($DetailPengaduan->tl_by == 4)
                                <hr>
                                <h4>Status Tindak Lanjut Pengaduan</h4>
                                    <table id="example2" class="table table-bordered table-striped text-center">
                                      <thead>
                                          <tr>
                                            <th>No</th>
                                            <th>PIC</th>
                                            <th>Subbid</th>
                                            <th>Status Tindak Lanjut</th>
                                            <th>Waktu Lapor Pengaduan</th>
                                            <th>Waktu Update Tindak Lanjut</th>
                                          </tr>
                                          </thead> 
                                          <tbody>
                                          @foreach($PIC as $pic)
                                          <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $pic->name }}</td>
                                            <td>{{ $pic->subbid_id }}</td>
                                            @if($pic->status_pic == 1 || $pic->status_pic == 2)
                                              <td><button type="button" class="btn btn-warning">{{$pic->mstr_status_pic_ket}}</button></td>
                                              @elseif($pic->status_pic == 3)
                                              <td><button type="button" class="btn btn-success">{{$pic->mstr_status_pic_ket}}</button></td>
                                              @elseif($pic->status_pic == 4)
                                              <td><button type="button" class="btn btn-danger">{{$pic->mstr_status_pic_ket}}</button></td>
                                            @endif
                                            <td>{{date('d M Y H:i', strtotime($pic->created_at))}}</td>
                                            <td>{{date('d M Y H:i', strtotime($pic->pic_updated_at))}}</td>
                                          </tr>
                                        @endforeach
                                      </tbody>
                                    </table>
                                    <hr>
                                            <div class="row">
                                                        <div class="col-md-3">
                                                        </div> 
                                                        <div class="col-md-6 text-center">
                                                          <a href="{{ action('App\Http\Controllers\KapusController@PengaduanSelesai') }}" class="btn btn-secondary">Kembali</a>
                                                          <button type="button" class="btn btn-success" data-toggle='modal' data-target="#ModalFinalAnswer">Lihat Jawaban Final</button>
                                                        </div>
                                                        <div class="col-md-3">
                                                        </div>
                                            </div>
                                            <br>

                                      <div class="modal fade" id="ModalFinalAnswer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <h3 class="modal-title" id="exampleModalLabel">Jawaban Final</h3>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                      </div>
                                                      <div class="modal-body">
                                                        <form action="" method="POST" enctype="multipart/form-data">
                                                          @foreach($final_answer as $finalanswer)
                                                            <div class="form-group">
                                                              <label for="exampleInputEmail1" class="form-label"><b>Jawaban Final</b></label>
                                                              <textarea class="tiny" name="final_answer">
                                                                {!!$finalanswer->final_answer!!}
                                                              </textarea>
                                                            </div>
                                                          @endforeach
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1" class="form-label"><b>Dokumen Pendukung yang ditampilkan</b></label>
                                                                <br/>
                                                                @foreach($dokumenpendukung2 as $dokumen2)
                                                                      <div class="row">
                                                                        <div class="col-md-1"></div>
                                                                        <div class="col-md-10">
                                                                          <!-- <input type="checkbox" value="{{ $dokumen2->id_dokumen }}" name="id_dokumen[]" id="id_dokumen" hidden /> -->
                                                                          <input type="checkbox" name="is_send[]" value="{{ $dokumen2->id_dokumen }}" id="is_send" checked disabled="" />
                                                                              <a href="{{ url('/').'/dokumen/'.$dokumen2->nama_file }}">{{ $dokumen2->nama_file }}</a>
                                                                        </div>
                                                                        <div class="col-md-1"></div>
                                                                      </div>
                                                                @endforeach
                                                            </div>
                                                          <div class="modal-footer" style="justify-content: center;">
                                                            <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                          </div>
                                                        </form>
                                                      </div>
                                                  </div>
                                      </div>
                              @elseif($DetailPengaduan->tl_by == 5)
                                <hr>
                                <h4>Status Tindak Lanjut Pengaduan</h4>
                                    <table id="example2" class="table table-bordered table-striped text-center">
                                      <thead>
                                          <tr>
                                            <th>No</th>
                                            <th>PIC</th>
                                            <th>Status Tindak Lanjut</th>
                                            <th>Waktu Lapor Pengaduan</th>
                                            <th>Waktu Update Tindak Lanjut</th>
                                          </tr>
                                          </thead> 
                                          <tbody>
                                          @foreach($kapus as $kapuss)
                                          <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>Kepala Pusbin JFA</td>
                                            @if($kapuss->status_pic == 1 || $kapuss->status_pic == 2)
                                              <td><button type="button" class="btn btn-warning">{{$kapuss->mstr_status_pic_ket}}</button></td>
                                              @elseif($kapuss->status_pic == 3)
                                              <td><button type="button" class="btn btn-success">{{$kapuss->mstr_status_pic_ket}}</button></td>
                                              @elseif($kapuss->status_pic == 4)
                                              <td><button type="button" class="btn btn-danger">{{$kapuss->mstr_status_pic_ket}}</button></td>
                                            @endif
                                            <td>{{date('d M Y H:i', strtotime($kapuss->created_at))}}</td>
                                            <td>{{date('d M Y H:i', strtotime($kapuss->kapus_updated_at))}}</td>
                                          </tr>
                                          </tbody>
                                        @endforeach
                                    </table>
                                            <hr>
                                            <div class="row">
                                                        <div class="col-md-3">
                                                        </div> 
                                                        <div class="col-md-6 text-center">
                                                          <a href="{{ action('App\Http\Controllers\KapusController@PengaduanSelesai') }}" class="btn btn-secondary">Kembali</a>
                                                          <button type="button" class="btn btn-success" data-toggle='modal' data-target="#ModalFinalAnswer">Lihat Jawaban Final</button>
                                                        </div>
                                                        <div class="col-md-3">
                                                        </div>
                                            </div>
                                            <br>

                                      <div class="modal fade" id="ModalFinalAnswer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <h3 class="modal-title" id="exampleModalLabel">Jawaban Final</h3>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                      </div>
                                                      <div class="modal-body">
                                                        <form action="" method="POST" enctype="multipart/form-data">
                                                          @foreach($final_answer as $finalanswer)
                                                            <div class="form-group">
                                                              <label for="exampleInputEmail1" class="form-label"><b>Jawaban Final</b></label>
                                                              <textarea class="tiny" name="final_answer">
                                                                {!!$finalanswer->final_answer!!}
                                                              </textarea>
                                                            </div>
                                                          @endforeach
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1" class="form-label"><b>Dokumen Pendukung yang ditampilkan</b></label>
                                                                <br/>
                                                                @foreach($dokumenpendukung2 as $dokumen2)
                                                                      <div class="row">
                                                                        <div class="col-md-1"></div>
                                                                        <div class="col-md-10">
                                                                          <!-- <input type="checkbox" value="{{ $dokumen2->id_dokumen }}" name="id_dokumen[]" id="id_dokumen" hidden /> -->
                                                                          <input type="checkbox" name="is_send[]" value="{{ $dokumen2->id_dokumen }}" id="is_send" checked disabled="" />
                                                                              <a href="{{ url('/').'/dokumen/'.$dokumen2->nama_file }}">{{ $dokumen2->nama_file }}</a>
                                                                        </div>
                                                                        <div class="col-md-1"></div>
                                                                      </div>
                                                                @endforeach
                                                            </div>
                                                          <div class="modal-footer" style="justify-content: center;">
                                                            <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                          </div>
                                                        </form>
                                                      </div>
                                                  </div>
                                      </div>
                              @endif





          </div>
        </div>
      </div>
    </section><!-- End Featured Services Section -->
  </main><!-- End #main -->

@endsection

@section('js-plus')
<!-- <script src="https://cdn.tiny.cloud/1/naiean50arcvcg7c4k08y4vbuuu0sg1n4s3q5jyab04r7rhi/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> -->
  <script src="https://cdn.tiny.cloud/1/vbwit9dpespn4ppnyghi8a2obi5fgx5tzbd3l9smgjbcq6vh/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<script>
  tinymce.init({
    selector: "textarea.tiny",
    menubar: false,
    readonly : 1,
    plugins: [
    "advlist autolink lists link image charmap print preview anchor",
    "searchreplace visualblocks code fullscreen",
    "insertdatetime media table paste",
    "autoresize"
    ],

    image_title: true,
    automatic_uploads: true,
    file_picker_types: 'image',

    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",

    file_picker_callback: function (cb, value, meta) {
      var input = document.createElement('input');
      input.setAttribute('type', 'file');
      input.setAttribute('accept', 'image/*');


      input.onchange = function () {
        var file = this.files[0];

        var reader = new FileReader();
        reader.onload = function () {

          var id = 'blobid' + (new Date()).getTime();
          var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
          var base64 = reader.result.split(',')[1];
          var blobInfo = blobCache.create(id, file, base64);
          blobCache.add(blobInfo);

          cb(blobInfo.blobUri(), { title: file.name });
        };
        reader.readAsDataURL(file);
      };

      input.click();
    }
  });

  $.extend(M.Modal.prototype, {
    _handleFocus(e) {
      if (!this.el.contains(e.target) && this._nthModalOpened === M.Modal._modalsOpen && document.defaultView.getComputedStyle(e.target, null).zIndex < 1002) {
        this.el.focus();
      }
    }
  });
</script>
@endsection
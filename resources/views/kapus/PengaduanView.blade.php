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
                        <textarea rows="4" style="width: 100%">{{$DetailPengaduan->judul_pelanggaran}}</textarea>
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
                <!-- END ROW -->
                @endforeach

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
                        <label><b>Kategori pengaduan belum dipilih</b></label>
                        @endif
                      </div>
                      <div class="col-md-1">
                      </div>
                </div>

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

                
                @if($DetailPengaduan->status_pengaduan == 3)
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
                                  <!-- <th>Assigned By</th> -->
                                </tr>
                                </thead> 
                                <tbody>
                                @foreach($koordinator as $koordinator)
                                <tr>
                                  <td>{{ $loop->iteration }}</td>
                                  <td>Koordinator</td>
                                  <td>{{ $koordinator->bidang_id }}</td>
                                  @if($koordinator->has_picked == 1)
                                      @if($koordinator->is_answering == 1)
                                            <td><i class="fa fa-check-circle" style="color:green"></i> Pengaduan akan ditindaklanjuti Koordinator</td>
                                      @else
                                            <td><i class="fa fa-check-circle" style="color:green"></i> Pengaduan akan ditindaklanjuti Subkoordinator</td>
                                      @endif
                                  @else
                                  <td><button type="button" class="btn btn-warning">Penanggung Jawab Pengaduan Belum Dipilih</button></td>
                                  @endif
                                  <td>{{date('d M Y H:i', strtotime($koordinator->created_at))}}</td>
                                  <td>{{date('d M Y H:i', strtotime($koordinator->koor_updated_at))}}</td>
                                  <!-- <td>{{$koordinator->nama_role}}</td> -->
                                </tr>
                                </tbody>
                              @endforeach
                          </table>
                        <hr>
                    <div class="row">
                          <div class="col-md-3">
                          </div>  
                          <div class="col-md-6 text-center">
                            <a href="{{ action('App\Http\Controllers\KapusController@PengaduanDiproses') }}" class="btn btn-secondary">Kembali</a>
                          </div>
                          <div class="col-md-3">
                          </div>
                    </div>
                    <br>
                @elseif($DetailPengaduan->status_pengaduan == 4)
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
                                  @if($subkoordinator->has_picked == 1)
                                      @if($subkoordinator->is_answering == 1)
                                            <td><i class="fa fa-check-circle" style="color:green"></i> Pengaduan akan ditindaklanjuti Suboordinator</td>
                                      @else
                                            <td><i class="fa fa-check-circle" style="color:green"></i> Pengaduan akan ditindaklanjuti Pegawai</td>
                                      @endif
                                  @else
                                  <td><button type="button" class="btn btn-warning">Penanggung Jawab Pengaduan Belum Dipilih</button></td>
                                  @endif
                                  <td>{{date('d M Y H:i', strtotime($subkoordinator->created_at))}}</td>
                                  <td>{{date('d M Y H:i', strtotime($subkoordinator->subkoor_updated_at))}}</td>
                                </tr>
                                </tbody>
                              @endforeach
                          </table>
                        <hr>
                      <div class="row">
                            <div class="col-md-3">
                            </div>  
                            <div class="col-md-6 text-center">
                              <a href="{{ action('App\Http\Controllers\KapusController@PengaduanDiproses') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                            <div class="col-md-3">
                            </div>
                      </div>
                      <br>
                @elseif($DetailPengaduan->status_pengaduan == 5)
                    @foreach($subbid as $subbid)
                            <hr>
                            <div class="row">
                              <div class="col-md-1"></div>
                              <div class="col-md-10">
                                <label style="color:black;font-size: 28px;"><b><u>HASIL TINDAK LANJUT</u></b></label>
                              </div>
                              <div class="col-md-1"></div>
                            </div>
                            @forelse($Tindaklanjut as $Tindaklanjuts)
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
                                      <br>
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
                                      <br>
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
                            @empty
                                <div class="row">
                                  <div class="col-md-1"></div>
                                  <div class="col-md-10">
                                    <label style="color:black;">Anda akan melihat hasil tindak lanjut disini</label>
                                  </div>
                                  <div class="col-md-1"></div>
                                </div>
                            @endforelse
                    @endforeach
                        
                        @if($Tindaklanjuts->tl_by == 2)
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
                                          @foreach($koordinator as $koordinator)
                                          <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>Koordinator</td>
                                            <td>{{ $koordinator->bidang_id }}</td>
                                            @if($koordinator->status_pic == 1 || $koordinator->status_pic == 2)
                                              <td><button type="button" class="btn btn-warning">{{$koordinator->mstr_status_pic_ket}}</button></td>
                                              @elseif($koordinator->status_pic == 3)
                                              <td><button type="button" class="btn btn-success">{{$koordinator->mstr_status_pic_ket}}</button></td>
                                              @elseif($koordinator->status_pic == 4)
                                              <td><button type="button" class="btn btn-danger">{{$koordinator->mstr_status_pic_ket}}</button></td>
                                            @endif
                                            <td>{{date('d M Y H:i', strtotime($koordinator->created_at))}}</td>
                                            <td>{{date('d M Y H:i', strtotime($koordinator->koor_updated_at))}}</td>
                                            <td>{{$koordinator->nama_role}}</td>
                                          </tr>
                                          </tbody>
                                        @endforeach
                                    </table>
                        @elseif($Tindaklanjuts->tl_by == 3)
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
                                          @foreach($subkoordinator as $koordinator)
                                          <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>Subkoordinator</td>
                                            <td>{{ $koordinator->subbid_id }}</td>
                                            @if($koordinator->status_pic == 1 || $koordinator->status_pic == 2)
                                              <td><button type="button" class="btn btn-warning">{{$koordinator->mstr_status_pic_ket}}</button></td>
                                              @elseif($koordinator->status_pic == 3)
                                              <td><button type="button" class="btn btn-success">{{$koordinator->mstr_status_pic_ket}}</button></td>
                                              @elseif($koordinator->status_pic == 4)
                                              <td><button type="button" class="btn btn-danger">{{$koordinator->mstr_status_pic_ket}}</button></td>
                                            @endif
                                            <td>{{date('d M Y H:i', strtotime($koordinator->created_at))}}</td>
                                            <td>{{date('d M Y H:i', strtotime($koordinator->subkoor_updated_at))}}</td>
                                          </tr>
                                          </tbody>
                                        @endforeach
                                    </table>
                        @elseif($Tindaklanjuts->tl_by == 4)
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
                                          </tbody>
                                        @endforeach
                                    </table>
                        @elseif($Tindaklanjuts->tl_by == 5)
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
                                          @foreach($kapus as $kapus)
                                          <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>Kepala Pusbin JFA</td>
                                            @if($kapus->status_pic == 1 || $kapus->status_pic == 2)
                                              <td><button type="button" class="btn btn-warning">{{$kapus->mstr_status_pic_ket}}</button></td>
                                              @elseif($kapus->status_pic == 3)
                                              <td><button type="button" class="btn btn-success">{{$kapus->mstr_status_pic_ket}}</button></td>
                                              @elseif($kapus->status_pic == 4)
                                              <td><button type="button" class="btn btn-danger">{{$kapus->mstr_status_pic_ket}}</button></td>
                                            @endif
                                            <td>{{date('d M Y H:i', strtotime($kapus->created_at))}}</td>
                                            <td>{{date('d M Y H:i', strtotime($kapus->kapus_updated_at))}}</td>
                                          </tr>
                                          </tbody>
                                        @endforeach
                                    </table>
                        @endif      

                        <hr>
                        <div class="row">
                              <div class="col-md-3">
                              </div>  
                              <div class="col-md-6 text-center">
                                <label><b>Menunggu Admin melakukan <i>input final answer</i></b></label>
                                <br>
                                <a href="{{ action('App\Http\Controllers\KapusController@PengaduanDiproses') }}" class="btn btn-secondary">Kembali</a>
                              </div>
                              <div class="col-md-3">
                              </div>
                        </div>
                        <br>
                @elseif($DetailPengaduan->status_pengaduan == 7)
                    @foreach($subbidd as $subbid)
                        <hr>
                        <div class="row">
                          <div class="col-md-1"></div>
                          <div class="col-md-10">
                            <label style="color:black;font-size: 28px;"><b><u>HASIL TINDAK LANJUT #{{ $subbid->bidang_id}}</u></b></label>
                          </div>
                          <div class="col-md-1"></div>
                        </div>
                        @forelse($Tindaklanjut as $Tindaklanjuts)
                        @if($Tindaklanjuts->bidang_id == $subbid->bidang_id)
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
                        <br>
                        @endif
                        @empty
                        <div class="row">
                          <div class="col-md-1"></div>
                          <div class="col-md-10">
                            <label style="color:black;">Anda akan melihat hasil tindak lanjut disini</label>
                          </div>
                          <div class="col-md-1"></div>
                        </div>
                        @endforelse
                    @endforeach
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
                                @foreach($koordinator as $koordinator)
                                <tr>
                                  <td>{{ $loop->iteration }}</td>
                                  <td>Koordinator</td>
                                  <td>{{ $koordinator->bidang_id }}</td>
                                  @if($koordinator->status_pic == 1 || $koordinator->status_pic == 2)
                                    <td><button type="button" class="btn btn-warning">{{$koordinator->mstr_status_pic_ket}}</button></td>
                                    @elseif($koordinator->status_pic == 3)
                                    <td><button type="button" class="btn btn-success">{{$koordinator->mstr_status_pic_ket}}</button></td>
                                    @elseif($koordinator->status_pic == 4)
                                    <td><button type="button" class="btn btn-danger">{{$koordinator->mstr_status_pic_ket}}</button></td>
                                  @endif
                                  <td>{{date('d M Y H:i', strtotime($koordinator->created_at))}}</td>
                                  <td>{{date('d M Y H:i', strtotime($koordinator->koor_updated_at))}}</td>
                                  <td>{{$koordinator->nama_role}}</td>
                                </tr>
                                </tbody>
                              @endforeach
                          </table>
                        <hr>
                      <div class="row">
                            <div class="col-md-3">
                            </div>  
                            <div class="col-md-6 text-center">
                              <a href="{{ action('App\Http\Controllers\KapusController@PengaduanDiproses') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                            <div class="col-md-3">
                            </div>
                      </div>
                      <br>
                @elseif($DetailPengaduan->status_pengaduan == 8)
                    @foreach($subbid1 as $subbid)
                        <hr>
                        <div class="row">
                          <div class="col-md-1"></div>
                          <div class="col-md-10">
                            <label style="color:black;font-size: 28px;"><b><u>HASIL TINDAK LANJUT #{{ $subbid->subbid_id}}</u></b></label>
                          </div>
                          <div class="col-md-1"></div>
                        </div>
                        @forelse($Tindaklanjut as $Tindaklanjuts)
                        @if($Tindaklanjuts->subbid_id == $subbid->subbid_id)
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
                        <br>
                        @endif
                        @empty
                        <div class="row">
                          <div class="col-md-1"></div>
                          <div class="col-md-10">
                            <label style="color:black;">Anda akan melihat hasil tindak lanjut disini</label>
                          </div>
                          <div class="col-md-1"></div>
                        </div>
                        @endforelse
                    @endforeach
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
                                </tr>
                                </thead> 
                                <tbody>
                                @foreach($subkoordinator as $subkoordinator)
                                <tr>
                                  <td>{{ $loop->iteration }}</td>
                                  <td>Subkoordinator</td>
                                  <td>{{ $subkoordinator->subbid_id }}</td>
                                  @if($subkoordinator->status_pic == 1 || $subkoordinator->status_pic == 2 )
                                    <td><button type="button" class="btn btn-warning">{{$subkoordinator->mstr_status_pic_ket}}</button></td>
                                    @elseif($subkoordinator->status_pic == 3)
                                    <td><button type="button" class="btn btn-success">{{$subkoordinator->mstr_status_pic_ket}}</button></td>
                                    @elseif($subkoordinator->status_pic == 4)
                                    <td><button type="button" class="btn btn-danger">{{$subkoordinator->mstr_status_pic_ket}}</button></td>
                                  @endif
                                  <td>{{date('d M Y H:i', strtotime($subkoordinator->created_at))}}</td>
                                  <td>{{date('d M Y H:i', strtotime($subkoordinator->subkoor_updated_at))}}</td>
                                </tr>
                                </tbody>
                              @endforeach
                          </table>
                        <hr>
                      <div class="row">
                            <div class="col-md-3">
                            </div>  
                            <div class="col-md-6 text-center">
                              <a href="{{ action('App\Http\Controllers\KapusController@PengaduanDiproses') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                            <div class="col-md-3">
                            </div>
                      </div>
                      <br>
                @elseif($DetailPengaduan->status_pengaduan == 9)
                        @foreach($subbid2 as $subbid)
                        <hr>
                        <div class="row">
                          <div class="col-md-1"></div>
                          <div class="col-md-10">
                            <label style="color:black;font-size: 28px;"><b><u>HASIL TINDAK LANJUT #{{ $subbid->subbid_id}}</u></b></label>
                          </div>
                          <div class="col-md-1"></div>
                        </div>
                        @forelse($Tindaklanjut as $Tindaklanjuts)
                        @if($Tindaklanjuts->subbid_id == $subbid->subbid_id)
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
                        <br>
                        @endif
                        @empty
                        <div class="row">
                          <div class="col-md-1"></div>
                          <div class="col-md-10">
                            <label style="color:black;">Anda akan melihat hasil tindak lanjut disini</label>
                          </div>
                          <div class="col-md-1"></div>
                        </div>
                        @endforelse
                    @endforeach
                        <hr>
                        <h4>Status Tindak Lanjut Pengaduan</h4>
                          <table id="example2" class="table table-bordered table-striped text-center">
                            <thead>
                                <tr>
                                  <th>No</th>
                                  <th>PIC</th>
                                  <th>Nama</th>
                                  <th>Subbid</th>
                                  <th>Status Tindak Lanjut</th>
                                  <th>Waktu Lapor Pengaduan</th>
                                  <th>Waktu Update Tindak Lanjut</th>
                                </tr>
                                </thead> 
                                <tbody>
                                @foreach($PIC as $PIC)
                                <tr>
                                  <td>{{ $loop->iteration }}</td>
                                  <td>PIC</td>
                                  <td>{{ $PIC->name }}</td>
                                  <td>{{ $PIC->subbid_id }}</td>
                                  @if($PIC->status_pic == 1 || $PIC->status_pic == 2 )
                                    <td><button type="button" class="btn btn-warning">{{$PIC->mstr_status_pic_ket}}</button></td>
                                    @elseif($PIC->status_pic == 3)
                                    <td><button type="button" class="btn btn-success">{{$PIC->mstr_status_pic_ket}}</button></td>
                                    @elseif($PIC->status_pic == 4)
                                    <td><button type="button" class="btn btn-danger">{{$PIC->mstr_status_pic_ket}}</button></td>
                                  @endif
                                  <td>{{date('d M Y H:i', strtotime($PIC->created_at))}}</td>
                                  <td>{{date('d M Y H:i', strtotime($PIC->pic_updated_at))}}</td>
                                </tr>
                                </tbody>
                              @endforeach
                          </table>
                        <hr>
                      <div class="row">
                            <div class="col-md-3">
                            </div>  
                            <div class="col-md-6 text-center">
                              <a href="{{ action('App\Http\Controllers\KapusController@PengaduanDiproses') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                            <div class="col-md-3">
                            </div>
                      </div>
                      <br>
                @elseif($DetailPengaduan->status_pengaduan == 1)
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
                                <tr>
                                  <td>1</td>
                                  <td>Admin</td>
                                  <td><button type="button" class="btn btn-warning">Penanggung Jawab Pengaduan Belum Dipilih</button></td>
                                  <td>{{date('d M Y H:i', strtotime($DetailPengaduan->created_at))}}</td>
                                  <td>{{date('d M Y H:i', strtotime($DetailPengaduan->updated_at))}}</td>
                                </tr>
                                </tbody>
                          </table>
                        <hr>
                    <div class="row">
                          <div class="col-md-3">
                          </div>  
                          <div class="col-md-6 text-center">
                            <a href="{{ action('App\Http\Controllers\KapusController@PengaduanDiproses') }}" class="btn btn-secondary">Kembali</a>
                          </div>
                          <div class="col-md-3">
                          </div>
                    </div>
                    <br>
                @endif

            </div>
          </div>
        </div>
      </div>
    </section><!-- End Featured Services Section -->
  </main><!-- End #main -->

@endsection
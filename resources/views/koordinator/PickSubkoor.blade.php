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
                        <textarea readonly style="width: 100%">{{$DetailPengaduan->judul_pelanggaran}}</textarea>
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
                
                        <hr>
                        <h4>Status Tindak Lanjut Pengaduan</h4>
                        <!-- <label>{{session()->get('subbid')}}</label> -->
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
                                  @if($koordinator->koor_id == session()->get('user_id'))
                                      @if($koordinator->has_picked == 1)
                                        @if($koordinator->is_answering == 1)
                                            <td><i class="fa fa-check-circle" style="color:green"></i> Pengaduan akan ditindaklanjuti Koordinator</td>
                                        @else
                                            <td><i class="fa fa-check-circle" style="color:green"></i> Pengaduan akan ditindaklanjuti Subkoordinator</td>
                                        @endif
                                      @else
                                        @if($countpick == 0)
                                            <td class="text-center">
                                              <button 
                                              type="button" 
                                              class="btn icon btn-warning"
                                              data-toggle="modal" 
                                              data-target="#edit-{{ $koordinator->mstr_pengaduan_id }}">Pilih Subkoordinator</button>
                                            </td>
                                        @else
                                          @if($willanswer > 0)
                                            <td class="text-center">
                                              <button 
                                              type="button" 
                                              class="btn icon btn-warning"
                                              data-toggle="modal" 
                                              data-target="#edit2-{{ $koordinator->mstr_pengaduan_id }}">Pilih Subkoordinator</button>
                                            </td>
                                          @else
                                            <td class="text-center">
                                              <button 
                                              type="button" 
                                              class="btn icon btn-warning"
                                              data-toggle="modal" 
                                              data-target="#edit3-{{ $koordinator->mstr_pengaduan_id }}">Pilih Subkoordinator</button>
                                            </td>
                                          @endif
                                        @endif
                                      @endif
                                  @else
                                      @if($koordinator->has_picked == 1)
                                          @if($koordinator->is_answering == 1)
                                            <td><i class="fa fa-check-circle" style="color:green"></i> Pengaduan akan ditindaklanjuti Koordinator</td>
                                          @else
                                            <td><i class="fa fa-check-circle" style="color:green"></i> Pengaduan akan ditindaklanjuti Subkoordinator</td>
                                          @endif
                                      @else
                                        <td class="text-center">
                                          <i class="fas fa-exclamation-circle" style="color:red"></i> Penanggung Jawab Pengaduan Belum Dipilih
                                        </td>
                                      @endif
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
                        <a href="{{ action('App\Http\Controllers\KoorController@PengaduanBaru') }}" class="btn btn-secondary">Kembali</a>
                      </div>
                      <div class="col-md-3">
                      </div>
                </div>
                <br>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Featured Services Section -->
  </main><!-- End #main -->


                  @foreach($idt_koordinator as $pengaduan_new)
                    <div class="modal fade" id="edit-{{ $koordinator->mstr_pengaduan_id }}" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h3 class="modal-title text-center" id="exampleModalLabel">Pilih Subkoor Penanggung Jawab</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form class="form-prevent" action="{{ action('App\Http\Controllers\KoorController@PilihSubkoor', [$pengaduan_new->id]) }}" method="POST">
                              <div class="modal-body">
                              @csrf
                                <div class="form-group">
                                  <label for="exampleInputEmail1" class="form-label">No Tiket</label>
                                  <input name="no_tiket" type="text" class="form-control" id="no_tiket" value="{{ $pengaduan_new->no_tiket }}" disabled>
                                  <input name="id" type="text" class="form-control" id="id" value="{{ $pengaduan_new->id }}" hidden>
                                  <input name="idt_koordinator" type="text" class="form-control" id="idt_koordinator" value="{{ $pengaduan_new->idt_koordinator }}" hidden>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                      <label for="exampleInputEmail1" class="form-label">Menindaklanjuti Sendiri</label>
                                      <br/>
                                        <input class="is_answering" type="radio" id="is_answering_yes" name="is_answering" value="1">
                                        <label for="html">Ya</label><label for="html">  </label>
                                        <input class="is_answering" type="radio" id="is_answering_no" name="is_answering" value="0" checked="checked">
                                        <label for="css">Tidak</label>
                                    </div>
                                </div> 
                                <!-- IF subbid user (ambil data subbid) then show checkbox sesuai bidangnya -->
                                  <div id="subkoor">
                                    @if(substr(session()->get('subbid'),1,1) == 1)
                                      <div class="row">
                                        <div class="form-group">
                                          <label for="exampleInputEmail1" class="form-label">Subkoordinator Penanggung Jawab</label>
                                          <br/>
                                          <div class="form-check form-check-inline">
                                            <input class="bidang" name="pic_subbid[]" type="checkbox" id="inlineCheckbox1" value="11">
                                            <label class="form-check-label" for="inlineCheckbox1">Bidang 1.1</label>
                                          </div>
                                        </div>
                                      </div> 
                                      <div class="row">
                                        <div class="form-group">
                                          <div class="form-check form-check-inline">
                                            <input class="bidang" name="pic_subbid[]" type="checkbox" id="inlineCheckbox1" value="12">
                                            <label class="form-check-label" for="inlineCheckbox1">Bidang 1.2</label>
                                          </div>
                                        </div> 
                                      </div>
                                      @elseif(substr(session()->get('subbid'),1,1) == 2)
                                      <div class="row">
                                        <div class="form-group">
                                          <label for="exampleInputEmail1" class="form-label">Subkoordinator Penanggung Jawab</label>
                                          <br/>
                                          <div class="form-check form-check-inline">
                                            <input class="bidang" name="pic_subbid[]" type="checkbox" id="inlineCheckbox2" value="21">
                                            <label class="form-check-label" for="inlineCheckbox2">Bidang 2.1</label>
                                          </div>
                                        </div>
                                      </div> 
                                      <div class="row">
                                        <div class="form-group">
                                          <div class="form-check form-check-inline">
                                            <input class="bidang" name="pic_subbid[]" type="checkbox" id="inlineCheckbox2" value="22">
                                            <label class="form-check-label" for="inlineCheckbox2">Bidang 2.2</label>
                                          </div>
                                        </div> 
                                      </div>
                                      @elseif(substr(session()->get('subbid'),1,1) == 3)
                                      <div class="row">
                                        <div class="form-group">
                                          <label for="exampleInputEmail1" class="form-label">Subkoordinator Penanggung Jawab</label>
                                          <br/>
                                          <div class="form-check form-check-inline">
                                            <input class="bidang" name="pic_subbid[]" type="checkbox" id="inlineCheckbox2" value="31">
                                            <label class="form-check-label" for="inlineCheckbox2">Bidang 3.1</label>
                                          </div>
                                        </div>
                                      </div> 
                                      <div class="row">
                                        <div class="form-group">
                                          <div class="form-check form-check-inline">
                                            <input class="bidang" name="pic_subbid[]" type="checkbox" id="inlineCheckbox2" value="32">
                                            <label class="form-check-label" for="inlineCheckbox2">Bidang 3.2</label>
                                          </div>
                                        </div> 
                                      </div>
                                      @endif
                                  </div>
                              </div>
                              <div class="modal-footer">
                                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button class="btn btn-info button-prevent" type="submit">
                                  <!-- spinner-border adalah component bawaan bootstrap untuk menampilakn roda berputar  -->
                                  <div class="spinner"><i role="status" class="spinner-border spinner-border-sm"></i> Submit </div>
                                  <div class="hide-text">Submit</div>
                                </button>
                              </div>
                              </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  @endforeach

                  @foreach($idt_koordinator as $pengaduan_new)
                    <div class="modal fade" id="edit2-{{ $koordinator->mstr_pengaduan_id }}" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h3 class="modal-title text-center" id="exampleModalLabel">Pilih Subkoor Penanggung Jawab</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form class="form-prevent" action="{{ action('App\Http\Controllers\KoorController@PilihSubkoor', [$pengaduan_new->id]) }}" method="POST">
                              <div class="modal-body">
                              @csrf
                                <div class="form-group">
                                  <label for="exampleInputEmail1" class="form-label">No Tiket</label>
                                  <input name="no_tiket" type="text" class="form-control" id="no_tiket" value="{{ $pengaduan_new->no_tiket }}" disabled>
                                  <input name="id" type="text" class="form-control" id="id" value="{{ $pengaduan_new->id }}" hidden>
                                  <input name="idt_koordinator" type="text" class="form-control" id="idt_koordinator" value="{{ $pengaduan_new->idt_koordinator }}" hidden>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                      <label for="exampleInputEmail1" class="form-label">Menindaklanjuti Sendiri</label>
                                      <br/>
                                        <input class="is_answering" type="radio" id="is_answering_yes" name="is_answering" value="1" checked="checked">
                                        <label for="html">Ya</label><label for="html">  </label>
                                    </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button class="btn btn-info button-prevent" type="submit">
                                  <!-- spinner-border adalah component bawaan bootstrap untuk menampilakn roda berputar  -->
                                  <div class="spinner"><i role="status" class="spinner-border spinner-border-sm"></i> Submit </div>
                                  <div class="hide-text">Submit</div>
                                </button>
                              </div>
                              </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  @endforeach

                  @foreach($idt_koordinator as $pengaduan_new)
                    <div class="modal fade" id="edit3-{{ $koordinator->mstr_pengaduan_id }}" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h3 class="modal-title text-center" id="exampleModalLabel">Pilih Subkoor Penanggung Jawab</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form class="form-prevent" action="{{ action('App\Http\Controllers\KoorController@PilihSubkoor', [$pengaduan_new->id]) }}" method="POST">
                              <div class="modal-body">
                              @csrf
                                <div class="form-group">
                                  <label for="exampleInputEmail1" class="form-label">No Tiket</label>
                                  <input name="no_tiket" type="text" class="form-control" id="no_tiket" value="{{ $pengaduan_new->no_tiket }}" disabled>
                                  <input name="id" type="text" class="form-control" id="id" value="{{ $pengaduan_new->id }}" hidden>
                                  <input name="idt_koordinator" type="text" class="form-control" id="idt_koordinator" value="{{ $pengaduan_new->idt_koordinator }}" hidden>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                      <label for="exampleInputEmail1" class="form-label">Menindaklanjuti Sendiri</label>
                                      <br/>
                                        <input class="is_answering" type="radio" id="is_answering_no" name="is_answering" value="0" checked="checked">
                                        <label for="css">Tidak</label>
                                    </div>
                                </div> 
                                <!-- IF subbid user (ambil data subbid) then show checkbox sesuai bidangnya -->
                                  <div id="subkoor">
                                    @if(substr(session()->get('subbid'),0,1) == 1)
                                      <div class="row">
                                        <div class="form-group">
                                          <label for="exampleInputEmail1" class="form-label">Subkoordinator Penanggung Jawab</label>
                                          <br/>
                                          <div class="form-check form-check-inline">
                                            <input class="bidang" name="pic_subbid[]" type="checkbox" id="inlineCheckbox1" value="11">
                                            <label class="form-check-label" for="inlineCheckbox1">Bidang 1.1</label>
                                          </div>
                                        </div>
                                      </div> 
                                      <div class="row">
                                        <div class="form-group">
                                          <div class="form-check form-check-inline">
                                            <input class="bidang" name="pic_subbid[]" type="checkbox" id="inlineCheckbox1" value="12">
                                            <label class="form-check-label" for="inlineCheckbox1">Bidang 1.2</label>
                                          </div>
                                        </div> 
                                      </div>
                                      @elseif(substr(session()->get('subbid'),0,1) == 2)
                                      <div class="row">
                                        <div class="form-group">
                                          <label for="exampleInputEmail1" class="form-label">Subkoordinator Penanggung Jawab</label>
                                          <br/>
                                          <div class="form-check form-check-inline">
                                            <input class="bidang" name="pic_subbid[]" type="checkbox" id="inlineCheckbox2" value="21">
                                            <label class="form-check-label" for="inlineCheckbox2">Bidang 2.1</label>
                                          </div>
                                        </div>
                                      </div> 
                                      <div class="row">
                                        <div class="form-group">
                                          <div class="form-check form-check-inline">
                                            <input class="bidang" name="pic_subbid[]" type="checkbox" id="inlineCheckbox2" value="22">
                                            <label class="form-check-label" for="inlineCheckbox2">Bidang 2.2</label>
                                          </div>
                                        </div> 
                                      </div>
                                      @elseif(substr(session()->get('subbid'),0,1) == 3)
                                      <div class="row">
                                        <div class="form-group">
                                          <label for="exampleInputEmail1" class="form-label">Subkoordinator Penanggung Jawab</label>
                                          <br/>
                                          <div class="form-check form-check-inline">
                                            <input class="bidang" name="pic_subbid[]" type="checkbox" id="inlineCheckbox2" value="31">
                                            <label class="form-check-label" for="inlineCheckbox2">Bidang 3.1</label>
                                          </div>
                                        </div>
                                      </div> 
                                      <div class="row">
                                        <div class="form-group">
                                          <div class="form-check form-check-inline">
                                            <input class="bidang" name="pic_subbid[]" type="checkbox" id="inlineCheckbox2" value="32">
                                            <label class="form-check-label" for="inlineCheckbox2">Bidang 3.2</label>
                                          </div>
                                        </div> 
                                      </div>
                                      @endif
                                  </div>
                              </div>
                              <div class="modal-footer">
                                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button class="btn btn-info button-prevent" type="submit">
                                  <!-- spinner-border adalah component bawaan bootstrap untuk menampilakn roda berputar  -->
                                  <div class="spinner"><i role="status" class="spinner-border spinner-border-sm"></i> Submit </div>
                                  <div class="hide-text">Submit</div>
                                </button>
                              </div>
                              </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  @endforeach

@endsection

@section('js-plus')
<script>
$("input[id='is_answering_yes']").change(function() {
  $(".bidang").prop({ disabled: true, checked: false });
});

$("input[id='is_answering_no']").change(function() {
  $(".bidang").prop({ disabled: false});
});
</script>

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
@endsection
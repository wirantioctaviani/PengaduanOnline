@extends('pic.Master')

@section('content')
  <main id="main">
    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
      <div class="container text-center">
        <a href="{{ action('App\Http\Controllers\PicController@HomePic') }}"><i class="fas fa-home fa-2x"></i></a>
        <br>  
        <br>
      </div>


      @if(Session('Sukses'))
        <script>
            swal(`Berhasil!`, "Hasil Tindaklanjut Berhasil Diupdate", "success");
        </script>
      @endif

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
                        <textarea readonly name="judul_pelanggaran" style="width: 100%">{{$DetailPengaduan->judul_pelanggaran}}</textarea>
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
                        @else
                        <label>Pengaduan Personal</label>
                        @endif
                      </div>
                      <div class="col-md-1">
                      </div>
                </div>
                @endforeach
                <!-- END ROW -->

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


                  @foreach($subbid as $subbid)
                        <hr>
                        <div class="row">
                          <div class="col-md-1"></div>
                          <div class="col-md-10">
                            <label style="color:black;font-size: 28px;"><b><u>HASIL TINDAK LANJUT #{{ $subbid->subbid_id }}</u></b></label>
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
                @if($DetailPengaduan->status_pengaduan == 9)
                    @foreach($TrhPIC as $TrhPICs)
                          @if($TrhPICs->status_pic == 1 || $TrhPICs->status_pic == 2)
                          <div class="row">
                                <div class="col-md-3">
                                </div> 
                                <div class="col-md-6 text-center">
                                  <a href="{{ action('App\Http\Controllers\PicController@PengaduanDiprosess') }}" class="btn btn-secondary">Kembali</a>
                                  <button type="button" class="btn btn-info" data-toggle='modal' data-target="#ModalHasilTindakLanjut">Input Hasil Tindak Lanjut</button>
                                </div>
                                <div class="col-md-3">
                                </div>
                          </div>
                          @else
                          <div class="row">
                                <div class="col-md-3">
                                </div> 
                                <div class="col-md-6 text-center">
                                  <label>Anda sudah menyelesaikan proses tindak lanjut. Terima Kasih</label>
                                  <br>
                                  <a href="{{ action('App\Http\Controllers\PicController@PengaduanDiprosess') }}" class="btn btn-secondary">Kembali</a>
                                </div>
                                <div class="col-md-3">
                                </div>
                          </div>
                          @endif
                    @endforeach
                @endif


                <hr>
                <h4>Status Tindaklanjut PIC</h4>
                  <table id="example2" class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                          <th>No</th>
                          <th>PIC</th>
                          <th>Subbid</th>
                          <th>Status Tindaklanjut</th>
                          <th>Waktu Lapor Pengaduan</th>
                          <th>Update at</th>
                        </tr>
                        </thead> 
                        <tbody>
                        @foreach($PIC as $PIC)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $PIC->name }}</td>
                          <td>{{ $PIC->subbid_id }}</td>
                          @if($PIC->status_pic == 1 || $PIC->status_pic == 2)
                            <td><button type="button" class="btn btn-warning">{{$PIC->keterangan}}</button></td>
                            @elseif($PIC->status_pic == 3)
                            <td><button type="button" class="btn btn-success">{{$PIC->keterangan}}</button></td>
                            @elseif($PIC->status_pic == 4)
                            <td><button type="button" class="btn btn-danger">{{$PIC->keterangan}}</button></td>
                          @endif
                          <td>{{date('d M Y H:i', strtotime($PIC->waktu_pelaporan))}}</td>
                          <td>{{date('d M Y H:i', strtotime($PIC->pic_updated_at))}}</td>
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
                          <form class="form-prevent" action="{{ action('App\Http\Controllers\PicController@AddTindaklanjut') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                              <div class="form-group">
                                  <label for="exampleInputEmail1" class="form-label">Status Tindaklanjut</label>
                                  <br/>
                                  <select class="form-control form-select" name="status_tindaklanjut" id="status_tindaklanjut">
                                    @foreach($mstr_status_pic as $mstr_status_pics)
                                      <option value="{{ $mstr_status_pics->id_status_pic }}" {{$tindaklanjut->status_pic == $mstr_status_pics->id_status_pic  ? 'selected' : ''}}>{{ $mstr_status_pics->keterangan}}</option>
                                    @endforeach
                                  </select>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Detail Tindak Lanjut</label>
                                <textarea  name="tindaklanjut" class="tinymce" id="tindaklanjut"></textarea>
                                <span class="error" style="color: #a80000;font-weight: bold;"></span>
                                <input name="idt_pic" type="text" class="form-control" id="id" value="{{ $tindaklanjut->idt_pic}}" hidden>
                                <input name="mstr_pengaduan_id" type="text" class="form-control" id="id" value="{{ $tindaklanjut->mstr_pengaduan_id }}" hidden>
                              </div>
                              <div class="form-group after-add-more">
                                <label for="exampleInputEmail1" class="form-label">Upload File</label>
                                <div class="col-md-6" style="color:black;">
                                  <input type="file" name="files[]" multiple>
                                <button class="btn btn-success add-more" type="button">
                                  <i class="glyphicon glyphicon-plus">+</i> 
                                </button>
                                </div>
                              </div>
                            <div class="modal-footer">
                              <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                              <button class="btn btn-info button-prevent" type="submit" id="submitButton">
                                  <!-- spinner-border adalah component bawaan bootstrap untuk menampilakn roda berputar  -->
                                  <div class="spinner"><i role="status" class="spinner-border spinner-border-sm"></i> Submit </div>
                                  <div class="hide-text">Submit</div>
                              </button>
                            </div>
                          </form>
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

@section('js-plus')
<!-- <script src="https://cdn.tiny.cloud/1/naiean50arcvcg7c4k08y4vbuuu0sg1n4s3q5jyab04r7rhi/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> -->
  <script src="https://cdn.tiny.cloud/1/vbwit9dpespn4ppnyghi8a2obi5fgx5tzbd3l9smgjbcq6vh/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<script>
  tinymce.init({
    selector: "textarea.tiny",
    menubar: false,
    readonly : 0,
    plugins: [
    "advlist autolink lists charmap print preview anchor",
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

<script>
  $(function () {  
  $('.error').hide();
    tinymce.init({
        selector: ".tinymce",
        menubar: false,
        statusbar: false,
    //////////////////this was added to make the "required" attribute work///////////////////
        setup: function (editor) {
            editor.on('change', function () {
                tinymce.triggerSave();
        chkSubmit();
            });
        }
    //////////////////this was added to make the "required" attribute work///////////////////    
    });

  $(document).on('click', '#submitButton', chkSubmit);
    function chkSubmit() {
        var msg = $('.tinymce').val();
        var textmsg = $.trim($(msg).text());
          if (textmsg == '') {
            //alert('nogo');
            $('.error').show();
            $('.error').html('Silakan mengisi detail tindak lanjut');
            return false;
          }
          else{
            //alert(textmsg);
            $('.error').hide();
            $('.error').html('');
          }
      }
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
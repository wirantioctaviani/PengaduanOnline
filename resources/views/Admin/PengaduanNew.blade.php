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
      
      @if(Session('Sukses'))
        <script>
            swal(`Berhasil!`, "Penanggung Jawab Pengaduan Berhasil Dipilih", "success");
        </script>
      @endif

      @if(Session('Sukses2'))
        <script>
            swal(`Berhasil!`, "Tiket Pengaduan berhasil di close", "success");
        </script>
      @endif

      <div class="container" style="border: 5px">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12 border bg-light" style="height: 100%">
                <br>
                <h2 class="text-center">PENGADUAN BARU</h2>
                <br>
                  <table id="example" class="table table-striped table-bordered dt-responsive">
                    <thead class="text-center" style="background-color: #82b2ff;">
                        <tr>
                            <th>No</th>
                            <th>No Tiket</th>
                            <th>Pihak / Layanan yang Dilaporkan</th>
                            <th>Waktu Pelaporan</th>
                            <!-- <th>Waktu Update</th> -->
                            <th>Kategori Pengaduan</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pengaduan_new as $pengaduan_new)
                        <tr class="text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$pengaduan_new->no_tiket}}</td>
                            <td>{{$pengaduan_new->oranglayanan_terlapor}}</td>
                            <td>{{date("d M Y H:i", strtotime($pengaduan_new->created_at))}}</td>
                            <!-- <td>{{date("d M Y H:i:s", strtotime($pengaduan_new->updated_at))}}</td> -->
                            <td class="text-center">
                              <button 
                              type="button" 
                              class="btn icon btn-success"
                              data-toggle="modal" 
                              data-target="#edit-{{ $pengaduan_new->id }}">Pilih Kategori</button>
                            </td>
                            <td>{{$pengaduan_new->keterangan}}</td>
                            <td class="text-center">
                              <button 
                              type="button" 
                              class="btn icon btn-danger"
                              data-toggle="modal" 
                              data-target="#close-{{ $pengaduan_new->id }}">Close Tiket</button>
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
                    <div class="modal fade" id="edit-{{ $pengaduan_new->id }}" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h3 class="modal-title text-center" id="exampleModalLabel">Kategori Pengaduan</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form class="form-prevent" action="{{ action('App\Http\Controllers\AdminController@EditKategori', [$pengaduan_new->id]) }}" enctype="multipart/form-data" method="POST">
                              <div class="modal-body">
                              @csrf
                                <div class="form-group">
                                  <label for="exampleInputEmail1" class="form-label">No Tiket :</label>
                                  <input name="no_tiket" type="text" class="form-control" id="no_tiket" value="{{ $pengaduan_new->no_tiket }}" disabled>
                                  <input name="id" type="text" class="form-control" id="id" value="{{ $pengaduan_new->id }}" hidden>
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1" class="form-label">Pihak / Layanan yang Dilaporkan :</label>
                                  <input name="oranglayanan_terlapor" type="text" class="form-control" id="oranglayanan_terlapor" value="{{ $pengaduan_new->oranglayanan_terlapor }}" disabled>
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1" class="form-label">Waktu Kejadian :</label>
                                  <input name="waktu_kejadian" type="text" class="form-control" id="waktu_kejadian" value="{{ date('d M Y', strtotime($pengaduan_new->waktu_kejadian)) }}" disabled>
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1" class="form-label">Hal yang Dilaporkan :</label>
                                  <input name="judul_pelanggaran" type="text" class="form-control" id="judul_pelanggaran" value="{{ $pengaduan_new->judul_pelanggaran }}" disabled>
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1" class="form-label">Detail Pengaduan :</label>
                                  <textarea class="tiny" name="detail_pelanggaran">{!!$pengaduan_new->detail_pelanggaran!!}</textarea>
                                </div> 
                                <div class="form-group">
                                  <label for="exampleInputEmail1" class="form-label">Bukti Pendukung :</label><br>
                                  @forelse($bukti as $buktis)
                                    @if(substr($buktis->nama_file,0,12) == $pengaduan_new->no_tiket)
                                      <a href="{{ url('/').'/bukti/'.$buktis->nama_file }}" style="text-align:left;">{{ $buktis->nama_file }}</a>
                                      <br>
                                    @endif
                                  @empty
                                      <label>Tidak ada bukti pendukung yang dilampirkan</label>
                                  @endforelse
                                </div>  
                               <!--  <div class="form-group">
                                  <label for="exampleInputEmail1" class="form-label">Kategori Pengaduan</label>
                                  <br/>
                                  <select class="form-control form-select" name="kategori_pengaduan" id="kategori_pengaduan" required>
                                    <option value="" selected disabled>Pilih Kategori</option>
                                    <option value="layanan">Pengaduan Layanan</option>
                                    <option value="personal">Pengaduan Personal</option>
                                  </select>
                                </div> -->
                                <div class="form-group kategori_pengaduan">
                                      <label for="exampleInputEmail1" class="form-label">Kategori Pengaduan :</label>
                                      <br/>
                                        <input class="kategori_pengaduan_layanan" type="radio" id="pengaduan_layanan" name="kategori_pengaduan" value="layanan">
                                        <label for="html">Pengaduan Layanan</label><label for="html">  </label>
                                        <input class="kategori_pengaduan_personal" type="radio" id="pengaduan_personal" name="kategori_pengaduan" value="personal">
                                        <label for="css">Pengaduan Personal</label>
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1" class="form-label">Penanggung Jawab Pengaduan :</label>
                                  <br/>
                                  <div class="form-check form-check-inline">
                                    <input class="class1" name="pic_bidang" type="checkbox" id="kapus" value="4" disabled>
                                    <label class="form-check-label" for="inlineCheckbox1">Kepala Pusat Pusbin JFA</label>
                                  </div>
                                  <div id="koor">
                                      <div class="form-check form-check-inline">
                                        <input class="class3" name="pic_bidang[]" type="checkbox" id="koor1" value="1" disabled>
                                        <label class="form-check-label" for="inlineCheckbox1">Koor Bidang 1</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="class3" name="pic_bidang[]" type="checkbox" id="koor2" value="2" disabled>
                                        <label class="form-check-label" for="inlineCheckbox2">Koor Bidang 2</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="class3" name="pic_bidang[]" type="checkbox" id="koor3" value="3" disabled>
                                        <label class="form-check-label" for="inlineCheckbox3">Koor Bidang 3</label>
                                      </div> 
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
                          </form>
                        </div>
                      </div>
                    </div>
                    @endforeach

                    @foreach($pengaduan_new2 as $pengaduan_new)
                    <div class="modal fade" id="close-{{ $pengaduan_new->id }}" tabindex="-1" role="dialog" aria-labelledby="close-modal-label" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h3 class="modal-title text-center" id="exampleModalLabel">Kategori Pengaduan</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form class="form-prevent" action="{{ action('App\Http\Controllers\AdminController@CloseTiket', [$pengaduan_new->id]) }}" enctype="multipart/form-data" method="POST">
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
                                <div class="form-group">
                                  <label for="exampleInputEmail1" class="form-label">Detail Pengaduan</label>
                                  <textarea class="tiny" name="detail_pelanggaran">{!!$pengaduan_new->detail_pelanggaran!!}</textarea>
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1" class="form-label">Keterangan Close Tiket</label>
                                  <textarea  name="keterangan" type="text" class="form-control post-input" id="exampleInputnamaterlapor" rows="3" placeholder="Tuliskan keterangan / alasan close tiket" required></textarea>
                                  <label for="exampleInputEmail1" class="form-label" style="color: red;"><b>Mohon untuk mengisi keterangan / alasan close tiket</b></label>
                                </div>
                              </div>
                              <div class="modal-footer text-center">
                                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button class="btn btn-danger button-prevent" type="submit">
                                  <!-- spinner-border adalah component bawaan bootstrap untuk menampilakn roda berputar  -->
                                  <div class="spinner"><i role="status" class="spinner-border spinner-border-sm"></i> Close Tiket </div>
                                  <div class="hide-text">Close Tiket</div>
                                </button>
                              </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  

@endsection

@section('js-plus')
<script>
$("input[id='pengaduan_layanan']").change(function() {
  $(".class1").prop({ disabled: false, checked: false});
  $(".class3").prop({ disabled: false, checked: false});
});

$("input[id='pengaduan_personal']").change(function() {
  $(".class1").prop({ disabled: false, checked: false});
  $(".class3").prop({ disabled: false, checked: false});
});

// $("input[id='pengaduan_personal']").change(function() {
//   $(".class1").prop({ disabled: false, checked: true});
//   $(".class3").prop({ disabled: true, checked:false});
// });
</script>

<script>
$('input[class^="class"]').click(function() {
    var $this = $(this);
    if ($this.is(".class1")) {
        if ($(".class1:checked").length > 0) {
            $(".class3").prop({ disabled: true, checked: false });
        } else {
            $(".class3").prop("disabled", false);
        }
    }
    else if ($this.is(".class3")) {
        if ($(".class3:checked").length > 0) {
            $(".class1").prop({ disabled: true, checked: false });
        } else {
            $(".class1").prop("disabled", false);
        }
    }
});
</script>

<!-- <script src="https://cdn.tiny.cloud/1/naiean50arcvcg7c4k08y4vbuuu0sg1n4s3q5jyab04r7rhi/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> -->
<script src="https://cdn.tiny.cloud/1/vbwit9dpespn4ppnyghi8a2obi5fgx5tzbd3l9smgjbcq6vh/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>
  tinymce.init({
    selector: "textarea.tiny",
    menubar: false,
    readonly : 1,
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
  tinymce.init({
    selector: "textarea.tiny2",
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
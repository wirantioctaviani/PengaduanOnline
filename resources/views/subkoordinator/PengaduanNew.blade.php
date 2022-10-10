@extends('subkoordinator.Master')

@section('content')
  <main id="main">
    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
      <div class="container text-center">
        <a href="{{ action('App\Http\Controllers\SubkoorController@HomeSubkoor') }}"><i class="fas fa-home fa-2x"></i></a>
        <br>  
        <br>
      </div>

      @if(Session('Sukses'))
        <script>
            swal(`Berhasil!`, "PIC Berhasil Dipilih", "success");
        </script>
      @endif

      @if(Session('Gagal1'))
        <script>
            swal(`Gagal!`, "Anda belum memilih Subkoordinator penanggung jawab", "error");
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
                            <th>Waktu Update</th>
                            <th>Kategori Pengaduan</th>
                            <th>PIC Penanggung Jawab</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pengaduan_new as $pengaduan_new)
                        <tr class="text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$pengaduan_new->no_tiket}}</td>
                            <td>{{$pengaduan_new->oranglayanan_terlapor}}</td>
                            <td>{{date("d M Y H:i", strtotime($pengaduan_new->created_at))}}</td>
                            <td>{{date("d M Y H:i", strtotime($pengaduan_new->subkoor_updated_at))}}</td>
                            @if($pengaduan_new->kategori_pengaduan == 'layanan')
                            <td>Layanan</td>
                            @else
                            <td>Personal</td>
                            @endif
                            @if($pengaduan_new->has_picked == 1)
                              <td>Penanggung Jawab telah dipilih<br><br><a href="{{ action('App\Http\Controllers\SubkoorController@pick', [encrypt($pengaduan_new->id)]) }}" class="btn btn-success">Detail</a></td>
                            @elseif($pengaduan_new->has_picked == 0)
                              <!-- <td class="text-center">
                                <button 
                                type="button" 
                                class="btn icon btn-success"
                                data-toggle="modal" 
                                data-target="#edit-{{ $pengaduan_new->id }}">Pilih PIC</button>
                              </td> -->
                              <td><a href="{{ action('App\Http\Controllers\SubkoorController@pick', [encrypt($pengaduan_new->id)]) }}" class="btn btn-warning">Pilih Penanggung Jawab</a></td>
                            @endif
                            <td>{{$pengaduan_new->keterangan}}</td>
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

                    @foreach($idt_subkoordinator as $pengaduan_new)
                    <div class="modal fade" id="edit-{{ $pengaduan_new->id }}" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h3 class="modal-title text-center" id="exampleModalLabel">Pilih Subkoor Penanggung Jawab</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form action="{{ action('App\Http\Controllers\SubkoorController@PilihPIC', [$pengaduan_new->id]) }}" method="POST">
                              <div class="modal-body">
                              @csrf
                                <div class="form-group">
                                  <label for="exampleInputEmail1" class="form-label">No Tiket</label>
                                  <input name="no_tiket" type="text" class="form-control" id="no_tiket" value="{{ $pengaduan_new->no_tiket }}" disabled>
                                  <input name="id" type="text" class="form-control" id="id" value="{{ $pengaduan_new->id }}" hidden>
                                  <input name="subbid_id" type="text" class="form-control" id="subbid_id" value="{{ $pengaduan_new->subbid_id }}" hidden>
                                  <input name="idt_subkoordinator" type="text" class="form-control" id="idt_subkoordinator" value="{{ $pengaduan_new->idt_subkoordinator }}" hidden>
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1" class="form-label">Pihak / Layanan yang Dilaporkan</label>
                                  <input name="oranglayanan_terlapor" type="text" class="form-control" id="oranglayanan_terlapor" value="{{ $pengaduan_new->oranglayanan_terlapor }}" disabled>
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1" class="form-label">Waktu Kejadian</label>
                                  <input name="waktu_kejadian" type="text" class="form-control" id="waktu_kejadian" value="{{ date('d-m-Y H:i:s', strtotime($pengaduan_new->waktu_kejadian)) }}" disabled>
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1" class="form-label">Pelanggaran yang Dilaporkan</label>
                                  <input name="judul_pelanggaran" type="text" class="form-control" id="judul_pelanggaran" value="{{ $pengaduan_new->judul_pelanggaran }}" disabled>
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1" class="form-label">Detail Pelanggaran</label>
                                  <textarea class="tiny" name="detail_pelanggaran">{!!$pengaduan_new->detail_pelanggaran!!}</textarea>
                                </div>  
                                <div class="form-group">
                                  <label for="exampleInputEmail1" class="form-label">Kategori Pengaduan</label>
                                  <br/>
                                  <select class="form-control form-select" name="kategori_pengaduan" id="kategori_pengaduan">
                                      <option value="personal" {{$pengaduan_new->kategori_pengaduan == 'personal'  ? 'selected' : ''}} disabled>Pengaduan Personal</option>
                                      <option value="layanan" {{$pengaduan_new->kategori_pengaduan == 'layanan' ? 'selected' : ''}} disabled>Pengaduan Layanan</option>
                                  </select>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                      <label for="exampleInputEmail1" class="form-label">Menindaklanjuti Sendiri</label>
                                      <br/>
                                        <input class="is_answering" type="radio" id="is_answering_yes" name="is_answering" value="1" checked="checked">
                                        <label for="html">Ya</label><label for="html">  </label>
                                        <input class="is_answering" type="radio" id="is_answering_no" name="is_answering" value="0">
                                        <label for="css">Tidak</label>
                                    </div>
                                </div>
                                <div id="pic">
                                  <div class="row">
                                    <div class="form-group">
                                      <label for="exampleInputEmail1" class="form-label">PIC</label>
                                      <br/>
                                      <select class="custom-select" name="pic" disabled>
                                        <option value="option_select" disabled selected>Pilih PIC</option>
                                        @foreach($pics as $a)
                                        <option value="{{$a->id}}">{{$a->name}}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                  </div>
                                </div>
                                </div>
                              <div class="modal-footer">
                                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
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
  $(".custom-select").prop({ disabled: true, checked: false });
});

$("input[id='is_answering_no']").change(function() {
  $(".custom-select").prop({ disabled: false});
});
</script>

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
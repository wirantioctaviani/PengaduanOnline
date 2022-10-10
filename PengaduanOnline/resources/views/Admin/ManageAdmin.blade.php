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
            swal(`Berhasil!`, "User telah berhasil ditambahkan", "success");
        </script>
        @endif

        @if(Session('Sukses2'))
        <script>
            swal(`Berhasil!`, "Data user telah berhasil diubah", "success");
        </script>
        @endif

        @if(Session('Suksesy'))
        <script>
            swal(`Berhasil!`, "Admin berhasil diaktifkan", "success");
        </script>
        @endif

        @if(Session('Suksesz'))
        <script>
            swal(`Berhasil!`, "Admin berhasil dinonaktifkan", "success");
        </script>
        @endif

        @if(Session('Error'))
          <script>
              swal(`Gagal!`, "Terdapat User dengan role Koordinator lebih dari 1. Silakan nonaktifkan terlebih dahulu.", "error");
          </script>
        @endif

        @if(Session('Error1'))
          <script>
              swal(`Gagal!`, "Terdapat User dengan role Subkoordinator lebih dari 1. Silakan nonaktifkan terlebih dahulu.", "error");
          </script>
        @endif

        @if(Session('Error2'))
          <script>
              swal(`Gagal!`, "Terdapat User dengan role Kapus lebih dari 1. Silakan nonaktifkan terlebih dahulu.", "error");
          </script>
        @endif

        @if(Session('Errorx'))
          <script>
              swal(`Gagal!`, "Tidak terdapat user dengan role Koordinator/Subkoordinator/Kapus. Silakan aktifkan/tambahkan user terlebih dahulu.", "error");
          </script>
        @endif

        @if(Session('Gagalx'))
          <script>
              swal(`Gagal!`, "Admin dengan NIP tersebut sudah terdaftar", "error");
          </script>
        @endif

      <div class="container" style="border: 5px">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12 border bg-light" style="height: 100%">
                <br>
                <h2 class="text-center">MANAGE ADMIN</h2>
                <br>
                <button type="button" class="btn btn-info" data-toggle='modal' data-target="#ModalAddUser">Add Admin</button>
                <br>
                <br>
                  <table id="example" class="table table-striped table-bordered dt-responsive">
                    <thead class="text-center" style="background-color: #82b2ff;">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>Bidang</th>
                            <th>Subbid</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($user as $user)
                        <tr class="text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$user->nama}}</td>
                            <td>{{$user->nip}}</td>
                            <td>{{$user->nama_bidang}}</td>
                            <td>{{$user->subbid}}</td>
                            <td>{{$user->nama_role}}</td>
                            @if($user->is_active == 1)
                            <td>Aktif</td>
                            @else
                            <td>Non Aktif</td>
                            @endif
                            <td class="text-center">
                              <div class="btn-group-vertical" role="group" aria-label="Basic example">
                                <button 
                                  type="button" 
                                  class="btn icon btn-info"
                                  data-toggle="modal" 
                                  data-target="#edit-{{ $user->id_admin }}">Edit
                                </button>
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

                    <div class="modal fade" id="ModalAddUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLabel">Add Admin</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form class="form-prevent" action="{{ action('App\Http\Controllers\AdminController@AddAdmin') }}" method="POST">
                              <div class="modal-body">
                              @csrf
                                <div class="form-group">
                                  <label for="exampleInputEmail1" class="form-label">Pilih User</label>
                                  <select name="nip[]" multiple data-live-search="true" class="form-control form-select selectpicker" id="subbid">
                                    <option value="">Pilih User</option>
                                    @foreach($data_user as $user )
                                      <option value="{{ $user->nip }}">{{ $user->name}}</option>
                                    @endforeach
                                  </select>
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

                          <!-- <hr> -->
                        <!--   <form class="form-prevents" action="{{ action('App\Http\Controllers\AdminController@AddAdmin2') }}" method="POST">
                              <div class="modal-body">
                              @csrf
                                <div class="form-group">
                                  <label for="exampleInputEmail1" class="form-label inputadmin">Nama User</label>
                                  <input name="name" type="text" class="form-control" id="exampleInputnama1" required>
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1" class="form-label inputadmin">NIP</label>
                                  <input name="nip" type="text" class="form-control" id="exampleInputnama1" required>
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1" class="form-label inputadmin">Email</label>
                                  <input name="email" type="email" class="form-control" id="exampleInputnama1">
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1" class="form-label">Bidang</label>
                                  <select name="subbid" class="form-control form-select class3" id="subbid" required>
                                      <option value="" selected >Pilih Bidang</option>
                                    @foreach($data_bidang as $bidang )
                                      <option value="{{ $bidang->subbid_id }}">{{ $bidang->nama_bidang}}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button class="btn btn-info button-prevents" type="submit">
                                  <div class="spinner2"><i role="status" class="spinner-border spinner-border-sm"></i> Submit </div>
                                  <div class="hide-text2">Submit</div>
                                </button>
                              </div>
                          </form> -->
                        </div>
                      </div>
                    </div>

                    @foreach($user2 as $user)
                    <div class="modal fade" id="edit-{{ $user->id_admin }}" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLabel">Edit Data Admin</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form class="form-preventx" action="{{ action('App\Http\Controllers\AdminController@EditAdmin', [$user->id]) }}" method="POST">
                              <div class="modal-body">
                              @csrf
                                <div class="form-group">
                                  <label for="exampleInputEmail1" class="form-label">Nama User</label>
                                  <input name="nama" type="text" class="form-control" id="nama" value="{{ $user->nama }}" disabled>
                                  <input name="id_admin" type="text" class="form-control" id="id_admin" value="{{ $user->id_admin }}" hidden>
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1" class="form-label">NIP</label>
                                  <input name="nip" type="text" class="form-control" id="nip" value="{{ $user->nip }}" disabled>
                                </div>
                                <!-- <div class="form-group">
                                  <label for="exampleInputEmail1" class="form-label">Role</label>
                                  <br/>
                                  <select name="role" class="form-control form-select role" id="role">
                                    @foreach($data_role as $data_roles )
                                      <option value="{{ $data_roles->id_role }}" {{$user->role == $data_roles->id_role  ? 'selected' : ''}}>{{ $data_roles->nama_role}}</option>
                                    @endforeach
                                  </select>
                                </div> -->
                                <div class="form-group">
                                  <div class="row">
                                  <div class="col-md-2">
                                    <label for="exampleInputEmail1" class="form-label">Status Aktif</label>
                                  </div>
                                  <div class="col-md-8">
                                    <input type="checkbox" value="{{$user->is_active}}" name="is_active" id="is_active" @if($user->is_active == '1' ) checked @endif />
                                  </div>
                                  <div class="col-md-2">
                                  </div>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button class="btn btn-info button-preventx" type="submit">
                                  <!-- spinner-border adalah component bawaan bootstrap untuk menampilakn roda berputar  -->
                                  <div class="spinner2"><i role="status" class="spinner-border spinner-border-sm"></i> Submit </div>
                                  <div class="hide-text2">Submit</div>
                                </button>
                              </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    @endforeach
@endsection

@section('js-plus')
<!-- <script>
$('.selectpicker').click(function() {
    if ($(this).is(':selected')) {
            $(".inputadmin").prop({ disabled: true });
    } else{
            $(".inputadmin").prop({ disabled: false });
    }
});
</script> -->

<script>
  $(function() {
    $('.selectpicker').on('change', function() {
      var $sels = $('.selectpicker option:selected[value!=""]');
      $(".button-prevents").attr("disabled", $sels.length > 0);
      $(".button-prevent").attr("disabled", $sels.length < 1);
    }).change();
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
<script>
// jika form-prevent disubmit maka disable button-prevent dan tampilkan spinner
(function () {
    $('.form-prevents').on('submit', function () {
        $('.button-prevents').attr('disabled', 'true');
        $('.spinner2').show();
        $('.hide-text2').hide();
    })
})();
</script>
<script>
// jika form-prevent disubmit maka disable button-prevent dan tampilkan spinner
(function () {
    $('.form-preventx').on('submit', function () {
        $('.button-preventx').attr('disabled', 'true');
        $('.spinner2').show();
        $('.hide-text2').hide();
    })
})();
</script>
<script>
  $('select').selectpicker();
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
@endsection
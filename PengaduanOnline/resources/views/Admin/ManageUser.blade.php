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

      <div class="container" style="border: 5px">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12 border bg-light" style="height: 100%">
                <br>
                <h2 class="text-center">MANAGE USERS</h2>
                <br>
                <button type="button" class="btn btn-info" data-toggle='modal' data-target="#ModalAddUser">Add User</button>
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
                            <td>{{$user->name}}</td>
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
                                  data-target="#edit-{{ $user->id }}">Edit
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
                            <h3 class="modal-title" id="exampleModalLabel">Add User</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form class="form-prevent" action="{{ action('App\Http\Controllers\AdminController@AddUser') }}" method="POST">
                              <div class="modal-body">
                              @csrf
                                <div class="form-group">
                                  <label for="exampleInputEmail1" class="form-label">Nama User</label>
                                  <input name="name" type="text" class="form-control" id="exampleInputnama1" required>
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1" class="form-label">NIP</label>
                                  <input name="nip" type="text" class="form-control" id="exampleInputnama1" required>
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1" class="form-label">Email</label>
                                  <input name="email" type="email" class="form-control" id="exampleInputnama1">
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1" class="form-label">Role</label>
                                  <br/>
                                  <select name="role" class="form-control form-select role" id="role" required>
                                    <option value="" selected disabled>Pilih Role</option>
                                    <!-- <option value="1">Admin</option> -->
                                    <option value="2">Koordinator</option>
                                    <option value="3">Subkoordinator</option>
                                    <option value="4">Pegawai</option>
                                    <option value="5">Kepala Pusbin JFA</option>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1" class="form-label">Bidang</label>
                                  <select name="subbid" class="form-control form-select class3" id="subbid" required>
                                    <option value="" selected>Pilih Bidang</option>
                                    @foreach($data_bidang as $bidang )
                                      <option value="{{ $bidang->subbid_id }}">{{ $bidang->nama_bidang}}</option>
                                    @endforeach
                                  </select>
                                </div>
                                <div class="form-group">
                                  <div class="row">
                                  <div class="col-md-3">
                                    <label for="exampleInputEmail1" class="form-label">Assign sebagai Admin</label>
                                  </div>
                                  <div class="col-md-7">
                                    <input type="checkbox" value="1" name="admin" id="admin" />
                                  </div>
                                  <div class="col-md-2">
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

                    @foreach($user2 as $user)
                    <div class="modal fade" id="edit-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLabel">Edit Data User</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form class="form-prevent" action="{{ action('App\Http\Controllers\AdminController@EditUser', [$user->id]) }}" method="POST">
                              <div class="modal-body">
                              @csrf
                                <div class="form-group">
                                  <label for="exampleInputEmail1" class="form-label">Nama User</label>
                                  <input name="name" type="text" class="form-control" id="name" value="{{ $user->name }}">
                                  <input name="id" type="text" class="form-control" id="id" value="{{ $user->id }}" hidden>
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1" class="form-label">NIP</label>
                                  <input name="nip" type="text" class="form-control" id="nip" value="{{ $user->nip }}">
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1" class="form-label">Email</label>
                                  <input name="email" type="email" class="form-control" id="email" value="{{ $user->email }}">
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1" class="form-label">Role</label>
                                  <br/>
                                  <select name="role" class="form-control form-select role" id="role">
                                    @foreach($data_role as $data_roles )
                                      <option value="{{ $data_roles->id_role }}" {{$user->role == $data_roles->id_role  ? 'selected' : ''}}>{{ $data_roles->nama_role}}</option>
                                    @endforeach
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1" class="form-label">Bidang</label>
                                  <select name="subbid" class="form-control form-select class3" id="subbid">
                                      <option value="0" selected >Pilih Bidang</option>
                                    @foreach($data_bidang as $bidang )
                                      <option value="{{ $bidang->subbid_id }}" {{$user->subbid == $bidang->subbid_id  ? 'selected' : ''}}>{{ $bidang->nama_bidang}}</option>
                                    @endforeach
                                  </select>
                                </div>
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
@endsection

@section('js-plus')
<script>
$('.role').click(function() {
    if ($(this).val() == '5') {
            $(".class3").prop({ disabled: true });
    } else{
            $(".class3").prop({ disabled: false });
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
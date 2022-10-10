@extends('Admin.Master')

@section('content')
  <main id="main">
    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
      <div class="container text-center">
        <a href="{{ action('App\Http\Controllers\PengaduanController@HomeAdmin') }}"><i class="fas fa-home fa-2x"></i></a>
        <br>  
        <br>
      </div>
      <div class="container" style="border: 5px">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12 border bg-light" style="height: 100%">
                <br>
                <h2 class="text-center">PENGADUAN DITOLAK</h2>
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
                            <th>PIC</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>PE-0001</td>
                            <td>System Architect</td>
                            <td>2011/04/25</td>
                            <td>2011/04/25</td>
                            <td class="text-center">Pengaduan Layanan</td>
                            <td>
                              <ul>
                                <li>Subkoor 1.1</li>
                              </ul>
                            </td>
                            <td>Closed</td>
                            <td>
                              <div class="btn-group-vertical" role="group" aria-label="Basic example">
                                <a href="{{ action('App\Http\Controllers\PengaduanController@PengaduanView') }}" class="btn btn-info">Detail</a>
                              </div>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>PE-0002</td>
                            <td>Accountant</td>
                            <td>2011/07/25</td>
                            <td>2011/04/25</td>
                            <td class="text-center">Pengaduan Layanan</td>
                            <td>
                              <ul>
                                <li>Subkoor 1.1</li>
                              </ul>
                            </td>
                            <td>Closed</td>
                            <td>
                              <div class="btn-group-vertical" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-info">Detail</button>
                              </div>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>PE-0003</td>
                            <td>Junior Technical Author</td>
                            <td>2009/01/12</td>
                            <td>2011/04/25</td>
                            <td class="text-center">Pengaduan Personal</td>
                            <td>
                              <ul>
                                <li>Subkoor 1.1</li>
                              </ul>
                            </td>
                            <td>Closed</td>
                            <td>
                              <div class="btn-group-vertical" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-info">Detail</button>
                              </div>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>PE-0004</td>
                            <td>Senior Javascript Developer</td>
                            <td>2012/03/29</td>
                            <td>2011/04/25</td>
                            <td class="text-center">Pengaduan Layanan</td>
                            <td>
                              <ul>
                                <li>Subkoor 1.1</li>
                              </ul>
                            </td>
                            <td>Closed</td>
                            <td>
                              <div class="btn-group-vertical" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-info">Detail</button>
                              </div>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>PE-0005</td>
                            <td>Accountant</td>
                            <td>2008/11/28</td>
                            <td>2011/04/25</td>
                            <td class="text-center">Pengaduan Personal</td>
                            <td>
                              <ul>
                                <li>Subkoor 1.1</li>
                              </ul>
                            </td>
                            <td>Closed</td>
                            <td>
                              <div class="btn-group-vertical" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-info">Detail</button>
                              </div>
                            </td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>PE-0006</td>
                            <td>Integration Specialist</td>
                            <td>2012/12/02</td>
                            <td>2011/04/25</td>
                            <td class="text-center">Pengaduan Layanan</td>
                            <td>
                              <ul>
                                <li>Subkoor 1.1</li>
                              </ul>
                            </td>
                            <td>Closed</td>
                            <td>
                              <div class="btn-group-vertical" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-info">Detail</button>
                              </div>
                            </td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>PE-0007</td>
                            <td>Integration Specialist</td>
                            <td>2012/12/02</td>
                            <td>2011/04/25</td>
                            <td class="text-center">Pengaduan Personal</td>
                            <td>
                              <ul>
                                <li>Subkoor 1.1</li>
                              </ul>
                            </td>
                            <td>Closed</td>
                            <td>
                              <div class="btn-group-vertical" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-info">Detail</button>
                              </div>
                            </td>
                        </tr>
                    </tbody>
                  </table>
                  <br>
              </div>
            </div>
          </div>
      </div>
    </section><!-- End Featured Services Section -->
  </main><!-- End #main -->


@endsection
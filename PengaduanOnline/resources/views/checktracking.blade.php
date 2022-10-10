 @if(!is_null($selesai))
                        @if(is_null($finalanswer))
                              <div class="container-fluid" style="margin-left: 85px;margin-right: 85px;width: auto;border: 2px solid black;">
                                <div class="row" style="margin-top: 20px;">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                                            <label style="color:black;text-align: left;font-size: 26px;"><b>Hasil Tindak Lanjut :</b></label>
                                            <br>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <div class="row" style="margin-bottom: 20px;">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                                            <label style="color:black;text-align: justify;">Mohon maaf pengaduan Anda kami close karena : {{$selesai->keterangan}}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                              </div>
                        @else
                            <div class="container-fluid" style="margin-left: 85px;margin-right: 85px;width: auto;border: 2px solid black;">
                                <div class="row" style="margin-top: 20px;">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                                            <label style="color:black;text-align: left;font-size: 26px;"><b>Hasil Tindak Lanjut :</b></label>
                                            <br>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <div class="row"></div>
                                <div class="row" >
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                                            <label style="color:black;text-align: justify;">{!!$finalanswer->final_answer!!}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <br>
                                  @if(empty($dokumen))
                                  <label>Test</label>
                                    @else
                                    <div class="row">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-6">
                                            <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                                                <label style="color:black;font-size: 26px"><b>Dokumen Pendukung : </b></label>
                                            </div>
                                        </div>
                                        <div class="col-md-3"></div>
                                    </div>
                                    @foreach($dokumen as $dokumen)
                                    <div class="row" style="margin-bottom: 15px;">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-6">
                                            <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                                                <a href="{{ url('/').'/dokumen/'.$dokumen->nama_file }}" style="text-align:left;">Dokumen #{{ $loop->iteration }}</a>
                                            </div>
                                        </div>
                                        <div class="col-md-3"></div>
                                    </div>
                                    @endforeach
                                  @endif
                              </div>
                        @endif
                    @else
                        @if(!is_null($diterima))
                            @if(!is_null($diproses))
                                @if(!is_null($selesai))
                                  <div class="container-fluid" style="margin-left: 85px;margin-right: 85px;width: auto;border: 2px solid black;">
                                    <div class="row" style="margin-top: 20px;">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
                                            <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                                                <label style="color:black;text-align: left;font-size: 26px;"><b>Hasil Tindak Lanjut :</b></label>
                                                <br>
                                            </div>
                                        </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                    <div class="row"></div>
                                    <div class="row" >
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
                                            <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                                                <label style="color:black;text-align: justify;">{!!$finalanswer->final_answer!!}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                    <br>
                                      @if(!empty($dokumen))
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-6">
                                                <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                                                    <label style="color:black;font-size: 26px"><b>Dokumen Pendukung : </b></label>
                                                </div>
                                            </div>
                                            <div class="col-md-3"></div>
                                        </div>
                                        @foreach($dokumen as $dokumen)
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-6">
                                                <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                                                    <a href="{{ url('/').'/dokumen/'.$dokumen->nama_file }}" style="text-align:left;">Dokumen #{{ $loop->iteration }}</a>
                                                </div>
                                            </div>
                                            <div class="col-md-3"></div>
                                        </div>
                                        @endforeach
                                      @endif
                                  </div>
                                @else
                                  <div class="container-fluid" style="margin-left: 85px;margin-right: 85px;width: auto;border: 2px solid black;">
                                    <div class="row">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-6">
                                            <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                                                <label style="color:black;text-align: left;margin-top: 20px;font-size: 26px;"><b>Keterangan :</b></label>
                                            </div>
                                        </div>
                                        <div class="col-md-3"></div>
                                    </div>
                                    <div class="row" style="margin-bottom: 20px;">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
                                            <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                                                <label style="color:black;text-align: justify;">Pengaduan Anda sedang diproses. Mohon untuk melakukan <i>tracking</i> secara berkala. Hasil pengaduan akan ditampilkan di halaman ini ketika pengaduan Anda selesai diproses.</label>
                                            </div>
                                        </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                  </div>
                                @endif
                            @else
                              <div class="container-fluid" style="margin-left: 85px;margin-right: 85px;width: auto;border: 2px solid black;">
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                                            <label style="color:black;text-align: left;font-size: 26px;"><b>Keterangan :</b></label>
                                        </div>
                                    </div>
                                    <div class="col-md-3"></div>
                                </div>
                                <div class="row" style="margin-bottom: 20px;">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                                            <label style="color:black;text-align: justify;">Pengaduan Anda sudah diterima dan sedang menunggu untuk diproses. Mohon untuk melakukan <i>tracking</i> secara berkala. Hasil pengaduan akan ditampilkan di halaman ini ketika pengaduan Anda selesai diproses.</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                              </div>
                            @endif
                        @endif
                    @endif
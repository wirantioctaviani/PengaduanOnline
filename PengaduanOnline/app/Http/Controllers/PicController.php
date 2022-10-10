<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PicController extends Controller
{
    public function HomePic()
    {
        $pengaduan_tl = \App\Models\TrhPIC::leftjoin('mstr_pengaduan', function($join2) {
            $join2->on('trh_pic.mstr_pengaduan_id', '=', 'mstr_pengaduan.id');})
            ->where([
                    ['pic_id', '=', session()->get('user_id')],
                    ['status_pengaduan', '=', '9']
                ])
            ->count();

        $pengaduan_onprocess = \App\Models\TrhPIC::leftjoin('mstr_pengaduan', function($join2) {
            $join2->on('trh_pic.mstr_pengaduan_id', '=', 'mstr_pengaduan.id');})
            ->where([
                    ['pic_id', '=', session()->get('user_id')],
                    ['status_pengaduan', '=', '5']
                ])
            ->count();

        $pengaduan_closed = \App\Models\TrhPIC::leftjoin('mstr_pengaduan', function($join2) {
            $join2->on('trh_pic.mstr_pengaduan_id', '=', 'mstr_pengaduan.id');})
            ->where([
                    ['pic_id', '=', session()->get('user_id')],
                    ['status_pengaduan', '=', '10']
                ])
            ->count();   
            // dd($pengaduan_new);
        return view('pic.HomePic')->with(['pengaduan_onprocess' => $pengaduan_onprocess,'pengaduan_tl' => $pengaduan_tl,'pengaduan_closed' => $pengaduan_closed]);
    }

    public function PengaduanDiprosess()
        {   
            // $pengaduan_new = \App\Models\MstrPengaduan::leftjoin('mstr_status', function($join) {
            // $join->on('mstr_pengaduan.status_pengaduan', '=', 'mstr_status.id_status');})
            // ->select('mstr_pengaduan.id as id_pengaduan', 'no_tiket', 'nama_pelapor', 'telp_pelapor', 'email_pelapor', 'oranglayanan_terlapor', 'satuan_kerja', 'waktu_kejadian', 'tempat_kejadian', 'judul_pelanggaran', 'detail_pelanggaran', 'kategori_pengaduan', 'status_pengaduan', 'mstr_pengaduan.created_at as tanggal_submit', 'mstr_pengaduan.updated_at as tanggal_update', 'mstr_status.keterangan as ket_status')
            // ->where('status_pengaduan','2')
            // ->get();

            $pengaduan_diproses = \App\Models\TrhPIC::leftjoin('mstr_pengaduan', function($join2) {
            $join2->on('trh_pic.mstr_pengaduan_id', '=', 'mstr_pengaduan.id');})
            ->leftjoin('mstr_status', function($join2) {
            $join2->on('mstr_pengaduan.status_pengaduan', '=', 'mstr_status.id_status');})
            ->select('mstr_pengaduan.id as id_pengaduan', 'mstr_pengaduan.no_tiket', 'nama_pelapor', 'telp_pelapor', 'email_pelapor', 'oranglayanan_terlapor', 'satuan_kerja', 'waktu_kejadian', 'tempat_kejadian', 'judul_pelanggaran', 'detail_pelanggaran', 'kategori_pengaduan', 'status_pengaduan', 'mstr_pengaduan.created_at as tanggal_pelaporan', 'mstr_pengaduan.updated_at as tanggal_update', 'mstr_status.keterangan as ket_status','subbid_id', 'pic_id', 'trh_pic.created_at as created_at_pic', 'trh_pic.updated_at as updated_at_pic', 'status_pic')
            ->where([
                    ['pic_id', '=', session()->get('user_id')],
                    ['status_pengaduan', '=', '9']
                ])
            ->get();

            return view('pic.Pengaduanditl')->with(['pengaduan_diproses' => $pengaduan_diproses]);
        }


    public function PengaduanDiproses()
        {   
            // $pengaduan_new = \App\Models\MstrPengaduan::leftjoin('mstr_status', function($join) {
            // $join->on('mstr_pengaduan.status_pengaduan', '=', 'mstr_status.id_status');})
            // ->select('mstr_pengaduan.id as id_pengaduan', 'no_tiket', 'nama_pelapor', 'telp_pelapor', 'email_pelapor', 'oranglayanan_terlapor', 'satuan_kerja', 'waktu_kejadian', 'tempat_kejadian', 'judul_pelanggaran', 'detail_pelanggaran', 'kategori_pengaduan', 'status_pengaduan', 'mstr_pengaduan.created_at as tanggal_submit', 'mstr_pengaduan.updated_at as tanggal_update', 'mstr_status.keterangan as ket_status')
            // ->where('status_pengaduan','2')
            // ->get();

            $pengaduan_diproses = \App\Models\TrhPIC::leftjoin('mstr_pengaduan', function($join2) {
            $join2->on('trh_pic.mstr_pengaduan_id', '=', 'mstr_pengaduan.id');})
            ->leftjoin('mstr_status', function($join2) {
            $join2->on('mstr_pengaduan.status_pengaduan', '=', 'mstr_status.id_status');})
            ->select('mstr_pengaduan.id as id_pengaduan', 'mstr_pengaduan.no_tiket', 'nama_pelapor', 'telp_pelapor', 'email_pelapor', 'oranglayanan_terlapor', 'satuan_kerja', 'waktu_kejadian', 'tempat_kejadian', 'judul_pelanggaran', 'detail_pelanggaran', 'kategori_pengaduan', 'status_pengaduan', 'mstr_pengaduan.created_at as tanggal_pelaporan', 'mstr_pengaduan.updated_at as tanggal_update', 'mstr_status.keterangan as ket_status','subbid_id', 'pic_id', 'trh_pic.created_at as created_at_pic', 'trh_pic.updated_at as updated_at_pic', 'status_pic')
            ->where([
                    ['pic_id', '=', session()->get('user_id')],
                    ['status_pengaduan', '=', '5']
                ])
            ->get();

            return view('pic.PengaduanDiproses')->with(['pengaduan_diproses' => $pengaduan_diproses]);
        }



       public function PengaduanView($id_pengaduan)
        {   
            $id_pengaduan=decrypt($id_pengaduan);
            // dd($id_pengaduan);
            $DetailPengaduan = \App\Models\MstrPengaduan::where('id',$id_pengaduan)
            ->get();
            $BuktiPengaduan = \App\Models\TrdBukti::where('mstr_pengaduan_id',$id_pengaduan)
            ->get();

            $koordinator = \App\Models\TrhKoordinator::leftjoin('mstr_pengaduan', function($join) {
            $join->on('trh_koordinator.mstr_pengaduan_id', '=', 'mstr_pengaduan.id');})
            ->leftjoin('mstr_status', function($join2) {
            $join2->on('mstr_pengaduan.status_pengaduan', '=', 'mstr_status.id_status');})
            ->where('mstr_pengaduan_id',$id_pengaduan)
            ->get();

            $subkoordinator = \App\Models\TrhSubkoordinator::leftjoin('mstr_pengaduan', function($join) {
            $join->on('trh_subkoordinator.mstr_pengaduan_id', '=', 'mstr_pengaduan.id');})
            ->leftjoin('mstr_status', function($join2) {
            $join2->on('mstr_pengaduan.status_pengaduan', '=', 'mstr_status.id_status');})
            ->leftjoin('users', function($join3) {
            $join3->on('trh_subkoordinator.assigned_by', '=', 'users.id');})
            ->leftjoin('mstr_role', function($join4) {
            $join4->on('users.role', '=', 'mstr_role.id_role');})
            ->leftjoin('mstr_status_pic', function($join5) {
            $join5->on('trh_subkoordinator.status_pic', '=', 'mstr_status_pic.id_status_pic');})
            ->select('trh_subkoordinator.mstr_pengaduan_id','trh_subkoordinator.subbid_id','subkoor_id', 'is_answering', 'has_chosen', 'status_pic','assigned_by','trh_subkoordinator.created_at as subkoor_created_at', 'trh_subkoordinator.updated_at as subkoor_updated_at','no_tiket', 'status_pengaduan', 'mstr_pengaduan.created_at as created_at', 'mstr_pengaduan.updated_at as updated_at', 'assigned_by','users.role', 'has_picked', 'mstr_status.keterangan as mstr_status_ket', 'mstr_status_pic.keterangan as mstr_status_pic_ket')
            ->where('mstr_pengaduan_id',$id_pengaduan)
            ->orderBy('trh_subkoordinator.subbid_id')
            ->get();

            $PIC = \App\Models\TrhPIC::leftjoin('mstr_pengaduan', function($join) {
            $join->on('trh_pic.mstr_pengaduan_id', '=', 'mstr_pengaduan.id');})
            ->leftjoin('mstr_status', function($join2) {
            $join2->on('mstr_pengaduan.status_pengaduan', '=', 'mstr_status.id_status');})
            ->leftjoin('users', function($join3) {
            $join3->on('trh_pic.pic_id', '=', 'users.id');})
            ->leftjoin('mstr_status_pic', function($join5) {
            $join5->on('trh_pic.status_pic', '=', 'mstr_status_pic.id_status_pic');})
            ->select('trh_pic.mstr_pengaduan_id','trh_pic.subbid_id','pic_id', 'status_pic','assigned_by','trh_pic.created_at as pic_created_at', 'trh_pic.updated_at as pic_updated_at','no_tiket', 'status_pengaduan', 'mstr_pengaduan.created_at as created_at', 'mstr_pengaduan.updated_at as updated_at', 'assigned_by','users.role', 'mstr_status.keterangan as mstr_status_ket', 'mstr_status_pic.keterangan as mstr_status_pic_ket', 'name')
            ->where('mstr_pengaduan_id',$id_pengaduan)
            ->orderBy('trh_pic.subbid_id')
            ->get();

            $Tindaklanjut = \App\Models\TrdTindaklanjut::where('mstr_pengaduan_id',$id_pengaduan)
            // ->where('idt_pic',$idt_pic)
            ->get();
            // dd($Tindaklanjut);

            // $subbid = \App\Models\TrhSubkoordinator::where('mstr_pengaduan_id',$id_pengaduan)
            // ->get();

            $subbid = \App\Models\TrdTindaklanjut::leftjoin('users', function($join2) {
            $join2->on('trd_tindaklanjut.user_id', '=', 'users.id');})
            ->select('users.subbid', 'trd_tindaklanjut.user_id',\DB::raw('count(tindak_lanjut) as total'))
            ->where('mstr_pengaduan_id',$id_pengaduan)
            // ->where('idt_pic',$idt_pic)
            ->groupBy('trd_tindaklanjut.user_id', 'users.subbid')
            ->orderBy('users.subbid')
            ->get();

            $subbid1 = \App\Models\TrhKoordinator::where('mstr_pengaduan_id',$id_pengaduan)
            ->get();
            // dd($subbid);

            $subbid2 = \App\Models\TrhSubkoordinator::where('mstr_pengaduan_id',$id_pengaduan)
            ->get();

            $subbid3 = \App\Models\TrhPIC::where('mstr_pengaduan_id',$id_pengaduan)
            ->get();

            if(!$Tindaklanjut->isEmpty())
            {
                foreach ($Tindaklanjut as $Tindaklanjut2) {
                    $id_tindaklanjuts[] = $Tindaklanjut2->id_tindaklanjut;
                }
                // dd($id_tindaklanjuts);

                $dokumenpendukung = \App\Models\TrdDokumen::where('mstr_pengaduan_id',$id_pengaduan)
                ->whereIn('trd_tindaklanjut_id',$id_tindaklanjuts)
                ->get();

                $dokumenpendukung2 = \App\Models\TrdDokumen::where('mstr_pengaduan_id',$id_pengaduan)
                // ->whereIn('trd_tindaklanjut_id',$id_tindaklanjuts)
                ->get();
                // dd($dokumenpendukung);

                return view('pic.PengaduanView')->with(['DetailPengaduan' => $DetailPengaduan, 'BuktiPengaduan' => $BuktiPengaduan, 'koordinator' => $koordinator, 'subkoordinator' => $subkoordinator, 'PIC' => $PIC, 'Tindaklanjut' => $Tindaklanjut, 'subbid' => $subbid, 'subbid1' => $subbid1, 'subbid2' => $subbid2, 'subbid3' => $subbid3, 'dokumenpendukung' => $dokumenpendukung, 'dokumenpendukung2' => $dokumenpendukung2]);
            }

            else{
                $dokumenpendukung =[];
                $dokumenpendukung2 =[];
            return view('pic.PengaduanView')->with(['DetailPengaduan' => $DetailPengaduan, 'BuktiPengaduan' => $BuktiPengaduan, 'koordinator' => $koordinator, 'subkoordinator' => $subkoordinator, 'PIC' => $PIC, 'Tindaklanjut' => $Tindaklanjut, 'subbid' => $subbid, 'subbid1' => $subbid1, 'subbid2' => $subbid2, 'subbid3' => $subbid3, 'dokumenpendukung' => $dokumenpendukung, 'dokumenpendukung2' => $dokumenpendukung2]);
            }
            
        }



    public function ProsesPengaduan($id_pengaduan)
        {
            $id_pengaduan=decrypt($id_pengaduan);
            $DetailPengaduan = \App\Models\MstrPengaduan::where('id',$id_pengaduan)
            ->get();
            $mstr_status_pic = \App\Models\MstrStatusPic::all();
            $BuktiPengaduan = \App\Models\TrdBukti::where('mstr_pengaduan_id',$id_pengaduan)
            ->get();
            $TrhPengaduan = \App\Models\TrhPIC::where('mstr_pengaduan_id',$id_pengaduan)
            ->where('pic_id',session()->get('user_id'))
            ->get();
            foreach ($TrhPengaduan as $TrhPengaduan2) {
                $idt_pic = $TrhPengaduan2->idt_pic;
            }
            // dd($idt_pic);
            // dd($TrhPengaduan);

            $TrhPIC = \App\Models\TrhPIC::where('mstr_pengaduan_id',$id_pengaduan)
            ->where('pic_id',session()->get('user_id'))
            ->get();

            $Tindaklanjut = \App\Models\TrdTindaklanjut::where('mstr_pengaduan_id',$id_pengaduan)
            // ->where('idt_pic',$idt_pic)
            ->get();
            // dd($Tindaklanjut);

            $subbid = \App\Models\TrhPIC::where('mstr_pengaduan_id',$id_pengaduan)
            ->get();

            $subbid2 = \App\Models\TrhSubkoordinator::where('mstr_pengaduan_id',$id_pengaduan)
            ->get();
            // dd($subbid);

            // dd($TrhPIC);
            // $mstr_status_pic = \App\Models\MstrStatusPic::all();
            // $PIC = \App\Models\TrhPIC::leftjoin('mstr_bidang', function($join) {
            // $join->on('trh_pic.subbid_id', '=', 'mstr_bidang.subbid_id');})
            // ->leftjoin('mstr_status_pic', function($join2) {
            // $join2->on('trh_pic.status_pic', '=', 'mstr_status_pic.id_status_pic');})
            // ->where('mstr_pengaduan_id',$id_pengaduan)
            // ->get();

            $PIC = \App\Models\TrhPIC::leftjoin('mstr_status_pic', function($join2) {
            $join2->on('trh_pic.status_pic', '=', 'mstr_status_pic.id_status_pic');})
            ->leftjoin('mstr_pengaduan', function($join2) {
            $join2->on('trh_pic.mstr_pengaduan_id', '=', 'mstr_pengaduan.id');})
            ->leftjoin('users', function($join3) {
            $join3->on('trh_pic.pic_id', '=', 'users.id');})
            ->select('mstr_status_pic.keterangan as ket_status_pic', 'idt_pic', 'no_tiket', 'status_pengaduan', 'mstr_pengaduan.created_at as waktu_pelaporan', 'mstr_pengaduan.updated_at as updated_at', 'mstr_pengaduan.id as mstr_pengaduan_id', 'subbid_id', 'pic_id','status_pic', 'assigned_by', 'trh_pic.created_at as pic_created_at', 'trh_pic.updated_at as pic_updated_at','id_status_pic', 'status_pic', 'keterangan', 'name')
            ->where('mstr_pengaduan_id',$id_pengaduan)
            ->get();
            // dd($PIC);

            if(!$Tindaklanjut->isEmpty())
            {
                foreach ($Tindaklanjut as $Tindaklanjut2) {
                    $id_tindaklanjuts[] = $Tindaklanjut2->id_tindaklanjut;
                }
                // dd($id_tindaklanjuts);

                $dokumenpendukung = \App\Models\TrdDokumen::where('mstr_pengaduan_id',$id_pengaduan)
                ->whereIn('trd_tindaklanjut_id',$id_tindaklanjuts)
                ->get();
                // dd($dokumenpendukung);

                $dokumenpendukung2 = \App\Models\TrdDokumen::where('mstr_pengaduan_id',$id_pengaduan)
                // ->whereIn('trd_tindaklanjut_id',$id_tindaklanjuts)
                ->get();
                // dd($dokumenpendukung2);

                return view('pic.ProsesPengaduan')->with(['DetailPengaduan' => $DetailPengaduan, 'BuktiPengaduan' => $BuktiPengaduan, 'dokumenpendukung' => $dokumenpendukung, 'dokumenpendukung2' => $dokumenpendukung2, 'PIC' => $PIC, 'mstr_status_pic' => $mstr_status_pic, 'TrhPengaduan' => $TrhPengaduan, 'TrhPIC' => $TrhPIC, 'mstr_status_pic' => $mstr_status_pic, 'Tindaklanjut' => $Tindaklanjut, 'subbid' => $subbid, 'subbid2' => $subbid2]);
            }

            else{
                $dokumenpendukung =[];
                $dokumenpendukung2 =[];
            return view('pic.ProsesPengaduan')->with(['DetailPengaduan' => $DetailPengaduan, 'BuktiPengaduan' => $BuktiPengaduan, 'PIC' => $PIC, 'mstr_status_pic' => $mstr_status_pic, 'TrhPIC' => $TrhPIC, 'mstr_status_pic' => $mstr_status_pic, 'dokumenpendukung' => $dokumenpendukung, 'dokumenpendukung2' => $dokumenpendukung2, 'TrhPengaduan' => $TrhPengaduan, 'Tindaklanjut' => $Tindaklanjut, 'subbid' => $subbid, 'subbid2' => $subbid2]);
            }
        }

    public function AddTindaklanjut(Request $request)
    {   
        // dd($request->all());
        // dd($request->file('files'));
            $id_tindaklanjut = \App\Models\TrdTindaklanjut::insertGetId([
                    'mstr_pengaduan_id'         => $request->mstr_pengaduan_id,
                    'idt_pic'                   => $request->idt_pic,
                    'user_id'                   => session()->get('user_id'),
                    'status_tindaklanjut'       => $request->status_tindaklanjut,
                    'bidang_id'                 => substr(session()->get('subbid'),1,1),
                    'subbid_id'                 => session()->get('subbid'),
                    'tindak_lanjut'             => '',
                    'tl_by'                     => session()->get('level'),
                    'created_at'                => date('Y-m-d H:i:s'),
                    'updated_at'                => date('Y-m-d H:i:s')
                ]);

            $tindaklanjut = \App\Models\TrdTindaklanjut::find($id_tindaklanjut);
            $dom = new \DOMDocument();
                    libxml_use_internal_errors(true);
                    $dom->loadHTML($request->tindaklanjut,LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
                    libxml_clear_errors();
            $tindaklanjut->tindak_lanjut        = $dom->saveHTML();
            $tindaklanjut->save();

            $idt_pic = \App\Models\TrhPIC::find($request->idt_pic);
            $idt_pic->status_pic        = $request->status_tindaklanjut;
            $idt_pic->save();

            if(!is_null($request->file('files'))){
            foreach($request->file('files') as $dokumen)
                {
                    // dd($pic_subbid);
                    $trd_dokumen = new \App\Models\TrdDokumen;
                    $trd_dokumen->mstr_pengaduan_id     = $request->mstr_pengaduan_id;
                    // $trd_dokumen->idt_pic               = $request->idt_pic;
                    $trd_dokumen->trd_tindaklanjut_id   = $id_tindaklanjut;
                    $file = $dokumen->getClientOriginalName();
                            $nama_file = $id_tindaklanjut."_".$file;
                            // dd($nama_file);
                            $trd_dokumen->nama_file        = $nama_file;
                            $dokumen->move(public_path('dokumen/'), $nama_file);
                    $trd_dokumen->save();
                }
            }

            $has_processed = \App\Models\TrhPIC::where([
                    ['mstr_pengaduan_id', '=', $request->mstr_pengaduan_id],
                    ['status_pic', '=', '1']
                ])
            ->orwhere([
                    ['mstr_pengaduan_id', '=', $request->mstr_pengaduan_id],
                    ['status_pic', '=', '2']
                ])
            ->count();
            // dd($has_processed);

            if($has_processed == 0)
                {
                    $MstrPengaduan = \App\Models\MstrPengaduan::find($request->mstr_pengaduan_id);
                    $MstrPengaduan->status_pengaduan = '5';
                    $MstrPengaduan->save();

                    $TrHistory = new \App\Models\TrHistoryStatus;
                    $TrHistory->mstr_pengaduan_id = $request->mstr_pengaduan_id;
                    $TrHistory->status_id = '5';
                    $TrHistory->user_id = session()->get('user_id');
                    $TrHistory->save();

                    return redirect()->action('App\Http\Controllers\PicController@PengaduanDiprosess')->with('Sukses', 'Hasil Tindaklanjut Berhasil Dikirim');
                }
                elseif($has_processed > 0)
                {
                    return redirect()->action('App\Http\Controllers\PicController@PengaduanDiprosess')->with('Sukses', 'Hasil Tindaklanjut Berhasil Dikirim');
                }
    }


    public function FinalAnswer(Request $request)
    {   
        // dd($request->all());
            $final_answer = new \App\Models\TrdFinalAnswer;
            $final_answer->mstr_pengaduan_id        = $request->mstr_pengaduan_id;
            $final_answer->no_tiket                 = $request->no_tiket;
            $final_answer->user_id                  = session()->get('user_id');
            $dom = new \DOMDocument();
                    libxml_use_internal_errors(true);
                    $dom->loadHTML($request->final_answer,LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
                    libxml_clear_errors();
            $final_answer->final_answer             = $dom->saveHTML();
            $final_answer->save();

            foreach($request->is_send as $is_send)
            {
                $send_dok = \App\Models\TrdDokumen::where('id_dokumen',$is_send)
                    ->update(['is_send' => '1']);
            }

            $idt_pic = \App\Models\MstrPengaduan::find($request->mstr_pengaduan_id);
            $idt_pic->status_pengaduan        = 6;
            $idt_pic->save();
            
            return redirect()->action('App\Http\Controllers\PicController@PengaduanDiprosess')->with('Sukses2', 'Jawaban Final Berhasil Dikirim');
            
    }


    public function PengaduanSelesai()
        {   
            $pengaduan_selesai = \App\Models\TrhPIC::leftjoin('mstr_pengaduan', function($join2) {
            $join2->on('trh_pic.mstr_pengaduan_id', '=', 'mstr_pengaduan.id');})
            ->leftjoin('mstr_status', function($join2) {
            $join2->on('mstr_pengaduan.status_pengaduan', '=', 'mstr_status.id_status');})
        // ->where('bidang_id','=',\DB::raw('susbtr(session()->get('subbid'),1,1)'))
            ->select('mstr_pengaduan_id', 'no_tiket', 'subbid_id', 'status_pengaduan', 'keterangan', 'kategori_pengaduan','oranglayanan_terlapor', 'mstr_pengaduan.created_at as waktu_pelaporan', 'mstr_pengaduan.updated_at as tanggal_update')
            ->where('pic_id',session()->get('user_id'))
            ->where('status_pengaduan',10)
            ->get();
            // dd($pengaduan_selesai );

            return view('pic.PengaduanSelesai')->with(['pengaduan_selesai' => $pengaduan_selesai]);
        }


    public function PengaduanDetail($mstr_pengaduan_id)
        {   
            $id_pengaduan=decrypt($mstr_pengaduan_id);
            // dd($id_pengaduan);
            $DetailPengaduan = \App\Models\MstrPengaduan::where('id',$id_pengaduan)
            ->get();
            $BuktiPengaduan = \App\Models\TrdBukti::where('mstr_pengaduan_id',$id_pengaduan)
            ->get();

            $PIC = \App\Models\TrhPIC::leftjoin('mstr_pengaduan', function($join) {
            $join->on('trh_pic.mstr_pengaduan_id', '=', 'mstr_pengaduan.id');})
            ->leftjoin('mstr_status', function($join2) {
            $join2->on('mstr_pengaduan.status_pengaduan', '=', 'mstr_status.id_status');})
            ->leftjoin('users', function($join3) {
            $join3->on('trh_pic.pic_id', '=', 'users.id');})
            ->leftjoin('mstr_status_pic', function($join5) {
            $join5->on('trh_pic.status_pic', '=', 'mstr_status_pic.id_status_pic');})
            ->select('trh_pic.mstr_pengaduan_id','trh_pic.subbid_id','pic_id', 'status_pic','assigned_by','trh_pic.created_at as pic_created_at', 'trh_pic.updated_at as pic_updated_at','no_tiket', 'status_pengaduan', 'mstr_pengaduan.created_at as created_at', 'mstr_pengaduan.updated_at as updated_at', 'assigned_by','users.role', 'mstr_status.keterangan as mstr_status_ket', 'mstr_status_pic.keterangan as mstr_status_pic_ket', 'name')
            ->where('mstr_pengaduan_id',$id_pengaduan)
            ->orderBy('trh_pic.subbid_id')
            ->get();

            $Tindaklanjut = \App\Models\TrdTindaklanjut::where('mstr_pengaduan_id',$id_pengaduan)
            // ->where('idt_pic',$idt_pic)
            ->get();
            // dd($Tindaklanjut);

            $subbid = \App\Models\TrhPIC::where('mstr_pengaduan_id',$id_pengaduan)
            ->get();

            $final_answer = \App\Models\TrdFinalAnswer::where('mstr_pengaduan_id',$id_pengaduan)
            ->get();

            if(!$Tindaklanjut->isEmpty())
            {
                foreach ($Tindaklanjut as $Tindaklanjut2) {
                    $id_tindaklanjuts[] = $Tindaklanjut2->id_tindaklanjut;
                }
                // dd($id_tindaklanjuts);

                $dokumenpendukung = \App\Models\TrdDokumen::where('mstr_pengaduan_id',$id_pengaduan)
                ->whereIn('trd_tindaklanjut_id',$id_tindaklanjuts)
                ->get();
                $dokumenpendukung2 = \App\Models\TrdDokumen::where('mstr_pengaduan_id',$id_pengaduan)
                ->where('is_send',1)
                ->get();
                // dd($dokumenpendukung);
                // dd($dokumenpendukung2);

                return view('pic.PengaduanDetail')->with(['DetailPengaduan' => $DetailPengaduan, 'BuktiPengaduan' => $BuktiPengaduan, 'PIC' => $PIC, 'Tindaklanjut' => $Tindaklanjut, 'subbid' => $subbid, 'dokumenpendukung' => $dokumenpendukung, 'dokumenpendukung2' => $dokumenpendukung2, 'final_answer' => $final_answer]);
            }

            else{
                return view('pic.PengaduanDetail')->with(['DetailPengaduan' => $DetailPengaduan, 'BuktiPengaduan' => $BuktiPengaduan, 'PIC' => $PIC, 'Tindaklanjut' => $Tindaklanjut, 'subbid' => $subbid, 'final_answer' => $final_answer]);
            }
            
        }


}

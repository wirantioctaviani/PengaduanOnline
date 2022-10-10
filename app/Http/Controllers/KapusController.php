<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KapusController extends Controller
{
    
	public function HomeKapus()
    {
        $pengaduan_new = \App\Models\TrhKapus::leftjoin('mstr_pengaduan', function($join2) {
            $join2->on('trh_kapus.mstr_pengaduan_id', '=', 'mstr_pengaduan.id');})
        // ->where('bidang_id','=',\DB::raw('susbtr(session()->get('subbid'),1,1)'))
        ->where('kapus_id',session()->get('user_id'))
        ->where('status_pengaduan',2)
        ->count();

        $pengaduan_ditindaklanjuti = \App\Models\TrhKapus::leftjoin('mstr_pengaduan', function($join2) {
            $join2->on('trh_kapus.mstr_pengaduan_id', '=', 'mstr_pengaduan.id');})
        // ->where('bidang_id','=',\DB::raw('susbtr(session()->get('subbid'),1,1)'))
        ->where('kapus_id',session()->get('user_id'))
        ->where('is_answering',1)
        ->where('status_pengaduan',6)
        ->count();

        // dd($pengaduan_new);
        // $pengaduan_onprocess = \App\Models\TrhKapus::leftjoin('mstr_pengaduan', function($join2) {
        //     $join2->on('trh_kapus.mstr_pengaduan_id', '=', 'mstr_pengaduan.id');})
        // // ->where('bidang_id','=',\DB::raw('susbtr(session()->get('subbid'),1,1)'))
        // ->where([
        //             ['kapus_id', '=', session()->get('user_id')],
        //             ['status_pengaduan', '=', '3']
        //         ])
        // ->orwhere([
        //             ['kapus_id', '=', session()->get('user_id')],
        //             ['status_pengaduan', '=', '4']
        //         ])
        // ->orwhere([
        //             ['kapus_id', '=', session()->get('user_id')],
        //             ['status_pengaduan', '=', '5']
        //         ])
        // ->count();

        $pengaduan_onprocess = \App\Models\MstrPengaduan::where('status_pengaduan',3)
        ->orwhere('status_pengaduan',4)
        ->orwhere('status_pengaduan',5)
        ->orwhere('status_pengaduan',7)
        ->orwhere('status_pengaduan',8)
        ->orwhere('status_pengaduan',9)
        ->orwhere('status_pengaduan',1)
        ->count();
        // dd($pengaduan_onprocess);

        $pengaduan_closed = \App\Models\MstrPengaduan::
        // leftjoin('mstr_pengaduan', function($join2) {
        //     $join2->on('trh_koordinator.mstr_pengaduan_id', '=', 'mstr_pengaduan.id');})
        // ->where('bidang_id','=',\DB::raw('susbtr(session()->get('subbid'),1,1)'))
        where([
                    ['status_pengaduan', '=', '10']
                ])
        ->count();   
            // dd($pengaduan_new);
        return view('kapus.HomeKapus')->with(['pengaduan_new' => $pengaduan_new,'pengaduan_ditindaklanjuti' => $pengaduan_ditindaklanjuti,'pengaduan_onprocess' => $pengaduan_onprocess,'pengaduan_closed' => $pengaduan_closed]);
    }


    public function PengaduanBaru(){
        $pengaduan_new = \App\Models\TrhKapus::leftjoin('mstr_pengaduan', function($join2) {
            $join2->on('trh_kapus.mstr_pengaduan_id', '=', 'mstr_pengaduan.id');})
            ->leftjoin('mstr_status', function($join4) {
            $join4->on('mstr_pengaduan.status_pengaduan', '=', 'mstr_status.id_status');})
             ->leftjoin('users', function($join3) {
            $join3->on('trh_kapus.assigned_by', '=', 'users.id');})
             ->leftjoin('mstr_role', function($join5) {
            $join5->on('users.role', '=', 'mstr_role.id_role');})
            ->select('mstr_pengaduan.id', 'kapus_id','has_picked', 'is_answering', 'has_chosen', 'status_pic', 'assigned_by', 'trh_kapus.created_at as kapus_created_at', 'trh_kapus.updated_at as kapus_updated_at', 'status_pengaduan', 'no_tiket', 'kategori_pengaduan', 'mstr_pengaduan.created_at as created_at', 'mstr_pengaduan.updated_at as updated_at', 'keterangan', 'oranglayanan_terlapor','users.role', 'nama_role')
            ->where('kapus_id',session()->get('user_id'))
            ->where('status_pengaduan',2)
            ->get();
            // dd($pengaduan_new);

            $pengaduan_new2 = \App\Models\TrhKapus::leftjoin('mstr_pengaduan', function($join2) {
            $join2->on('trh_kapus.mstr_pengaduan_id', '=', 'mstr_pengaduan.id');})
            ->select('mstr_pengaduan.id','idt_penanggungjawab', 'kapus_id','has_picked', 'is_answering', 'has_chosen', 'status_pic', 'assigned_by', 'trh_kapus.created_at as kapus_created_at', 'trh_kapus.updated_at as kapus_updated_at', 'status_pengaduan', 'no_tiket', 'kategori_pengaduan', 'mstr_pengaduan.created_at as created_at', 'mstr_pengaduan.updated_at as updated_at', 'oranglayanan_terlapor', 'waktu_kejadian', 'judul_pelanggaran', 'tempat_kejadian', 'detail_pelanggaran')
            ->where('kapus_id',session()->get('user_id'))
            ->where('status_pengaduan',2)
            ->get();
            // dd($idt_koordinator);

            $bukti = \App\Models\TrdBukti::get();
        // $pengaduan_new2 = \App\Models\MstrPengaduan::where('status_pengaduan','3')
        //     ->get();
        // dd($pengaduan_new);
        return view('kapus.PengaduanNew')->with(['pengaduan_new' => $pengaduan_new, 'pengaduan_new2' => $pengaduan_new2,  'bukti' => $bukti]);
    }


    public function PilihKoor(Request $request)
    {
            // dd($request->all());
            if($request->is_answering == 1) {
                $kapus = \App\Models\TrhKapus::where('idt_penanggungjawab',$request->idt_penanggungjawab)
                            ->update(['has_picked' => '1','is_answering' => '1', 'status_pic' => '1']);
                // $has_chosen = \App\Models\TrhKapus::where('mstr_pengaduan_id',$request->id)
                //     ->where('has_picked', 0)
                //     ->count();
                    // dd($has_chosen);

                // if($has_chosen == 0)
                // {
                    $MstrPengaduan = \App\Models\MstrPengaduan::find($request->id);
                    $MstrPengaduan->status_pengaduan = '6';
                    $MstrPengaduan->tl_by = session()->get('level');
                    $MstrPengaduan->save();

                    $TrHistory = new \App\Models\TrHistoryStatus;
                            $TrHistory->mstr_pengaduan_id = $request->id;
                            $TrHistory->status_id = '6';
                            $TrHistory->user_id = session()->get('user_id');
                            $TrHistory->save();

                //     return redirect()->action('App\Http\Controllers\KapusController@PengaduanBaru')->with('Sukses', 'PIC Berhasil Dipilih');
                // }
                // else
                // {
                //     return redirect()->action('App\Http\Controllers\KapusController@PengaduanBaru')->with('Sukses', 'PIC Berhasil Dipilih');
                // }
                        return redirect()->action('App\Http\Controllers\KapusController@PengaduanBaru')->with('Sukses', 'PIC Berhasil Dipilih');
            }
            else{
                if(is_null($request->pic_bidang))
                 {

                    return redirect()->action('App\Http\Controllers\KapusController@PengaduanBaru')->with('Gagal1', 'PIC Belum Dipilih');
                 }
                else
                 {
                    foreach($request->pic_bidang as $pic_bidang)
                    {
                        $koor_id = \App\Models\User::where(\DB::raw('substr(subbid, 1, 1)'),'=',$request->pic_bidang)
                        ->where('role','2')
                        ->where('is_active','1')
                        ->value('id');
                        // dd($koor_id);
                        $TrhKoordinator = new \App\Models\TrhKoordinator;
                        $TrhKoordinator->mstr_pengaduan_id = $request->id;
                        $TrhKoordinator->bidang_id = $pic_bidang;
                        $TrhKoordinator->assigned_by = session()->get('user_id');
                        $TrhKoordinator->koor_id = $koor_id;
                        $TrhKoordinator->save();
                    }
                    // $TrhPIC = new \App\Models\TrhPIC;
                    //     $TrhPIC->mstr_pengaduan_id = $request->id;
                    //     $TrhPIC->idt_subkoordinator = $request->idt_subkoordinator;
                    //     $TrhPIC->subbid_id = $request->subbid_id;
                    //     $TrhPIC->pic_id = $request->pic;
                    //     $TrhPIC->status_pic = '1';
                    //     $TrhPIC->assigned_by = session()->get('user_id');
                    //     $TrhPIC->save();
                    $kapus = \App\Models\TrhKapus::where('idt_penanggungjawab',$request->idt_penanggungjawab)
                            ->update(['has_picked' => '1', 'has_chosen' => '1']);
                    // $has_chosen = \App\Models\TrhSubkoordinator::where('mstr_pengaduan_id',$request->id)
                    // ->where('has_picked', 0)
                    // ->count();
                    // // dd($has_chosen);
                    // if($has_chosen == 0)
                    // {
                        $MstrPengaduan = \App\Models\MstrPengaduan::find($request->id);
                        $MstrPengaduan->status_pengaduan = '3';
                        $MstrPengaduan->tl_by = session()->get('level');
                        $MstrPengaduan->save();

                        $TrHistory = new \App\Models\TrHistoryStatus;
                                $TrHistory->mstr_pengaduan_id = $request->id;
                                $TrHistory->status_id = '3';
                                $TrHistory->user_id = session()->get('user_id');
                                $TrHistory->save();
                    //     return redirect()->action('App\Http\Controllers\KapusController@PengaduanBaru')->with('Sukses', 'PIC Berhasil Dipilih');
                    // }
                    // else
                    // {
                    //     return redirect()->action('App\Http\Controllers\KapusController@PengaduanBaru')->with('Sukses', 'PIC Berhasil Dipilih');
                    // }
                            return redirect()->action('App\Http\Controllers\KapusController@PengaduanBaru')->with('Sukses', 'PIC Berhasil Dipilih');
                }
            }
    }


    public function PengaduanDitindaklanjuti(){
        $pengaduan_new = \App\Models\TrhKapus::leftjoin('mstr_pengaduan', function($join2) {
            $join2->on('trh_kapus.mstr_pengaduan_id', '=', 'mstr_pengaduan.id');})
            ->leftjoin('mstr_status', function($join4) {
            $join4->on('mstr_pengaduan.status_pengaduan', '=', 'mstr_status.id_status');})
             ->leftjoin('users', function($join3) {
            $join3->on('trh_kapus.assigned_by', '=', 'users.id');})
             ->leftjoin('mstr_role', function($join5) {
            $join5->on('users.role', '=', 'mstr_role.id_role');})
            ->select('mstr_pengaduan.id', 'kapus_id','has_picked', 'is_answering', 'has_chosen', 'status_pic', 'assigned_by', 'trh_kapus.created_at as kapus_created_at', 'trh_kapus.updated_at as kapus_updated_at', 'status_pengaduan', 'no_tiket', 'kategori_pengaduan', 'mstr_pengaduan.created_at as created_at', 'mstr_pengaduan.updated_at as updated_at', 'keterangan', 'oranglayanan_terlapor','users.role', 'nama_role')
            ->where('kapus_id',session()->get('user_id'))
            ->where('status_pengaduan',6)
            ->get();
            // dd($pengaduan_new);

        return view('kapus.PengaduanDitindaklanjuti')->with(['pengaduan_new' => $pengaduan_new]);
    }


    public function ProsesPengaduan($id)
        {
            $id_pengaduan=decrypt($id);
            // dd($id_pengaduan);
            $DetailPengaduan = \App\Models\MstrPengaduan::where('id',$id_pengaduan)
            ->get();
            // dd($DetailPengaduan);
            $mstr_status_pic = \App\Models\MstrStatusPic::all();
            $BuktiPengaduan = \App\Models\TrdBukti::where('mstr_pengaduan_id',$id_pengaduan)
            ->get();
            $TrhPengaduan = \App\Models\TrhKapus::where('mstr_pengaduan_id',$id_pengaduan)
            ->where('kapus_id',session()->get('user_id'))
            ->get();

            $subbids = \App\Models\TrhKapus::where('mstr_pengaduan_id',$id_pengaduan)
            ->get();

            $Tindaklanjut = \App\Models\TrdTindaklanjut::where('mstr_pengaduan_id',$id_pengaduan)
            // ->where('idt_pic',$idt_pic)
            ->get();
            // dd($Tindaklanjut);

        $PIC = \App\Models\TrhKapus::leftjoin('mstr_pengaduan', function($join2) {
            $join2->on('trh_kapus.mstr_pengaduan_id', '=', 'mstr_pengaduan.id');})
            ->leftjoin('mstr_status_pic', function($join4) {
            $join4->on('trh_kapus.status_pic', '=', 'mstr_status_pic.id_status_pic');})
            ->select('idt_penanggungjawab','mstr_pengaduan.id', 'kapus_id','has_picked', 'is_answering', 'has_chosen', 'status_pic', 'assigned_by', 'trh_kapus.created_at as kapus_created_at', 'trh_kapus.updated_at as kapus_updated_at', 'status_pengaduan', 'no_tiket', 'kategori_pengaduan', 'mstr_pengaduan.created_at as created_at', 'mstr_pengaduan.updated_at as updated_at', 'keterangan', 'oranglayanan_terlapor', 'mstr_status_pic.keterangan as ket_status_pic')
            ->where('kapus_id',session()->get('user_id'))
            ->where('status_pengaduan',6)
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

                return view('kapus.ProsesPengaduan')->with(['DetailPengaduan' => $DetailPengaduan, 'BuktiPengaduan' => $BuktiPengaduan, 'dokumenpendukung' => $dokumenpendukung, 'dokumenpendukung2' => $dokumenpendukung2, 'PIC' => $PIC, 'mstr_status_pic' => $mstr_status_pic, 'TrhPengaduan' => $TrhPengaduan, 'mstr_status_pic' => $mstr_status_pic, 'Tindaklanjut' => $Tindaklanjut, 'subbids' => $subbids]);
            }

            else{
                $dokumenpendukung =[];
                $dokumenpendukung2 =[];
            return view('kapus.ProsesPengaduan')->with(['DetailPengaduan' => $DetailPengaduan, 'BuktiPengaduan' => $BuktiPengaduan, 'PIC' => $PIC, 'mstr_status_pic' => $mstr_status_pic, 'mstr_status_pic' => $mstr_status_pic, 'dokumenpendukung' => $dokumenpendukung, 'dokumenpendukung2' => $dokumenpendukung2, 'TrhPengaduan' => $TrhPengaduan, 'Tindaklanjut' => $Tindaklanjut, 'subbids' => $subbids]);
            }
        }


    public function AddTindaklanjut(Request $request)
    {   
        // dd($request->all());
        // dd($request->file('files'));
            $id_tindaklanjut = \App\Models\TrdTindaklanjut::insertGetId([
                    'mstr_pengaduan_id'         => $request->mstr_pengaduan_id,
                    'idt_kapus'                 => $request->idt_penanggungjawab,
                    'user_id'                   => session()->get('user_id'),
                    'status_tindaklanjut'       => $request->status_tindaklanjut,
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

            $idt_kapus = \App\Models\TrhKapus::where('idt_penanggungjawab',$request->idt_penanggungjawab)
                    ->update(['status_pic' => $request->status_tindaklanjut]);

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

            $has_processed = \App\Models\TrhKapus::where([
                    ['mstr_pengaduan_id', '=', $request->mstr_pengaduan_id],
                    ['status_pic', '=', '1']
                ])
            ->orwhere([
                    ['mstr_pengaduan_id', '=', $request->mstr_pengaduan_id],
                    ['status_pic', '=', '2']
                ])
            ->count();

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

                    return redirect()->action('App\Http\Controllers\KapusController@PengaduanDitindaklanjuti')->with('Sukses3', 'Hasil Tindaklanjut Berhasil Dikirim');
                }
                else
                {
                    return redirect()->action('App\Http\Controllers\KapusController@PengaduanDitindaklanjuti')->with('Sukses3', 'Hasil Tindaklanjut Berhasil Dikirim');
                }
    }


    public function PengaduanDiproses(){
        $pengaduan_diproses = \App\Models\MstrPengaduan::leftjoin('mstr_status', function($join4) {
            $join4->on('mstr_pengaduan.status_pengaduan', '=', 'mstr_status.id_status');})
        ->leftjoin('mstr_role', function($join5) {
            $join5->on('mstr_pengaduan.tl_by', '=', 'mstr_role.id_role');})
        ->where('status_pengaduan',3)
        ->orwhere('status_pengaduan',1)
        ->orwhere('status_pengaduan',4)
        ->orwhere('status_pengaduan',5)
        ->orwhere('status_pengaduan',7)
        ->orwhere('status_pengaduan',8)
        ->orwhere('status_pengaduan',9)
        ->orderBy('status_pengaduan')
        ->get();
        // dd($pengaduan_diproses);

        return view('kapus.PengaduanDiproses')->with(['pengaduan_diproses' => $pengaduan_diproses]);
    }



    public function PengaduanView($id)
        {   
            $id_pengaduan=decrypt($id);
            // dd($id_pengaduan);
            $DetailPengaduan = \App\Models\MstrPengaduan::where('id',$id_pengaduan)
            ->get();
            $BuktiPengaduan = \App\Models\TrdBukti::where('mstr_pengaduan_id',$id_pengaduan)
            ->get();

            $kapus = \App\Models\TrhKapus::leftjoin('mstr_pengaduan', function($join) {
            $join->on('trh_kapus.mstr_pengaduan_id', '=', 'mstr_pengaduan.id');})
            ->leftjoin('mstr_status', function($join2) {
            $join2->on('mstr_pengaduan.status_pengaduan', '=', 'mstr_status.id_status');})
            ->leftjoin('users', function($join3) {
            $join3->on('trh_kapus.assigned_by', '=', 'users.id');})
            ->leftjoin('mstr_role', function($join4) {
            $join4->on('users.role', '=', 'mstr_role.id_role');})
            ->select('trh_kapus.mstr_pengaduan_id', 'kapus_id', 'is_answering', 'has_chosen', 'status_pic','trh_kapus.created_at as kapus_created_at', 'trh_kapus.updated_at as kapus_updated_at','no_tiket', 'status_pengaduan', 'mstr_pengaduan.created_at as created_at', 'mstr_pengaduan.updated_at as updated_at', 'assigned_by','users.role', 'nama_role')
            ->where('mstr_pengaduan_id',$id_pengaduan)
            ->first();
            // dd($kapus);

            $koordinator = \App\Models\TrhKoordinator::leftjoin('mstr_pengaduan', function($join) {
            $join->on('trh_koordinator.mstr_pengaduan_id', '=', 'mstr_pengaduan.id');})
            ->leftjoin('mstr_status', function($join2) {
            $join2->on('mstr_pengaduan.status_pengaduan', '=', 'mstr_status.id_status');})
            ->leftjoin('users', function($join3) {
            $join3->on('trh_koordinator.assigned_by', '=', 'users.id');})
            ->leftjoin('mstr_role', function($join4) {
            $join4->on('users.role', '=', 'mstr_role.id_role');})
            ->leftjoin('mstr_status_pic', function($join5) {
            $join5->on('trh_koordinator.status_pic', '=', 'mstr_status_pic.id_status_pic');})
            ->select('trh_koordinator.mstr_pengaduan_id', 'bidang_id','koor_id', 'is_answering', 'has_chosen', 'status_pic','assigned_by','trh_koordinator.created_at as koor_created_at', 'trh_koordinator.updated_at as koor_updated_at','no_tiket', 'status_pengaduan', 'mstr_pengaduan.created_at as created_at', 'mstr_pengaduan.updated_at as updated_at', 'assigned_by','users.role', 'nama_role', 'has_picked', 'mstr_status.keterangan as mstr_status_ket', 'mstr_status_pic.keterangan as mstr_status_pic_ket')
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

            // $PIC = \App\Models\TrhPIC::leftjoin('mstr_bidang', function($join) {
            // $join->on('trh_pic.subbid_id', '=', 'mstr_bidang.subbid_id');})
            // ->leftjoin('mstr_status_pic', function($join2) {
            // $join2->on('trh_pic.status_pic', '=', 'mstr_status_pic.id_status_pic');})
            // ->leftjoin('users', function($join2) {
            // $join2->on('trh_pic.pic_id', '=', 'users.id');})
            // ->where('mstr_pengaduan_id',$id_pengaduan)
            // ->get();

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

            $kapus = \App\Models\TrhKapus::leftjoin('mstr_pengaduan', function($join2) {
            $join2->on('trh_kapus.mstr_pengaduan_id', '=', 'mstr_pengaduan.id');})
            ->leftjoin('mstr_status_pic', function($join5) {
            $join5->on('trh_kapus.status_pic', '=', 'mstr_status_pic.id_status_pic');})
            ->select('mstr_pengaduan.id','idt_penanggungjawab', 'kapus_id','has_picked', 'is_answering', 'has_chosen', 'status_pic', 'assigned_by', 'trh_kapus.created_at as kapus_created_at', 'trh_kapus.updated_at as kapus_updated_at', 'status_pengaduan', 'no_tiket', 'kategori_pengaduan', 'mstr_pengaduan.created_at as created_at', 'mstr_pengaduan.updated_at as updated_at', 'oranglayanan_terlapor', 'waktu_kejadian', 'judul_pelanggaran', 'tempat_kejadian', 'detail_pelanggaran','mstr_status_pic.keterangan as mstr_status_pic_ket')
            ->where('mstr_pengaduan.id',$id_pengaduan)
            ->get();
            // dd($kapus);

            $Tindaklanjut = \App\Models\TrdTindaklanjut::where('mstr_pengaduan_id',$id_pengaduan)
            // ->where('idt_pic',$idt_pic)
            ->get();
            // dd($Tindaklanjut);

            // $subbid = \App\Models\TrhKoordinator::where('mstr_pengaduan_id',$id_pengaduan)
            // ->get();
            // // dd($subbid);

            $subbid = \App\Models\TrdTindaklanjut::leftjoin('users', function($join2) {
            $join2->on('trd_tindaklanjut.user_id', '=', 'users.id');})
            ->select('users.subbid', 'trd_tindaklanjut.user_id',\DB::raw('count(tindak_lanjut) as total'))
            ->where('mstr_pengaduan_id',$id_pengaduan)
            // ->where('idt_pic',$idt_pic)
            ->groupBy('trd_tindaklanjut.user_id', 'users.subbid')
            ->orderBy('users.subbid')
            ->get();

            $subbidd = \App\Models\TrhKoordinator::where('mstr_pengaduan_id',$id_pengaduan)
            ->get();

            $subbid1 = \App\Models\TrhSubkoordinator::where('mstr_pengaduan_id',$id_pengaduan)
            ->get();

            $subbid2 = \App\Models\TrhPIC::where('mstr_pengaduan_id',$id_pengaduan)
            ->get();

            $subbids = \App\Models\TrhKapus::where('mstr_pengaduan_id',$id_pengaduan)
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
                // dd($dokumenpendukung);

                return view('kapus.PengaduanView')->with(['DetailPengaduan' => $DetailPengaduan, 'BuktiPengaduan' => $BuktiPengaduan, 'koordinator' => $koordinator, 'subkoordinator' => $subkoordinator, 'PIC' => $PIC, 'Tindaklanjut' => $Tindaklanjut, 'subbid' => $subbid, 'subbid1' => $subbid1, 'subbid2' => $subbid2, 'dokumenpendukung' => $dokumenpendukung, 'kapus' => $kapus, 'subbids' => $subbids, 'subbidd' => $subbidd]);
            }
            // dd($dokumenpendukung);

            // $Tindaklanjut2 = \App\Models\TrdTindaklanjut::leftjoin('trd_dokumen', function($join) {
            // $join->on('trd_tindaklanjut.id_tindaklanjut', '=', 'trd_dokumen.trd_tindaklanjut_id');})
            // ->where('trd_tindaklanjut.mstr_pengaduan_id',$id_pengaduan)
            // ->where('trd_tindaklanjut.idt_pic',$idt_pic)
            // ->get();
            // dd($Tindaklanjut2);

            else{
            return view('kapus.PengaduanView')->with(['DetailPengaduan' => $DetailPengaduan, 'BuktiPengaduan' => $BuktiPengaduan, 'koordinator' => $koordinator, 'subkoordinator' => $subkoordinator, 'PIC' => $PIC, 'Tindaklanjut' => $Tindaklanjut, 'subbid' => $subbid, 'subbid1' => $subbid1, 'subbid2' => $subbid2, 'kapus' => $kapus, 'subbids' => $subbids, 'subbidd' => $subbidd]);
            }
        }



    public function PengaduanSelesai(){
        $pengaduan_selesai = \App\Models\MstrPengaduan::leftjoin('mstr_status', function($join4) {
            $join4->on('mstr_pengaduan.status_pengaduan', '=', 'mstr_status.id_status');})
        ->leftjoin('mstr_role', function($join5) {
            $join5->on('mstr_pengaduan.tl_by', '=', 'mstr_role.id_role');})
        ->select('mstr_pengaduan.id', 'no_tiket', 'oranglayanan_terlapor', 'status_pengaduan', 'tl_by','mstr_pengaduan.created_at as created_at', 'mstr_pengaduan.updated_at as updated_at', 'nama_role', 'keterangan', 'kategori_pengaduan')
        ->where('status_pengaduan',10)
        ->get();
        // dd($pengaduan_selesai);

        return view('kapus.PengaduanSelesai')->with(['pengaduan_selesai' => $pengaduan_selesai]);
    }


    public function PengaduanDetail($id)
        {   
            $id_pengaduan=decrypt($id);
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

            $koordinator = \App\Models\TrhKoordinator::leftjoin('mstr_pengaduan', function($join) {
            $join->on('trh_koordinator.mstr_pengaduan_id', '=', 'mstr_pengaduan.id');})
            ->leftjoin('mstr_status', function($join2) {
            $join2->on('mstr_pengaduan.status_pengaduan', '=', 'mstr_status.id_status');})
            ->leftjoin('users', function($join3) {
            $join3->on('trh_koordinator.assigned_by', '=', 'users.id');})
            ->leftjoin('mstr_role', function($join4) {
            $join4->on('users.role', '=', 'mstr_role.id_role');})
            ->leftjoin('mstr_status_pic', function($join5) {
            $join5->on('trh_koordinator.status_pic', '=', 'mstr_status_pic.id_status_pic');})
            ->select('trh_koordinator.mstr_pengaduan_id', 'trh_koordinator.bidang_id','koor_id', 'is_answering', 'has_chosen', 'status_pic','assigned_by','trh_koordinator.created_at as koor_created_at', 'trh_koordinator.updated_at as koor_updated_at','no_tiket', 'status_pengaduan', 'mstr_pengaduan.created_at as created_at', 'mstr_pengaduan.updated_at as updated_at', 'assigned_by','users.role', 'nama_role', 'has_picked', 'mstr_status.keterangan as mstr_status_ket', 'mstr_status_pic.keterangan as mstr_status_pic_ket')
            ->where('mstr_pengaduan_id',$id_pengaduan)
            ->get();
            // dd($koordinator);

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

            $kapus = \App\Models\TrhKapus::leftjoin('mstr_pengaduan', function($join2) {
            $join2->on('trh_kapus.mstr_pengaduan_id', '=', 'mstr_pengaduan.id');})
            ->leftjoin('mstr_status_pic', function($join5) {
            $join5->on('trh_kapus.status_pic', '=', 'mstr_status_pic.id_status_pic');})
            ->select('mstr_pengaduan.id','idt_penanggungjawab', 'kapus_id','has_picked', 'is_answering', 'has_chosen', 'status_pic', 'assigned_by', 'trh_kapus.created_at as kapus_created_at', 'trh_kapus.updated_at as kapus_updated_at', 'status_pengaduan', 'no_tiket', 'kategori_pengaduan', 'mstr_pengaduan.created_at as created_at', 'mstr_pengaduan.updated_at as updated_at', 'oranglayanan_terlapor', 'waktu_kejadian', 'judul_pelanggaran', 'tempat_kejadian', 'detail_pelanggaran','mstr_status_pic.keterangan as mstr_status_pic_ket')
            ->where('mstr_pengaduan.id',$id_pengaduan)
            ->get();

            $Tindaklanjut = \App\Models\TrdTindaklanjut::where('mstr_pengaduan_id',$id_pengaduan)
            // ->where('idt_pic',$idt_pic)
            ->get();
            // dd($Tindaklanjut);

            $history = \App\Models\TrHistoryStatus::where('mstr_pengaduan_id',$id_pengaduan)
            ->where('status_id',10)
            ->first();
            // dd($history);

            $subbid = \App\Models\TrdTindaklanjut::leftjoin('users', function($join2) {
            $join2->on('trd_tindaklanjut.user_id', '=', 'users.id');})
            ->select('users.subbid', 'trd_tindaklanjut.user_id',\DB::raw('count(tindak_lanjut) as total'))
            ->where('mstr_pengaduan_id',$id_pengaduan)
            // ->where('idt_pic',$idt_pic)
            ->groupBy('trd_tindaklanjut.user_id', 'users.subbid')
            ->orderBy('users.subbid')
            ->get();
            // dd($subbid);

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

                return view('kapus.PengaduanDetail')->with(['DetailPengaduan' => $DetailPengaduan, 'BuktiPengaduan' => $BuktiPengaduan, 'PIC' => $PIC, 'Tindaklanjut' => $Tindaklanjut, 'subbid' => $subbid, 'dokumenpendukung' => $dokumenpendukung, 'dokumenpendukung2' => $dokumenpendukung2, 'final_answer' => $final_answer, 'koordinator' => $koordinator, 'subkoordinator' => $subkoordinator, 'kapus' => $kapus, 'history' => $history]);
            }

            else{
                return view('kapus.PengaduanDetail')->with(['DetailPengaduan' => $DetailPengaduan, 'BuktiPengaduan' => $BuktiPengaduan, 'PIC' => $PIC, 'Tindaklanjut' => $Tindaklanjut, 'subbid' => $subbid, 'final_answer' => $final_answer, 'koordinator' => $koordinator, 'subkoordinator' => $subkoordinator, 'kapus' => $kapus, 'history' => $history]);
            }
        }


}

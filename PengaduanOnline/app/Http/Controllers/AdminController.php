<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{   
    public function index()
    {
        $pengaduan_new = \App\Models\MstrPengaduan::where('status_pengaduan','1')
            ->count();

        $pengaduan_ditl = \App\Models\MstrPengaduan::where('status_pengaduan','5')
            ->count();

        $pengaduan_onprocess = \App\Models\MstrPengaduan::where('status_pengaduan','2')
            ->orwhere('status_pengaduan','3')
            ->orwhere('status_pengaduan','4')
            ->orwhere('status_pengaduan','6')
            ->orwhere('status_pengaduan','7')
            ->orwhere('status_pengaduan','8')
            ->orwhere('status_pengaduan','9')
            ->count();
            // dd($pengaduan_onprocess);
        $pengaduan_closed = \App\Models\MstrPengaduan::where('status_pengaduan','10')
            ->count();   
            // dd($pengaduan_new);
        return view('Admin.HomeAdmin')->with(['pengaduan_new' => $pengaduan_new,'pengaduan_ditl' => $pengaduan_ditl,'pengaduan_onprocess' => $pengaduan_onprocess,'pengaduan_closed' => $pengaduan_closed]);
    }

    public function HomeAdmin()
    {
        $pengaduan_new = \App\Models\MstrPengaduan::where('status_pengaduan','1')
            ->count();

        $pengaduan_ditl = \App\Models\MstrPengaduan::where('status_pengaduan','5')
            ->count();

        $pengaduan_onprocess = \App\Models\MstrPengaduan::where('status_pengaduan','2')
            ->orwhere('status_pengaduan','3')
            ->orwhere('status_pengaduan','4')
            ->orwhere('status_pengaduan','6')
            ->orwhere('status_pengaduan','7')
            ->orwhere('status_pengaduan','8')
            ->orwhere('status_pengaduan','9')
            ->count();
            // dd($pengaduan_onprocess);
        $pengaduan_closed = \App\Models\MstrPengaduan::where('status_pengaduan','10')
            ->count();  
            // dd($pengaduan_new);
        return view('Admin.HomeAdmin')->with(['pengaduan_new' => $pengaduan_new,'pengaduan_ditl' => $pengaduan_ditl,'pengaduan_onprocess' => $pengaduan_onprocess,'pengaduan_closed' => $pengaduan_closed]);
    }

    public function PengaduanBaru(){
        $pengaduan_new = \App\Models\MstrPengaduan::leftjoin('mstr_status', function($join2) {
            $join2->on('mstr_pengaduan.status_pengaduan', '=', 'mstr_status.id_status');})
            ->where('status_pengaduan','1')
            ->get();

        $pengaduan_new2 = \App\Models\MstrPengaduan::where('status_pengaduan','1')
            ->get();

        $bukti = \App\Models\TrdBukti::get();
        // dd($bukti);
        return view('Admin.PengaduanNew')->with(['pengaduan_new' => $pengaduan_new, 'pengaduan_new2' => $pengaduan_new2, 'bukti' => $bukti]);
    }


    // public function EditKategori2(Request $request)
    // {
    //    foreach($request->pic_bidang as $pic_bidang)
    //     {
    //         // dd($pic_subbid);
    //         $koor_id = \App\Models\User::where(\DB::raw('substr(subbid, 1, 1)'),'=',$pic_bidang)
    //         ->where('role','2')
    //         ->value('id');
    //         // dd($koor_id);

    //         $TrhKoordinator = new \App\Models\TrhKoordinator;
    //         $TrhKoordinator->mstr_pengaduan_id = $request->id;
    //         $TrhKoordinator->bidang_id = $pic_bidang;
    //         $TrhKoordinator->koor_id = $koor_id;
    //         $TrhKoordinator->save();
    //     }

    //     $MstrPengaduan = \App\Models\MstrPengaduan::find($request->id);
    //                 $MstrPengaduan->kategori_pengaduan = $request->kategori_pengaduan;
    //                 $MstrPengaduan->status_pengaduan = '2';
    //                 $MstrPengaduan->save();

    //     $TrHistory = new \App\Models\TrHistoryStatus;
    //         $TrHistory->mstr_pengaduan_id = $request->id;
    //         $TrHistory->status_id = '2';
    //         $TrHistory->user_id = session()->get('user_id');
    //         $TrHistory->save();

    //     return redirect()->action('App\Http\Controllers\AdminController@PengaduanBaru')->with('Sukses', 'Kategori dan Koor Penanggung Jawab Berhasil Dipilih');
    // }

    public function EditKategori(Request $request)
    {
        // dd($request->all());
        if($request->pic_bidang == 4)
        {       
                $kapus_id = \App\Models\User::where('role','5')
                    ->where('is_active','1')
                    ->value('id');
                    // dd($kapus_id);

                    $TrhKapus = new \App\Models\TrhKapus;
                    $TrhKapus->mstr_pengaduan_id = $request->id;
                    $TrhKapus->kapus_id = $kapus_id;
                    $TrhKapus->assigned_by = session()->get('user_id'); //ID ADMIN
                    $TrhKapus->is_answering = 0;
                    $TrhKapus->status_pic = 0;
                    $TrhKapus->save();

                $MstrPengaduan = \App\Models\MstrPengaduan::find($request->id);
                            $MstrPengaduan->kategori_pengaduan = $request->kategori_pengaduan;
                            $MstrPengaduan->status_pengaduan = '2';
                            $MstrPengaduan->save();

                $TrHistory = new \App\Models\TrHistoryStatus;
                    $TrHistory->mstr_pengaduan_id = $request->id;
                    $TrHistory->status_id = '2';
                    $TrHistory->user_id = session()->get('user_id');
                    $TrHistory->save();

                return redirect()->action('App\Http\Controllers\AdminController@PengaduanBaru')->with('Sukses', 'Kategori dan Penanggung Jawab Pengaduan Berhasil Dipilih');
        }
        else
        {
                foreach($request->pic_bidang as $pic_bidang)
                {
                    // dd($pic_subbid);
                    $koor_id = \App\Models\User::where(\DB::raw('substr(subbid, 1, 1)'),'=',$pic_bidang)
                    ->where('role','2')
                    ->where('is_active','1')
                    ->value('id');
                    // dd($koor_id);

                    $TrhKoordinator = new \App\Models\TrhKoordinator;
                    $TrhKoordinator->mstr_pengaduan_id = $request->id;
                    $TrhKoordinator->bidang_id = $pic_bidang;
                    $TrhKoordinator->assigned_by = session()->get('user_id');
                    $TrhKoordinator->koor_id = $koor_id;
                    $TrhKoordinator->status_pic = 0;
                    $TrhKoordinator->save();
                }

                $MstrPengaduan = \App\Models\MstrPengaduan::find($request->id);
                            $MstrPengaduan->kategori_pengaduan = $request->kategori_pengaduan;
                            $MstrPengaduan->status_pengaduan = '3';
                            $MstrPengaduan->save();

                $TrHistory = new \App\Models\TrHistoryStatus;
                    $TrHistory->mstr_pengaduan_id = $request->id;
                    $TrHistory->status_id = '3';
                    $TrHistory->user_id = session()->get('user_id');
                    $TrHistory->save();

                return redirect()->action('App\Http\Controllers\AdminController@PengaduanBaru')->with('Sukses', 'Kategori dan Penanggung Jawab Pengaduan Berhasil Dipilih');
        }
    }


    public function PengaduanDiproses()
        {   
            $pengaduan_new = \App\Models\MstrPengaduan::leftjoin('mstr_status', function($join) {
            $join->on('mstr_pengaduan.status_pengaduan', '=', 'mstr_status.id_status');})
            ->leftjoin('mstr_role', function($join) {
            $join->on('mstr_pengaduan.tl_by', '=', 'mstr_role.id_role');})
            ->select('mstr_pengaduan.id as id_pengaduan', 'no_tiket', 'nama_pelapor', 'telp_pelapor', 'email_pelapor', 'oranglayanan_terlapor', 'satuan_kerja', 'waktu_kejadian', 'tempat_kejadian', 'judul_pelanggaran', 'detail_pelanggaran', 'kategori_pengaduan', 'status_pengaduan', 'mstr_pengaduan.created_at as tanggal_submit', 'mstr_pengaduan.updated_at as tanggal_update', 'mstr_status.keterangan as ket_status', 'tl_by', 'nama_role')
            ->where('status_pengaduan','2')
            ->orwhere('status_pengaduan','3')
            ->orwhere('status_pengaduan','4')
            ->orwhere('status_pengaduan','6')
            ->orwhere('status_pengaduan','7')
            ->orwhere('status_pengaduan','8')
            ->orwhere('status_pengaduan','9')
            ->orderby('mstr_pengaduan.created_at','ASC')
            ->get();

            $pengaduan_new2 = \App\Models\MstrPengaduan::where('status_pengaduan','2')
            ->orwhere('status_pengaduan','3')
            ->orwhere('status_pengaduan','4')
            ->orwhere('status_pengaduan','6')
            ->orwhere('status_pengaduan','7')
            ->orwhere('status_pengaduan','8')
            ->orwhere('status_pengaduan','9')
            ->orderby('mstr_pengaduan.created_at','ASC')
            ->get();

            return view('Admin.PengaduanDiproses')->with(['pengaduan_new' => $pengaduan_new, 'pengaduan_new2' => $pengaduan_new2]);
        }


    public function PengaduanView($id_pengaduan)
        {   
            $id_pengaduan=decrypt($id_pengaduan);
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
            ->get();
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

            $subbid = \App\Models\TrhKoordinator::where('mstr_pengaduan_id',$id_pengaduan)
            ->get();
            // dd($subbid);

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

                return view('Admin.PengaduanView')->with(['DetailPengaduan' => $DetailPengaduan, 'BuktiPengaduan' => $BuktiPengaduan, 'koordinator' => $koordinator, 'subkoordinator' => $subkoordinator, 'PIC' => $PIC, 'Tindaklanjut' => $Tindaklanjut, 'subbid' => $subbid, 'subbid1' => $subbid1, 'subbid2' => $subbid2, 'dokumenpendukung' => $dokumenpendukung, 'kapus' => $kapus, 'subbids' => $subbids]);
            }
            // dd($dokumenpendukung);

            // $Tindaklanjut2 = \App\Models\TrdTindaklanjut::leftjoin('trd_dokumen', function($join) {
            // $join->on('trd_tindaklanjut.id_tindaklanjut', '=', 'trd_dokumen.trd_tindaklanjut_id');})
            // ->where('trd_tindaklanjut.mstr_pengaduan_id',$id_pengaduan)
            // ->where('trd_tindaklanjut.idt_pic',$idt_pic)
            // ->get();
            // dd($Tindaklanjut2);

            else{
            return view('Admin.PengaduanView')->with(['DetailPengaduan' => $DetailPengaduan, 'BuktiPengaduan' => $BuktiPengaduan, 'koordinator' => $koordinator, 'subkoordinator' => $subkoordinator, 'PIC' => $PIC, 'Tindaklanjut' => $Tindaklanjut, 'subbid' => $subbid, 'subbid1' => $subbid1, 'subbid2' => $subbid2, 'kapus' => $kapus, 'subbids' => $subbids]);
            }
        }


    public function PengaduanDitindaklanjuti(){
        $pengaduan_ditindaklanjuti = \App\Models\MstrPengaduan::leftjoin('mstr_status', function($join2) {
            $join2->on('mstr_pengaduan.status_pengaduan', '=', 'mstr_status.id_status');})
            ->leftjoin('mstr_role', function($join2) {
            $join2->on('mstr_pengaduan.tl_by', '=', 'mstr_role.id_role');})
            ->where('status_pengaduan','5')
            ->get();
            // dd($pengaduan_ditindaklanjuti);

            $idt_koordinator = \App\Models\TrhKoordinator::leftjoin('mstr_pengaduan', function($join2) {
            $join2->on('trh_koordinator.mstr_pengaduan_id', '=', 'mstr_pengaduan.id');})
            ->where('koor_id',session()->get('user_id'))
            ->where('status_pengaduan',5)
            ->get();
            // dd($idt_koordinator);

        // dd($pengaduan_new);
        return view('Admin.PengaduanDitindaklanjuti')->with(['pengaduan_ditindaklanjuti' => $pengaduan_ditindaklanjuti, 'idt_koordinator' => $idt_koordinator]);
    }



    public function ProsesPengaduan($id_pengaduan)
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

            $kapus = \App\Models\TrhKapus::leftjoin('mstr_pengaduan', function($join2) {
            $join2->on('trh_kapus.mstr_pengaduan_id', '=', 'mstr_pengaduan.id');})
            ->leftjoin('mstr_status_pic', function($join5) {
            $join5->on('trh_kapus.status_pic', '=', 'mstr_status_pic.id_status_pic');})
            ->select('mstr_pengaduan.id','idt_penanggungjawab', 'kapus_id','has_picked', 'is_answering', 'has_chosen', 'status_pic', 'assigned_by', 'trh_kapus.created_at as kapus_created_at', 'trh_kapus.updated_at as kapus_updated_at', 'status_pengaduan', 'no_tiket', 'kategori_pengaduan', 'mstr_pengaduan.created_at as created_at', 'mstr_pengaduan.updated_at as updated_at', 'oranglayanan_terlapor', 'waktu_kejadian', 'judul_pelanggaran', 'tempat_kejadian', 'detail_pelanggaran','mstr_status_pic.keterangan as mstr_status_pic_ket')
            ->where('mstr_pengaduan.id',$id_pengaduan)
            ->get();

            $subbid = \App\Models\TrdTindaklanjut::leftjoin('users', function($join2) {
            $join2->on('trd_tindaklanjut.user_id', '=', 'users.id');})
            ->select('users.subbid', 'trd_tindaklanjut.user_id',\DB::raw('count(tindak_lanjut) as total'))
            ->where('mstr_pengaduan_id',$id_pengaduan)
            // ->where('idt_pic',$idt_pic)
            ->groupBy('trd_tindaklanjut.user_id', 'users.subbid')
            ->orderBy('users.subbid')
            ->get();

            $subbid2 = \App\Models\TrhSubkoordinator::where('mstr_pengaduan_id',$id_pengaduan)
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

                return view('Admin.ProsesPengaduan')->with(['DetailPengaduan' => $DetailPengaduan, 'BuktiPengaduan' => $BuktiPengaduan, 'koordinator' => $koordinator, 'subkoordinator' => $subkoordinator, 'PIC' => $PIC, 'Tindaklanjut' => $Tindaklanjut, 'subbid' => $subbid, 'subbid2' => $subbid2, 'dokumenpendukung' => $dokumenpendukung, 'dokumenpendukung2' => $dokumenpendukung2, 'kapus' => $kapus]);
            }

            else{
                $dokumenpendukung =[];
                $dokumenpendukung2 =[];
            return view('Admin.ProsesPengaduan')->with(['DetailPengaduan' => $DetailPengaduan, 'BuktiPengaduan' => $BuktiPengaduan, 'koordinator' => $koordinator, 'subkoordinator' => $subkoordinator, 'PIC' => $PIC, 'Tindaklanjut' => $Tindaklanjut, 'subbid' => $subbid, 'subbid2' => $subbid2, 'dokumenpendukung' => $dokumenpendukung, 'dokumenpendukung2' => $dokumenpendukung2, 'kapus' => $kapus]);
            }
        }


    public function FinalAnswer(Request $request)
    {   
        // dd($request->all());
            $final_answer = new \App\Models\TrdFinalAnswer;
            $final_answer->mstr_pengaduan_id        = $request->mstr_pengaduan_id;
            $final_answer->no_tiket                 = $request->no_tiket;
            $final_answer->user_id                  = session()->get('user_id'); //ID ADMIN pada table useradmin
            $dom = new \DOMDocument();
                    libxml_use_internal_errors(true);
                    $dom->loadHTML($request->final_answer,LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
                    libxml_clear_errors();
            $final_answer->final_answer             = $dom->saveHTML();
            $final_answer->save();

            if(isset($request->is_send)) {
            foreach($request->is_send as $is_send)
            {
                $send_dok = \App\Models\TrdDokumen::where('id_dokumen',$is_send)
                    ->update(['is_send' => '1']);
            }
            }

            $idt_pic = \App\Models\MstrPengaduan::find($request->mstr_pengaduan_id);
            $idt_pic->status_pengaduan        = 10;
            $idt_pic->save();

                    $TrHistory = new \App\Models\TrHistoryStatus;
                    $TrHistory->mstr_pengaduan_id = $request->mstr_pengaduan_id;
                    $TrHistory->status_id = '10';
                    $TrHistory->user_id = session()->get('user_id');
                    $TrHistory->save();
            
            return redirect()->action('App\Http\Controllers\AdminController@PengaduanDitindaklanjuti')->with('Sukses2', 'Jawaban Final Berhasil Dikirim');
            
    }


    public function PengaduanSelesai()
        {
            $DetailPengaduan = \App\Models\MstrPengaduan::leftjoin('mstr_status', function($join) {
            $join->on('mstr_pengaduan.status_pengaduan', '=', 'mstr_status.id_status');})
            ->leftjoin('mstr_role', function($join2) {
            $join2->on('mstr_pengaduan.tl_by', '=', 'mstr_role.id_role');})
            ->select('mstr_pengaduan.id as id_pengaduan', 'no_tiket', 'nama_pelapor', 'telp_pelapor', 'email_pelapor', 'oranglayanan_terlapor', 'satuan_kerja', 'waktu_kejadian', 'tempat_kejadian', 'judul_pelanggaran', 'detail_pelanggaran', 'kategori_pengaduan', 'status_pengaduan', 'mstr_pengaduan.created_at as tanggal_submit', 'mstr_pengaduan.updated_at as tanggal_update', 'mstr_status.keterangan as ket_status','tl_by', 'nama_role')
            ->where('status_pengaduan','10')
            ->get();
            return view('Admin.PengaduanSelesai')->with(['DetailPengaduan' => $DetailPengaduan]);
        }

    public function PengaduanDetail($id_pengaduan)
        {   
            $id_pengaduan=decrypt($id_pengaduan);
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

            $subbid = \App\Models\TrdTindaklanjut::leftjoin('users', function($join2) {
            $join2->on('trd_tindaklanjut.user_id', '=', 'users.id');})
            ->select('users.subbid', 'trd_tindaklanjut.user_id',\DB::raw('count(tindak_lanjut) as total'))
            ->where('mstr_pengaduan_id',$id_pengaduan)
            // ->where('idt_pic',$idt_pic)
            ->groupBy('trd_tindaklanjut.user_id', 'users.subbid')
            ->orderBy('users.subbid')
            ->get();

            $final_answer = \App\Models\TrdFinalAnswer::where('mstr_pengaduan_id',$id_pengaduan)
            ->get();

            $history = \App\Models\TrHistoryStatus::where('mstr_pengaduan_id',$id_pengaduan)
            ->where('status_id',10)
            ->first();
            // dd($history);

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

                return view('Admin.PengaduanDetail')->with(['DetailPengaduan' => $DetailPengaduan, 'BuktiPengaduan' => $BuktiPengaduan, 'PIC' => $PIC, 'Tindaklanjut' => $Tindaklanjut, 'subbid' => $subbid, 'dokumenpendukung' => $dokumenpendukung, 'dokumenpendukung2' => $dokumenpendukung2, 'final_answer' => $final_answer, 'koordinator' => $koordinator, 'subkoordinator' => $subkoordinator, 'kapus' => $kapus, 'history' => $history]);
            }

            else{
                return view('Admin.PengaduanDetail')->with(['DetailPengaduan' => $DetailPengaduan, 'BuktiPengaduan' => $BuktiPengaduan, 'PIC' => $PIC, 'Tindaklanjut' => $Tindaklanjut, 'subbid' => $subbid, 'final_answer' => $final_answer, 'koordinator' => $koordinator, 'subkoordinator' => $subkoordinator, 'kapus' => $kapus, 'history' => $history]);
            }
        }


    public function CloseTiket(Request $request)
    {
        // dd($request->all());

            $MstrPengaduan = \App\Models\MstrPengaduan::find($request->id);
            $MstrPengaduan->status_pengaduan        = 10;
            $MstrPengaduan->save();

            $TrHistory = new \App\Models\TrHistoryStatus;
            $TrHistory->mstr_pengaduan_id = $request->id;
            $TrHistory->status_id = '10';
            $TrHistory->user_id = session()->get('user_id');
            $TrHistory->keterangan = $request->keterangan;
            $TrHistory->save();

            return redirect()->action('App\Http\Controllers\AdminController@PengaduanBaru')->with('Sukses2', 'Kategori dan Penanggung Jawab Pengaduan Berhasil Dipilih');
    }


    public function ManageUser()
        {
            $user = \App\Models\user::leftjoin('mstr_role', function($join) {
            $join->on('users.role', '=', 'mstr_role.id_role');})
            ->leftjoin('mstr_bidang', function($join2) {
            $join2->on('users.subbid', '=', 'mstr_bidang.subbid_id');})
            ->orderBy('subbid')
            ->orderBy('role')
            ->orderBy('is_active', 'DESC')
            ->get();
            $user2 = \App\Models\user::leftjoin('mstr_role', function($join) {
            $join->on('users.role', '=', 'mstr_role.id_role');})
            ->get();
            $data_role = \App\Models\MstrRole::all();
            $data_bidang = \App\Models\MstrBidang::all();
            // dd($data_role);
            return view('Admin.ManageUser')->with(['user' => $user, 'data_role' => $data_role, 'data_bidang' => $data_bidang, 'user2' => $user2]);
        }

    public function AddUser(Request $request)
        {
            // dd($request->subbid);
            $test = substr($request->subbid,0,1);
            // dd($test);

            // dd($request->all());

            if($request->role == 2)
            {
                // dd('koor');
                $check = \App\Models\user::where('role',$request->role)
                ->where('is_active',1)
                // ->where('subbid',$request->subbid)
                ->where(\DB::raw('substr(subbid, 1, 1)'), '=',substr($request->subbid,0,1))
                // where(substr('subbid',0,1),$request->subbid)
                ->count();
                // dd($check);

                if($check == 1)
                {
                    return redirect()->action('App\Http\Controllers\AdminController@ManageUser')->with('Error', 'User berhasil ditambahkan');
                }
                else
                {
                    // $AddUser = new \App\Models\User;
                    // $AddUser->name = $request->name;
                    // $AddUser->email = $request->email;
                    // $AddUser->nip = $request->nip;
                    // $AddUser->subbid = $request->subbid;
                    // // $AddUser->subbid = substr($request->subbid,1,1);
                    // $AddUser->role = $request->role;
                    // $AddUser->save();

                    $id_user = \App\Models\User::insertGetId([
                        'name'               => $request->name,
                        'email'              => $request->email,
                        'nip'                => $request->nip,
                        'subbid'             => $request->subbid,
                        'role'               => $request->role,
                        'created_at'         => date('Y-m-d H:i:s'),
                        'updated_at'         => date('Y-m-d H:i:s')
                    ]);

                                if ($request->has('admin')) 
                                    {
                                        // dd('jadi admin juga');
                                        $pass = 'Admin'.substr($request->nip,0,8);
                                        // dd($pass);
                                        $AddUser = new \App\Models\UserAdmin;
                                        $AddUser->users_id = $id_user;
                                        $AddUser->nama = $request->name;
                                        $AddUser->email = $request->email;
                                        $AddUser->nip = $request->nip;
                                        $AddUser->subbid = $request->subbid;
                                        // $AddUser->subbid = substr($request->subbid,1,1);
                                        $AddUser->role = '1';
                                        $AddUser->password = bcrypt($pass);
                                        $AddUser->save();
                                    }
                    return redirect()->action('App\Http\Controllers\AdminController@ManageUser')->with('Sukses', 'User berhasil ditambahkan');
                }
            }
            elseif($request->role == 3)
            {
                // dd('koor');
                $check = \App\Models\user::where('role',$request->role)
                ->where('subbid',$request->subbid)
                ->where('is_active',1)
                ->count();
                // dd($check);

                if($check == 1)
                {
                    return redirect()->action('App\Http\Controllers\AdminController@ManageUser')->with('Error1', 'User berhasil ditambahkan');
                }
                else
                {
                    // $AddUser = new \App\Models\User;
                    // $AddUser->name = $request->name;
                    // $AddUser->email = $request->email;
                    // $AddUser->nip = $request->nip;
                    // $AddUser->subbid = $request->subbid;
                    // // $AddUser->subbid = substr($request->subbid,1,1);
                    // $AddUser->role = $request->role;
                    // $AddUser->save();

                    $id_user = \App\Models\User::insertGetId([
                        'name'               => $request->name,
                        'email'              => $request->email,
                        'nip'                => $request->nip,
                        'subbid'             => $request->subbid,
                        'role'               => $request->role,
                        'created_at'         => date('Y-m-d H:i:s'),
                        'updated_at'         => date('Y-m-d H:i:s')
                    ]);

                                if ($request->has('admin')) 
                                    {
                                        // dd('jadi admin juga');
                                        $pass = 'Admin'.substr($request->nip,0,8);
                                        // dd($pass);
                                        $AddUser = new \App\Models\UserAdmin;
                                        $AddUser->users_id = $id_user;
                                        $AddUser->nama = $request->name;
                                        $AddUser->email = $request->email;
                                        $AddUser->nip = $request->nip;
                                        $AddUser->subbid = $request->subbid;
                                        // $AddUser->subbid = substr($request->subbid,1,1);
                                        $AddUser->role = '1';
                                        $AddUser->password = bcrypt($pass);
                                        $AddUser->save();
                                    }
                    return redirect()->action('App\Http\Controllers\AdminController@ManageUser')->with('Sukses', 'User berhasil ditambahkan');
                }
            }
            elseif($request->role == 5)
            {
                // dd('koor');
                $check = \App\Models\user::where('role',$request->role)
                ->where('is_active',1)
                ->count();
                // dd($check);

                if($check == 1)
                {
                    return redirect()->action('App\Http\Controllers\AdminController@ManageUser')->with('Error2', 'User berhasil ditambahkan');
                }
                else
                {
                    // $AddUser = new \App\Models\User;
                    // $AddUser->name = $request->name;
                    // $AddUser->email = $request->email;
                    // $AddUser->nip = $request->nip;
                    // $AddUser->subbid = '11';
                    // // $AddUser->subbid = substr($request->subbid,1,1);
                    // $AddUser->role = $request->role;
                    // $AddUser->save();

                    $id_user = \App\Models\User::insertGetId([
                        'name'               => $request->name,
                        'email'              => $request->email,
                        'nip'                => $request->nip,
                        'subbid'             => '0',
                        'role'               => $request->role,
                        'created_at'         => date('Y-m-d H:i:s'),
                        'updated_at'         => date('Y-m-d H:i:s')
                    ]);

                                if ($request->has('admin')) 
                                    {
                                        // dd('jadi admin juga');
                                        $pass = 'Admin'.substr($request->nip,0,8);
                                        // dd($pass);
                                        $AddUser = new \App\Models\UserAdmin;
                                        $AddUser->users_id = $id_user;
                                        $AddUser->nama = $request->name;
                                        $AddUser->email = $request->email;
                                        $AddUser->nip = $request->nip;
                                        $AddUser->subbid = $request->subbid;
                                        // $AddUser->subbid = substr($request->subbid,1,1);
                                        $AddUser->role = '1';
                                        $AddUser->password = bcrypt($pass);
                                        $AddUser->save();
                                    }
                    return redirect()->action('App\Http\Controllers\AdminController@ManageUser')->with('Sukses', 'User berhasil ditambahkan');
                }
            }
            else{
                // dd('pegawai');

                // $AddUser = new \App\Models\User;
                // $AddUser->name = $request->name;
                // $AddUser->email = $request->email;
                // $AddUser->nip = $request->nip;
                // $AddUser->subbid = $request->subbid;
                // // $AddUser->subbid = substr($request->subbid,1,1);
                // $AddUser->role = $request->role;
                // $AddUser->save();

                    $id_user = \App\Models\User::insertGetId([
                        'name'               => $request->name,
                        'email'              => $request->email,
                        'nip'                => $request->nip,
                        'subbid'             => $request->subbid,
                        'role'               => $request->role,
                        'created_at'         => date('Y-m-d H:i:s'),
                        'updated_at'         => date('Y-m-d H:i:s')
                    ]);

                                if ($request->has('admin')) 
                                    {
                                        // dd('jadi admin juga');
                                        $pass = 'Admin'.substr($request->nip,0,8);
                                        // dd($pass);
                                        $AddUser = new \App\Models\UserAdmin;
                                        $AddUser->users_id = $id_user;
                                        $AddUser->nama = $request->name;
                                        $AddUser->email = $request->email;
                                        $AddUser->nip = $request->nip;
                                        $AddUser->subbid = $request->subbid;
                                        // $AddUser->subbid = substr($request->subbid,1,1);
                                        $AddUser->role = '1';
                                        $AddUser->password = bcrypt($pass);
                                        $AddUser->save();
                                    }

                return redirect()->action('App\Http\Controllers\AdminController@ManageUser')->with('Sukses', 'User berhasil ditambahkan');
            }
        }

    public function EditUser(Request $request)
    {
        if ($request->has('is_active')) 
        {
            if($request->role == 5)
                {
                    $check = \App\Models\user::where('role',$request->role)
                        ->where('id','!=',$request->id)
                        ->where('is_active',1)
                        ->count();
                        // dd($check);

                    if($check == 1)
                    {
                        return redirect()->action('App\Http\Controllers\AdminController@ManageUser')->with('Error2', 'User berhasil ditambahkan');
                    }
                    else
                    {
                        // dd('Aktif');
                        $user = \App\Models\user::find($request->id);
                        $user->name = $request->name;
                        $user->nip = $request->nip;
                        $user->subbid = '0';
                        $user->email = $request->email;
                        $user->role = $request->role;
                        $user->is_active = '1';
                        $user->save();
                        return redirect()->action('App\Http\Controllers\AdminController@ManageUser')->with('Sukses2', 'Data user berhasil diupdate');
                    }
                }
            elseif($request->role == 2)
                {
                    $check = \App\Models\user::where('role',$request->role)
                        // ->where('subbid',$request->subbid)
                        ->where(\DB::raw('substr(subbid, 1, 1)'), '=',substr($request->subbid,0,1))
                        ->where('id','!=',$request->id)
                        ->where('is_active',1)
                        ->count();
                        // dd($check);

                    if($check == 1)
                    {
                        return redirect()->action('App\Http\Controllers\AdminController@ManageUser')->with('Error', 'User berhasil ditambahkan');
                    }
                    else
                    {
                        // dd('Aktif');
                        $user = \App\Models\user::find($request->id);
                        $user->name = $request->name;
                        $user->nip = $request->nip;
                        $user->subbid = $request->subbid;
                        $user->email = $request->email;
                        $user->role = $request->role;
                        $user->is_active = '1';
                        $user->save();
                        return redirect()->action('App\Http\Controllers\AdminController@ManageUser')->with('Sukses2', 'Data user berhasil diupdate');
                    }
                }
            elseif($request->role == 3)
                {
                    $check = \App\Models\user::where('role',$request->role)
                        ->where('subbid',$request->subbid)
                        ->where('id','!=',$request->id)
                        ->where('is_active',1)
                        ->count();
                        // dd($check);

                    if($check == 1)
                    {
                        return redirect()->action('App\Http\Controllers\AdminController@ManageUser')->with('Error1', 'User berhasil ditambahkan');
                    }
                    else
                    {
                        // dd('Aktif');
                        $user = \App\Models\user::find($request->id);
                        $user->name = $request->name;
                        $user->nip = $request->nip;
                        $user->subbid = $request->subbid;
                        $user->email = $request->email;
                        $user->role = $request->role;
                        $user->is_active = '1';
                        $user->save();
                        return redirect()->action('App\Http\Controllers\AdminController@ManageUser')->with('Sukses2', 'Data user berhasil diupdate');
                    }
                }
            else
                {
                        // dd('Aktif');
                        $user = \App\Models\user::find($request->id);
                        $user->name = $request->name;
                        $user->nip = $request->nip;
                        $user->subbid = $request->subbid;
                        $user->email = $request->email;
                        $user->role = $request->role;
                        $user->is_active = '1';
                        $user->save();
                        return redirect()->action('App\Http\Controllers\AdminController@ManageUser')->with('Sukses2', 'Data user berhasil diupdate');
                }  
        }

        else 
        {
                    // dd('Nonaktif');
            if($request->role == 5)
                {
                    $check = \App\Models\user::where('role',$request->role)
                        ->where('id','!=',$request->id)
                        ->where('is_active',1)
                        ->count();
                        // dd($check);

                        // if($check < 1)
                        // {
                        //     return redirect()->action('App\Http\Controllers\AdminController@ManageUser')->with('Errorx', 'User berhasil ditambahkan');
                        // }
                        // else
                        // {
                            $user = \App\Models\user::find($request->id);
                            $user->name = $request->name;
                            $user->nip = $request->nip;
                            $user->subbid = '0';
                            $user->email = $request->email;
                            $user->role = $request->role;
                            $user->is_active = '0';
                            $user->save();
                            return redirect()->action('App\Http\Controllers\AdminController@ManageUser')->with('Sukses2', 'Data user berhasil diupdate');
                        // }
                }
            elseif($request->role == 2)
                {
                    $check = \App\Models\user::where('role',$request->role)
                        // ->where('subbid',$request->subbid)
                        ->where(\DB::raw('substr(subbid, 1, 1)'), '=',substr($request->subbid,0,1))
                        ->where('id','!=',$request->id)
                        ->where('is_active',1)
                        ->count();
                        // dd($check);

                        // if($check < 1)
                        // {
                        //     return redirect()->action('App\Http\Controllers\AdminController@ManageUser')->with('Errorx', 'User berhasil ditambahkan');
                        // }
                        // else
                        // {
                            $user = \App\Models\user::find($request->id);
                            $user->name = $request->name;
                            $user->nip = $request->nip;
                            $user->subbid = $request->subbid;
                            $user->email = $request->email;
                            $user->role = $request->role;
                            $user->is_active = '0';
                            $user->save();
                            return redirect()->action('App\Http\Controllers\AdminController@ManageUser')->with('Sukses2', 'Data user berhasil diupdate');
                        // }
                }
            elseif($request->role == 3)
                {
                    $check = \App\Models\user::where('role',$request->role)
                        ->where('subbid',$request->subbid)
                        ->where('id','!=',$request->id)
                        ->where('is_active',1)
                        ->count();
                        // dd($check);

                        // if($check < 1)
                        // {
                        //     return redirect()->action('App\Http\Controllers\AdminController@ManageUser')->with('Errorx', 'User berhasil ditambahkan');
                        // }
                        // else
                        // {
                            $user = \App\Models\user::find($request->id);
                            $user->name = $request->name;
                            $user->nip = $request->nip;
                            $user->subbid = $request->subbid;
                            $user->email = $request->email;
                            $user->role = $request->role;
                            $user->is_active = '0';
                            $user->save();
                            return redirect()->action('App\Http\Controllers\AdminController@ManageUser')->with('Sukses2', 'Data user berhasil diupdate');
                        // }
                }
            else
                {
                            $user = \App\Models\user::find($request->id);
                            $user->name = $request->name;
                            $user->nip = $request->nip;
                            $user->subbid = $request->subbid;
                            $user->email = $request->email;
                            $user->role = $request->role;
                            $user->is_active = '0';
                            $user->save();
                            return redirect()->action('App\Http\Controllers\AdminController@ManageUser')->with('Sukses2', 'Data user berhasil diupdate');
                }
        }
    }

    public function ManageAdmin()
    {
            $user = \App\Models\UserAdmin::leftjoin('mstr_role', function($join) {
            $join->on('useradmin.role', '=', 'mstr_role.id_role');})
            ->leftjoin('mstr_bidang', function($join2) {
            $join2->on('useradmin.subbid', '=', 'mstr_bidang.subbid_id');})
            ->orderBy('subbid')
            ->orderBy('role')
            ->get();
            $user2 = \App\Models\UserAdmin::leftjoin('mstr_role', function($join) {
            $join->on('useradmin.role', '=', 'mstr_role.id_role');})
            ->get();

            // $data_user = \App\Models\user::where(\DB::raw('nip not in (select nip from useradmin)'));
            $data_user = DB::table('users')->whereNotIn('nip', function($q){
                            $q->select('nip')->from('useradmin');
                        })
            ->orderBy('role')
            ->get();
            // dd($data_user);

            $data_role = \App\Models\MstrRole::all();
            $data_bidang = \App\Models\MstrBidang::all();
            // dd($data_role);
            return view('Admin.ManageAdmin')->with(['user' => $user, 'data_role' => $data_role, 'data_bidang' => $data_bidang, 'data_user' => $data_user, 'user2' => $user2]);
    }

    public function AddAdmin(Request $request)
    {
            // dd($request->all());

            foreach($request->nip as $nip)
            {
                // dd($pic_subbid);
                $user = \App\Models\User::where('nip','=',$nip)
                ->first();
                // dd($user->name);

                $pass = 'Admin'.substr($nip,0,8);
                // dd($pass);
                $AddUser = new \App\Models\UserAdmin;
                $AddUser->users_id = $user->id;
                $AddUser->nama = $user->name;
                $AddUser->email = $user->email;
                $AddUser->nip = $nip;
                $AddUser->subbid = $user->subbid;
                // $AddUser->subbid = substr($request->subbid,1,1);
                $AddUser->role = '1';
                $AddUser->password = bcrypt($pass);
                $AddUser->save();
            }

            // dd($data_role);
            return redirect()->action('App\Http\Controllers\AdminController@ManageAdmin')->with('Sukses', 'User berhasil ditambahkan');
    }

    public function AddAdmin2(Request $request)
    {
            // dd($request->all());
            $user = \App\Models\UserAdmin::where('nip','=',$request->nip)
                ->first();
            // dd($user);

            if(is_null($user))
            {
                    $pass = 'Admin'.substr($request->nip,0,8);
                        // dd($pass);
                        $AddUser = new \App\Models\UserAdmin;
                        $AddUser->nama = $request->name;
                        $AddUser->email = $request->email;
                        $AddUser->nip = $request->nip;
                        $AddUser->subbid = $request->subbid;
                        // $AddUser->subbid = substr($request->subbid,1,1);
                        $AddUser->role = '1';
                        $AddUser->password = bcrypt($pass);
                        $AddUser->save();
                    // dd($data_role);
                    return redirect()->action('App\Http\Controllers\AdminController@ManageAdmin')->with('Sukses', 'Admin berhasil ditambahkan');
            }
            else{
                    return redirect()->action('App\Http\Controllers\AdminController@ManageAdmin')->with('Gagalx', 'Admin sudah terdaftar');
            }
    }

    public function EditAdmin(Request $request)
    {
        // dd($request->all());
        if ($request->has('is_active')) 
            {
                // dd('Active');
             $non = \App\Models\UserAdmin::where('id_admin',$request->id_admin)
                    ->update(['is_active' => '1']);
            return redirect()->action('App\Http\Controllers\AdminController@ManageAdmin')->with('Suksesy', 'Admin berhasil diaktifkan');
            }
        else{
            // dd('nonaktif');
            $non = \App\Models\UserAdmin::where('id_admin',$request->id_admin)
                    ->update(['is_active' => '0']);
            return redirect()->action('App\Http\Controllers\AdminController@ManageAdmin')->with('Suksesz', 'Admin berhasil dinonaktifkan');
        }
    }
}

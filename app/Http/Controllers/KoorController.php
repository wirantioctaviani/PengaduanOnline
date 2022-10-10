<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KoorController extends Controller
{
    public function HomeKoor()
    {
        $pengaduan_new = \App\Models\TrhKoordinator::leftjoin('mstr_pengaduan', function($join2) {
            $join2->on('trh_koordinator.mstr_pengaduan_id', '=', 'mstr_pengaduan.id');})
        // ->where('bidang_id','=',\DB::raw('susbtr(session()->get('subbid'),1,1)'))
        ->where('koor_id',session()->get('user_id'))
        ->where('status_pengaduan',3)
        ->count();

        $pengaduan_ditindaklanjuti = \App\Models\TrhKoordinator::leftjoin('mstr_pengaduan', function($join2) {
            $join2->on('trh_koordinator.mstr_pengaduan_id', '=', 'mstr_pengaduan.id');})
        // ->where('bidang_id','=',\DB::raw('susbtr(session()->get('subbid'),1,1)'))
        ->where('koor_id',session()->get('user_id'))
        ->where('is_answering',1)
        ->where('status_pengaduan',7)
        ->count();

        // dd($pengaduan_new);
        $pengaduan_onprocess = \App\Models\TrhKoordinator::leftjoin('mstr_pengaduan', function($join2) {
            $join2->on('trh_koordinator.mstr_pengaduan_id', '=', 'mstr_pengaduan.id');})
        // ->where('bidang_id','=',\DB::raw('susbtr(session()->get('subbid'),1,1)'))
        ->where([
                    ['koor_id', '=', session()->get('user_id')],
                    ['status_pengaduan', '=', '4']
                ])
        ->orwhere([
                    ['koor_id', '=', session()->get('user_id')],
                    ['status_pengaduan', '=', '5']
                ])
        ->orwhere([
                    ['koor_id', '=', session()->get('user_id')],
                    ['status_pengaduan', '=', '8']
                ])
        ->orwhere([
                    ['koor_id', '=', session()->get('user_id')],
                    ['status_pengaduan', '=', '9']
                ])
        ->count();

        $pengaduan_closed = \App\Models\TrhKoordinator::leftjoin('mstr_pengaduan', function($join2) {
            $join2->on('trh_koordinator.mstr_pengaduan_id', '=', 'mstr_pengaduan.id');})
        // ->where('bidang_id','=',\DB::raw('susbtr(session()->get('subbid'),1,1)'))
        ->where([
                    ['koor_id', '=', session()->get('user_id')],
                    ['status_pengaduan', '=', '10']
                ])
        ->count();   
            // dd($pengaduan_new);
        return view('koordinator.HomeKoor')->with(['pengaduan_new' => $pengaduan_new,'pengaduan_ditindaklanjuti' => $pengaduan_ditindaklanjuti,'pengaduan_onprocess' => $pengaduan_onprocess,'pengaduan_closed' => $pengaduan_closed]);
    }

    public function PengaduanBaru(){
        $pengaduan_new = \App\Models\TrhKoordinator::leftjoin('mstr_pengaduan', function($join2) {
            $join2->on('trh_koordinator.mstr_pengaduan_id', '=', 'mstr_pengaduan.id');})
            ->leftjoin('mstr_status', function($join4) {
            $join4->on('mstr_pengaduan.status_pengaduan', '=', 'mstr_status.id_status');})
             ->leftjoin('users', function($join3) {
            $join3->on('trh_koordinator.assigned_by', '=', 'users.id');})
             ->leftjoin('mstr_role', function($join5) {
            $join5->on('users.role', '=', 'mstr_role.id_role');})
        // ->where('bidang_id','=',\DB::raw('susbtr(session()->get('subbid'),1,1)'))
            ->select('mstr_pengaduan.id', 'bidang_id', 'koor_id', 'is_answering', 'has_chosen', 'status_pic', 'assigned_by', 'trh_koordinator.created_at as koor_created_at', 'trh_koordinator.updated_at as koor_updated_at', 'status_pengaduan', 'no_tiket', 'kategori_pengaduan', 'mstr_pengaduan.created_at as created_at', 'mstr_pengaduan.updated_at as updated_at', 'keterangan', 'oranglayanan_terlapor','users.role', 'nama_role', 'has_picked')
            ->where('koor_id',session()->get('user_id'))
            ->where('status_pengaduan',3)
            ->get();
            // dd($pengaduan_new);

            $idt_koordinator = \App\Models\TrhKoordinator::leftjoin('mstr_pengaduan', function($join2) {
            $join2->on('trh_koordinator.mstr_pengaduan_id', '=', 'mstr_pengaduan.id');})
            ->select('mstr_pengaduan.id','idt_koordinator', 'bidang_id', 'koor_id', 'is_answering', 'has_chosen', 'status_pic', 'assigned_by', 'trh_koordinator.created_at as koor_created_at', 'trh_koordinator.updated_at as koor_updated_at', 'status_pengaduan', 'no_tiket', 'kategori_pengaduan', 'mstr_pengaduan.created_at as created_at', 'mstr_pengaduan.updated_at as updated_at', 'oranglayanan_terlapor', 'waktu_kejadian', 'judul_pelanggaran', 'tempat_kejadian', 'detail_pelanggaran')
            ->where('koor_id',session()->get('user_id'))
            ->where('status_pengaduan',3)
            ->get();
            // dd($idt_koordinator);

        // $pengaduan_new2 = \App\Models\MstrPengaduan::where('status_pengaduan','3')
        //     ->get();
        // dd($pengaduan_new);
        return view('koordinator.PengaduanNew')->with(['pengaduan_new' => $pengaduan_new, 'idt_koordinator' => $idt_koordinator]);
    }


    public function pick($id)
        {   
            // dd(session()->all());
            $id_pengaduan=decrypt($id);
            // dd($id_pengaduan);
            $DetailPengaduan = \App\Models\MstrPengaduan::where('id',$id_pengaduan)
            ->get();
            $BuktiPengaduan = \App\Models\TrdBukti::where('mstr_pengaduan_id',$id_pengaduan)
            ->get();

            // $kapus = \App\Models\TrhKapus::leftjoin('mstr_pengaduan', function($join) {
            // $join->on('trh_kapus.mstr_pengaduan_id', '=', 'mstr_pengaduan.id');})
            // ->leftjoin('mstr_status', function($join2) {
            // $join2->on('mstr_pengaduan.status_pengaduan', '=', 'mstr_status.id_status');})
            // ->leftjoin('users', function($join3) {
            // $join3->on('trh_kapus.assigned_by', '=', 'users.id');})
            // ->leftjoin('mstr_role', function($join4) {
            // $join4->on('users.role', '=', 'mstr_role.id_role');})
            // ->select('trh_kapus.mstr_pengaduan_id', 'kapus_id', 'is_answering', 'has_chosen', 'status_pic','trh_kapus.created_at as kapus_created_at', 'trh_kapus.updated_at as kapus_updated_at','no_tiket', 'status_pengaduan', 'mstr_pengaduan.created_at as created_at', 'mstr_pengaduan.updated_at as updated_at', 'assigned_by','users.role', 'nama_role')
            // ->where('mstr_pengaduan_id',$id_pengaduan)
            // ->first();
            // dd($kapus);

            $koordinator = \App\Models\TrhKoordinator::leftjoin('mstr_pengaduan', function($join) {
            $join->on('trh_koordinator.mstr_pengaduan_id', '=', 'mstr_pengaduan.id');})
            ->leftjoin('mstr_status', function($join2) {
            $join2->on('mstr_pengaduan.status_pengaduan', '=', 'mstr_status.id_status');})
            ->leftjoin('users', function($join3) {
            $join3->on('trh_koordinator.assigned_by', '=', 'users.id');})
            ->leftjoin('mstr_role', function($join4) {
            $join4->on('users.role', '=', 'mstr_role.id_role');})
            ->select('trh_koordinator.mstr_pengaduan_id', 'bidang_id','koor_id', 'is_answering', 'has_chosen', 'status_pic','assigned_by','trh_koordinator.created_at as koor_created_at', 'trh_koordinator.updated_at as koor_updated_at','no_tiket', 'status_pengaduan', 'mstr_pengaduan.created_at as created_at', 'mstr_pengaduan.updated_at as updated_at', 'assigned_by','users.role', 'nama_role', 'has_picked')
            ->where('mstr_pengaduan_id',$id_pengaduan)
            ->get();
            // dd($koordinator);

            $idt_koordinator = \App\Models\TrhKoordinator::leftjoin('mstr_pengaduan', function($join2) {
            $join2->on('trh_koordinator.mstr_pengaduan_id', '=', 'mstr_pengaduan.id');})
            ->select('mstr_pengaduan.id','idt_koordinator', 'bidang_id', 'koor_id', 'is_answering', 'has_chosen', 'status_pic', 'assigned_by', 'trh_koordinator.created_at as koor_created_at', 'trh_koordinator.updated_at as koor_updated_at', 'status_pengaduan', 'no_tiket', 'kategori_pengaduan', 'mstr_pengaduan.created_at as created_at', 'mstr_pengaduan.updated_at as updated_at', 'oranglayanan_terlapor', 'waktu_kejadian', 'judul_pelanggaran', 'tempat_kejadian', 'detail_pelanggaran')
            ->where('koor_id',session()->get('user_id'))
            ->where('status_pengaduan',3)
            ->get();

            $countpick = \App\Models\TrhKoordinator::leftjoin('mstr_pengaduan', function($join) {
            $join->on('trh_koordinator.mstr_pengaduan_id', '=', 'mstr_pengaduan.id');})
            ->leftjoin('mstr_status', function($join2) {
            $join2->on('mstr_pengaduan.status_pengaduan', '=', 'mstr_status.id_status');})
            ->select('trh_koordinator.mstr_pengaduan_id', 'bidang_id','koor_id', 'is_answering', 'has_chosen', 'status_pic','assigned_by','trh_koordinator.created_at as koor_created_at', 'trh_koordinator.updated_at as koor_updated_at','no_tiket', 'status_pengaduan', 'mstr_pengaduan.created_at as created_at', 'mstr_pengaduan.updated_at as updated_at', 'assigned_by')
            ->where('mstr_pengaduan_id',$id_pengaduan)
            ->where('has_picked',1)
            ->count();
            // dd($countpick);

            $willanswer = \App\Models\TrhKoordinator::leftjoin('mstr_pengaduan', function($join) {
            $join->on('trh_koordinator.mstr_pengaduan_id', '=', 'mstr_pengaduan.id');})
            ->leftjoin('mstr_status', function($join2) {
            $join2->on('mstr_pengaduan.status_pengaduan', '=', 'mstr_status.id_status');})
            ->select('trh_koordinator.mstr_pengaduan_id', 'bidang_id','koor_id', 'is_answering', 'has_chosen', 'status_pic','assigned_by','trh_koordinator.created_at as koor_created_at', 'trh_koordinator.updated_at as koor_updated_at','no_tiket', 'status_pengaduan', 'mstr_pengaduan.created_at as created_at', 'mstr_pengaduan.updated_at as updated_at', 'assigned_by')
            ->where('mstr_pengaduan_id',$id_pengaduan)
            ->where('has_picked',1)
            ->where('is_answering',1)
            ->count();
            // dd($willanswer);

            // $subkoordinator = \App\Models\TrhSubkoordinator::leftjoin('mstr_bidang', function($join) {
            // $join->on('trh_subkoordinator.subbid_id', '=', 'mstr_bidang.subbid_id');})
            // ->leftjoin('mstr_pengaduan', function($join) {
            // $join->on('trh_subkoordinator.mstr_pengaduan_id', '=', 'mstr_pengaduan.id');})
            // ->leftjoin('mstr_status', function($join2) {
            // $join2->on('mstr_pengaduan.status_pengaduan', '=', 'mstr_status.id_status');})
            // ->leftjoin('users', function($join3) {
            // $join3->on('trh_subkoordinator.assigned_by', '=', 'users.id');})
            // ->select('trh_subkoordinator.mstr_pengaduan_id', 'bidang_id','subkoor_id', 'is_answering', 'has_chosen', 'status_pic','assigned_by','trh_subkoordinator.created_at as subkoor_created_at', 'trh_subkoordinator.updated_at as subkoor_updated_at','no_tiket', 'status_pengaduan', 'mstr_pengaduan.created_at as created_at', 'mstr_pengaduan.updated_at as updated_at', 'assigned_by','users.role')
            // ->where('mstr_pengaduan_id',$id_pengaduan)
            // ->get();

            // $PIC = \App\Models\TrhPIC::leftjoin('mstr_bidang', function($join) {
            // $join->on('trh_pic.subbid_id', '=', 'mstr_bidang.subbid_id');})
            // ->leftjoin('mstr_status_pic', function($join2) {
            // $join2->on('trh_pic.status_pic', '=', 'mstr_status_pic.id_status_pic');})
            // ->leftjoin('users', function($join2) {
            // $join2->on('trh_pic.pic_id', '=', 'users.id');})
            // ->where('mstr_pengaduan_id',$id_pengaduan)
            // ->get();

            $Tindaklanjut = \App\Models\TrdTindaklanjut::where('mstr_pengaduan_id',$id_pengaduan)
            // ->where('idt_pic',$idt_pic)
            ->get();
            // dd($Tindaklanjut);

            $subbid = \App\Models\TrhKoordinator::where('mstr_pengaduan_id',$id_pengaduan)
            ->get();
            // dd($subbid);

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

                return view('koordinator.PickSubkoor')->with(['DetailPengaduan' => $DetailPengaduan, 'BuktiPengaduan' => $BuktiPengaduan, 'koordinator' => $koordinator, 'Tindaklanjut' => $Tindaklanjut, 'subbid' => $subbid, 'dokumenpendukung' => $dokumenpendukung, 'idt_koordinator' => $idt_koordinator, 'countpick' => $countpick, 'willanswer' => $willanswer]);
            }

            else{
            return view('koordinator.PickSubkoor')->with(['DetailPengaduan' => $DetailPengaduan, 'BuktiPengaduan' => $BuktiPengaduan, 'koordinator' => $koordinator, 'Tindaklanjut' => $Tindaklanjut, 'subbid' => $subbid, 'idt_koordinator' => $idt_koordinator, 'countpick' => $countpick, 'willanswer' => $willanswer]);
            }
        }



    public function PilihSubkoor(Request $request)
    {
        // dd($request->all());
        if($request->is_answering == 1) {
            $Koordinator = \App\Models\TrhKoordinator::where('idt_koordinator',$request->idt_koordinator)
                            ->update(['has_picked' => '1','is_answering' => '1', 'status_pic' => '1']);

            $has_chosen = \App\Models\TrhKoordinator::where('mstr_pengaduan_id',$request->id)
                    ->where('has_picked', 0)
                    // ->where('has_chosen', 0)
                    ->count();
                    // dd($has_chosen);
                if($has_chosen == 0)
                {
                $MstrPengaduan = \App\Models\MstrPengaduan::find($request->id);
                        $MstrPengaduan->status_pengaduan = '7';
                        $MstrPengaduan->tl_by = session()->get('level');
                        $MstrPengaduan->save();

                $TrHistory = new \App\Models\TrHistoryStatus;
                    $TrHistory->mstr_pengaduan_id = $request->id;
                    $TrHistory->status_id = '7';
                    $TrHistory->user_id = session()->get('user_id');
                    $TrHistory->save();

                        return redirect()->action('App\Http\Controllers\KoorController@PengaduanBaru')->with('Sukses2', 'Kategori dan Subkoor Penanggung Jawab Berhasil Dipilih');
                }
                else
                {
                         return redirect()->action('App\Http\Controllers\KoorController@PengaduanBaru')->with('Sukses2', 'Kategori dan Subkoor Penanggung Jawab Berhasil Dipilih');
                }
        }
        else {

                if(is_null($request->pic_subbid))
                 {

                    return redirect()->action('App\Http\Controllers\KoorController@PengaduanBaru')->with('Gagal1', 'Subkoor Penanggung Jawab Belum Dipilih');
                 }
                else
                 {
                    foreach($request->pic_subbid as $pic_subbid)
                    {
                        // dd($pic_subbid);
                        $subkoor_id = \App\Models\User::where('subbid','=',$pic_subbid)
                        ->where('role','3')
                        ->where('is_active','1')
                        ->value('id');
                        // dd($subkoor_id);

                        $TrhKoordinator = new \App\Models\TrhSubkoordinator;
                        $TrhKoordinator->mstr_pengaduan_id = $request->id;
                        $TrhKoordinator->idt_koordinator = $request->idt_koordinator;
                        $TrhKoordinator->subbid_id = $pic_subbid;
                        $TrhKoordinator->subkoor_id = $subkoor_id;
                        $TrhKoordinator->assigned_by = session()->get('user_id');
                        $TrhKoordinator->save();
                    }

                    $Koordinator = \App\Models\TrhKoordinator::where('idt_koordinator',$request->idt_koordinator)
                                ->update(['has_picked' => '1','has_chosen' => '1']);

                    $has_chosen = \App\Models\TrhKoordinator::where('mstr_pengaduan_id',$request->id)
                        ->where('has_picked', 0)
                        ->count();
                        // dd($has_chosen);
                    if($has_chosen == 0)
                    {
                        $MstrPengaduan = \App\Models\MstrPengaduan::find($request->id);
                        $MstrPengaduan->status_pengaduan = '4';
                        $MstrPengaduan->save();

                        $TrHistory = new \App\Models\TrHistoryStatus;
                        $TrHistory->mstr_pengaduan_id = $request->id;
                        $TrHistory->status_id = '4';
                        $TrHistory->user_id = session()->get('user_id');
                        $TrHistory->save();

                        return redirect()->action('App\Http\Controllers\KoorController@PengaduanBaru')->with('Sukses', 'Kategori dan Subkoor Penanggung Jawab Berhasil Dipilih');
                    }
                    else
                    {
                        return redirect()->action('App\Http\Controllers\KoorController@PengaduanBaru')->with('Sukses', 'Kategori dan Subkoor Penanggung Jawab Berhasil Dipilih');
                    }
                 }
            }
    }


    public function PengaduanDitindaklanjuti(){
        // $pengaduan_ditindaklanjuti = \App\Models\TrhKoordinator::leftjoin('mstr_pengaduan', function($join2) {
        //     $join2->on('trh_koordinator.mstr_pengaduan_id', '=', 'mstr_pengaduan.id');})
        //     ->leftjoin('mstr_status', function($join2) {
        //     $join2->on('mstr_pengaduan.status_pengaduan', '=', 'mstr_status.id_status');})
        // // ->where('bidang_id','=',\DB::raw('susbtr(session()->get('subbid'),1,1)'))
        //     ->where('koor_id',session()->get('user_id'))
        //     ->where('status_pengaduan',6)
        //     ->where('is_answering',1)
        //     ->get();
            // dd($pengaduan_new);

            $pengaduan_ditindaklanjuti = \App\Models\TrhKoordinator::leftjoin('mstr_pengaduan', function($join2) {
            $join2->on('trh_koordinator.mstr_pengaduan_id', '=', 'mstr_pengaduan.id');})
            ->leftjoin('mstr_status', function($join4) {
            $join4->on('mstr_pengaduan.status_pengaduan', '=', 'mstr_status.id_status');})
             ->leftjoin('users', function($join3) {
            $join3->on('trh_koordinator.assigned_by', '=', 'users.id');})
             ->leftjoin('mstr_role', function($join5) {
            $join5->on('users.role', '=', 'mstr_role.id_role');})
        // ->where('bidang_id','=',\DB::raw('susbtr(session()->get('subbid'),1,1)'))
            ->select('mstr_pengaduan.id', 'bidang_id', 'koor_id', 'is_answering', 'has_chosen', 'status_pic', 'assigned_by', 'trh_koordinator.created_at as koor_created_at', 'trh_koordinator.updated_at as koor_updated_at', 'status_pengaduan', 'no_tiket', 'kategori_pengaduan', 'mstr_pengaduan.created_at as created_at', 'mstr_pengaduan.updated_at as updated_at', 'keterangan', 'oranglayanan_terlapor','users.role', 'nama_role', 'has_picked')
            ->where('koor_id',session()->get('user_id'))
            ->where('status_pengaduan',7)
            ->where('is_answering',1)
            ->get();

            // $idt_koordinator = \App\Models\TrhKoordinator::leftjoin('mstr_pengaduan', function($join2) {
            // $join2->on('trh_koordinator.mstr_pengaduan_id', '=', 'mstr_pengaduan.id');})
            // ->where('koor_id',session()->get('user_id'))
            // ->where('status_pengaduan',7)
            // ->get();
            // dd($idt_koordinator);

        // $pengaduan_new2 = \App\Models\MstrPengaduan::where('status_pengaduan','2')
        //     ->get();
        // dd($pengaduan_new);
        return view('koordinator.PengaduanDitindaklanjuti')->with(['pengaduan_ditindaklanjuti' => $pengaduan_ditindaklanjuti]);
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
            $TrhPengaduan = \App\Models\TrhKoordinator::where('mstr_pengaduan_id',$id_pengaduan)
            ->where('koor_id',session()->get('user_id'))
            ->get();
            // dd($TrhPengaduan);
            // foreach ($TrhPengaduan as $TrhPengaduan2) {
            //     $idt_pic = $TrhPengaduan2->idt_pic;
            // }
            // dd($idt_pic);
            // dd($TrhPengaduan);

            $TrhPIC = \App\Models\TrhPIC::where('mstr_pengaduan_id',$id_pengaduan)
            ->where('pic_id',session()->get('user_id'))
            ->get();

            $Tindaklanjut = \App\Models\TrdTindaklanjut::where('mstr_pengaduan_id',$id_pengaduan)
            // ->where('idt_pic',$idt_pic)
            ->get();
            // dd($Tindaklanjut);

            $subbid = \App\Models\TrhKoordinator::where('mstr_pengaduan_id',$id_pengaduan)
            ->get();

            $subbid2 = \App\Models\TrhSubkoordinator::where('mstr_pengaduan_id',$id_pengaduan)
            ->get();
            // dd($subbid);

            // dd($TrhPIC);
            $mstr_status_pic = \App\Models\MstrStatusPic::all();
            $PIC = \App\Models\TrhKoordinator::leftjoin('mstr_status_pic', function($join2) {
            $join2->on('trh_koordinator.status_pic', '=', 'mstr_status_pic.id_status_pic');})
            ->leftjoin('mstr_pengaduan', function($join2) {
            $join2->on('trh_koordinator.mstr_pengaduan_id', '=', 'mstr_pengaduan.id');})
            ->select('mstr_status_pic.keterangan as ket_status_pic', 'idt_koordinator', 'no_tiket', 'status_pengaduan', 'mstr_pengaduan.created_at as waktu_pelaporan', 'mstr_pengaduan.updated_at as updated_at', 'mstr_pengaduan.id as mstr_pengaduan_id', 'bidang_id', 'koor_id', 'has_picked', 'is_answering', 'has_chosen', 'status_pic', 'assigned_by', 'trh_koordinator.created_at as koor_created_at', 'trh_koordinator.updated_at as koor_updated_at','id_status_pic','status_pic')
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

                return view('koordinator.ProsesPengaduan')->with(['DetailPengaduan' => $DetailPengaduan, 'BuktiPengaduan' => $BuktiPengaduan, 'dokumenpendukung' => $dokumenpendukung, 'dokumenpendukung2' => $dokumenpendukung2, 'PIC' => $PIC, 'mstr_status_pic' => $mstr_status_pic, 'TrhPengaduan' => $TrhPengaduan, 'TrhPIC' => $TrhPIC, 'mstr_status_pic' => $mstr_status_pic, 'Tindaklanjut' => $Tindaklanjut, 'subbid' => $subbid, 'subbid2' => $subbid2]);
            }

            else{
                $dokumenpendukung =[];
                $dokumenpendukung2 =[];
            return view('koordinator.ProsesPengaduan')->with(['DetailPengaduan' => $DetailPengaduan, 'BuktiPengaduan' => $BuktiPengaduan, 'PIC' => $PIC, 'mstr_status_pic' => $mstr_status_pic, 'TrhPIC' => $TrhPIC, 'mstr_status_pic' => $mstr_status_pic, 'dokumenpendukung' => $dokumenpendukung, 'dokumenpendukung2' => $dokumenpendukung2, 'TrhPengaduan' => $TrhPengaduan, 'Tindaklanjut' => $Tindaklanjut, 'subbid' => $subbid, 'subbid2' => $subbid2]);
            }
        }


    public function AddTindaklanjut(Request $request)
    {   
        // dd($request->all());
        // dd($request->file('files'));
            $id_tindaklanjut = \App\Models\TrdTindaklanjut::insertGetId([
                    'mstr_pengaduan_id'         => $request->mstr_pengaduan_id,
                    'idt_koordinator'           => $request->idt_pic,
                    'user_id'                   => session()->get('user_id'),
                    'status_tindaklanjut'       => $request->status_tindaklanjut,
                    'bidang_id'                 => substr(session()->get('subbid'),1,1),
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

            $idt_koordinator = \App\Models\TrhKoordinator::where('idt_koordinator',$request->idt_pic)
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

            $has_processed = \App\Models\TrhKoordinator::where([
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

                    return redirect()->action('App\Http\Controllers\KoorController@PengaduanDitindaklanjuti')->with('Sukses3', 'Hasil Tindaklanjut Berhasil Dikirim');
                }
                else
                {
                    return redirect()->action('App\Http\Controllers\KoorController@PengaduanDitindaklanjuti')->with('Sukses3', 'Hasil Tindaklanjut Berhasil Dikirim');
                }
    }


    public function PengaduanDiproses()
        {   
            // dd(session()->get('user_id'));
            // $pengaduan_diproses = \App\Models\TrhKoordinator::leftjoin('mstr_pengaduan', function($join2) {
            // $join2->on('trh_koordinator.mstr_pengaduan_id', '=', 'mstr_pengaduan.id');})
            // ->leftjoin('mstr_status', function($join2) {
            // $join2->on('mstr_pengaduan.status_pengaduan', '=', 'mstr_status.id_status');})
            // ->where([
            //         ['koor_id', '=', session()->get('user_id')],
            //         ['status_pengaduan', '=', '3']
            //     ])
            // ->orwhere([
            //         ['koor_id', '=', session()->get('user_id')],
            //         ['status_pengaduan', '=', '4']
            //     ])
            // ->orwhere([
            //         ['koor_id', '=', session()->get('user_id')],
            //         ['status_pengaduan', '=', '5']
            //     ])
            // ->get();

            $pengaduan_diproses = \App\Models\TrhKoordinator::leftjoin('mstr_pengaduan', function($join2) {
            $join2->on('trh_koordinator.mstr_pengaduan_id', '=', 'mstr_pengaduan.id');})
            ->leftjoin('mstr_status', function($join4) {
            $join4->on('mstr_pengaduan.status_pengaduan', '=', 'mstr_status.id_status');})
             ->leftjoin('users', function($join3) {
            $join3->on('trh_koordinator.assigned_by', '=', 'users.id');})
             ->leftjoin('mstr_role', function($join5) {
            $join5->on('mstr_pengaduan.tl_by', '=', 'mstr_role.id_role');})
        // ->where('bidang_id','=',\DB::raw('susbtr(session()->get('subbid'),1,1)'))
            ->select('mstr_pengaduan.id as mstr_pengaduan_id', 'bidang_id', 'koor_id', 'is_answering', 'has_chosen', 'status_pic', 'assigned_by', 'trh_koordinator.created_at as koor_created_at', 'trh_koordinator.updated_at as koor_updated_at', 'status_pengaduan', 'no_tiket', 'kategori_pengaduan', 'mstr_pengaduan.created_at as created_at', 'mstr_pengaduan.updated_at as updated_at', 'keterangan', 'oranglayanan_terlapor','users.role', 'nama_role', 'has_picked')
            ->where([
                    ['koor_id', '=', session()->get('user_id')],
                    ['status_pengaduan', '=', '4']
                ])
            ->orwhere([
                    ['koor_id', '=', session()->get('user_id')],
                    ['status_pengaduan', '=', '5']
                ])
            ->orwhere([
                    ['koor_id', '=', session()->get('user_id')],
                    ['status_pengaduan', '=', '8']
                ])
            ->orwhere([
                    ['koor_id', '=', session()->get('user_id')],
                    ['status_pengaduan', '=', '9']
                ])
            ->get();
            // dd($pengaduan_diproses);

            return view('koordinator.PengaduanDiproses')->with(['pengaduan_diproses' => $pengaduan_diproses]);
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

            // $subbid = \App\Models\TrdTindaklanjut::select('user_id','bidang_id','subbid_id','tl_by',\DB::raw('count(tindak_lanjut) as total'))
            // ->where('mstr_pengaduan_id',$id_pengaduan)
            // // ->where('idt_pic',$idt_pic)
            // ->groupBy('user_id')
            // ->get();

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

                return view('koordinator.PengaduanView')->with(['DetailPengaduan' => $DetailPengaduan, 'BuktiPengaduan' => $BuktiPengaduan, 'koordinator' => $koordinator, 'subkoordinator' => $subkoordinator, 'PIC' => $PIC, 'Tindaklanjut' => $Tindaklanjut, 'subbid' => $subbid, 'subbid1' => $subbid1, 'subbid2' => $subbid2, 'subbid3' => $subbid3, 'dokumenpendukung' => $dokumenpendukung]);
            }

            else{
            return view('koordinator.PengaduanView')->with(['DetailPengaduan' => $DetailPengaduan, 'BuktiPengaduan' => $BuktiPengaduan, 'koordinator' => $koordinator, 'subkoordinator' => $subkoordinator, 'PIC' => $PIC, 'Tindaklanjut' => $Tindaklanjut, 'subbid' => $subbid, 'subbid1' => $subbid1, 'subbid2' => $subbid2, 'subbid3' => $subbid3]);
            }
            
        }


    

    public function PengaduanSelesai()
        {   

            $pengaduan_selesai = \App\Models\TrhKoordinator::leftjoin('mstr_pengaduan', function($join2) {
            $join2->on('trh_koordinator.mstr_pengaduan_id', '=', 'mstr_pengaduan.id');})
            ->leftjoin('mstr_status', function($join3) {
            $join3->on('mstr_pengaduan.status_pengaduan', '=', 'mstr_status.id_status');})
            ->leftjoin('mstr_role', function($join4) {
            $join4->on('mstr_pengaduan.tl_by', '=', 'mstr_role.id_role');})
        // ->where('bidang_id','=',\DB::raw('susbtr(session()->get('subbid'),1,1)'))
            ->select('mstr_pengaduan_id', 'no_tiket', 'bidang_id', 'status_pengaduan', 'keterangan', 'kategori_pengaduan','oranglayanan_terlapor', 'mstr_pengaduan.created_at as waktu_pelaporan', 'mstr_pengaduan.updated_at as tanggal_update','tl_by','nama_role')
            ->where([
                    ['koor_id', '=', session()->get('user_id')],
                    ['status_pengaduan', '=', '10']
                ])
            ->get();

            return view('koordinator.PengaduanSelesai')->with(['pengaduan_selesai' => $pengaduan_selesai]);
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

            return view('koordinator.PengaduanDetail')->with(['DetailPengaduan' => $DetailPengaduan, 'BuktiPengaduan' => $BuktiPengaduan, 'PIC' => $PIC, 'Tindaklanjut' => $Tindaklanjut, 'subbid' => $subbid, 'final_answer' => $final_answer, 'dokumenpendukung' => $dokumenpendukung, 'dokumenpendukung2' => $dokumenpendukung2, 'koordinator' => $koordinator, 'subkoordinator' => $subkoordinator]);
            }

            else{
            return view('koordinator.PengaduanDetail')->with(['DetailPengaduan' => $DetailPengaduan, 'BuktiPengaduan' => $BuktiPengaduan, 'PIC' => $PIC, 'Tindaklanjut' => $Tindaklanjut, 'subbid' => $subbid, 'final_answer' => $final_answer, 'koordinator' => $koordinator, 'subkoordinator' => $subkoordinator]);
            }
            
        }

}

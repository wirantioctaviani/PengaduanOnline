<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Session;
use Illuminate\Support\Facades\DB;

class PengaduanController extends Controller
{
    
    public function FormPengaduan()
        {
            return view('FormPengaduan');
        }


    public function CreatePengaduan(Request $request)
        {
            // dd($request->all());
            $bulan             = date('m');
            $tahun             = substr(date('Y'),2,2);
                // dd($tahun);
            $randomstring      = Str::random(6);
            $NoTiket           = "PE".$tahun.$bulan.$randomstring;
            // dd($NoTiket);
            $id_pengaduan = \App\Models\MstrPengaduan::insertGetId([
                    'no_tiket'                  => $NoTiket,
                    'nama_pelapor'              => $request->nama,
                    'telp_pelapor'              => $request->no_hp,
                    'email_pelapor'             => $request->email,
                    'oranglayanan_terlapor'     => $request->terlapor,
                    'satuan_kerja'              => $request->satuan_kerja,
                    'waktu_kejadian'            => $request->waktu_kejadian,
                    'tempat_kejadian'           => $request->tempat_kejadian,
                    'judul_pelanggaran'         => $request->judul_pelanggaran,
                    'detail_pelanggaran'        => $request->detail_pelanggaran,
                    'status_pengaduan'          => '1',
                    'created_at'                => date('Y-m-d H:i:s'),
                    'updated_at'                => date('Y-m-d H:i:s'),
                    'detail_pelanggaran'        => $request->detail_pelanggaran
                ]);

            $pengaduan = \App\Models\MstrPengaduan::find($id_pengaduan);
            $dom = new \DOMDocument();
                    libxml_use_internal_errors(true);
                    $dom->loadHTML($request->detail_pelanggaran,LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
                    libxml_clear_errors();
            $pengaduan->detail_pelanggaran        = $dom->saveHTML();
            $pengaduan->save();

            if(!is_null($request->file('files'))){
                foreach($request->file('files') as $bukti)
                    {
                        $BuktiPendukung = new \App\Models\TrdBukti;
                        $BuktiPendukung->mstr_pengaduan_id = $id_pengaduan;
                        $file = $bukti->getClientOriginalName();
                        $nama_file = $NoTiket."_".$file;
                        // dd($nama_file);
                        $BuktiPendukung->nama_file        = $nama_file;
                        $bukti->move(public_path('bukti/'), $nama_file);
                        $BuktiPendukung->save();
                    }
            }

            $TrHistory = new \App\Models\TrHistoryStatus;
            $TrHistory->mstr_pengaduan_id = $id_pengaduan;
            $TrHistory->status_id = '1';
            $TrHistory->user_id = '0';
            $TrHistory->save();

            return redirect()->action('App\Http\Controllers\PengaduanController@FormPengaduan')->with('NoTiket', $NoTiket);
        }


    public function login()
        {
            // $data_layanan = \App\Models\mstr_layanan::where('status', '1')
            // ->orderby('subbid_id', 'ASC')
            // ->get();
            return view('login');
        }


    public function tracking(Request $request)
        {
            // dd($request->NoTiket);
            // $data_layanan = \App\Models\mstr_layanan::where('status', '1')
            // ->orderby('subbid_id', 'ASC')
            // ->get();
            $NoTiket = $request->NoTiket;
            $no_tiket = DB::table('mstr_pengaduan')
                    ->where('no_tiket',$request->NoTiket)
                    ->value('id');
                    // dd($no_tiket);

            $data_pengaduan = DB::table('mstr_pengaduan')
                    ->where('no_tiket',$request->NoTiket)
                    ->first();
            // dd($data_pengaduan);

            if (!is_null($no_tiket)) {
                    $diterima = DB::table('tr_history_status')
                    ->where('mstr_pengaduan_id',$no_tiket)
                    ->where('status_id','1')
                    ->first();
                    // dd($diterima);

                    $diproses = DB::table('tr_history_status')
                    ->where([
                            ['mstr_pengaduan_id', '=', $no_tiket],
                            ['status_id', '=', '2']
                        ])
                    ->orwhere([
                            ['mstr_pengaduan_id', '=', $no_tiket],
                            ['status_id', '=', '3']
                        ])
                    ->first();
                    // dd($diproses);

                    $selesai = DB::table('tr_history_status')
                    ->where('mstr_pengaduan_id',$no_tiket)
                    ->where('status_id','10')
                    ->first();
                    // dd($selesai);

                    $finalanswer = DB::table('trd_finalanswer')
                    ->where('mstr_pengaduan_id',$no_tiket)
                    ->first();

                    $dokumen = DB::table('trd_dokumen')
                    ->where('mstr_pengaduan_id',$no_tiket)
                    ->where('is_send',1)
                    ->get();
                    // dd($dokumen);

                    return view('TrackingPengaduan')->with(['NoTiket' => $NoTiket, 'diterima' => $diterima, 'diproses' => $diproses, 'selesai' => $selesai, 'finalanswer' => $finalanswer, 'dokumen' => $dokumen, 'data_pengaduan' => $data_pengaduan]);
            }
            else{
                    return redirect()->action('App\Http\Controllers\PengaduanController@FormPengaduan')->with('Gagal1', 'No Tiket tidak ditemukan');
            }


        }



}

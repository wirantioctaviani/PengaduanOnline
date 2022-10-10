<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }


    public function logout(Request $request)
    {   
        $request->session()->flush();
        return redirect()->action([LoginController::class,'index']);
    }


    public function otentikasi(Request $request)
    {
        // dd($request->all());
        $res = Http::asForm()->post('https://map.bpkp.go.id/api/v3/login', [
            'username' => $request->username,
            'password' => $request->password,
            'kelas_user' => 0,
        ]);

        // $data = json_decode($res->body());
        //     dd($data);
        if ($res->successful()) {
            $data = json_decode($res->body());
            // dd($data);
            

            if (isset($data->success)) {
                //              print_r($data->message->nipbaru);die();
                $nip = preg_replace('/\s+/', '', $data->message->nipbaru);
                // dd($nip);

                $user1 = \App\Models\User::where('nip', '=', $nip)->first();
                // dd($user);
                if ($user1) {
                    // dd('user ada');
                    // dd($user1->is_active);
                    // dd($user->is_active);
                    if($user1->is_active == 1) {
                        // dd('Active');
                        // dd($user1->role);
                        session()->put('nip', $nip);
                        session()->put('namalengkap', $data->message->name);
                        session()->put('level', $user1->role);
                        session()->put('subbid', $user1->subbid);
                        session()->put('user_id',$user1->id);

                        // if ($user1->role == 1) {
                        //     dd('admin');
                        //     return redirect()->action([AdminController::class,'HomeAdmin']);    
                        // }
                        if($user1->role == 2){
                            // dd('pic');
                            return redirect()->action([KoorController::class,'HomeKoor']);    
                        }
                        elseif($user1->role == 3){
                            // dd('pic');
                            return redirect()->action([SubkoorController::class,'HomeSubkoor']);    
                        }
                        elseif($user1->role == 4){
                            // dd('pic');
                            return redirect()->action([PicController::class,'HomePic']);    
                        }
                        elseif($user1->role == 5){
                            // dd('pic');
                            return redirect()->action([KapusController::class,'HomeKapus']);    
                        }
                        elseif($user1->role == 1){
                            // dd('pic');
                            return redirect()->action([LoginController::class,'index'])->with('errory', 'Silakan Login sebagai admin di halaman Admin.');    
                        }
                        //              return redirect()->action('Sertifikat\SertifikatController@allData');
                    } else {
                        // dd('user tidak ada');
                        return redirect()->action([LoginController::class,'index'])->with('error', 'Status anda tidak aktif. Silakan hubungi administrator.');
                    }
                } else {
                    // dd('user belum terdaftar');
                     return redirect()->action([LoginController::class,'index'])->with('error2', 'User belum terdaftar. Silakan hubungi administrator.');
                }
            } else {
                // dd('username/password salah');
                return redirect()->action([LoginController::class,'index'])->with('error3', 'Username/password salah.');
            }
        } else {
            // dd('Ada kesalahan sistem');
            return redirect()->action([LoginController::class,'index'])->with('error4', 'Ada kesalahan sistem. Silakan coba lagi.');
            // return redirect()->action([LoginController::class,'index'])->with('error', 'Ada kesalahan sistem. Silakan coba lagi.');
        }
    }
}

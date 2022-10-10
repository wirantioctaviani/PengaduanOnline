<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
// use Auth;

class LoginAdminController extends Controller
{
    public function index()
    {
        return view('loginadmin');
    }


    public function logout(Request $request)
    {   
        $request->session()->flush();
        return redirect()->action([LoginAdminController::class,'index']);
    }


    public function otentikasi(Request $request)
    {
        // dd($request->all());
        
        $credentials = [
            'nama' => $request->username,
            'password' => $request->password
        ];

        // if (Auth::attempt($request->only('nip','password'))) {
        if (Auth::guard('admin')->attempt($credentials)) {
                // return redirect()->action([PengaduanController::class,'FormPengaduan']);
            $user1 = \App\Models\UserAdmin::where('nama', '=', $request->username)->first();
            // dd($user1);

            session()->put('nip', $user1->nip);
            session()->put('namalengkap', $request->username);
            session()->put('level', $user1->role);
            session()->put('subbid', $user1->subbid);
            session()->put('user_id',$user1->id_admin);
            // dd('sukses');
            return redirect()->action([AdminController::class,'HomeAdmin']);
            // return redirect()->action([LoginController::class,'index'])->with('error2', 'Username/password salah.');
        }
        else{
            return redirect()->action([LoginAdminController::class,'index'])->with('error3', 'Username/password salah.');
        }

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;


class ControllerLogin extends Controller
{
    public function Login(Request $request)
    {
        $update_at = new Controller();
        $pass = md5($request->psswd);
        $password_c = md5($request->nik) . $pass;
        $password = md5($password_c);
        // return $password;

        $cek = DB::table('t_user')
            ->select('*')
            ->where('id_nik', $request->nik)
            ->where('password', $password)
            ->count();

        if ($cek == 1) {
            $aktif = DB::table('t_user')
                ->select('*')
                ->where('id_nik', $request->nik)
                ->where('password', $password)
                ->get();
            if ($aktif[0]->status == 9) {
                Alert::error('Oops!', 'Akun Anda Dalam Pengawsan, Kontak Admin!');
                return redirect('adm_ext');
            } else {
                $online = DB::table('t_user')
                    ->where('id_nik', $request->nik)
                    ->update([
                        'last_login' => $update_at->update_at(),
                    ]);
                Session::put('username', $aktif[0]->nama);
                session::put('id_nik', $aktif[0]->id_nik);
                session::put('time_log', date('i'));

                return redirect('adm_ext_home');
            }
        } else {
            Alert::error('Err!', 'Periksa Kembali Username dan Password anda!');
            return redirect('adm_ext');
        }

        // return $password;
        // return $request->all();
        // return redirect('adm_ext_home');
    }

    public function Logout()
    {
        session::forget('username');
        session::forget('id_nik');
        session::forget('time_log');
        return redirect('/');
    }
}

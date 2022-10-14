<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ControllerUser extends Controller
{
    public function data_user()
    {
        if (session('id_nik') == null) {
            Alert::error('Oops!', 'Sesi Telah Berakhir, Silahkan Login Kembali!');
            return redirect('Logout');
        } else {

            $response = DB::table('t_user')
                ->select('*')
                ->get();

            return view('adm_ext.data_user', ['response' => $response]);
        }
    }
    public function add_user(Request $request)
    {
        if (session('id_nik') == null) {
            Alert::error('Oops!', 'Sesi Telah Berakhir, Silahkan Login Kembali!');
            return redirect('Logout');
        } else {


            // return $request->all();
            $pass = md5($request->psw);
            $password_c = md5($request->nik) . $pass;
            $password = md5($password_c);
            // return $password;

            $update_at = new Controller();
            $save = DB::table('t_user')->insert([
                'id_nik' => $request->nik,
                'password' => $password,
                'nama' => $request->nama,
                'status' => '9',
                'last_login' => $update_at->update_at(),
                'update_by' => session('id_nik'),
                'update_at' => $update_at->update_at(),

            ]);

            Alert::success('Success!', 'Data Berhasil Ditambahkan!');
            return redirect('adm_ext_data_user');
        }
    }
    public function edit_user($id, Request $request)
    {
        if (session('id_nik') == null) {
            Alert::error('Oops!', 'Sesi Telah Berakhir, Silahkan Login Kembali!');
            return redirect('Logout');
        } else {


            $update_at = new Controller();
            $save = DB::table('t_user')->where('id_nik', $id)
                ->update([
                    'nama' => $request->nama,
                    'status' => $request->status,
                    'update_by' => session('id_nik'),
                    'update_at' => $update_at->update_at(),
                ]);

            Alert::success('Success!', 'Data Berhasil Diupdate!');
            return redirect('adm_ext_data_user');
        }
    }
    public function delete_user($id)
    {
        if (session('id_nik') == null) {
            Alert::error('Oops!', 'Sesi Telah Berakhir, Silahkan Login Kembali!');
            return redirect('Logout');
        } else {


            $delete = DB::table('t_user')
                ->where('id_nik', $id)
                ->delete();
            Alert::info('Success!', 'Data Berhasil Dihapus!');
            return redirect('adm_ext_data_user');
        }
    }
}

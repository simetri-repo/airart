<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;



class ControllerShowing extends Controller
{
    public function adm_ext_showing()
    {
        if (session('id_nik') == null) {
            Alert::error('Oops!', 'Sesi Telah Berakhir, Silahkan Login Kembali!');
            return redirect('Logout');
        } else {


            $response = DB::table('t_showing')
                ->select('*')
                ->leftJoin('t_satwa', 't_satwa.id_satwa', '=', 't_showing.id_satwa')
                ->join('r_ras', 'r_ras.id_ras', '=', 't_satwa.ras')
                ->get();

            $satwa = DB::table('t_satwa')
                ->select('*')
                ->join('r_ras', 't_satwa.ras', '=', 'r_ras.id_ras')
                ->get();

            return view('adm_ext.data_showing', compact('response', 'satwa'));
        }
    }
    public function save_showing(Request $request)
    {
        if (session('id_nik') == null) {
            Alert::error('Oops!', 'Sesi Telah Berakhir, Silahkan Login Kembali!');
            return redirect('Logout');
        } else {


            // return $request->all();

            $validator = Validator::make($request->all(), [
                'foto_satwa1' => 'image|max:2040',
                'foto_satwa2' => 'image|max:2040',
                'foto_satwa3' => 'image|max:2040',
            ]);


            $file1 = $request->file('foto_satwa1');
            $file2 = $request->file('foto_satwa2');
            $file3 = $request->file('foto_satwa3');

            if ($validator->fails()) {
                Alert::error('Gagal!', 'Periksa kembali jenis dan ukuran file foto satwa, dan pastikan data sudah terisi semua!');
                return redirect('adm_ext_showing');
            } else {
                if ($file1 == null) {
                    $path_mtools1 = '';
                } else {
                    $nama_file1 = time() . "_" . $file1->getClientOriginalName();
                    $tujuan_upload1 = 'foto_satwa_showing1/';
                    $file1->move($tujuan_upload1, $nama_file1);
                    // return $size;
                    $path_mtools1 = $tujuan_upload1 . $nama_file1;
                }

                if ($file2 == null) {
                    $path_mtools2 = '';
                } else {
                    $nama_file2 = time() . "_" . $file2->getClientOriginalName();
                    $tujuan_upload2 = 'foto_satwa_showing2/';
                    $file2->move($tujuan_upload2, $nama_file2);
                    // return $size;
                    $path_mtools2 = $tujuan_upload2 . $nama_file2;
                }

                if ($file3 == null) {
                    $path_mtools3 = '';
                } else {
                    $nama_file3 = time() . "_" . $file3->getClientOriginalName();
                    $tujuan_upload3 = 'foto_satwa_showing3/';
                    $file3->move($tujuan_upload3, $nama_file3);
                    // return $size;
                    $path_mtools3 = $tujuan_upload3 . $nama_file3;
                }

                if ($request->keterangan_showing == null) {
                    Alert::error('Tolong Isi Field Keterangan!!');
                    return redirect('adm_ext_showing');
                }

                $update_at = new Controller;


                $save = DB::table('t_showing')
                    ->insert([
                        'id_satwa' => $request->id_satwa,
                        'foto_show1' => $path_mtools1,
                        'foto_show2' => $path_mtools2,
                        'foto_show3' => $path_mtools3,
                        'status_show' => '9',
                        'keterangan_show' => $request->keterangan_showing,
                        'update_at' => $update_at->update_at(),
                        'update_by' => '1',

                    ]);

                Alert::success('Success!', 'Data Berhasil Ditambahkan.');
                return redirect('adm_ext_showing');
            }
        }
    }
    public function hapus_showing($id)
    {
        if (session('id_nik') == null) {
            Alert::error('Oops!', 'Sesi Telah Berakhir, Silahkan Login Kembali!');
            return redirect('Logout');
        } else {

            $hapus = DB::table('t_showing')
                ->where('id_show', $id)
                ->delete();
            Alert::info('Success!', 'Data Telah Dihapus.');
            return redirect('adm_ext_showing');
        }
    }
    public function edit_showing($id, Request $request)
    {
        if (session('id_nik') == null) {
            Alert::error('Oops!', 'Sesi Telah Berakhir, Silahkan Login Kembali!');
            return redirect('Logout');
        } else {


            // return $request->all();
            $validator = Validator::make($request->all(), [
                'foto_satwa1_up' => 'image|max:2040',
                'foto_satwa2_up' => 'image|max:2040',
                'foto_satwa3_up' => 'image|max:2040',
            ]);


            $file1 = $request->file('foto_satwa1_up');
            $file2 = $request->file('foto_satwa2_up');
            $file3 = $request->file('foto_satwa3_up');

            if ($validator->fails()) {
                Alert::error(
                    'Gagal!',
                    'Periksa kembali jenis dan ukuran file foto satwa, dan pastikan data sudah terisi semua!'
                );
                return redirect('adm_ext_showing');
            } else {
                if (
                    $file1 == null
                ) {
                    $path_mtools1 = $request->foto_satwa1_old;
                } else {
                    $nama_file1 = time() . "_" . $file1->getClientOriginalName();
                    $tujuan_upload1 = 'foto_satwa_showing1/';
                    $file1->move($tujuan_upload1, $nama_file1);
                    // return $size;
                    $path_mtools1 = $tujuan_upload1 . $nama_file1;
                }

                if ($file2 == null) {
                    $path_mtools2 = $request->foto_satwa2_old;
                } else {
                    $nama_file2 = time() . "_" . $file2->getClientOriginalName();
                    $tujuan_upload2 = 'foto_satwa_showing2/';
                    $file2->move($tujuan_upload2, $nama_file2);
                    // return $size;
                    $path_mtools2 = $tujuan_upload2 . $nama_file2;
                }

                if ($file3 == null) {
                    $path_mtools3 = $request->foto_satwa3_old;
                } else {
                    $nama_file3 = time() . "_" . $file3->getClientOriginalName();
                    $tujuan_upload3 = 'foto_satwa_showing3/';
                    $file3->move($tujuan_upload3, $nama_file3);
                    // return $size;
                    $path_mtools3 = $tujuan_upload3 . $nama_file3;
                }

                $update_at = new Controller;

                $edit = DB::table('t_showing')
                    ->where('id_show', $id)
                    ->update([
                        'foto_show1' => $path_mtools1,
                        'foto_show2' => $path_mtools2,
                        'foto_show3' => $path_mtools3,
                        'keterangan_show' => $request->keterangan_showing_up,
                        'status_show' => $request->status_show,
                        'update_by' => session('id_nik'),
                        'update_at' => $update_at->update_at(),
                    ]);
                Alert::success('Success!', 'Data Telah Diubah.');
                return redirect('adm_ext_showing');
            }
        }
    }
}

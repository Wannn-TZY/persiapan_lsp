<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Walas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index () {
        return view ('login');
    }
    public function loginWalas(Request $request){
        $walas = Walas::where('nig', $request->txt_nig)->first();

        if(!$walas || !Hash::check($request->txt_password, $walas->password)){
            return back()->with('loginError', 'Login Gagal! Periksa NIG dan Password Anda');
        }

        $kelas = Kelas::where('id', $walas->kelas_id)->first();
        session([
            'role' => 'Walas',
            'id' => $walas->id,
            'nig' => $walas->nig,
            'nama' => $walas->nama_walas,
            'kelas_id' => $kelas->kelas_id,
            'nama_kelas' => $kelas ? $kelas->nama_kelas : 'kelas belum ditentukan'
        ]);
        return redirect('nilai-rapot/index');
    }
    public function loginSiswa(Request $request){
        $siswa = Siswa::where('nis', $request->txt_nis)->first();

        if(!$siswa || !Hash::check($request->txt_password, $siswa->password)){
            return back()->with('loginError', 'Login Gagal! Periksa NIS dan Password Anda');
        }

        $kelas = Kelas::where('id', $siswa->kelas_id)->first();
        session([
            'role' => 'Murid',
            'id' => $siswa->id,
            'nis' => $siswa->nis,
            'nama' => $siswa->nama_siswa,
            'kelas_id' => $kelas->kelas_id,
            'nama_kelas' => $kelas ? $kelas->nama_kelas : 'kelas belum ditentukan'
        ]);
        return redirect('nilai-rapot/show');
    }
    public function logout(){
        session()->flush();
        return redirect('/');
    }
}

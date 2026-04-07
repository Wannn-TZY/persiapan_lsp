<?php

namespace App\Http\Controllers;
use App\Models\Kelas;
use App\Models\Nilai;
use App\Models\Walas;
use App\Models\Siswa;
use App\Middleware\CheckUserRole;
use Closure;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index()
{
    $walas = Walas::find(session('id'));

    if (!$walas) {
        return back()->with('error', 'Data wali kelas tidak ditemukan');
    }

    // Ambil semua siswa di kelas walas beserta nilai (jika ada)
    $data_siswa = Siswa::with('nilai')
        ->where('kelas_id', $walas->kelas_id)
        ->get();

    $kelas = Kelas::where('id', session('id'))->first();

    return view('nilai.index', [
        'data_siswa' => $data_siswa,
        'kelas' => $kelas
    ]);
}
public function create(){
    $walas = Walas::find(session('id'));
    $nilai = Nilai::pluck('siswa_id');

    $siswa = Siswa::where('kelas_id', $walas->kelas_id)
        ->whereNotIn('id', $nilai)
        ->get();
    return view('nilai.create', [
        'siswa' => $siswa
    ]);
}
public function store(Request $request)
{
    $data_nilai = $request->validate([
        'siswa_id'   => ['required'],
        'matematika' => ['required'],
        'indonesia'  => ['required'],
        'inggris'    => ['required'],
        'kejuruan'   => ['required'],
        'pilihan'    => ['required'],
    ]);

    $data_nilai['walas_id']  = session('id');
    $data_nilai['siswa_id']  = $request->siswa_id;
    $data_nilai['rata_rata'] = round((
        $data_nilai['matematika'] +
        $data_nilai['indonesia'] +
        $data_nilai['inggris'] +
        $data_nilai['kejuruan'] +
        $data_nilai['pilihan']
    ) / 5);

    $cek_nilai = Nilai::where('siswa_id', $request->siswa_id)->first();

    if ($cek_nilai) {
        return back()->with('error', 'Data nilai untuk siswa tersebut sudah ada');
    } else {
        Nilai::create($data_nilai);
        return redirect('/nilai-rapot/index')->with('success', 'Data nilai berhasil ditambahkan');
    }
}
public function edit(Nilai $nilai){
    $walas = Walas::find(session('id'));
    $siswa = Siswa::where('id', $nilai->siswa_id)->first();
    return view('nilai.edit', [
        'nilai' => $nilai,
        'siswa' => $siswa
    ]);
}

public function update(Request $request, Nilai $nilai) {
    $data_nilai = $request->validate([
        'matematika' => ['required'],
        'indonesia'  => ['required'],
        'inggris'    => ['required'],
        'kejuruan'   => ['required'],
        'pilihan'    => ['required'],
    ]);

    $data_nilai['walas_id'] = session('id');
    $data_nilai['rata_rata'] = round((
        $data_nilai['matematika'] +
        $data_nilai['indonesia'] +
        $data_nilai['inggris'] +
        $data_nilai['kejuruan'] +
        $data_nilai['pilihan']
    ) / 5);

    $nilai->update($data_nilai);
    return redirect('/nilai-rapot/index')->with('success', 'Data nilai berhasil diupdate');
}
public function showSiswa($id) {
    $nilai = Nilai::with('siswa.kelas')->find($id);
    if (!$nilai) {
        return redirect()->back()->with('error', 'Data nilai tidak ditemukan');
    }
    $siswa = $nilai->siswa;
    $data_nilai = [
        'matematika' => [
            'nilai' => $nilai->matematika ?? 'Data tidak tersedia',
            'grade' => $nilai ? $this->gradeMapel($nilai->matematika): 'N/A'
        ],
        'indonesia' => [
            'nilai' => $nilai->indonesia ?? 'Data tidak tersedia',
            'grade' => $nilai ? $this->gradeMapel($nilai->indonesia): 'N/A'
        ],
        'inggris' => [
            'nilai' => $nilai->inggris ?? 'Data tidak tersedia',
            'grade' => $nilai ? $this->gradeMapel($nilai->inggris): 'N/A'
        ],
        'kejuruan' => [
            'nilai' => $nilai->kejuruan ?? 'Data tidak tersedia',
            'grade' => $nilai ? $this->gradeMapel($nilai->kejuruan): 'N/A'
        ],
        'pilihan' => [
            'nilai' => $nilai->pilihan ?? 'Data tidak tersedia',
            'grade' => $nilai ? $this->gradeMapel($nilai->pilihan): 'N/A'
        ],
        'rata_rata' => [
            'nilai' => $nilai->rata_rata ?? 'Data tidak tersedia',
            'grade' => $nilai ? $this->gradeMapel($nilai->rata_rata): 'N/A'
        ]
    ];
    return view('nilai.show', [
        'siswa' => $siswa,
        'data_nilai' => $data_nilai
    ]);
}

public function gradeMapel($nilai){
    if ($nilai >= 90) {
        return 'A';
    }
    else if ($nilai >=80){
        return 'B';
    }
    else if ($nilai >= 70){
        return 'C';
    }
    else if ($nilai >= 60){
        return 'D';
    }
    else if ($nilai >= 50){
        return 'E';
    }
}
public function show(){
    $siswa = Siswa::with(['kelas','nilai'])->find(session('id'));
    $nilai = optional($siswa->nilai)->first();
    if (!$nilai){
        return redirect()->back()->with('error', 'nilai lu ga ada coy');
    }
    $walas =Nilai::with('walas')->first();
    $data_nilai = [
        'matematika' => [
            'nilai' => $nilai->matematika ?? 'Data tidak tersedia',
            'grade' => $nilai ? $this->gradeMapel($nilai->matematika): 'N/A'
        ],
        'indonesia' => [
            'nilai' => $nilai->indonesia ?? 'Data tidak tersedia',
            'grade' => $nilai ? $this->gradeMapel($nilai->indonesia): 'N/A'
        ],
        'inggris' => [
            'nilai' => $nilai->inggris ?? 'Data tidak tersedia',
            'grade' => $nilai ? $this->gradeMapel($nilai->inggris): 'N/A'
        ],
        'kejuruan' => [
            'nilai' => $nilai->kejuruan ?? 'Data tidak tersedia',
            'grade' => $nilai ? $this->gradeMapel($nilai->kejuruan): 'N/A'
        ],
        'pilihan' => [
            'nilai' => $nilai->pilihan ?? 'Data tidak tersedia',
            'grade' => $nilai ? $this->gradeMapel($nilai->pilihan): 'N/A'
        ],
        'rata_rata' => [
            'nilai' => $nilai->rata_rata ?? 'Data tidak tersedia',
            'grade' => $nilai ? $this->gradeMapel($nilai->rata_rata): 'N/A'
        ]
     ];
     return view('nilai.show',[
        'siswa'=>$siswa,
        'data_nilai'=>$data_nilai,
        'walas'=>$walas
     ]);
}
public function destroy(Nilai $nilai){
    $nilai->delete();
    return redirect("/nilai-rapot/index")->with('success', 'Data nilai berhasil dihapus');
}
}


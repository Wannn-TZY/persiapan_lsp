@extends('layout.main')

@section('name')
    <h3>Rekap Nilai</h3>
@endsection

@section('content')
    <center>
        {{-- {{ dd($kelas) }} --}}
        <h1>REKAP NILAI RAPORT <br> {{ $kelas->nama_kelas }}</h1>

        {{--
        @if (session('role') == 'guru')
            <a href="/nilai/create/{{ $idkelas }}" class="button-primary">TAMBAH DATA</a>
        @endif
        --}}

        <p align="right">
            <a href="/nilai-rapot/create" class="button-primary">
                <button class="add-button">Tambah Data</button>
            </a>
        </p>

        @if (session('success'))
            <div class="alert alert-success">
                <span class="closebtn" id="closeBtn">&times;</span>
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                <span class="closebtn" id="closeBtn">&times;</span>
                {{ session('error') }}
            </div>
        @endif

    <table class="table-show">
    <thead>
        <tr>
            <th class="border-head" rowspan="2">NO</th>
            <th class="border-head" rowspan="2">NIS</th>
            <th class="border-head" rowspan="2">NAMA SISWA</th>
            <th class="border-head" colspan="6">NILAI</th>
            <th class="border-head" rowspan="2" colspan="3">ACTION</th>
        </tr>
        <tr>
            <th class="border-head">MATEMATIKA</th>
            <th class="border-head">BAHASA INDONESIA</th>
            <th class="border-head">BAHASA INGGRIS</th>
            <th class="border-head">KEJURUAN</th>
            <th class="border-head">M. PILIHAN</th>
            <th class="border-head">RATA - RATA</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data_siswa as $siswa)
        <tr>
            <td class="border-data">{{ $loop->iteration }}</td>
            <td class="border-data">{{ $siswa->nis }}</td>
            <td class="border-data">{{ $siswa->nama_siswa }}</td>
            <td class="border-data">{{ $siswa->nilai->matematika ?? '-' }}</td>
            <td class="border-data">{{ $siswa->nilai->indonesia ?? '-' }}</td>
            <td class="border-data">{{ $siswa->nilai->inggris ?? '-' }}</td>
            <td class="border-data">{{ $siswa->nilai->kejuruan ?? '-' }}</td>
            <td class="border-data">{{ $siswa->nilai->pilihan ?? '-' }}</td>
            <td class="border-data">{{ $siswa->nilai->rata_rata ?? '-' }}</td>
            <td class="border-data" colspan="3" style="text-align: center;">
                @if($siswa->nilai)
                    <a href="/nilai-rapot/show/{{ $siswa->nilai->id }}">
                        <button class="index-button">VIEW</button>
                    </a>
                    <a href="/nilai-rapot/edit/{{ $siswa->nilai->id }}">
                        <button class="index-button">EDIT</button>
                    </a>
                    <a href="/nilai-rapot/destroy/{{ $siswa->nilai->id }}"
                       onclick="return confirm('Yakin Hapus?')">
                        <button class="index-button button-danger">DELETE</button>
                    </a>
                @else
                    <span style="color:gray">Belum ada nilai</span>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
     </center>
@endsection

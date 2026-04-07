@extends('layout.main')
@section('name')
<h3>Laporan Nilai {{$siswa->nama_siswa}}</h3>
@endsection
@section('content')
<center>
    @if(!empty($message))
        <div class="alert-danger" style="padding: 16px; max-width: 640px; margin: 24px auto; border-radius: 8px; background: #ffe5e5; color: #a70000;">
            {{ $message }}
        </div>
    @else
        <table align="center" cellspacing = "0" class = "table-show">
            <tr>
                <td>Nama Siswa</td>
                <td>:</td>
                <td>{{ $siswa->nama_siswa }}</td>
            </tr>
            <tr>
                <td>Nomor Induk Siswa</td>
                <td>:</td>
                <td>{{ $siswa->nis }}</td>
            </tr>
            <tr>
                <td>Nama Walas</td>
                <td>:</td>
                <td>{{ optional($siswa->kelas->walas)->nama_walas ?? 'Belum ditentukan' }}</td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>:</td>
                <td>{{ $siswa->kelas->name_kelas ?? 'Belum ditentukan' }}</td>
            </tr>
        </table>
        <table class = "table-show table-view">
            <thead>
                <tr>
                    <th class = "border-head">No</th>
                    <th class = "border-head">Mata Pelajaran</th>
                    <th class = "border-head">Nilai</th>
                    <th class = "border-head">Grade</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class = "border-data">1</td>
                    <td class = "border-data">Matematika</td>
                    <td class = "border-data">{{$data_nilai['matematika']['nilai']}}</td>
                    <td class = "border-data">{{ $data_nilai['matematika']['grade'] }}</td>
                </tr>
                <tr>
                    <td class = "border-data">2</td>
                    <td class = "border-data">Indonesia</td>
                    <td class = "border-data">{{$data_nilai['indonesia']['nilai']}}</td>
                    <td class = "border-data">{{ $data_nilai['indonesia']['grade'] }}</td>
                </tr>
                <tr>
                    <td class = "border-data">3</td>
                    <td class = "border-data">Inggris</td>
                    <td class = "border-data">{{$data_nilai['inggris']['nilai']}}</td>
                    <td class = "border-data">{{ $data_nilai['inggris']['grade'] }}</td>
                </tr>
                <tr>
                    <td class = "border-data">4</td>
                    <td class = "border-data">Kejuruan</td>
                    <td class = "border-data">{{$data_nilai['kejuruan']['nilai']}}</td>
                    <td class = "border-data">{{ $data_nilai['kejuruan']['grade'] }}</td>
                </tr>
                <tr>
                    <td class = "border-data">5</td>
                    <td class = "border-data">Pilihan</td>
                    <td class = "border-data">{{$data_nilai['pilihan']['nilai']}}</td>
                    <td class = "border-data">{{ $data_nilai['pilihan']['grade'] }}</td>
                </tr>
                <tr>
                    <td class = "border-data">6</td>
                    <td class = "border-data">Rata - rata</td>
                    <td class = "border-data">{{$data_nilai['rata_rata']['nilai']}}</td>
                    <td class = "border-data">{{ $data_nilai['rata_rata']['grade'] }}</td>
                </tr>
            </tbody>
        </table>
    @endif
</center>
@endsection

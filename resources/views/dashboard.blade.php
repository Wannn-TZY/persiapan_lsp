@extends('layout.main')

@section('name')
<h3>Dashboard {{ session('role') == 'Murid' ? 'Siswa' : 'Walas' }}</h3>
@endsection

@section('content')
    <div class="dashboard-card">
        <p>Halo, <strong>{{ session('nama') }}</strong></p>
        <p>Role: <strong>{{ session('role') }}</strong></p>
        @if(session('role') == 'Murid')
            <p>NIS: <strong>{{ session('nis') }}</strong></p>
            <p>Kelas: <strong>{{ session('nama_kelas') }}</strong></p>
            <a class="button-primary" href="/nilai-rapot/show">Lihat Nilai Saya</a>
        @else
            <p>Walas untuk kelas: <strong>{{ session('nama_kelas') }}</strong></p>
            <a class="button-primary" href="/nilai-rapot/index">Lihat Rekap Nilai</a>
        @endif
    </div>
@endsection

@extends('layout.main')
@section('name')
<h3>Tambahkan Nilai</h3>
@endsection
@section('content')
<h3>Create Nilai</h3>
@if ($errors->any())
    <div class="alert-danger" style="padding: 12px; margin-bottom: 16px; border-radius: 6px; background: #ffe5e5; color: #a70000;">
        <strong>Perhatian:</strong>
        <ul style="margin: 8px 0 0 16px; padding: 0; list-style: disc;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session('error'))
<p class="alert-danger">{{ session('error') }}</p>
@endif
<center>
<form action="/nilai-rapot/store" method="post">
    @csrf
    <table>
        <tr class = "position">
            <td>
                <label for="siswa_id">Nama Siswa</label>
            </td>
            <td>
                <select name="siswa_id" id="siswa_id" required>
                    <option value="">-- Pilih Siswa --</option>
                    @foreach ($siswa as $each)
                        <option value="{{ $each->id }}">{{ $each->nama_siswa }}</option>
                    @endforeach
                </select>
            </td>
        </tr>
        <tr class = "position">
            <td>
                <label for="matematika">Matematika</label>
            </td>
            <td>
                <input type="number" name="matematika" id="matematika" min="0" max="100" step="1" oninput="this.value=this.value.replace(/[^0-9]/g,'')" required>
            </td>
        </tr>
        <tr class = "position">
            <td>
                <label for="indonesia">Indonesia</label>
            </td>
            <td>
                <input type="number" name="indonesia" id="indonesia" min="0" max="100" step="1" oninput="this.value=this.value.replace(/[^0-9]/g,'')" required>
            </td>
        </tr>
        <tr class = "position">
            <td>
                <label for="inggris">Inggris</label>
            </td>
            <td>
                <input type="number" name="inggris" id="inggris" min="0" max="100" step="1" oninput="this.value=this.value.replace(/[^0-9]/g,'')" required>
            </td>
        </tr>
        <tr class = "position">
            <td>
                <label for="kejuruan">Kejuruan</label>
            </td>
            <td>
                <input type="number" name="kejuruan" id="kejuruan" min="0" max="100" step="1" oninput="this.value=this.value.replace(/[^0-9]/g,'')" required>
            </td>
        </tr>
        <tr class = "position">
            <td>
                <label for="pilihan">Pilihan</label>
            </td>
            <td>
                <input type="number" name="pilihan" id="pilihan" min="0" max="100" step="1" oninput="this.value=this.value.replace(/[^0-9]/g,'')" required>
            </td>
        </tr>
    </table>
    <a href="{{ url('/nilai-rapot/create') }}" class="button-primary">
    <button class="add-button">Simpan</button>
</a>

</form>
</center>
@endsection

@extends('layout.main')
@section('name')
    <h3>Edit Nilai {{ $siswa->nama_siswa }}</h3>
@endsection

@section('content')
    @if (session('error'))
        <p class="text-danger">{{ session('error') }}</p>
    @endif

    <form class="form" action="/nilai-rapot/update/{{ $nilai->id }}" method="post">
        @method('put')
        @csrf
        <table>
            <tr class="position">
                <td>
                    <label for="siswa_id">Nama Siswa:</label>
                </td>
                <td>
                    <input value="{{ $siswa->id }}" type="hidden" name="siswa_id" id="siswa_id" step="0.01" required>
                    <input value="{{ $siswa->nama_siswa }}" type="text" step="0.01" readonly>
                </td>
            </tr>

            <tr class="position">
                <td>
                    <label for="matematika">Matematika:</label>
                </td>
                <td>
                    <input value="{{ $nilai->matematika }}" type="number" name="matematika" id="matematika" step="0.01" required>
                </td>
            </tr>

            <tr class="position">
                <td>
                    <label for="indonesia">Indonesia:</label>
                </td>
                <td>
                    <input value="{{ $nilai->indonesia }}" type="number" name="indonesia" id="indonesia" step="0.01" required>
                </td>
            </tr>
        <tr class="position">
    <td>
        <label for="inggris">Inggris:</label>
    </td>
    <td>
        <input value="{{ $nilai->inggris }}" type="number" name="inggris" id="inggris" step="0.01" required>
    </td>
</tr>

<tr class="position">
    <td>
        <label for="kejuruan">Kejuruan:</label>
    </td>
    <td>
        <input value="{{ $nilai->kejuruan }}" type="number" name="kejuruan" id="kejuruan" step="0.01" required>
    </td>
</tr>

<tr class="position">
    <td>
        <label for="pilihan">Pilihan:</label>
    </td>
    <td>
        <input value="{{ $nilai->pilihan }}" type="number" name="pilihan" id="pilihan" step="0.01" required>
    </td>
</tr>
</table>
<a href="{{ url('/nilai-rapot/update') }}" class="button-primary">
    <button class="add-button">Simpan</button>
</a>
</form>
@endsection


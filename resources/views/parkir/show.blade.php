@extends('layout/master')

@section('content')
<h3> Form Keluar Parkir </h3>
<fieldset>
        <p> Nota: {{ $parkir->nota }} </p>
        <p> Nama Petugas: {{ $parkir->petugas }} </p>
        <p> Tipe kendaraan: {{ $parkir->type_kendaraan }} </p>
        <p> Masuk: {{ $parkir->waktu_masuk }} </p>
        <form action="{{ route('parkir.update', $parkir->nota) }}" method="POST">
            @method('PUT')        
            @csrf
            <ul>
                <li>
                    <label for="keluar"> Masukan Waktu Keluar :</label>
                    {{-- <input type="dateTime-local" name="keluar" id="keluar" required> --}}
                </li>
                <li>
                    <button type="submit" name="submit"> Keluar </button>
                </li>
            </ul>
        </form>
</fieldset>
@endsection
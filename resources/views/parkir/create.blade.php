@extends('layout/master')

@section('content')

<h3> Form Masuk Parkir </h3>
<fieldset>
        <form action="{{ route('parkir.store') }}" method="POST">        
        @csrf
            <ul>
                <li>
                    <label for="nota"> Nota :</label>
                    <input type="text" name="nota" id="nota" required>
                </li>
                <li>
                    <label for="petugas">Petugas :</label>
                    <input type="text" name="petugas" id="petugas" required>
                </li>
                <li>
                    <label for="kendaraan">Tipe kendaraan :</label>
                    <select name="kendaraan">
                        @foreach($kendaraan as $item)
                            <option value="{{ $item }}">{{$item}}</option>
                        @endforeach
                    </select> 
                </li>
                <li>
                    <label for="waktu">Waktu Masuk :</label>
                    <input type="datetime-local" name="waktu" step="1" id="waktu">
                </li>
                <li>
                    <button type="submit" name="submit"> Buat </button>
                </li>
            </ul>
        </form>
       </fieldset>
@endsection

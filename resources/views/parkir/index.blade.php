@extends('layout/master')

@section('content')
<style>
  table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }
  
  td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
  }

  </style>
<table>
  <tr>
    <th>Nota</th>
    <th>Petugas</th>
    <th>Tipe Kendaraan</th>
    <th>Waktu Masuk</th>
    <th>Waktu Keluar</th>
    <th>Durasi Parkir</th>
    <th>Keuntungan</th>
    <th>Aksi</th>
  </tr>
  @foreach ($parkirs as $parkir )
    <tr>
      <td>{{ $parkir->nota}}</td>
      <td>{{ $parkir->petugas}}</td>
      <td>{{ $parkir->type_kendaraan}}</td>
      <td>{{ $parkir->waktu_masuk}}</td>
      <td>{{ $parkir->waktu_keluar ? $parkir->waktu_keluar : '-'}}</td>
      <td>
        <?php
          $waktu_masuk = new DateTime($parkir->waktu_masuk);
          $waktu_keluar = new DateTime($parkir->waktu_keluar);
          $durasi_parkir = $waktu_masuk->diff($waktu_keluar);
          echo $durasi_parkir->format('%H:%I:%S');
          echo $durasi_parkir->format('%h');
        ?>
      </td>
      <td>Rp. {{ $parkir->total_harga }}</td>
      <td>
        <a href={{url('/parkir/' . $parkir->nota )}}>Keluar</a>
      </td>
    </tr>
  @endforeach
</table>
@endsection

@section('script')

@endsection

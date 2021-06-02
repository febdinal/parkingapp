<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h3> Form Keluar Parkir </h3>
<fieldset>
        <p> {{ $parkir->petugas }} </p>
        <p> {{ $parkir->type_kendaraan }} </p>
        <p> {{ $parkir->waktu_masuk }} </p>
        <form action="{{ route('parkir.store') }}" method="POST">        
        @csrf
            <ul>
                <li>
                    <label for="keluar"> Masukan Waktu Keluar :</label>
                    <input type="dateTime-local" name="keluar" id="keluar" required>
                </li>
                <li>
                    <button type="submit" name="submit"> Buat </button>
                </li>
            </ul>
        </form>
</fieldset>
</body>
</html>
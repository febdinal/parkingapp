<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Masuk Parkir</title>
</head>
<body>
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
                        @foreach($vehicles as $item)
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
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Edit Mahasiswa</title>
</head>

<body>
    <center>
        <p>
            <button type="button" onclick="window.location='/mhs/index'">
                &laquo Kembali
            </button>

        <form method="POST" action="{{ url('/mhs/update') }}">
            @csrf
            @method('PUT')
            <table style="windows: 70%;">
                <tr>
                    <td>NIM :</td>
                    <td>
                        <input type="number" name="nim" id="nim" value="{{ $nim }}" readonly
                            style="cursor: not-allowed">
                    </td>
                </tr>
                <tr>
                    <td>Nama Mahasiswa :</td>
                    <td>
                        <input type="text" name="nama" id="nama" value="{{ $nama }}">
                    </td>
                </tr>
                <tr>
                    <td>No Telp :</td>
                    <td>
                        <input type="number" name="telp" id="telp" value="{{ $telp }}">
                    </td>
                </tr>
                <tr>
                    <td>Alamat :</td>
                    <td>
                        <textarea name="alamat" id="alamat" cols="50" rows="5">{{ $alamat }}</textarea>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <button type="submit">Update</button>
                    </td>
                </tr>
            </table>
        </form>
        </p>
    </center>
</body>

</html>

@extends('layout.main')

@section('judul')
    Data Mahasiswa
@endsection

@section('isi')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button class="btn btn-primary" type="button" onclick="window.location='/mhs/tambah'">
                    Tambah
                </button>
            </h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            @if (session('msg'))
                <p>
                    {{ session('msg') }}
                </p>
            @endif
            <table class="table table-sm table-bordered table-striped">
                <thead>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Telp</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    @foreach ($dataMhs as $d)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $d->mhsnim }}</td>
                            <td>{{ $d->mhsnama }}</td>
                            <td>{{ $d->mhstelp }}</td>
                            <td>{{ $d->mhsalamat }}</td>
                            <td>
                                <button class="btn btn-sm btn-warning" type="button"
                                    onclick="window.location='/mhs/edit/{{ $d->mhsnim }}'">
                                    Edit
                                </button>

                                <form method="POST" action="/mhs/hapus/{{ $d->mhsnim }}" style="display: inline;"
                                    onsubmit="return hapusData()">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" type="submit">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </center>

            <script>
                function hapusData() {
                    pesan = confirm('Apakah yakin data ini dihapus ?');
                    if (pesan)
                        return true;
                    else return false;
                }
            </script>
        </div>
        <!-- /.card-body -->
        <!-- /.card-footer-->
    </div>
@endsection

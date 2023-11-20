@extends('../particle/app')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row mb-2">

                <a href="{{ route('nasabah.create') }}" class="btn btn-primary btn-lg">Tambah</a>
            </div>
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <table id="data" class="display"> 
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>No Hp</th>
                                    <th>Jenis</th>
                                    <th>Tanggal Daftar</th>
                                    <th>Menu</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($nasabahs as $nasabah)
                                    <tr>
                                        <td>{{ $nasabah->nama }}</td>
                                        <td>{{ $nasabah->alamat }}</td>
                                        <td>{{ $nasabah->hp }}</td>
                                        <td>{{ $nasabah->jenis }}</td>
                                        <td>{{ $nasabah->tgl_daftar }}</td>
                                        <td class="d-flex">
                                            <form action="{{ route('nasabah.destroy', $nasabah->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                                <input type="submit" value="Hapus" class="btn btn-danger me-2" onclick="confirm('Yakin Akan Menghapus Nasabah ini?')">

                                        </form>

                                        <a href="{{ route('nasabah.edit', $nasabah->id) }}" class="btn btn-primary ms-2">Ubah</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@section('script')
    <script>
        let data = new DataTable('#data');
    </script>
@endsection
@endsection

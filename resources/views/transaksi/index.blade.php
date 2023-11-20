@extends('../particle/app')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row mb-2">

                <a href="{{ route('transaksi.create') }}" class="btn btn-primary btn-lg">Tambah</a>
            </div>
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <table id="data" class="display"> 
                            <thead>
                                <tr>
                                    <th>No Rekening</th>
                                    <th>Id Jenis Transaksi</th>
                                    <th>Jenis Transaksi</th>
                                    <th>Nominal</th>
                                    <th>Keterangan</th>
                                    <th>Waktu</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaksis as $transaksi)
                                <?php
                                //  dd($transaksi) 
                                 ?>
                                    <tr>
                                        {{-- <td>{{ $transaksi->id }}</td> --}}
                                        <td>{{ $transaksi->no_rek }}</td>
                                        {{-- <td>{{ $transaksi->rekening->nasabah_id }}</td> --}}
                                        <td>{{ $transaksi->jenis_transaksi->id }}</td>
                                        <td>{{ $transaksi->jenis_transaksi->nama_transaksi }}</td>
                                        <td>{{ $transaksi->nominal }}</td>
                                        <td>{{ $transaksi->keterangan }}</td>
                                        <td>{{ $transaksi->created_at }}</td>
                                        {{-- <td>{{ $rekening->tgl_aktif }}</td> --}}
                                        <td class="d-flex">
                                            <form action="{{ route('transaksi.destroy', $transaksi->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                                <input type="submit" value="Hapus" class="btn btn-danger me-2" onclick="confirm('Yakin Akan Menghapus Rekening ini?')">

                                        </form>

                                        {{-- <a href="{{ route('transaksi.edit', $transaksi->id) }}" class="btn btn-primary ms-2">Ubah</a> --}}
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

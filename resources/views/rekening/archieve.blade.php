@extends('../particle/app')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row mb-2">

                {{-- <a href="{{ route('rekening.create') }}" class="btn btn-primary btn-lg">Tambah</a> --}}
            </div>
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <table id="data" class="display"> 
                            <thead>
                                <tr>
                                    <th>No Rekening</th>
                                    <th>Id Nasabah</th>
                                    <th>Nama Nasabah</th>
                                    <th>Id jenis Rekening</th>
                                    <th>Jenis Rekening</th>
                                    <th>Status</th>
                                    <th>Tanggal Aktif</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rekenings as $rekening)
                                    <tr>
                                        <td>{{ $rekening->no_rek }}</td>
                                        <td>{{ $rekening->id_nasabah }}</td>
                                        <td>{{ $rekening->nasabah->nama }}</td>
                                        <td>{{ $rekening->jenis_tabungan->id }}</td>
                                        <td>{{ $rekening->jenis_tabungan->nama_jenis_tabungan }}</td>
                                        <td>{{ $rekening->status }}</td>
                                        <td>{{ $rekening->tgl_aktif }}</td>
                                        <td class="d-flex">
                                            <form action="/archieve/rekening/restore/{{ $rekening->id }}" method="post">
                                            @csrf
                                                <input type="submit" value="Kembalikan" class="btn btn-success me-2" onclick="confirm('Yakin Akan Mengembalikan Rekening ini?')">

                                        </form>

                                        {{-- <a href="{{ route('rekening.edit', $rekening->id) }}" class="btn btn-primary ms-2">Ubah</a> --}}
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

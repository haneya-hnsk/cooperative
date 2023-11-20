@extends('../particle/app')
@section('content')
    <div class="col-10 mt-3">
        <div class="card">
            <div class="card-body">
                <div class="card-head">
                    <h3>Ubah Rekening</h1>
                </div>
                <hr class="sidebar-divider">
                <form action="{{ route('rekening.update', $rekening->id) }}" method="post">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <label for="id_nasabah" class="form-label">id_nasabah</label>
                        <input type="text" name="id_nasabah" class="form-control" id="id_nasabah" value="{{ old('id_nasabah', $rekening->id) }}">
                        @error('id_nasabah')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                    </div>
                    <div class="mb-3">
                        <label for="id_jenis_tabungan">Jenis Rekening</label>
                        <select name="id_jenis_tabungan" id="id_jenis_tabungan" value="{{ old('id_jenis_tabungan') }}" class="form-control">
                            @foreach ($jenistabungans as $jenistabungan)
                                <option value="{{ $jenistabungan->id }}" {{  $rekening->id_jenis_tabungan==$jenistabungan->id ? 'selected' : ''}}>{{ $jenistabungan->nama_jenis_tabungan }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <input type="submit" value="Kirim" class="btn btn-success">
                </form>

            </div>
        </div>
    </div>
@endsection

@extends('../particle/app')
@section('content')
    <div class="col-10">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('rekening.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="id_nasabah" class="form-label">id_nasabah</label>
                        <input type="text" name="id_nasabah" class="form-control" id="id_nasabah" value="{{ old('id_nasabah') }}">
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
                                <option value="{{ $jenistabungan->id }}">{{ $jenistabungan->nama_jenis_tabungan }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <input type="submit" value="Kirim" class="btn btn-success">
                </form>

            </div>
        </div>
    </div>
@endsection

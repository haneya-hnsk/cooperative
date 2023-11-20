@extends('../particle/app')
@section('content')
<div class="col-10">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('nasabah.update', $nasabah->id) }}" method="post">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama', $nasabah->nama) }}">
                    @error('nama')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea type="textarea" name="alamat" class="form-control" id="alamat">{{ old('alamat', $nasabah->alamat) }}</textarea>
                    @error('alamat')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="hp" class="form-label">HP</label>
                    <input type="text" name="hp" class="form-control" id="hp" value="{{old('hp', $nasabah->hp)}}" >
                    @error('hp')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="jenis" class="form-label">Jenis</label>
                    <input type="text" name="jenis" class="form-control" id="jenis" value="{{ old('jenis', $nasabah->jenis) }}"> 
                    @error('jenis')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <input type="submit" value="Kirim" class="btn btn-success">
            </form>

        </div>
    </div>
</div>
@endsection
@extends('../particle/app')
@section('content')
    <div class="col-10">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('rekening.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="no_rek" class="form-label">No Rekening</label>
                        <input type="text" name="no_rek" class="form-control" id="no_rek" value="{{ old('no_rek') }}">
                        @error('no_rek')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="id_jenis_transaksi">Jenis Transaksi</label>
                        <select name="id_jenis_transaksi" id="id_jenis_transaksi" value="{{ old('id_jenis_transaksi') }}"
                            class="form-select form-control">
                            @foreach ($jenistransaksis as $jenistransaksi)
                                <option value="{{ $jenistransaksi->id }}">{{ $jenistransaksi->nama_transaksi }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="keterangan" class="form-label">nominal</label>
                        <input type="text" name="nominal" class="form-control" id="nominal"
                            value="{{ old('nominal') }}">
                        @error('nominal')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">keterangan</label>

                        <textarea name="keterangan" class="form-control" id="keterangan" cols="30" rows="10">{{ old('keterangan') }}</textarea>
                        @error('keterngan')
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

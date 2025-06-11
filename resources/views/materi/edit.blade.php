@extends('main')

@section('title', 'Edit Materi')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline mb-4">
                <div class="card-header">
                    <div class="card-title">Form Ubah Materi</div>
                </div>
                <form action="{{ route('materi.update', $materi->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="mb-3">
                        <label for="matakuliah_id" class="form-label">Mata Kuliah</label>
                        <select name="matakuliah_id" class="form-control">
                          @foreach ($matakuliah as $item)
                            <option value="{{ $item->id }}" {{ old('matakuliah_id') == $item->id ? "selected" : null }}> {{ $item->nama }} </option>
                          @endforeach
                        </select>
                        @error('matakuliah_id')
                          <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>

                      <div class="mb-3">
                        <label for="dosenid" class="form-label">Dosen</label>
                        <select name="dosenid" class="form-control">
                          @foreach ($users as $item)
                            <option value="{{ $item->id }}" {{ old('dosenid') == $item->id ? "selected" : null }}> {{$item->name}} </option>
                          @endforeach
                        </select>
                        @error('dosenid')
                          <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                        <div class="mb-3">
                            <label for="pertemuan" class="form-label">Pertemuan</label>
                            <input type="number" class="form-control" name="pertemuan" value="{{ old('pertemuan', $materi->pertemuan) }}">
                            @error('pertemuan')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="pokokbahasan" class="form-label">Pokok Bahasan</label>
                            <input type="text" class="form-control" name="pokokbahasan" value="{{ old('pokokbahasan', $materi->pokokbahasan) }}">
                            @error('pokokbahasan')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                        <label for="filemateri" class="form-label">File Materi</label>
                        <input type="file" class="form-control" name="filemateri">
                        @error('filemateri')
                          <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@extends('main')

@section('title', 'Materi')
@section('content')
    <!--begin::Row-->
    <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline mb-4">
                <!--begin::Header-->
                <div class="card-header"><div class="card-title">Form Tambah Materi</div>
                <!--end::Header-->
                <!--begin::Form-->
                <form action="{{ route('materi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!--begin::Body-->
                    </div>
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
                          <option value="{{ $item->id }}" {{ old('dosenid') == $item->id ? "selected" : null }}>
                          {{ $item->name ?? 'None' }}
                          </option>
                          @endforeach
                        </select>
                        @error('dosenid')
                          <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                        <div class="mb-3">
                            <label for="pertemuan" class="form-label">Pertemuan</label>
                            <input type="number" class="form-control" name="pertemuan" value="{{ old('pertemuan') }}">
                            @error('pertemuan')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="pokokbahasan" class="form-label">Pokok Bahasan</label>
                            <input type="text" class="form-control" name="pokokbahasan" value="{{ old('pokokbahasan') }}">
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
                    <!--end::Body-->
                    <!--begin::Footer-->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    </div>
                    <!--end::Footer-->
                </form>
                <!--end::Form-->
            </div>
        </div>
    </div>
    <!--end::Row-->
@endsection
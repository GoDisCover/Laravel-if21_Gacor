@extends('main')

@section('title', 'Jadwal')
@section('content')
    <!--begin::Row-->
    <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header"><div class="card-title">Form Tambah Jadwal</div></div>
                  <!--end::Header-->
                  <!--begin::Form-->
                  <form action="{{ route('jadwal.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!--begin::Body-->
                    <div class="card-body">
                      <div class="mb-3">
                        <label for="tahun_akademik" class="form-label">Tahun Akademik</label>
                        <input type="text" class="form-control" name="tahun_akademik">
                        @error('tahun_akademik')
                          <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="kode_smt" class="form-label">Kode SMT</label>
                        <input type="text" class="form-control" name="kode_smt">
                        @error('kode_smt')
                          <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="kelas" class="form-label">kelas</label>
                        <input type="text" class="form-control" name="kelas">
                        @error('kelas')
                          <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="mata_kuliah_id" class="form-label">Mata Kuliah</label>
                        <select name="mata_kuliah_id" class="form-control">
                          @foreach ($matakuliah as $item)
                            <option value="{{ $item->id }}" {{ old('mata_kuliah_id') == $item->id ? "selected" : null }}> {{ $item->nama }} </option>
                          @endforeach
                        </select>
                        @error('mata_kuliah_id')
                          <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>

                      <div class="mb-3">
                        <label for="dosenid" class="form-label">Dosen</label>
                        <select name="dosenid" class="form-control">
                          @foreach ($users as $item)
                            <option value="{{ $item->id }}" {{ old('dosenid') == $item->id ? "selected" : null }}> {{$new->category->name ?? 'None'}} </option>
                          @endforeach
                        </select>
                        @error('dosenid')
                          <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="sesi_id" class="form-label">Sesi</label>
                        <select name="sesi_id" class="form-control">
                          @foreach ($sesi as $item)
                            <option value="{{ $item->id }}" {{ old('sesi_id') == $item->id ? "selected" : null }}> {{ $item->nama }} </option>
                          @endforeach
                        </select>
                        @error('sesi_id')
                          <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <!--end::Body-->
                    <!--begin::Footer-->
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <!--end::Footer-->
                  </form>
                  <!--end::Form-->
            </div>
        </div>
    </div>
    <!--end::Row-->
@endsection
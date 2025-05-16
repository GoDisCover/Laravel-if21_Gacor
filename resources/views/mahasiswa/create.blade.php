@extends('main')

@section('title', 'Prodi')
@section('content')
    <!--begin::Row-->
    <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline mb-4">
                <!--begin::Header-->
                <div class="card-header">
                    <div class="card-title">Quick Example</div>
                </div>
                <!--end::Header-->
                <!--begin::Form-->
                <form action="{{ route('prodi.store') }}" method="POST">

                    @csrf
                    <!--begin::Body-->
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Mahasiswa</label>
                            <input type="text" class="form-control" name="nama">
                        </div>
                        <div class="mb-3">
                            <label for="npm" class="form-label">NPM</label>
                            <input type="text" class="form-control" name="npm">
                        </div>
                        <div class="mb-3">
                        <label for="jk" class="form-label">Jenis Kelamin</label><br>
                        <input type="radio" name="jk" value="l">{{ old('jk') == 'L' ? 'selected' : null}} 
                        <input type="radio" name="jk" value="p"> {{ old('jk') == 'P' ? 'selected' : null}}
                        </div>
                        <div class="mb-3">
                            <label for="Sekretaris" class="form-label">Tempat lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir">
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir">
                        </div>
                        <div class="mb-3">
                            <label for="asal_sma" class="form-label">Asal SMA</label>
                            <input type="text" class="form-control" name="asal_sma">
                        </div>
                        <div class="mb-3">
                            <label for="prodi_id" class="form-label">Prodi</label>
                            <select name="prodi_id" class="form-control">
                                @foreach ($prodi as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto</label>
                            <input type="text" class="form-control" name="foto">
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


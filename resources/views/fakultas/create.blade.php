@extends('main')

@section('title', 'Fakultas')
@section('content')
    <!--begin::Row-->
    <div class="row">
        <div class="col-12">
            {{-- form tambah fakultas --}}
            <div class="card card-primary card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header"><div class="card-title">Form Tambah Fakultas</div></div>
                  <!--end::Header-->
                  <!--begin::Form-->
                  <form action="{{ route('fakultas.store') }}" method="POST">
                    @csrf
                    <!--begin::Body-->
                    <div class="card-body">
                      <div class="mb-3">
                        <label for="nama" class="form-label">Nama Fakultas</label>
                        <input type="text" class="form-control" name="nama">
                      </div>
                      <div class="mb-3">
                        <label for="singkatan" class="form-label">Singkatan</label>
                        <input type="text" class="form-control" name="singkatan">
                      </div>
                      <div class="mb-3">
                        <label for="nama_dekan" class="form-label">Nama Dekan</label>
                        <input type="text" class="form-control" name="nama_dekan">
                      </div>
                      <div class="mb-3">
                        <label for="nama_wadek" class="form-label">Nama Wakil Dekan</label>
                        <input type="text" class="form-control" name="nama_wadek">
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
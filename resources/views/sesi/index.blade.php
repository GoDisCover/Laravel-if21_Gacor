@extends('main')

@section('title', 'Sesi')
@section('content')
    <!--begin::Row-->
    <div class="row">
        <div class="col-12">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">Sesi</h3>
            <div class="card-tools">
                <button
                type="button"
                class="btn btn-tool"
                data-lte-toggle="card-collapse"
                title="Collapse"
                >
                <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                </button>
                <button
                type="button"
                class="btn btn-tool"
                data-lte-toggle="card-remove"
                title="Remove"
                >
                <i class="bi bi-x-lg"></i>
                </button>
            </div>
            </div>
            <div class="card-body">
                <a href="{{ route('sesi.create') }}" class="btn btn-sm btn-primary"><i class="bi bi-file-earmark-plus-fill"></i> Tambah</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sesi as $item)
                        <tr>
                            <td>{{ $item->nama }}</td>
                            <td>
                                <a href="{{ route('sesi.edit', $item->id) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-fill"></i></a>
                                <form method="POST" action="{{ route('sesi.destroy', $item->id) }}" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger btn-rounded show_confirm"
                                    data-toggle="tooltip" title='Delete'
                                    data-nama='{{ $item->nama }}'><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>  
            </div>
            <!-- /.card-body -->
            <div class="card-footer">Footer</div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
        </div>
    </div>
    <!--end::Row-->
@endsection
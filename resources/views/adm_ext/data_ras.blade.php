@extends('adm_ext.MainAdm')
@section('ras')
active
@endsection
@section('support')
active
@endsection
@section('breadcrumbs')
Ras
@endsection

@section('content')
<div class="container-fluid">

    <div class="d-flex justify-content-end pb-2">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addData"><i
                class="fa fa-plus"></i> ADD</button>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Data Ras</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Ras</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama Ras</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($response as $item)
                        <tr>
                            <td>{{ $item->nama_ras }}</td>
                            <td>
                                @if ($item->status_ras == 1)
                                <span class="badge badge-success">Active</span>
                                @else
                                <span class="badge badge-danger">Non Active</span>
                                @endif
                            </td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                    data-target="#editData{{ $item->id_ras }}"><i class="fa fa-edit"></i>
                                    Edit</button>
                                <a href="{{ url('/hapus_ras/'. $item->id_ras) }}" class="btn btn-sm btn-danger"><i
                                        class="fa fa-trash"></i> Hapus</a>
                            </td>
                        </tr>

                        <!-- edit Modal-->
                        <div class="modal fade" id="editData{{ $item->id_ras }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('/edit_ras/'. $item->id_ras) }}" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="" class="form-label">Nama Ras</label>
                                                <input type="text" value="{{ $item->nama_ras }}" class="form-control"
                                                    name="nama_ras" id="" aria-describedby="helpId" placeholder="">
                                                <small id="helpId" class="form-text text-muted"></small>
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">Status</label>
                                                <select class="form-control" name="status" id="">
                                                    @if ($item->status_ras == 1)
                                                    <option value="1" selected>Active</option>
                                                    <option value="9">Non-Active</option>
                                                    @else
                                                    <option value="1">Active</option>
                                                    <option value="9" selected>Non-Active</option>
                                                    @endif
                                                </select>
                                            </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button"
                                            data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Add Modal-->
<div class="modal fade" id="addData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/add_ras') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Nama Ras</label>
                        <input type="text" class="form-control" name="nama_ras" id="" aria-describedby="helpId"
                            placeholder="">
                        <small id="helpId" class="form-text text-muted"></small>
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                {{-- <a class="btn btn-primary" href="#">Simpan</a> --}}
                <button class="btn btn-primary" type="submit">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
@extends('adm_ext.MainAdm')

@section('satwa')
active
@endsection

@section('breadcrumbs')
Award
@endsection

@section('content')
<div class="container-fluid">


    <div class="d-flex justify-content-end pb-2">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addData"><i
                class="fa fa-plus"></i>
            ADD</button>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Data Award - <b class="text-danger">{{ $nama_satwa
                    }}</b>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Kegiatan</th>
                            <th>Tgl Kegiatan</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama Kegiatan</th>
                            <th>Tgl Kegiatan</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($award as $item)
                        <tr>
                            <td>{{ $item->awards }}</td>
                            <td>{{ $item->tgl_kegiatan }}</td>
                            <td>{{ $item->keterangan_award }}</td>
                            <td>
                                <a href="{{ url('delete_awards/'.$id.'/'.$nama_satwa.'/'.$item->id_awards) }}"
                                    class="btn btn-danger" onclick="return confirm('Data akan dihapus! apakah ok?')"><i
                                        class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-start pb-2">
        <a href="{{ url('adm_ext_data_satwa') }}" class="btn btn-info"><i class="fa fa-arrow-left"></i>
            Kembali</a>
    </div>
</div>


<!-- Add Modal-->
<div class="modal fade" id="addData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Data Award</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('add_award/'.$id.'/'.$nama_satwa) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-sm-12">
                            <label for="formFile" class="form-label">Nama Kegiatan</label>
                            <input class="form-control" type="text" id="" name="nama_award" accept="image/*">
                            <small id="helpId" class="form-text text-muted"></small>
                        </div>
                        <div class="mb-3 col-sm-12">
                            <label for="formFile" class="form-label">Tgl Award</label>
                            <input class="form-control" type="date" id="" name="tgl_award" accept="image/*">
                            <small id="helpId" class="form-text text-muted"></small>
                        </div>
                        <div class="mb-3 col-sm-12">
                            <label for="formFile" class="form-label">Award</label>
                            <input class="form-control" type="text" id="" name="keterangan_award" accept="image/*">
                            <small id="helpId" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
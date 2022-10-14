@extends('adm_ext.MainAdm')

@section('contact')
active
@endsection

@section('breadcrumbs')
Contact
@endsection

@section('content')
<div class="container-fluid container">

    <div class="d-flex justify-content-end pb-2">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addData"><i
                class="fa fa-plus"></i> ADD</button>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Data User</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($response as $item)
                        <tr>
                            <td>{{$item->id_nik}}</td>
                            <td>{{ $item->nama }}</td>
                            <td>
                                @if ($item->status == 1)
                                <span class="badge badge-success">Active</span>
                                @else
                                <span class="badge badge-danger">Non Active</span>
                                @endif
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                    data-target="#editData{{$item->id_nik}}" data-id="{{$item->id_nik}}"
                                    data-nama="{{$item->nama}}" data-status="{{$item->status}}"><i
                                        class="fa fa-edit"></i></button>
                                <a href="{{ url('adm_ext_delete_user/'. $item->id_nik) }}" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Data akan dihapus! apakah ok?')"><i
                                        class="fa fa-trash"></i></a>
                            </td>
                        </tr>

                        <div class="modal fade" id="editData{{$item->id_nik}}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('adm_ext_edit_user/'. $item->id_nik) }}" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="mb-3 col-sm-12">
                                                    <label for="" class="form-label">NIK</label>
                                                    <input type="text" class="form-control" name="nik" id=""
                                                        aria-describedby="helpId" value="{{ $item->id_nik }}"
                                                        placeholder="NIK"
                                                        oninvalid="this.setCustomValidity('Wajib Diisi NIK nya ya!!')"
                                                        required>
                                                    <small id="helpId" class="form-text text-muted"></small>
                                                </div>
                                                <div class="mb-3 col-sm-12">
                                                    <label for="" class="form-label">Nama</label>
                                                    <input type="text" class="form-control" name="nama" id=""
                                                        aria-describedby="helpId" value="{{ $item->nama }}"
                                                        placeholder="Nama User" required>
                                                    <small id="helpId" class="form-text text-muted"></small>
                                                </div>
                                                <div class="mb-3 col-sm-12">
                                                    <label for="" class="form-label">Status</label>
                                                    <select name="status" id="" class="form-control">
                                                        @if ($item->status == 1)
                                                        <option value="1" selected>Active</option>
                                                        <option value="9">Non-Active</option>
                                                        @else
                                                        <option value="1">Active</option>
                                                        <option value="9" selected>Non-Active</option>
                                                        @endif
                                                    </select>
                                                    <small id="helpId" class="form-text text-muted"></small>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button"
                                                    data-dismiss="modal">Cancel</button>
                                                <button type="submit" id="smbtup"
                                                    class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
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
                <h5 class="modal-title" id="exampleModalLabel">Add Data User</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('adm_ext_add_user') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-sm-12">
                            <label for="" class="form-label">NIK</label>
                            <input type="text" class="form-control" name="nik" id="" aria-describedby="helpId"
                                placeholder="NIK" oninvalid="this.setCustomValidity('Wajib Diisi NIK nya ya!!')"
                                required>
                            <small id="helpId" class="form-text text-muted"></small>
                        </div>
                        <div class="mb-3 col-sm-12">
                            <label for="" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" id="" aria-describedby="helpId"
                                placeholder="Nama User" required>
                            <small id="helpId" class="form-text text-muted"></small>
                        </div>
                        <div class="mb-3 col-sm-12">
                            <label for="psw" class="form-label">Password</label>
                            <input type="password" class="form-control" name="psw" id="psw" aria-describedby="helpId"
                                placeholder="Password" required>
                            <small id="helpId" class="form-text text-muted"></small>
                        </div>
                        <div class="mb-3 col-sm-12">
                            <label for="repsw" class="form-label">re-Password</label>
                            <input type="password" id="repsw" name="repsw" class="form-control" placeholder="repassword"
                                required>
                            <small id="helpId" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" id="smbt" class="btn btn-primary" disabled>Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('style')

@endsection

@section('script')
<script>
    var psw = document.getElementById("psw");
    var repsw = document.getElementById("repsw");
 
        repsw.onkeyup = function() {
        if(repsw.value == psw.value){
        repsw.classList.remove("is-invalid");
        repsw.classList.add("is-valid");
        // smbt.disabled = false;
        document.getElementById("smbt").disabled = false;
        } else {
        repsw.classList.remove("is-valid");
        repsw.classList.add("is-invalid");
        // smbt.disabled = true;
        document.getElementById("smbt").disabled = true;
        }
        }
</script>

@endsection
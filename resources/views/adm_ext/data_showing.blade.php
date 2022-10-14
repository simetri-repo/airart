@extends('adm_ext.MainAdm')

@section('showing')
active
@endsection

@section('breadcrumbs')
Showing
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
            <h6 class="m-0 font-weight-bold text-primary">Tabel Data Showing</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Satwa</th>
                            <th>Ras</th>
                            <th>Tgl Posting</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Satwa</th>
                            <th>Ras</th>
                            <th>Tgl Posting</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($response as $item)
                        <tr>
                            <td>{{$item->nama_satwa}}</td>
                            <td>{{$item->nama_ras}}</td>
                            <td>{{$item->update_at}}</td>
                            <td>
                                @if($item->status_show == 1)
                                <span class="badge badge-success">Active</span>
                                @else
                                <span class="badge badge-danger">Inactive</span>
                                @endif

                            </td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#editData{{$item->id_show}}"><i class="fa fa-edit"></i></button>
                                <a href="{{ url('hapus_showing/'. $item->id_show) }}"
                                    onclick="return confirm('Data akan dihapus! apakah ok?')" class="btn btn-danger"><i
                                        class="fa fa-trash"></i></a>
                            </td>
                            <div class="modal fade" id="editData{{$item->id_show}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Data Showing</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ url('edit_showing/'. $item->id_show) }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">

                                                    <input type="text" class="form-control" name="id_satwa_up"
                                                        value="{{ $item->id_satwa }}" hidden>

                                                    <div class="mb-3 col-sm-12">
                                                        <label for="" class="form-label">Nama Satwa</label>
                                                        <input type="text" class="form-control" readonly
                                                            value="{{ $item->nama_satwa }}">
                                                    </div>
                                                    <div class="mb-3 col-sm-12">
                                                        <label for="formFile" class="form-label">Ubah Foto Show
                                                            1</label>
                                                        <input class="form-control" type="file" id=""
                                                            name="foto_satwa1_up" accept="image/*"
                                                            value="{{ $item->foto_show1 }}">
                                                        <small id="helpId" class="form-text text-muted"></small>
                                                    </div>
                                                    <div class="mb-3 col-sm-12">
                                                        <label for="formFile" class="form-label">Ubah Foto Show
                                                            2</label>
                                                        <input class="form-control" type="file" id=""
                                                            name="foto_satwa2_up" accept="image/*"
                                                            value="{{ $item->foto_show2 }}">
                                                        <small id="helpId" class="form-text text-muted"></small>
                                                    </div>
                                                    <div class="mb-3 col-sm-12">
                                                        <label for="formFile" class="form-label">Ubah Foto Show
                                                            3</label>
                                                        <input class="form-control" type="file" id=""
                                                            name="foto_satwa3_up" accept="image/*"
                                                            value="{{ $item->foto_show3 }}">
                                                        <small id="helpId" class="form-text text-muted"></small>
                                                    </div>

                                                    {{-- <div class="mb-3 col-sm-12">
                                                        <label for="" class="form-label">Keterangan Showing</label>
                                                        <textarea class="form-control" name="keterangan_showing" id=""
                                                            rows="3" maxlength="500"></textarea>
                                                    </div> --}}
                                                    <div class="mb-3 col-sm-12">
                                                        <label for="formFile"
                                                            class="form-label">keterangan_showing</label>
                                                        {{-- <textarea class="form-control" name="keterangan_showing_up"
                                                            required>{{ $item->keterangan_show }}</textarea> --}}
                                                        <textarea class="form-control" name="keterangan_showing_up"
                                                            id="KeteranganShowingUp">{{ $item->keterangan_show }}</textarea>
                                                        <small id="helpId" class="form-text text-muted"></small>
                                                    </div>

                                                    <input type="text" value="{{ $item->foto_show1 }}"
                                                        name="foto_satwa1_old" hidden>
                                                    <input type="text" value="{{ $item->foto_show2 }}"
                                                        name="foto_satwa2_old" hidden>
                                                    <input type="text" value="{{ $item->foto_show3 }}"
                                                        name="foto_satwa3_old" hidden>

                                                    <div class="mb-3 col-sm-6">
                                                        <label for="" class="form-label">Status</label>
                                                        <select class="form-control" name="status_show" id="" required>
                                                            @if ($item->status_show == 1)
                                                            <option value="1" selected>Active</option>
                                                            <option value="9">Inactive</option>
                                                            @else
                                                            <option value="1">Active</option>
                                                            <option value="9" selected>Inactive</option>
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
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Data Showing</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('save_showing') }}" method="post" enctype="multipart/form-data" novalidate>
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-sm-12">
                            <label for="" class="form-label">Satwa</label>
                            <select class="form-control" name="id_satwa" id="" required>
                                <option value="" selected disabled>-- PILIH --</option>
                                @foreach ($satwa as $item)
                                <option value="{{ $item->id_satwa }}">{{ $item->nama_satwa }} - {{ $item->nama_ras }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-sm-12">
                            <label for="formFile" class="form-label">Foto Satwa 1</label>
                            <input class="form-control" type="file" id="" name="foto_satwa1" accept="image/*">
                            <small id="helpId" class="form-text text-muted"></small>
                        </div>
                        <div class="mb-3 col-sm-12">
                            <label for="formFile" class="form-label">Foto Satwa 2</label>
                            <input class="form-control" type="file" id="" name="foto_satwa2" accept="image/*">
                            <small id="helpId" class="form-text text-muted"></small>
                        </div>
                        <div class="mb-3 col-sm-12">
                            <label for="formFile" class="form-label">Foto Satwa 3</label>
                            <input class="form-control" type="file" id="" name="foto_satwa3" accept="image/*">
                            <small id="helpId" class="form-text text-muted"></small>
                        </div>

                        {{-- <div class="mb-3 col-sm-12">
                            <label for="" class="form-label">Keterangan Showing</label>
                            <textarea class="form-control" name="keterangan_showing" id="" rows="3"
                                maxlength="500"></textarea>
                        </div> --}}
                        <div class="mb-3 col-sm-12">
                            <label for="formFile" class="form-label">keterangan_showing</label>
                            <textarea class="form-control" name="keterangan_showing" id="KeteranganShowing"></textarea>

                            {{--
                            <x-forms.tinymce-editor /> --}}
                            {{-- <textarea class="form-control" name="keterangan_showing" required></textarea> --}}
                            <small id="helpId" class="form-text text-muted"></small>
                        </div>


                        {{-- <div class="mb-3 col-sm-6">
                            <label for="" class="form-label">Vaccine</label>
                            <select class="form-control" name="vaccine" id="" required>
                                <option value="" selected disabled>-- PILIH --</option>
                                <option value="1">Yes</option>
                                <option value="2">No</option>
                            </select>
                        </div> --}}
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
@section('style')

<link rel="stylesheet" href="{{ asset('richtexteditor/rte_theme_default.css')}}" />
<script type="text/javascript" src="{{ asset('richtexteditor/rte.js')}}"></script>
<script type="text/javascript" src="{{ asset('richtexteditor/plugins/all_plugins.js')}}"></script>
@endsection

@section('script')
<script type="text/javascript">
    tinymce.init({
        selector: '#KeteranganShowing',
        plugins: [
            'advlist autolink link lists charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
            'table emoticons template paste help'
        ],
        toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
            'bullist numlist outdent indent | link media | preview fullscreen | ' +
            'forecolor backcolor',
        menu: {
            favs: {
                title: 'My Favorites',
                items: 'code visualaid | searchreplace | emoticons'
            }
        },
        menubar: 'favs file edit view insert format tools table help',
        content_css: 'css/content.css'
    });

    $(document).on('focusin', function(e) {
        if ($(e.target).closest(".tox-tinymce, .tox-tinymce-aux, .moxman-window, .tam-assetmanager-root").length) {
            e.stopImmediatePropagation();
        }
    });
</script>

<script type="text/javascript">
    tinymce.init({
        selector: '#KeteranganShowingUp',
        plugins: [
            'advlist autolink link image lists charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
            'table emoticons template paste help'
        ],
        toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
            'bullist numlist outdent indent | link media | preview fullscreen | ' +
            'forecolor backcolor | help',
        menu: {
            favs: {
                title: 'My Favorites',
                items: 'code visualaid | searchreplace | emoticons'
            }
        },
        menubar: 'favs file edit view insert format tools table help',
        content_css: 'css/content.css'
    });

    $(document).on('focusin', function(e) {
        if ($(e.target).closest(".tox-tinymce, .tox-tinymce-aux, .moxman-window, .tam-assetmanager-root").length) {
            e.stopImmediatePropagation();
        }
    });
</script>

@endsection
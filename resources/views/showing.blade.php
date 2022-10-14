@extends('MainApp')

@section('showing')
active text-dark
@endsection

@section('breadcrumbs')
Showing
@endsection

@section('content')

<div class="col-lg-12">
  <div class="row">
    <div class="list-wrapper">
      <div class="col-lg-12 row">
        {{-- list item --}}
        @foreach($response as $show)
        <div class="col-lg-4 col-md-6 mt-1 mb-3 list-item">
          <div class="card h-100 p-3">
            <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100"
              style="background-image: url('{{ asset('http://localhost:8000/'. $show->foto_show1) }}');">
              <span class="mask bg-gradient-dark"></span>
              <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                <h5 class="text-white font-weight-bolder mb-4 pt-2">{{ $show->nama_satwa }}</h5>
                <p class="text-white">{{ $show->nama_ras }}</p>
                <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="javascript:;"
                  data-bs-toggle="modal" data-bs-target="#modelId{{ $show->id_show }}">
                  Read More
                  <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="modelId{{ $show->id_show }}" tabindex="-1" role="dialog"
          aria-labelledby="modelTitleId" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">{{ $show->nama_satwa }}</h5>
                {{-- <button type="button" class="btn  btn-sm btn-dark " data-bs-dismiss="modal"
                  aria-label="Close">X</button>
                --}}
              </div>
              <div class="modal-body">
                <div class="col-sm-12 row ">
                  <div class="col-sm-5">
                    <img src="{{ asset('http://localhost:8000/'.$show->foto_satwa) }}" alt="foto satwa"
                      style="width: 100%">
                  </div>
                  <div class="col-sm-7">
                    <p class="row">
                      <span>Nama : <b>{{ $show->nama_satwa }}</b></span>
                      <span>Trah : <b>{{ $show->nama_ras }}</b></span>
                      <span>Jenis Kelamin : <b>
                          @if ($show->jk == 1)
                          Jantan
                          @else
                          Betina
                          @endif </b></span>
                      <span>Tgl Lahir : <b>{{ $show->tgl_lahir }}</b></span>
                      <span>Usia : <b>
                          {{ Carbon\Carbon::parse($show->tgl_lahir)->diffInYears() }} Thn/
                          {{
                          Carbon\Carbon::parse($show->tgl_lahir)->diffInMonths() -
                          (Carbon\Carbon::parse($show->tgl_lahir)->diffInYears()*12)
                          }} Bln/
                          {{
                          Carbon\Carbon::parse($show->tgl_lahir)->diffInDays() -
                          (Carbon\Carbon::parse($show->tgl_lahir)->diffInMonths()*30)
                          }} Hari
                        </b></span>
                      {{-- <span>Nama : <b>{{ $show->nama_satwa }}</b></span> --}}
                    </p>
                  </div>

                </div>
                <div class="col-sm-12 row">
                  <div class="col-sm-4 p-2">
                    <img src="{{ asset('/'.$show->foto_show1) }}"
                      style="width: 100%; height: 80%; border:2px solid black;" alt="foto_1">
                  </div>
                  <div class="col-sm-4 p-2">
                    <img src="{{ asset('/'.$show->foto_show2) }}"
                      style="width: 100%; height: 80%; border:2px solid black;" alt="foto_2">
                  </div>
                  <div class="col-sm-4 p-2">
                    <img src="{{ asset('/'.$show->foto_show3) }}"
                      style="width: 100%; height: 80%; border:2px solid black;" alt="foto_3">
                  </div>
                </div>
                {!! html_entity_decode($show->keterangan_show) !!}
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                {{-- <button type="button" class="btn btn-primary">Save</button> --}}
              </div>
            </div>
          </div>
        </div>
        @endforeach

        {{-- end list item --}}
      </div>
    </div>
    {{-- paging --}}
    <div id="pagination-container" class="mt-3">


      {{-- ------------------------------------ --}}


    </div>
  </div>


  @endsection

  @section('style')
  <style>
    .simple-pagination ul {
      margin: 0 0 20px;
      padding: 0;
      list-style: none;
      text-align: center;
    }

    .simple-pagination li {
      display: inline-block;
      margin-right: 5px;
    }

    .simple-pagination li a,
    .simple-pagination li span {
      color: #666;
      padding: 5px 10px;
      text-decoration: none;
      border: 1px solid #EEE;
      background-color: #FFF;
      box-shadow: 0px 0px 10px 0px #EEE;
    }

    .simple-pagination .current {
      color: #FFF;
      background-color: #4087f1;
      border-color: #7197ff;
    }

    .simple-pagination .prev.current,
    .simple-pagination .next.current {
      background: #4e64e0;
    }
  </style>
  @endsection

  @section('script')
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script>
    var items = $(".list-wrapper .list-item");
    var numItems = items.length;
    var perPage = 9;
    
    items.slice(perPage).hide();
    
    $('#pagination-container').pagination({
    items: numItems,
    itemsOnPage: perPage,
    prevText: "&laquo;",
    nextText: "&raquo;",
    onPageClick: function (pageNumber) {
    var showFrom = perPage * (pageNumber - 1);
    var showTo = showFrom + perPage;
    items.hide().slice(showFrom, showTo).show();
    }
    });
  </script>

  @endsection
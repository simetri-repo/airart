@extends('MainApp')

@section('about_us')
active text-dark
@endsection

@section('breadcrumbs')
About Us
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      {{-- <img class="card-img-top" src="holder.js/100x180/" alt=""> --}}
      <div class="card-body">
        <h4 class="card-title">About Us</h4>
        <p class="card-text"></p>
      </div>
    </div>
  </div>
  <div class="col-md-12 mt-4">
    <div class="card">
      {{-- <img class="card-img-top" src="holder.js/100x180/" alt=""> --}}
      <div class="card-body">
        <p class="card-text">
          Mission Statement - -

          Vision Statement - -

          Values - -

          Target Market Summary - -

          Brief Company History - -
        </p>
      </div>
    </div>
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
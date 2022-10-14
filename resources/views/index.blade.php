@extends('MainApp')

@section('dashboard')
active text-dark
@endsection

@section('linkdashboard')
text-light
@endsection

@section('breadcrumbs')
Dashboard
@endsection

@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="card">
      {{-- <img class="card-img-top" src="holder.js/100x180/" alt=""> --}}
      <div class="card-body">
        {{-- content --}}
        <img src="{{ asset('assets/img/airarti/LOGO_AIRARTIKENNELS.jpeg') }}" class="img-fluid mx-auto d-block"
          style="width: 50%;" alt="">
      </div>
    </div>
  </div>
</div>
@endsection
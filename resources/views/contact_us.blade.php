@extends('MainApp')

@section('contact')
active text-dark
@endsection

@section('breadcrumbs')
Contact
@endsection

@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="card">
      {{-- <img class="card-img-top" src="holder.js/100x180/" alt=""> --}}
      <div class="card-body">
        <div class="col-sm-12 mb-4 ">
          <h3 class="text-center">Our Location</h3>
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31731.448646599943!2d106.53167332697045!3d-6.206730998249966!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69fe17c963bfcd%3A0x3c1847ee839269da!2sBunder%2C%20Cikupa%2C%20Tangerang%20Regency%2C%20Banten!5e0!3m2!1sen!2sid!4v1647423470276!5m2!1sen!2sid"
            width="100%" height="350px" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
        <div class="col-md-12 row">
          <div class="col-md-4">
            <h4>Alamat :</h4>
            <span style="text-align:justify">
              Desa Bunder, Cikupa, Tangerang Banten.
            </span>
          </div>
          <div class="col-md-1"></div>
          <div class="col-md-4">
            <h4>Email</h4>
            <span> marketing@airartikennels.co.id</span>
            <br><br>
            <h4>No Tlp</h4>
            <span>+6281 2100 77177</span>
          </div>
          <div class="col-md-3">
            <img src="{{ asset('assets/img/airarti/LOGO_AIRARTIKENNELS.jpeg') }}" style="width: 70%;" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
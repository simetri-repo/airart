@extends('MainApp')

@section('trah')
active text-dark
@endsection

@section('breadcrumbs')
Trah
@endsection

@section('content')
<div class="col-lg-12 ">
  <div class="row mt-3">
    {{-- --}}
    <div class="col-lg-3">
      <div class="card mb-3 dotted">
        <div class="card-body p-3">
          <div class="row">
            <div class="form-group">
              <label for="exampleFormControlSelect1">Trah : </label>
              <select class="form-control" name="select_trah" id="s_trah">
                <option disabled selected>-- SELECT TRAH --</option>
                @foreach ($response as $item)
                <option value="{{ $item->id_ras }}">{{ $item->nama_ras }}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
      </div>
      <hr class="horizontal dark my-2">
      <h6>Result :</h6>
      {{-- --}}
      <div class="card mb-3">
        <div class="card-body p-3">
          <div class="row">
            <div class="form-group">
              <label for="exampleFormControlSelect2">Jantan :</label>
              <select class="form-control" name="satwa" id="dt_jantan">

              </select>
            </div>
          </div>
        </div>
      </div>
      {{-- --}}
      <div class="card mb-3">
        <div class="card-body p-3">
          <div class="row">
            <div class="form-group">
              <label for="exampleFormControlSelect2">Betina :</label>
              <select class="form-control" name="satwa" id="dt_betina">

              </select>
            </div>
          </div>
        </div>
      </div>
    </div>
    {{-- --}}
    <div class="col-lg-9">
      <div class="row">
        <div class="col-12 mb-2">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                {{-- --}}
                <div class="col-lg-6 col-sm-12 ms-auto text-center mt-5 mt-lg-0">
                  <p class="mb-1 pt-1 text-bold" id="nama_ras"></p>
                  <div class="bg-gradient-light border-radius-lg">
                    <div class="position-relative d-flex align-items-center justify-content-center foto_satwa">
                      <div id="foto_satwa"></div>
                    </div>
                  </div>
                </div>
                {{-- --}}
                <div class="col-lg-6 col-sm-12">
                  <div class="d-flex flex-column h-100">
                    <h5 class="font-weight-bolder mt-2" id="nama_satwa"><i class="fa fa-arrow-left"></i> Select Trah
                      First.
                    </h5>
                    <div class="col-12">
                      <div class="row">
                        <div class="col-4" id="j_tgl_lhr"></div>
                        <div class="col-8" id="tgl_lhr"></div>
                        <div class="col-4" id="j_tinggi"></div>
                        <div class="col-8" id="tinggi"></div>
                        <div class="col-4" id="j_bb"></div>
                        <div class="col-8" id="bb"></div>
                        <div class="col-4" id="j_panjang"></div>
                        <div class="col-8" id="panjang"></div>
                        <div class="col-4" id="j_stambum"></div>
                        <div class="col-8" id="stambum"></div>
                        <div class="col-4" id="j_vaccine"></div>
                        <div class="col-8" id="vaccine"></div>
                        <div class="col-4" id="j_induk_jantan"></div>
                        <div class="col-8" id="induk_jantan"></div>
                        <div class="col-4" id="j_induk_betina"></div>
                        <div class="col-8" id="induk_betina"></div>
                      </div>
                    </div>
                  </div>
                </div>
                {{-- --}}
                <div class="col-12 mt-3">
                  <h5 id="jdl_awards"></h5>
                  <h6 id="awards"></h6>
                </div>
                {{-- --}}
              </div>
            </div>
          </div>
        </div>

        {{-- --}}
      </div>
      {{-- --}}
    </div>
    {{-- paging --}}
  </div>
</div>
@endsection

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
{{-- select trah --}}
<script>
  $('#s_trah').change(function () {
   var r_id = $('#s_trah').val();
   if (r_id) {
      // jantan
    $.ajax({
         type: "GET",
         url: "/data_satwa_ras_jantan?id="+r_id  ,
        
         success: function (data) {
            if (data) {
              // $("#dt_betina").empty();
               $("#dt_jantan").empty();
               $("#dt_jantan").append('<option selected disabled>-- PILIH --</option>');
               $.each(data, function (index, res) {
                  $("#dt_jantan").append('<option value="' + res.id_satwa + '">' + res.nama_satwa + '</option>');
                    // console.log(data);
                });
            } else {
               $("#dt_jantan").empty();
              //  console.log(err);
            }
         }
      });
      // betina
      $.ajax({
         type: "GET",
         url: "/data_satwa_ras_betina?id="+r_id  ,
        
         success: function (data) {
            if (data) {
              // $("#dt_jantan").empty();
               $("#dt_betina").empty();
               $("#dt_betina").append('<option selected disabled>-- PILIH --</option>');
               $.each(data, function (index, res) {
                  $("#dt_betina").append('<option value="' + res.id_satwa + '">' + res.nama_satwa + '</option>');
                    // console.log(data);
                });
            } else {
               $("#dt_betina").empty();
              //  console.log(err);
            }
         }
      });
      // 
   } else {
      $("#dt_jantan").empty();
      $("#dt_betina").empty();
   }
  });
</script>
{{-- isi jantan --}}
<script>
  $('#dt_jantan').change(function () {
   var id_s = $('#dt_jantan').val();
  //  
   var r_id = $('#s_trah').val();
   if (r_id) {
      // betina
      $.ajax({
         type: "GET",
         url: "/data_satwa_ras_betina?id="+r_id  ,
        
         success: function (data) {
            if (data) {
              // $("#dt_jantan").empty();
               $("#dt_betina").empty();
               $("#dt_betina").append('<option selected disabled>-- PILIH --</option>');
               $.each(data, function (index, res) {
                  $("#dt_betina").append('<option value="' + res.id_satwa + '">' + res.nama_satwa + '</option>');
                    // console.log(data);
                });
            } else {
               $("#dt_betina").empty();
              //  console.log(err);
            }
         }
      });
      // 
   } else {
      $("#dt_betina").empty();
   }
  // 
   if (id_s) {
      // jantan
    $.ajax({
         type: "GET",
         url: "/data_satwa_by_id?id="+id_s  ,
        
         success: function (data) {
            if (data) {
               $("#foto_satwa").empty();
               $("#nama_ras").empty();
              $("#nama_satwa").empty();
              $("#tgl_lhr").empty();
              $("#tinggi").empty();
              $("#bb").empty();
              $("#panjang").empty();
              $("#stambum").empty();
              $("#vaccine").empty();
              $("#j_tgl_lhr").empty();
              $("#j_tinggi").empty();
              $("#j_bb").empty();
              $("#j_panjang").empty();
              $("#j_stambum").empty();
              $("#j_vaccine").empty();
              $("#j_induk_jantan").empty();
              $("#j_induk_betina").empty();
              $("#induk_jantan").empty();
              $("#induk_betina").empty();
      
               $.each(data, function (index, item) {
                 $("#j_tgl_lhr").append('Tgl Lahir');
                $("#j_tinggi").append('Tinggi');
                $("#j_bb").append('Berat');
                $("#j_panjang").append('Panjang');
                $("#j_stambum").append('Stambum');
                $("#j_vaccine").append('Vaccine');
                $("#j_induk_jantan").append('Induk Jantan');
                $("#j_induk_betina").append('Induk Betina');
                $("#induk_jantan").append(': '+ item.induk_jantan);
                $("#induk_betina").append(': '+ item.induk_betina);
                  $("#nama_ras").append(item.nama_ras);
                  $("#nama_satwa").append(item.nama_satwa);
                  $("#tgl_lhr").append(': '+item.tgl_lahir);
                  $("#tinggi").append(': '+item.tinggi+' Cm');
                  $("#bb").append(': '+item.bb+' Kg');
                  $("#panjang").append(': '+item.panjang+' Cm');
                  if (item.stambum == 1) {
                  $("#stambum").append(': Yes');
                  } else {
                  $("#stambum").append(': No');
                  }
                  if (item.vaccine == 1) {
                  $("#vaccine").append(': Yes');
                  } else {
                  $("#vaccine").append(': No');
                  }
                  $("#foto_satwa").append('<img class="position-inline z-index-2 pt-4 py-4" src="https://airartikennels.co.id/'+item.foto_satwa+'" style="heigth:50% !Important; width:90% !important;" alt="satwa">');
                  // $("#test").append('cek');
                  // console.log(data);
                });
            } else {
              $("#j_tgl_lhr").empty();
              $("#j_tinggi").empty();
              $("#j_bb").empty();
              $("#j_panjang").empty();
              $("#j_stambum").empty();
              $("#j_vaccine").empty();
              $("#foto_satwa").empty();
               $("#nama_ras").empty();
                          $("#nama_satwa").empty();
                          $("#tgl_lhr").empty();
                          $("#tinggi").empty();
                          $("#bb").empty();
                          $("#panjang").empty();
                          $("#stambum").empty();
                          $("#vaccine").empty();
                          $("#j_induk_jantan").empty();
                          $("#j_induk_betina").empty();
                          $("#induk_jantan").empty();
                          $("#induk_betina").empty();
              //  console.log(err);
            }
         }
      });

      // awards
        $.ajax({
        type: "GET",
        url: "/data_awards_by_id?id="+id_s ,
      
        success: function (data) {
        if (data) {
          $("#awards").empty();
          $("#jdl_awards").empty();
          var no_a = 1;
        $.each(data, function (index, item) {
          $("#awards").append(no_a+'. '+item.awards+' : '+item.keterangan_award+' ('+item.tgl_kegiatan+')<br/>');
        // console.log(data);
        no_a++;
        });
        $("#jdl_awards").append('Awards');
        } else {
          $("#awards").empty();
        // console.log(err);
        }
        }
        });
      // end awards

   } else {
      $("#h_search").empty();
   }
  });
</script>
{{-- isi betina --}}
<script>
  $('#dt_betina').change(function () {
   var id_s = $('#dt_betina').val();
  //  
 //  
   var r_id = $('#s_trah').val();
   if (r_id) {
      // jantan
    $.ajax({
         type: "GET",
         url: "/data_satwa_ras_jantan?id="+r_id  ,
        
         success: function (data) {
            if (data) {
              // $("#dt_betina").empty();
               $("#dt_jantan").empty();
               $("#dt_jantan").append('<option selected disabled>-- PILIH --</option>');
               $.each(data, function (index, res) {
                  $("#dt_jantan").append('<option value="' + res.id_satwa + '">' + res.nama_satwa + '</option>');
                    // console.log(data);
                });
            } else {
               $("#dt_jantan").empty();
              //  console.log(err);
            }
         }
      });
      // 
   } else {
      $("#dt_jantan").empty();
   }
  // 
  // 
   if (id_s) {
      // jantan
    $.ajax({
         type: "GET",
         url: "/data_satwa_by_id?id="+id_s  ,
        
         success: function (data) {
        if (data) {
                $("#foto_satwa").empty();
                $("#nama_ras").empty();
                $("#nama_satwa").empty();
                $("#tgl_lhr").empty();
                $("#tinggi").empty();
                $("#bb").empty();
                $("#panjang").empty();
                $("#stambum").empty();
                $("#vaccine").empty();
                $("#j_tgl_lhr").empty();
                $("#j_tinggi").empty();
                $("#j_bb").empty();
                $("#j_panjang").empty();
                $("#j_stambum").empty();
                $("#j_vaccine").empty();
                $("#j_induk_jantan").empty();
                $("#j_induk_betina").empty();
                $("#induk_jantan").empty();
                $("#induk_betina").empty();
                
                $.each(data, function (index, item) {
                $("#j_tgl_lhr").append('Tgl Lahir');
                $("#j_tinggi").append('Tinggi');
                $("#j_bb").append('Berat');
                $("#j_panjang").append('Panjang');
                $("#j_stambum").append('Stambum');
                $("#j_vaccine").append('Vaccine');
                $("#j_induk_jantan").append('Induk Jantan');
                $("#j_induk_betina").append('Induk Betina');
                $("#induk_jantan").append(': ' + item.induk_jantan);
                $("#induk_betina").append(': ' +item.induk_betina);
                $("#nama_ras").append(item.nama_ras);
                $("#nama_satwa").append(item.nama_satwa);
                $("#tgl_lhr").append(': '+item.tgl_lahir);
                $("#tinggi").append(': '+item.tinggi+' Cm');
                $("#bb").append(': '+item.bb+' Kg');
                $("#panjang").append(': '+item.panjang+' Cm');
                if (item.stambum == 1) {
                $("#stambum").append(': Yes');
                } else {
                $("#stambum").append(': No');
                }
                if (item.vaccine == 1) {
                $("#vaccine").append(': Yes');
                } else {
                $("#vaccine").append(': No');
                }
                $("#foto_satwa").append('<img class="position-inline z-index-2 pt-4 py-4" src="https://airartikennels.co.id/'+item.foto_satwa+'" style="heigth:50% !Important; width:90% !important;" alt="satwa">');
                // $("#test").append('cek');
                // console.log(data);
                });
                } else {
                  $("#j_tgl_lhr").empty();
                  $("#j_tinggi").empty();
                  $("#j_bb").empty();
                  $("#j_panjang").empty();
                  $("#j_stambum").empty();
                  $("#j_vaccine").empty();
                $("#foto_satwa").empty();
                $("#nama_ras").empty();
                $("#nama_satwa").empty();
                $("#tgl_lhr").empty();
                $("#tinggi").empty();
                $("#bb").empty();
                $("#panjang").empty();
                $("#stambum").empty();
                $("#vaccine").empty();
                $("#j_induk_jantan").empty();
                $("#j_induk_betina").empty();
                $("#induk_jantan").empty();
                $("#induk_betina").empty();
                // console.log(err);
                }
         }
      });

      // awards
        $.ajax({
        type: "GET",
        url: "/data_awards_by_id?id="+id_s ,
      
        success: function (data) {
        if (data) {
        $("#awards").empty();
        $("#jdl_awards").empty();
        var no_a = 1;
        $.each(data, function (index, item) {
        $("#awards").append(no_a+'. '+item.awards+' : '+item.keterangan_award+' ('+item.tgl_kegiatan+')<br />');
        // console.log(data);
        no_a++;
        });
        $("#jdl_awards").append('Awards');
        } else {
        $("#awards").empty();
        // console.log(err);
        }
        }
        });
        // end awards

   } else {
      $("#h_search").empty();
   }
  });
</script>


@endsection
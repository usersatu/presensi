@extends('layouts.admin.tabler')
@section('content')

<div class="page-header d-print-none">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <!-- Page pre-title -->
          <h2 class="page-title">
            Monitoring Presensi
          </h2>
        </div>        
      </div>
    </div>
  </div>

<div class="page-body">
    <div class="container-xl">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-12">
                  <div class="input-icon mb-3">
                    <span class="input-icon-addon">
                      <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-stats"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M11.795 21h-6.795a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v4" /><path d="M18 14v4h4" /><path d="M18 18m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" /><path d="M15 3v4" /><path d="M7 3v4" /><path d="M3 11h16" /></svg>
                    </span>
                      <input type="text" id="tanggal" value="{{ date("Y-m-d") }}" name="tanggal" value="" class="form-control" placeholder="Tanggal Presensi" autocomplete="off">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nik</th>
                        <th>Nama Lengkap</th>
                        <th>Departemen</th>
                        <th>Jam Masuk</th>
                        <th>Foto</th>
                        <th>Jam Pulang</th>
                        <th>Foto</th>
                        <th>Keterangan</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody id="loadpresensi"></tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<div class="modal modal-blur fade" id="modal-tampilkanpeta" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Lokasi Presensi User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="loadmap">
        
        </div>
      </div>
    </div>
</div>

@endsection

@push ('myscript')
<script>
  $(function () {
  $("#tanggal").datepicker({ 
        autoclose: true, 
        todayHighlight: true,
        format: 'yyyy-mm-dd'
  });

  function loadpresensi(){
    var tanggal = $("#tanggal").val();
    $.ajax({
      type: 'POST',
      url: '/getpresensi',
      data: {
        _token: "{{ csrf_token() }}",
        tanggal: tanggal
      },
      cache: false,
      success: function(respond){
        $("#loadpresensi").html(respond);
      } 
    });
  }
  $("#tanggal").change(function(e){
    loadpresensi();
  });

  loadpresensi();


});
</script>
@endpush
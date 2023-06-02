@extends ('layouts/master')
@section('script2')
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>

<link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css">
<style>
  .kbw-signature {
    width: 30%;
    height: 200px;
  }

  #sig canvas {
    width: 100% !important;
    height: auto;
  }
</style>

@stop
@section ('content')
<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="mb-3">
        <h4 class="fw-bold">Pengeditan Tanda Tangan</h4>
        @if ($message = Session::get('success'))
        <div class="alert alert-success  alert-dismissible">
          <strong>{{ $message }}</strong>
        </div>
        @endif
        <br />
        <form method="POST" action="{{ URL::to('ttd') }}">
          @csrf
          <input type="hidden" name="nama" value="{{$akun->name}}" />
          <input type="hidden" name="id_surat" value="{{$id_surat}}" />
          <div class="col-md-12">
            <label class="" for="">Signature:</label>
            <br />
            <div id="sig"></div>
            <br />
            <div class="col-12 d-flex my-3">
              <a href="{{url('dashboard')}}" class="btn btnSolid buBlue me-2">Batal</a>
              <button id="clear" class="btn btnSolid buRed me-2">Hapus</button>
              <textarea id="signature64" name="signed" style="display: none"></textarea>
              <button class="btn btn-success btnSolid buGreen">Simpan</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  @section('script')
  <script type="text/javascript">
    var sig = $('#sig').signature({
      syncField: '#signature64',
      syncFormat: 'PNG'
    });
    $('#clear').click(function(e) {
      e.preventDefault();
      sig.signature('clear');
      $("#signature64").val('');
    });
  </script>
  @stop
  @stop
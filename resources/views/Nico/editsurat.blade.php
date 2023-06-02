@extends('layouts/master')
@section('script2')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: '.textCollector'
  });
</script>
@stop
@section('content')
<Form method="POST" action=" /reviewsurat/{{$surat->id_surat}} ">
  @method('PUT')
  @csrf
  <div class="container">
    <div class="row">
      <div class="col-9">
        <div class="mb-4">
          <h1 class="fs-5 fw-bold">Pengeditan Surat</h1>
        </div>
      </div>
    </div>
    <h3 class="fs-5 fw-bold">Email Penerima</h3>
    <input type="email" name="email" value="{{$surat->email}}" class="form-control yth">
    <div class="row">
      <div class="col-9 p-5 border border-secondary boxBorder">
        <h3 class="fs-5 fw-bold">Judul Surat</h3>
        <input type="text" name="nama_surat" value="{{$surat->nama_surat}}" class="form-control yth">
        <input type="text" style="display:none;" value="{{$surat->id_template}}" name="id_template" class="form-control yth">

        <br>
        <br>
        <h6>{{$surat->id_surat}}/{{$surat->jenis_surat}}/{{ $surat->created_at->format('m') }}/{{ $surat->created_at->format('Y') }}</h6>
        <h6 class="fw-bold">Kepada Yth,</h6>
        <input type="text" name="nama_penerima" value="{{$surat->nama_penerima}}" class="form-control yth">
        @if ($surat->id_template == 1)
        <input type="text" style="display:none;" value="EDARAN" name="jenis_surat" class="form-control yth">
        @elseif ($surat->id_template == 2)
        <input type="text" style="display:none;" value="PERMOHONAN" name="jenis_surat" class="form-control yth">
        @elseif ($surat->id_template == 3)
        <input type="text" style="display:none;" value="DINAS" name="jenis_surat" class="form-control yth">
        @elseif ($surat->id_template == 4)
        <input type="text" style="display:none;" value="TUGAS" name="jenis_surat" class="form-control yth">
        @endif
        <textarea name="isi_surat" class="textCollector">{{$surat->isi_surat}}</textarea>
      </div>
      <div class="col-3">
        <div class="sideSek">

          <h3 class="fs-6 fw-bold text-center">Komen / Revisi</h3>

          @foreach($komen as $komentar)
          <div class="sideSquare">
            <div class="squHead px-4 py-2 rounded-top d-flex justify-content-between">
              <h6>{{$komentar->name}}</h6>
              <button type="button" style="background-color:#AA0000; border: none;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M9.54998 18.0001L3.84998 12.3001L5.27498 10.8751L9.54998 15.1501L18.725 5.9751L20.15 7.4001L9.54998 18.0001Z" fill="#F5F5F7" />
                </svg>
              </button>
            </div>
            <div class="squDesc px-4 py-2 ">
              <p class="fs-6 fw-bold">{{$komentar->komentar}}</p>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-9 d-flex my-3 justify-content-end">
        <a href="{{url('reviewsurat')}}" class="btn btnSolid buRed me-2">Batal</a>
        <button type="submit" class="btn btnSolid buGreen">Simpan</button>
      </div>
    </div>
  </div>
</Form>
@stop
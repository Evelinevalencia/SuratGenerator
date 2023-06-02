@extends ('layouts/master')
@section ('content')
<div class="container">
  <div class="row">
    <div class="col-3">
      <div class="sideSek">
        <h1 class="fs-6">Selamat Datang</h1>
        <h2 class="fs-5 fw-bold">{{$akun->name}}</h2>
      </div>
      <a href="{{url('buatsurat')}}" type="button" class="btn w-100 send-btn">
        <div class="d-flex justify-content-center">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mailico">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
          </svg>
          <span> Buat Surat </span>
        </div>
</a>
    </div>
    <div class="col-9">
      <div class="mb-5">
        <h4 class="fw-bold">Dashboard</h4>
        <div class="d-flex">
          <div style="margin-right: 5%" class="text-center">
            <h2 class="fw-bold staRed">{{$tunggu}}</h2>
            <h6>Menunggu Persetujuan</h6>
          </div>
          <div class="text-center">
            <a href="{{url('/reviewsurat')}}" style="text-decoration:none; color:black;">
              <img src="/img-sec/dash-arr.png" alt="">
              <h6>Review / Detail</h6>
            </a>
          </div>
        </div>
      </div>
      <div class="mb-5">
        <h4 class="fw-bold">Inbox</h4>
        <div class="suratTable">
          <div style="border: 3px solid black; margin-bottom: 1%;" class="rounded-3">
            <form method="GET" action="dashboard" class="d-flex">
              <input class="form-control me-2" type="search" name="filter" placeholder="Search" value="{{ old('filter') }}">
              <button class="btn" type="submit">
                <img src="/img-sec/search.png" alt="">
              </button>
              @if ($sort == 'desc')
              <button class="btn" type="submit" value="asc" name="sort">
                <img src="/img-sec/sort.png" alt="">
              </button>
              @else
              <button class="btn" type="submit" value="desc" name="sort">
                <img src="/img-sec/sort.png" alt="">
              </button>
              @endif
              <div class="dropdown">
                <button class="btn  dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="/img-sec/filter.png" alt="">
                </button>
                <ul class="dropdown-menu">
                  <li><button type="submit" class="dropdown-item" name="filter" value="menunggu approval">Menunggu Persetujuan</button></li>
                  <li><button type="submit" class="dropdown-item" name="filter" value="diterima">Disetujui</button></li>
                  <li><button type="submit" class="dropdown-item" name="filter" value="ditolak">Ditolak</button></li>
                </ul>
              </div>
            </form>
          </div>
          <table class="table">
            <thead>
              <tr>
                <th style="text-align: center" scope="col">No</th>
                <th style="text-align: center" scope="col">Nama Pengirim</th>
                <th style="text-align: center" scope="col">Nama Surat</th>
                <th style="text-align: center" scope="col">Jenis Surat</th>
                <th style="text-align: center" scope="col">Tanggal</th>
              </tr>
            </thead>
            <tbody>
              @if($surat->isNotEmpty())
              @foreach($surat as $value)
              <tr>
                <th scope="row">{{$value->id_surat}}</th>
                <td>{{$value->nama_penerima}}</td>
                <td>{{$value->nama_surat}}</td>
                <td>{{$value->jenis_surat}}</td>
                <td>{{$value->created_at}}</td>
              </tr>
              @endforeach
              @else
              <h2>No posts found</h2>
              @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
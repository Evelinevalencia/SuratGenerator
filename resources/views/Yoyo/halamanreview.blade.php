@extends('layouts/master')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="mb-5">
        <h4 class="fw-bold">Review Surat</h4>
        <div class="suratTableS">
          <div style="border: 3px solid black; margin-bottom: 1%" class="rounded-3">
            <form method="GET" action="reviewsurat" class="d-flex">
              <input class="form-control me-2" style="border:white;" type="search" name="filter" placeholder="Search" value="{{ old('filter') }}">
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
                <th style="text-align: center" scope="col">Nama Surat</th>
                <th style="text-align: center" scope="col">Pratinjau</th>
                <th style="text-align: center" scope="col">Status</th>
                <th style="text-align: center" scope="col">Simpan</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($surat as $value)
              <tr>
                <th style="text-align: center" scope="row">{{$value->id_surat}}</th>
                <td style="text-align: center">{{$value->nama_surat}}</td>
                <td style="text-align: center">
                  <a href="{{url('/reviewsurat/'.$value->id_surat)}}">
                    <img src="/img-sec/eyeAct.png" alt="">
                  </a>
                </td>
                <Form method="POST" action=" /reviewsurat/edit ">
                  @method('PUT')
                  @csrf
                  <td style="text-align: center">
                    @if ($value->status_surat == 'diterima')
                    <select class="form-select" name="status" aria-label="Default select example" disabled>
                      <option value="menunggu approval">Menunggu Disetujui</option>
                      <option selected value="diterima">Disetujui</option>
                      <option value="ditolak">Ditolak</option>
                    </select>
                    @else
                    <select class="form-select" name="status" aria-label="Default select example">
                      <option selected value="{{$value->status_surat}}">{{$value->status_surat}}</option>
                      @if ($value->status_surat == 'ditolak')
                      <option value="diterima">Disetujui</option>
                      <option value="menunggu approval">Menunggu Approval</option>
                      @else
                      <option value="diterima">Disetujui</option>
                      <option value="ditolak">Ditolak</option>
                      @endif
                    </select>
                    @endif
                  </td>
                  <input type="hidden" name="idsurat" value="{{$value->id_surat}}" />
                  @if ($value->status_surat == 'diterima')
                  <td style="text-align: center">
                    <button type="submit" class="btn btnSolid buGreen" disabled>Simpan</button>
                  </td>
                  @else
                  <td style="text-align: center">
                    <button type="submit" class="btn btnSolid buGreen">Simpan</button>
                  </td>
                  @endif
                  </form>
              </tr>
              
              
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 d-flex my-3 justify-content-end">
    <a href="{{url('dashboard')}}" class="btn btnSolid buRed me-2">Kembali</a>
  </div>
</div>
@stop
@extends('layouts/master')
@section('content')
      <div class="container">
        <div class="row">
            <div class="col-12 p-5 border border-secondary boxBorder">
                <div>
                    <h1 class="fs-5 fw-bold">Pembuatan Surat</h1>
                    <h2 class="fs-6">Pilih template jenis surat yang ingin digunakan</h2>
                </div>
                <div class="maxButton">
                    <!-- Surat Edaran -->
                    <a href="{{url('reviewsurat/create/1')}}" class="btn w-100 send-btn ps-4">
                        <div class="d-flex justify-content-start">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mailico">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                          </svg>
                          <span>
                            Surat Edaran
                          </span>
                        </div>
                      </a>

                      <!-- Surat Permohonan -->
                      <a href="{{url('reviewsurat/create/2')}}" class="btn w-100 send-btn ps-4">
                        <div class="d-flex justify-content-start">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mailico">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                          </svg>
                          <span>
                            Surat Permohonan
                          </span>
                        </div>
                      </a>

                      <!-- Surat Dinas -->
                    <a href="{{url('reviewsurat/create/3')}}" class="btn w-100 send-btn ps-4">
                        <div class="d-flex justify-content-start">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mailico">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                          </svg>
                          <span>
                            Surat Dinas
                          </span>
                        </div>
                      </a>

                      <!-- Surat Tugas -->
                      <a href="{{url('reviewsurat/create/4')}}" class="btn w-100 send-btn ps-4">
                        <div class="d-flex justify-content-start">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mailico">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                          </svg>
                          <span>
                            Surat Tugas
                          </span>
                        </div>
                      </a>
                </div>
            </div>
            <div class="col-12 d-flex my-3">
                <a href="{{url('dashboard')}}" class="ms-auto btn btnSolid btnBlue">Kembali</a>
            </div>
        </div>
      </div>
@stop
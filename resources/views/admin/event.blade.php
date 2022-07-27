
@extends('layouts.admin')

@section('content')

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Begin Page Content -->
        <div class="container-fluid">

        {{-- ALERT --}}
            <div class="mx-2 mt-2">
                @if(session()->get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Pesan!</strong> {{ session()->get('success') }}.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if(session()->get('gagal'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Pesan!</strong> {{ session()->get('gagal') }}.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
        {{-- ALERT --}}


        <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between">
                    <h4 class="m-0 font-weight-bold text-primary">Tabel Event</h4>

                </div>
                <div class="card-body">

                    <!-- search engine  -->
                    <div class="mb-3">
                            @if($cek_event->status == "started")
                                <button type="button" class="btn btn-secondary p-2"  style="color: #d1d1d7;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16"><path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/></svg>
                                    Tambah Event
                                </button>
                            @elseif($cek_event->status == "done")
                                <button type="button" class="btn btn-danger p-2" data-toggle="modal" data-target="#tambah">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16"><path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/></svg>
                                    Tambah Event
                                </button>
                            @endif
                    </div>
                    <!-- search engine  -->




                    <div class="table-responsive">


                        <div class="table-wrap auto1 w-100" style="max-height: 46vh;overflow: auto;display:inline-block;">


                            <table class="table table-bordered" id="table1" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul Event</th>
                                    <th>Target Jumlah</th>
                                    <th>Total Donasi</th>
                                    <th>Tanggal Event</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>

                                <tbody>

                                <?php $i = 1; ?>

                                @foreach($data_event as $event)

                                    @if($event->id == 1)
                                    @else


                                    @if($event->status == "started")
                                    <tr style="color:#2d3748; background-color: #b8daff;">
                                    @elseif($event->status == "done")
                                    <tr class="text-secondary" style=" background-color: #C0C0C0;">
                                    @endif
                                        <td><?= $i ?></td>
                                        <td>{{ $event->event }}</td>
                                        <td>@currency($event->donate_target)</td>
                                        <td>@currency($event->donate_total)</td>
                                        <td>{{ $event->event_date }}</td>
                                        @if($event->status == "started")
                                                <td>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#finish{{ $event->id }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                                    </svg>
                                                    Finish
                                                </button>
                                            </td>
                                        @else
                                            <td>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16" >
                                                    <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                                                    <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
                                                </svg>
                                                <span class=" font-weight-bold">Selesai</span>
                                            </td>
                                        @endif
                                        <td>

                                            @if($event->status == "started")
                                                <button type="button" class="btn btn-danger " data-toggle="modal" data-target="#delete{{ $event->id }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                                    </svg>
                                                    Hapus
                                                </button>
                                                <span> | </span>
                                                <button type="button" class="btn btn-warning " data-toggle="modal" data-target="#edit{{ $event->id }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                    </svg>
                                                    Edit
                                                </button>
                                                <span> | </span>
                                                <a class="btn btn-secondary " style="color: #b9bac0;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                                                        <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
                                                        <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                                                    </svg>
                                                    Cetak
                                                </a>
                                            @elseif($event->status == "done")
                                                <button type="button" class="btn btn-secondary" style="color: #b9bac0;" >
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                                    </svg>
                                                    Hapus
                                                </button>
                                                <span> | </span>
                                                <button type="button" class="btn btn-secondary" style="color: #b9bac0;" >
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                    </svg>
                                                    Edit
                                                </button>
                                                <span> | </span>
                                                <a href="/admin/event/report/{{ $event->id }}" target="_blank" class="btn btn-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                                                        <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
                                                        <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                                                    </svg>
                                                    Cetak
                                                </a>
                                            @endif
                                            <span> | </span>
                                                <a href="{{ route('detailEvent', $event->id) }}" class="btn btn-info">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                                                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                                    </svg>
                                                    Detail
                                                </a>
{{--                                            <span> | </span>--}}


                                        </td>

                                    </tr>

                                    @endif



{{--                                    popup finishing --}}
                                    <div class="modal fade" id="finish{{ $event->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">{{ $event->event }}</h5>
                                                    {{--                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
                                                </div>
                                                <div class="modal-body">
                                                    <p>Anda Yakin Ingin Menyelesaikan Event {{ $event->event }}?</p>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                    <a href="/admin/event/finish/{{ $event->id }}" class="btn btn-success">Selesai</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
{{--                                    end finishing--}}


{{--                                    popup delete --}}
                                    <div class="modal fade" id="delete{{ $event->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">{{ $event->event }}</h5>
                                                    {{--                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
                                                </div>
                                                <div class="modal-body">
                                                    <p>Yakin Ingin Menghapus Data Ini?</p>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>
                                                    <a href="/admin/event/delete/{{ $event->id }}" class="btn btn-danger">Ya</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
{{--                                    end delete--}}

{{--                                    popup edit--}}
                                    <div class="modal fade" id="edit{{ $event->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Edit Event</h5>
                                                    {{--                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
                                                </div>

                                                <form action="/admin/event/update/{{ $event->id }}" method="post">

                                                    @csrf

                                                    <div class="modal-body">

                                                        <div class="form-group">
                                                            <label for="event">Nama Event :</label>
                                                            <input type="text" value="{{ $event->event }}" class="form-control text-capitalize" id="event" name="event" placeholder="Event..." autocomplete="off" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="target">Target Donasi :</label>
                                                            <div class="input-group">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                Rp
                                                            </span>
                                                                <input type="number" value="{{ $event->donate_target }}" id="target" name="donate_target" class="form-control" placeholder="00..." autocomplete="off" aria-label="Input group example" aria-describedby="basic-addon1">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="event_date">Tanggal Event :</label>
                                                            <input type="date" class="form-control text-capitalize" value="{{ $event->event_date }}" id="event_date" name="event_date" placeholder="Event..." autocomplete="off" required>
                                                        </div>


                                                    </div>
                                                    <div class="modal-footer ">
                                                        <button type="submit" class="btn btn-success">Simpan</button>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                    </div>

                                                </form>

                                            </div>
                                        </div>
                                    </div>
{{--                                    end popup edit--}}


                                    <?php $i++; ?>
                                @endforeach


{{--                                    popup add data--}}
                                    <div class="modal fade" id="tambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Event</h5>
                                                    {{--                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
                                                </div>

                                                <form action="{{ route('postEvent') }}" method="post">

                                                    @csrf

                                                    <div class="modal-body">

                                                        <div class="form-group">
                                                            <label for="event">Nama Event :</label>
                                                            <input type="text" class="form-control text-capitalize" id="event" name="event" placeholder="Event..." autocomplete="off" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="target">Target Donasi :</label>
                                                            <div class="input-group">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                Rp
                                                            </span>
                                                                <input type="number" id="target" name="donate_target" class="form-control" placeholder="00..." autocomplete="off" aria-label="Input group example" aria-describedby="basic-addon1">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="event_date">Tanggal Event :</label>
                                                            <input type="date" class="form-control text-capitalize" id="event_date" name="event_date" placeholder="Event..." autocomplete="off" required>
                                                        </div>


                                                    </div>
                                                    <div class="modal-footer ">
                                                        <button type="submit" class="btn btn-success">Simpan</button>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                    </div>

                                                </form>

                                            </div>
                                        </div>
                                    </div>
{{--                                   end popup add data--}}



                                </tbody>
                            </table>

                        </div>



                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

    </div>

@endsection

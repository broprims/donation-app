
@extends('layouts.admin')

@section('content')

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <div class="container-fluid col-lg-12">

                <!-- Page Heading -->
                {{--                <div class="d-sm-flex align-items-center justify-content-between mb-4">--}}
                {{--                    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>--}}
                {{--                </div>--}}


                <div class="row">


                    @foreach($events as $event)

                    <div class="col-xl-12 col-lg-7">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                        {{--                            <div--}}
                        {{--                                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">--}}
                        {{--                                <h6 class="m-0 font-weight-bold text-primary">Event</h6>--}}

                        {{--                            </div>--}}
                        <!-- Card Body -->
                            <div class="card-body">

                                <h1 class="text-dark text-capitalize" style="font-size: 3vw;">{{ $event->event }}</h1>

                            </div>
                        </div>
                    </div>


                    <!-- Area Chart -->
                    <div class="col-xl-12 col-lg7">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div
                                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Total Donasi</h6>

                            </div>
                            <!-- Card Body -->
                            <div class="card-body">

                                    <h1 class="text-danger" style="font-size: 5vw;">@currency($event->donate_total)</h1>

                            </div>
                        </div>
                    </div>

                    @endforeach


                </div>
            </div>

            <!-- Page Heading -->
{{--            <h1 class="h3 mb-2 text-gray-800">Tabel Data History Pembayaran Spp SMKN 1 Denpasar</h1>--}}
{{--            <p class="mb-4">Dibawah berisi data seluruh History Pembayaran Spp SMKN 1 Depasar </p>--}}



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

        @foreach($events as $event)

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between">
                    <h4 class="m-0 font-weight-bold text-primary">Tabel Data History Donasi</h4>

                </div>
                <div class="card-body">

                    <!-- search engine  -->

                    @if($event->status == "started")
                        <div class="my-4">
                            <form action="{{ route('postDonation', $event->id) }}" method="post" enctype="multipart/form-data">
                                <div class="form-group col-lg-12 d-flex">
                                    @csrf
                                    <input type="text" name="donatur" placeholder="Nama Donatur..." class="form-control mx-1 text-capitalize" style="border: 3px solid" autofocus autocomplete="off" required>
                                    <input type="number" name="jumlah" placeholder="Jumlah Donasi..." class="form-control mx-1 " style="border: 3px solid" autocomplete="off" required>
                                    <button type="submit" class="btn btn-success ml-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-save-fill" viewBox="0 0 16 16">
                                            <path d="M8.5 1.5A1.5 1.5 0 0 1 10 0h4a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h6c-.314.418-.5.937-.5 1.5v7.793L4.854 6.646a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l3.5-3.5a.5.5 0 0 0-.708-.708L8.5 9.293V1.5z"/>
                                        </svg>
                                        Simpan
                                    </button>
                                </div>
                            </form>
                        </div>
                        <hr>
                    @else
                    @endif




{{--                    <div onload="table();">--}}

{{--                        <script type="text/javascript">--}}
{{--                            function table() {--}}
{{--                                const xhttp = new XMLHttpRequest();--}}
{{--                                xhttp.onload = function() {--}}
{{--                                    document.getElementById("table1").innerHTML = this.responseText;--}}
{{--                                }--}}
{{--                                // xhttp.open("GET", 'totaldonasi.blade.php');--}}
{{--                                xhttp.send();--}}
{{--                            }--}}
{{--                        </script>--}}


{{--                    </div>--}}




                    <div class="table-responsive">


                        <div class="table-wrap auto1 w-100" style="max-height: 46vh;overflow: auto;display:inline-block;">


                            <table class="table table-bordered" id="table1" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Donatur</th>
                                    <th>Tanggal</th>
                                    <th>Jam</th>
                                    <th>Jumlah</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>

                                <tbody>

                                <?php $i = 1; ?>

                                @foreach($datadonasi as $donasi)
                                <tr>
                                    <td><?= $i ?></td>
                                    <td class="text-capitalize">{{ $donasi->donatur }}</td>
                                    <td>{{ $donasi->tanggal }}</td>
                                    <td>{{ $donasi->jam }}</td>
                                    <td> @currency($donasi->jumlah) </td>
                                    <td>
                                        @if($event->status == "started")
                                            <button type="button" class="btn btn-danger p-2" data-toggle="modal" data-target="#delete{{ $donasi->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                                </svg>
                                                Hapus
                                            </button>
                                        @else
                                            <button type="button" class="btn btn-secondary p-2" style="color: #d1d1d7;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                                </svg>
                                                Hapus
                                            </button>
                                        @endif
                                    </td>


                                </tr>

                                <div class="modal fade" id="delete{{ $donasi->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Donatur : {{ $donasi->donatur }}, Jumlah : {{ $donasi->jumlah }}</h5>
    {{--                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
                                            </div>
                                            <div class="modal-body">
                                                <p>Yakin Ingin Menghapus Data Ini?</p>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>

                                                <a href="{{ route('deleteDonation', [$event->id, $donasi->id] ) }}" class="btn btn-danger">Ya</a>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php $i++; ?>
                                @endforeach


                                </tbody>
                            </table>

                        </div>



                    </div>
                </div>
            </div>

            @endforeach


        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <!-- <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Your Website 2020</span>
            </div>
        </div>
    </footer> -->
    <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>

@endsection

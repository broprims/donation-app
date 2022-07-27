
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Generate Event Report</title>

    <!-- Custom fonts for this template-->
    <link href="/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet"> -->

    <!-- Custom styles for this template-->
    <link href="/assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
    <style>
        input[type="date"] {
            position: relative;
            /*padding: 10px;*/
        }

        input[type="date"]::-webkit-calendar-picker-indicator {
            color: transparent;
            background: none;
            z-index: 1;
        }

        input[type="date"]:before {
            color: red;
            /*background-color: #0AA1DD;*/
            background: none;
            display: block;
            font-family: 'FontAwesome';
            content: '\f073';
            /* This is the calendar icon in FontAwesome */
            width: 15px;
            height:20px;
            position: absolute;
            top: 5px;
            right: 6px;
            color: #999;
        }
    </style>


</head>

<body id="page-top">

<div class="wrapper">

    <!-- EVENT  -->
    <?php $i = 1; ?>
    @foreach($events as $event)
    <hr>
    <h1 class="font-weight-bold text-dark text-center">Event : {{ $event->event }}</h1>
    <hr>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>No</th>
                <th>Event</th>
                <th>Tahun</th>
                <th>Target Donasi</th>
                <th>Total Donasi</th>
                <th>Tanggal</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>

                <tr>
                    <td><?= $i ?></td>
                    <td class="text-capitalize">{{ $event->event }}</td>
                    <td>{{ $event->year }}</td>
                    <td> @currency($event->donate_target) </td>
                    <td> @currency($event->donate_total) </td>
                    <td>{{ $event->event_date }}</td>
                    @if($event->status == "done")
                        <td>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16" style="fill: #28a745;">
                                <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                                <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
                            </svg>
                            <span class="text-success font-weight-bold">Selesai</span>
                        </td>
                    @endif


                </tr>

                <?php $i++; ?>


            </tbody>
        </table>
    <hr>
    <h1 class="font-weight-bold text-dark text-center">Histori Donasi</h1>
    <hr>
    @endforeach

    <!-- EVENT END  -->

    <!-- DONATUR -->
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>No</th>
                <th>Donatur</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Jumlah</th>
                <th>Keterangan</th>
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
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16" style="fill: #2e59d9;">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </svg>
                    <span class="text-primary font-weight-bold">Berhasil</span>
                </td>

            </tr>

            <?php $i++; ?>
            @endforeach

            </tbody>
        </table>
    </div>
    <!-- DONATUR END -->

</div>

<!-- Bootstrap core JavaScript-->
<script src="/assets/vendor/jquery/jquery.min.js"></script>
<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="/assets/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="/assets/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="/assets/js/demo/chart-area-demo.js"></script>
<script src="/assets/js/demo/chart-pie-demo.js"></script>

<script>
    window.print();
</script>

</body>

</html>

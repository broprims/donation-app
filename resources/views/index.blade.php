<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Donation Page</title>


</head>
<body class="page-top">


    @foreach($total_donation as $donation)


    <section class="wrapper mx-5 my-4">

        <div class="row" >


            {{--            TOTAL DONASI --}}
            <div class="container-fluid col-lg-8">

                <!-- Page Heading -->
                {{--                <div class="d-sm-flex align-items-center justify-content-between mb-4">--}}
                {{--                    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>--}}
                {{--                </div>--}}


                <div class="row">



                    <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                            {{--                            <div--}}
                            {{--                                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">--}}
                            {{--                                <h6 class="m-0 font-weight-bold text-primary">Event</h6>--}}

                            {{--                            </div>--}}
                            <!-- Card Body -->
                                <div class="card-body">

                                    <h1 class="text-dark text-capitalize" style="font-size: 3vw;">{{ $donation->event }}</h1>

                                </div>
                            </div>
                        </div>

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Total Donasi</h6>

                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <h3 class="text-dark">Total Donasi Saat Ini !</h3>
                                    <hr>

                                    <h1 class="text-danger" style="font-size: 5vw;">@currency($donation->donate_total)</h1>
                                    {{--                                    <input type="hidden" id="total" value="{{ $donation->donate_total }}">--}}


                                </div>
                            </div>
                        </div>




                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">History</h6>

                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <h3 class="text-dark">History Donasi !</h3>
                                    <hr>

                                    <div class="table-wrap auto1 w-100" style="max-height: 46vh;overflow: auto;display:inline-block;">

                                        <table class="table table-responsive table-sm">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Waktu</th>
                                                <th>Nominal</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <?php $i = 1; ?>
                                            @foreach($history_donation as $history)


                                                @if($history-> event_id == $donation->id)

                                                    <tr class="collapsed">
                                                        <th>{{  $i }}</th>
                                                        <th>{{ $history->jam }}</th>
                                                        <th>@currency($history->jumlah)</th>
                                                    </tr>

                                                @endif

                                                <?php $i++; ?>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>

                </div>
            </div>



            {{--            CHART--}}

            <div class="container-fluid col-lg-4" >


                <div class="row">

                    <!-- Area Chart -->
                    <div class="col-xl-12 col-lg-7" >
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div
                                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Grafik</h6>

                            </div>
                            <!-- Card Body -->
                            <div class="card-body ">

                                <div class="mx-5 force-to-bottom" >
                                    {{--                                <div class="mx-5 force-to-bottom" style="height: 82vh;">--}}
                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1">
                                            <div class="panel panel-default">
                                                {{--                                                <div class="panel-heading"><b>Charts</b></div>--}}
                                                <div class="panel-body" >
                                                    <canvas id="canvas" height="1400" width="600" ></canvas>
                                                    {{--                                                    <canvas id="canvas" height="1450" width="600" style="position: absolute; bottom: 1vh; "></canvas>--}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/js/bootstrap-select.min.js" charset="utf-8"></script>
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>



                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>









        </div>

    </section>

    @endforeach



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <script>
        var url = "{{url('/chart')}}";
        var Years = new Array();
        var Labels = new Array();
        var Prices = new Array();
        var total = new Array();
        var total ;
        // var total = $('#total').val();
        // alert(sites);
        $(document).ready(function(){
            $.get(url, function(response){
                response.forEach(function(data){
                    Years.push(data.tahun);
                    Labels.push(data.desc);
                    Prices.push(data.donate_total);
                    total.push(data.donate_target);
                    total = parseInt(total);

                });
                // let tod = Prices;

                var ctx = document.getElementById("canvas").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    "color": "#fd0000",
                    data: {
                        // visible: false,
                        labels:Years,
                        datasets: [{

                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                // 'rgba(54, 162, 235, 0.2)',
                                // 'rgba(255, 206, 86, 0.2)',
                                // 'rgba(75, 192, 192, 0.2)',
                                // 'rgba(0, 0, 0, 0.0)',
                                // 'rgba(153, 102, 255, 0.2)',
                                // 'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                // 'rgba(54, 162, 235, 1)',
                                // 'rgba(255, 206, 86, 1)',
                                // 'rgba(75, 192, 192, 1)',
                                // 'rgba(0, 0, 0, 0.0)',
                                // 'rgba(153, 102, 255, 1)',
                                // 'rgba(255, 159, 64, 1)'
                            ],
                            label: 'Donasi',
                            data: Prices,
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero:true,
                                    // max:200000000,
                                    max:total,
                                }
                            }]
                        }
                    }
                    // options: {
                    //     scales: {
                    //         xAxes: [{
                    //             stacked: true
                    //         }],
                    //         yAxes: [{
                    //             stacked: true
                    //         }]
                    //     }
                    // }
                });
            });
        });
    </script>


</body>
</html>

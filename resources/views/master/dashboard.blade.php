@extends('master.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-md-12 align-items-center">
                        @if (Session::has('error_message'))
                            <div class="alert alert-danger alert-dismissible fade show " id="errorMessage" role="alert">
                                <strong>Error:</strong>
                                {{ Session::get('error_message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if (Session::has('Success_message'))
                            <div class="alert alert-success alert-dismissible fade show " id="errorMessage" role="alert">
                                <strong>Success:</strong>
                                {{ Session::get('Success_message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <h1 class="m-0"></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v2</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Info boxes -->
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Total Client</span>
                                <span class="info-box-number">
                                    {{ $clients }}
                                    {{-- {{$menuPermissions}} --}}
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Total Accounts Receivable</span>
                                <span class="info-box-number">50</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <!-- fix for small devices only -->
                    <div class="clearfix hidden-md-up"></div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Total Accounts Payable</span>
                                <span class="info-box-number">60</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">{{ Auth()->user()->name }} - Dashboard</h5>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                                            <i class="fas fa-wrench"></i>
                                        </button>

                                    </div>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>

                        </div>
                        <div class="container">
                            <div class="card">
                                <div class="card-body">
                                    <h1>{{ $chart1->options['chart_title'] }}</h1>
                                    {!! $chart1->renderHtml() !!}
                                </div>
                            </div>
                        </div>
                        <div class="container">

                            <div class="card">
                                <div class="card-body">

                                    <form>
                                        <label for="month">Enter the month:</label><br>
                                        <input type="month" value="<?=date('Y-m')?>"><br>
                                    </form>
                                    <div id="chart-container">FusionCharts will render here</div>

                                    <div id="container"></div>


                                    <canvas id="myPieChart"></canvas>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mt-4">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title">Bank Balance</h2>
                            </div>
                            <table class="table table-bordered mb-0" id="myTable">
                                <thead class="bg-orange">
                                    <tr class="text-light">
                                        <th>#</th>
                                        <th>Account Name</th>
                                        <th>Balance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($charts as $chart)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $chart->AccountName }}</td>
                                            <td>{{ $chart->Balance }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="col-md-6 mt-4">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title">New Meetings</h2>
                                <div class="card-tools"><a type="button" class="btn btn-primary" href="#">See
                                        All</a>
                                </div>
                            </div>

                        </div>
                        <table class="table table-bordered mb-0" id="myTable">
                            <thead class="bg-orange">
                                <tr class="text-light">
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Client Name</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($meetings as $meeting)
                                    <tr @if (date('d M y', strtotime($meeting->meetingDateAndTime)) == $today) class="bg-warning" @endif>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{!! date('d M y', strtotime($meeting->meetingDateAndTime)) !!}</td>
                                        <td>{!! date('h:i A', strtotime($meeting->meetingDateAndTime)) !!}</td>
                                        <td>{{ $meeting->leeds->clientName }}</td>
                                        <td>{{ $meeting->phoneNo }}</td>
                                        <td>{{ $meeting->address }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@section('js')
    {!! $chart1->renderChartJsLibrary() !!}
    {!! $chart1->renderJs() !!}

    <script src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>
    <script src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>

    <script>
        var json = @json($incomedata);
        var json2 = @json($expensedata);
        var json3 = @json($costdata);
        // Get a reference to the <input type="month"> element
        const monthInput = document.querySelector('input[type="month"]');

        // Add an onChange event listener to the input element
        monthInput.addEventListener('change', event => {
            renderChart(event.target.value)
        })

        document.addEventListener("DOMContentLoaded", function() {
            const date = new Date();
            renderChart(date)
        });

        function renderChart(dateString) {
            // Get the value of the input element
            //const dateString = event.target.value;


            // Parse the date string using the Date object
            const date = new Date(dateString);

            // Extract the year and month values from the Date object
            var year = date.getFullYear();
            var month = date.getMonth() + 1; // add 1 to the month value, since it is zero-indexed



            const data = json.filter(obj => {
                // Use a regular expression to check if the Date property
                // matches the yyyy-mm-dd format
                const dateFormat = /^\d{4}-\d{2}-\d{2}$/;
                if (!dateFormat.test(obj.Date)) {
                    return false;
                }

                // Split the date string into its component parts
                const dateParts = obj.Date.split('-');
                const dateYear = parseInt(dateParts[0], 10);
                const dateMonth = parseInt(dateParts[1], 10);

                // Check if the date year and month match the filter values
                return dateYear === year && dateMonth === month;
            });
            const data2 = json2.filter(obj => {
                // Use a regular expression to check if the Date property
                // matches the yyyy-mm-dd format
                const dateFormat = /^\d{4}-\d{2}-\d{2}$/;
                if (!dateFormat.test(obj.Date)) {
                    return false;
                }

                // Split the date string into its component parts
                const dateParts = obj.Date.split('-');
                const dateYear = parseInt(dateParts[0], 10);
                const dateMonth = parseInt(dateParts[1], 10);

                // Check if the date year and month match the filter values
                return dateYear === year && dateMonth === month;
            });
            const data3 = json3.filter(obj => {
                // Use a regular expression to check if the Date property
                // matches the yyyy-mm-dd format
                const dateFormat = /^\d{4}-\d{2}-\d{2}$/;
                if (!dateFormat.test(obj.Date)) {
                    return false;
                }

                // Split the date string into its component parts
                const dateParts = obj.Date.split('-');
                const dateYear = parseInt(dateParts[0], 10);
                const dateMonth = parseInt(dateParts[1], 10);

                // Check if the date year and month match the filter values
                return dateYear === year && dateMonth === month;
            });
            // console.log(data);


            const Incomesum = data.reduce((acc, o) => acc + parseInt(o.value), 0)
            const Expensesum = data2.reduce((acc, o) => acc + parseInt(o.value), 0)
            const Costsum = data3.reduce((acc, o) => acc + parseInt(o.value), 0)
            FusionCharts.ready(function() {
                var topProductsChart = new FusionCharts({
                    type: 'multilevelpie',
                    renderAt: 'chart-container',
                    enablesmartlabels: "1",
                    id: "myChart",
                    width: '600',
                    height: '600',
                    dataFormat: 'json',
                    dataSource: {
                        "chart": {
                            "caption": "Accounts",
                            "showPlotBorder": "1",
                            "piefillalpha": "60",
                            "pieborderthickness": "2",
                            "piebordercolor": "#FFFFFF",
                            "hoverfillcolor": "#CCCCCC",
                            "numberprefix": "tk",
                            "plottooltext": "$label, $valuetk, $percentValue",
                            "theme": "fusion"
                        },
                        "category": [{
                            "label": "Account Types",
                            "color": "#ffffff",
                            // "value": "150",
                            "category": [{
                                "label": "Income",
                                "color": "#f8bd19",
                                "value": Incomesum,
                                "tooltext": "Income, $valuetk, $percentValue",
                                "category": data
                            }, {
                                "label": "Expenses",
                                "color": "#33ccff",
                                "value": Expensesum,
                                "tooltext": "Expenses, $valuetk, $percentValue",
                                "category": data2
                            }, {
                                "label": "Cost of good sold",
                                "color": "#ffcccc",
                                "value": Costsum,
                                "tooltext": "$valuetk",
                                "category": [{
                                    label: Costsum.toFixed(2),
                                    value: Costsum,
                                    color: '#ffcccc'
                                }]
                            }]
                        }]
                    }
                });
                topProductsChart.render();
            });
        }
    </script>
@endsection

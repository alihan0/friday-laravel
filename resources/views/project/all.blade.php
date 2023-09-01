@extends('layout.master')

@section('title', 'Tüm Projeler')


@section('style')
<link rel="stylesheet" href="/static/assets/vendors/flatpickr/flatpickr.min.css">
<link rel="stylesheet" href="/static/assets/vendors/select2/select2.min.css">

@endsection

@section('content')
    <div class="row mb-4">
        <div class="col">
            <h4 class="card-title border-bottom pb-3">Tüm Projeler</h4>
        </div>
    </div>
    
<div class="row">
    @foreach ($projects as $project)
    <div class="col-lg-5 col-xl-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="card-title mb-0">{{$project->title}}</h6>
              <div class="dropdown mb-2">
                <a type="button" id="dropdownMenuButton5" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton5">
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
                </div>
              </div>
            </div>
            
            <div id="ProjectChart" data-pass="{{$project->passing_time}}" data-require="{{$project->required_time}}"></div>
            <div class="row mb-3">
              <div class="col-6 d-flex justify-content-end">
                <div>
                  <label class="d-flex align-items-center justify-content-end tx-10 text-uppercase fw-bolder">Total storage <span class="p-1 ms-1 rounded-circle bg-secondary"></span></label>
                  <h5 class="fw-bolder mb-0 text-end">8TB</h5>
                </div>
              </div>
              <div class="col-6">
                <div>
                  <label class="d-flex align-items-center tx-10 text-uppercase fw-bolder"><span class="p-1 me-1 rounded-circle bg-primary"></span> Used storage</label>
                  <h5 class="fw-bolder mb-0">~5TB</h5>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    @endforeach
    </div> 
@endsection

@section('script')
<script src="/static/assets/vendors/flatpickr/flatpickr.min.js"></script>
<script src="/static/assets/vendors/select2/select2.min.js"></script>
<script src="/static/assets/js/select2.js"></script>
<script src="/static/assets/js/flatpickr.js"></script>
<script src="/static/assets/vendors/apexcharts/apexcharts.min.js"></script>
<script src="/static/assets/js/dashboard-light.js"></script>

    <script>
        var colors = {
            primary        : "#6571ff",
            secondary      : "#7987a1",
            success        : "#05a34a",
            info           : "#66d1d1",
            warning        : "#fbbc06",
            danger         : "#ff3366",
            light          : "#e9ecef",
            dark           : "#060c17",
            muted          : "#7987a1",
            gridBorder     : "rgba(77, 138, 240, .15)",
            bodyColor      : "#000",
            cardBg         : "#fff"
        }
        // Saniyeleri yüzdeye dönüştürün
        var passingtime = $("#ProjectChart").attr('data-pass'); // Örnek: 430 saniye
        var required_time = $("#ProjectChart").attr('data-require'); // Örnek: 950400 saniye

        var progressPercentage = (passingtime / required_time) * 100;
        var remainingPercentage = 100 - progressPercentage;
        var formattedProgress = (progressPercentage).toFixed(2);

        var progressColor = "#7f1d1d"; // Varsayılan renk

        if (progressPercentage >= 10 && progressPercentage < 20) {
            progressColor = "#b91c1c"; // %10'dan büyük ve %20'den küçükse
        } else if (progressPercentage >= 20 && progressPercentage < 40) {
            progressColor = "#2563eb"; // %20'den büyük ve %40'dan küçükse
        } else if (progressPercentage >= 40 && progressPercentage < 60) {
            progressColor = "#1e40af"; // %40'dan büyük ve %60'dan küçükse
        } else if (progressPercentage >= 60 && progressPercentage < 80) {
            progressColor = "#a3e635"; // %60'dan büyük ve %80'den küçükse
        } else if (progressPercentage >= 80 && progressPercentage <= 99) {
            progressColor = "#22c55e"; // %80'den büyük ve %100'e eşitse
        }else if (progressPercentage >= 100) {
            progressColor = "#15803d"; // %80'den büyük ve %100'e eşitse
        }


        // options nesnesini oluştururken yüzde değerlerini kullanın
        var options = {
            chart: {
                height: 260,
                type: "radialBar"
            },
            series: [formattedProgress],
            colors: [progressColor], // İlerleme çubuğunun rengi
            plotOptions: {
                radialBar: {
                    hollow: {
                        margin: 15,
                        size: "70%"
                    },
                    track: {
                        show: true,
                        background: "#e9ecef", // Kalan kısmın rengi
                        strokeWidth: '100%',
                        opacity: 1,
                        margin: 5,
                    },
                    dataLabels: {
                        showOn: "always",
                        name: {
                            offsetY: -11,
                            show: true,
                            color: "#6c757d",
                            fontSize: "13px"
                        },
                        value: {
                            color: "#343a40",
                            fontSize: "30px",
                            show: true
                        }
                    }
                }
            },
            fill: {
                opacity: 1
            },
            stroke: {
                lineCap: "round",
            },
            labels: ["İlerleme"]
        };

        var chart = new ApexCharts(document.querySelector("#ProjectChart"), options);
        chart.render();

    </script>

@endsection


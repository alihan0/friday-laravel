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
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">Detay</span></a>
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Düzenle</span></a>
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;" onclick="deleteProject({{$project->id}})"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Sil</span></a>
                </div>
              </div>
            </div>
            
            <div class="ProjectChart" data-pass="{{$project->passing_time}}" data-require="{{$project->required_time}}"></div>
            <div class="row mb-3">
              <div class="col-6 d-flex justify-content-end">
                <div>
                  <label class="d-flex align-items-center justify-content-end tx-10 text-uppercase fw-bolder">Geçen Süre <span class="p-1 ms-1 rounded-circle bg-primary"></span></label>
                  <h5 class="fw-bolder mb-0 text-end">{{$project->passing_time > 0 ? formatSeconds($project->passing_time) : "-"}}</h5>
                </div>
              </div>
              <div class="col-6">
                <div>
                  <label class="d-flex align-items-center tx-10 text-uppercase fw-bolder"><span class="p-1 me-1 rounded-circle bg-secondary"></span> Kalan Zaman</label>
                  <h5 class="fw-bolder mb-0">{{ formatSeconds($project->required_time - $project->passing_time)}}</h5>
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
    // Tüm projelerin kartlarını dönün
    $(".ProjectChart").each(function(index, element) {
        var passingtime = $(element).attr('data-pass'); 
        var required_time = $(element).attr('data-require'); 

        var progressPercentage = (passingtime / required_time) * 100;
        var remainingPercentage = 100 - progressPercentage;
        var formattedProgress = (progressPercentage).toFixed(2);

        var progressColor = "#ddd"; 

        if (progressPercentage >= 0 && progressPercentage < 20) {
            progressColor = "#b91c1c"; 
        } else if (progressPercentage >= 20 && progressPercentage < 40) {
            progressColor = "#2563eb"; 
        } else if (progressPercentage >= 40 && progressPercentage < 60) {
            progressColor = "#1e40af"; 
        } else if (progressPercentage >= 60 && progressPercentage < 80) {
            progressColor = "#a3e635"; 
        } else if (progressPercentage >= 80 && progressPercentage <= 99) {
            progressColor = "#22c55e"; 
        } else if (progressPercentage >= 99) {
            progressColor = "#15803d"; 
        }

        var options = {
            chart: {
                height: 260,
                type: "radialBar"
            },
            series: [formattedProgress],
            colors: [progressColor],
            plotOptions: {
                radialBar: {
                    hollow: {
                        margin: 15,
                        size: "70%"
                    },
                    track: {
                        show: true,
                        background: "#e9ecef",
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

        // Her bir kartın içindeki grafik öğesine grafik ekleyin
        var chart = new ApexCharts(element, options);
        chart.render();
    });


    function deleteProject(id){
      

      swal.fire({
        title: "Silmek istediginize emin misiniz?",
        text : "Projeyi sildiğiniz, projenizle birlikte tüm verileri silinecek. Bu işlem geri alınamaz.",
        confirmButtonText: "Evet, Sil",
        showCancelButton: true,
        cancelButtonText: "Vazgeç"
      }).then((confirm) => {
        if(confirm.isConfirmed){
          axios.post('/project/delete', {id: id}).then((response) => {
            swal.fire({
              icon: response.data.icon,
              title: response.data.message,
            }).then(()=>{
              window.location.reload();
            })
          })
        }
      })

    }
</script>


@endsection


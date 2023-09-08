@extends('layout.master')

@section('title', 'Proje Detayları')


@section('style')
<link rel="stylesheet" href="/static/assets/vendors/flatpickr/flatpickr.min.css">
<link rel="stylesheet" href="/static/assets/vendors/select2/select2.min.css">

@endsection

@section('content')



    <div class="row mb-4">
        <div class="col">
            <h4 class="card-title border-bottom pb-3">Proje Detayları: #{{$project->id}}</h4>
        </div>
    </div>
    
    @if ($project->status == 2)
    <div class="alert alert-success" role="alert">
      Bu proje başarıyla tamamlandı.
    </div>
    @endif

    <div class="row">
      <div class="col-3">
        <div class="card mb-4">
          <div class="card-body">
            <h6 class="card-title mb-2 pb-2 border-bottom">{{$project->title}}</h6>


              <p>{{$project->detail}}</p>
              <div class="mt-3">
                <label class="tx-11 fw-bolder mb-0 text-uppercase">Başlama:</label>
                <p class="text-muted">{{$project->start_at}}</p>
              </div>
              <div class="mt-3">
                <label class="tx-11 fw-bolder mb-0 text-uppercase">Teslim:</label>
                <p class="text-muted">{{$project->dead_line}}</p>
              </div>
              <div class="mt-3">
                <label class="tx-11 fw-bolder mb-0 text-uppercase">İlerleme:</label>
                <p class="text-muted">{{$project->passing_time}}</p>
              </div>
              <div class="mt-3">
                <label class="tx-11 fw-bolder mb-0 text-uppercase">Gereken Zaman:</label>
                <p class="text-muted">{{$project->required_time}}</p>
              </div>
              <div class="mt-3 d-flex social-links">
                <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                  <i data-feather="github"></i>
                </a>
              </div>
          </div>
        </div>

        <div class="card">
          <div class="card-body">
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
      <div class="{{$project->status == 2 ? 'col-9' : 'col-7'}}">
        
        <div class="row mb-4">
          <div class="card card-body">
            <h4 class="card-title border-bottom pb-3">Görevler</h4>
            
            @if ($tasks->count() > 0)
            <table class="table ">
              
              <tbody>
                
                @foreach ($tasks as $task)
                    <tr>
                      <td class="{{$task->status == 2 ? 'text-success text-decoration-line-through' : ($task->status == 0 ? 'text-danger text-decoration-line-through' : '')}}"><span class="text-wrap">{{$task->task}}</span></td>
                      <td class="d-flex justify-content-end">
                        @if ($task->status == 1)
                          <button class="btn text-success btn-sm p-0 m-0" onclick="checkTask({{$task->id}})"><i class="icon-sm" data-feather="check"></i></button>
                          <button class="btn text-danger  btn-sm p-0 m-0" onclick="cancelTask({{$task->id}})"><i class="icon-sm" data-feather="x"></i></button>
                        @elseif($task->status == 2)
                          
                        <button class="btn  text-danger btn-sm p-0 m-0" onclick="cancelTask({{$task->id}})"><i class="icon-sm" data-feather="x"></i></button>
                        
                        
                        @else
                        <button class="btn text-success btn-sm p-0 m-0" onclick="checkTask({{$task->id}})"><i class="icon-sm" data-feather="check"></i></button>
                        
                        @endif
                        
                      </td>
                    </tr>
                @endforeach
                
              </tbody>
            </table>
            @else
            <div class="px-4 pt-4 my-5 text-center">
              <h1 class="display-5 fw-bold text-body-emphasis">Görev Bulunamadı</h1>
              <div class="col-12 mx-auto">
                <p class="lead mb-4 ">Bu proje için henüz bir görev bulunamadı. Eğer görev eklemek istiyorsanız aksiyon menüsünden <code>Görev Ekle</code> butonunu kullanarak yeni görev ekleyebilirsiniz.</p>
              </div>
            </div>
            @endif

          </div>
        </div>
        <div class="row mb-4">
          <div class="card card-body">
            <h4 class="card-title border-bottom pb-3">Ödemeler</h4>
            
            @if ($payments->count() > 0)
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Tutar</th>
                  <th scope="col">Açıklama</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                
                @foreach ($payments as $payment)
                    <tr>
                      <td>{{$payment->id}}</td>
                      <td>{{$payment->amount}} ₺</td>
                      <td><span class="text-wrap">{{$payment->detail}}</span></td>
                      <td class="d-flex justify-content-end">
                        <button class="btn btn-sm p-1 m-0" onclick="removePayment({{$payment->id}})"><i class="icon-sm" data-feather="trash"></i></button>
                      </td>
                    </tr>
                @endforeach
                
              </tbody>
            </table>
            @else
            <div class="px-4 pt-4 my-5 text-center">
              <h1 class="display-5 fw-bold text-body-emphasis">Ödeme Bulunamadı</h1>
              <div class="col-12 mx-auto">
                <p class="lead mb-4">Bu proje için henüz bir ödeme kaydı bulunamadı. Eğer ödeme aldıysaz aksiyon menüsünden <code>Ödeme Ekle</code> butonunu kullanarak yeni ödeme ekleyebilirsiniz.</p>
              </div>
            </div>
            @endif

          </div>
        </div>

        <div class="row mb-4">
          <div class="card card-body">
            <h4 class="card-title border-bottom pb-3">Notlar</h4>
            
            @if ($tasks->count() > 0)
            <table class="table ">
              
              <tbody>
                
                @foreach ($notes as $note)
                    <tr>
                      <td><p class="text-wrap">{{$note->note}}</p></td>
                      <td class="d-flex justify-content-end">
                        <button class="btn btn-sm p-1 m-0" onclick="removeNote({{$note->id}})"><i class="icon-sm" data-feather="trash"></i></button>
                      </td>
                    </tr>
                @endforeach
                
              </tbody>
            </table>
            @else
            <div class="px-4 pt-4 my-5 text-center">
              <h1 class="display-5 fw-bold text-body-emphasis">Not Bulunamadı</h1>
              <div class="col-12 mx-auto">
                <p class="lead mb-4">Bu proje için henüz bir not kaydı bulunamadı. Eğer bir not almak istiyorsanız aksiyon menüsünden <code>Not Ekle</code> butonunu kullanarak yeni not ekleyebilirsiniz.</p>
              </div>
            </div>
            @endif

          </div>
        </div>
      </div>
      <div class="{{$project->status == 2 ? 'd-none' : 'col-2'}}">
      
            <button class="btn btn-success col-12 mb-2" onclick="addPayment({{$project->id}})">Ödeme Ekle</button>
            <button class="btn btn-warning col-12 mb-2 text-white" onclick="addTime({{$project->id}})">Çalışma Süresi Ekle</button>
            <button class="btn btn-secondary col-12 mb-2 text-white" onclick="extendTime({{$project->id}})">Süre Uzat</button>
            <button class="btn btn-primary col-12 mb-2" onclick="addTask({{$project->id}})">Görev Ekle</button>
            <button class="btn btn-primary col-12 mb-2" onclick="addNote({{$project->id}})">Not Ekle</button>
            <button class="btn btn-success col-12 mb-2" onclick="complateProject({{$project->id}})">Projeyi Tamamla</button>
            <button class="btn btn-danger col-12 mb-2">Projeyi Sil</button>
      
      </div>
    </div>
 
@endsection

@section('script')
<script src="/static/assets/vendors/flatpickr/flatpickr.min.js"></script>
<script src="/static/assets/vendors/select2/select2.min.js"></script>
<script src="/static/assets/js/select2.js"></script>
<script src="/static/assets/js/flatpickr.js"></script>
<script src="/static/assets/vendors/apexcharts/apexcharts.min.js"></script>
<script>

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

function addPayment(id){
  var modal = document.createElement('div');
        modal.className = 'modal fade';
        modal.id = 'dynamicModal'; // Modalın ID'sini istediğiniz gibi ayarlayın

        // Modal içeriği
        modal.innerHTML = `
            <div class="modal-dialog" data-bs-backdrop="static">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ödeme Ekle</h5>
                    </div>
                    <div class="modal-body">
                      <div class="mb-3">
                        <label for="amount" class="form-label">Tutar:</label>
                        <input type="text" class="form-control" id="amount">
                      </div>
                      <div class="mb-3">
                        <label for="detail" class="form-label">Açıklama</label>
                        <textarea class="form-control" id="detail" rows="3"></textarea>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Vazgeç</button>
                      <button class="btn btn-primary" id="savePaymentButton" onclick="savePayment(${id})">Ekle</button>  
                    </div>
                </div>
            </div>
        `;

        // Modalı body içine ekleyin
        document.body.appendChild(modal);

        // Modalı başlatın
        var dynamicModal = new bootstrap.Modal(modal, { backdrop: 'static', keyboard: false });
        dynamicModal.show();

}

function savePayment(id){

  $("#savePaymentButton").attr('disabled', true);

  var amount = $("#amount").val();
  var detail = $("#detail").val();


  axios.post('/accounting/add-payment', {id:id, amount:amount, detail:detail}).then((res) => {
    toastr[res.data.type](res.data.message);
    if(res.data.status){
      setInterval(() => {
        window.location.reload();
      }, 1000);
    }
  });
}

function removePayment(id){
  axios.post('/accounting/remove-payment', {id:id}).then((res) => {
    toastr[res.data.type](res.data.message);
    if(res.data.status){
      setInterval(() => {
        window.location.reload();
      }, 1000);
    }
  });
}

function addTask(id){
  var modal = document.createElement('div');
        modal.className = 'modal fade';
        modal.id = 'dynamicModal'; // Modalın ID'sini istediğiniz gibi ayarlayın

        // Modal içeriği
        modal.innerHTML = `
            <div class="modal-dialog" data-bs-backdrop="static">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Görev Ekle</h5>
                    </div>
                    <div class="modal-body">
                      <div class="mb-3">
                        <label for="task" class="form-label">Görev:</label>
                        <input type="text" class="form-control" id="task">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Vazgeç</button>
                      <button class="btn btn-primary" id="saveTaskButton" onclick="saveTask(${id})">Ekle</button>  
                    </div>
                </div>
            </div>
        `;

        // Modalı body içine ekleyin
        document.body.appendChild(modal);

        // Modalı başlatın
        var dynamicModal = new bootstrap.Modal(modal, { backdrop: 'static', keyboard: false });
        dynamicModal.show();
}

function saveTask(id){


  $("#saveTaskButton").attr('disabled', true);

  var task = $("#task").val();
  


  axios.post('/project/task/new', {id:id, task:task}).then((res) => {
    toastr[res.data.type](res.data.message);
    if(res.data.status){
      setInterval(() => {
        window.location.reload();
      }, 1000);
    }
  });

}

function checkTask(id){
  axios.post('/project/task/check', {id:id}).then((res) => {
    window.location.reload();
  });
}
function cancelTask(id){
  axios.post('/project/task/cancel', {id:id}).then((res) => {
    window.location.reload();
  });
}

function addNote(id){
  const modal = new MellowModal({
    id : 'addNoteModal',
    title : 'Not Ekle',
    confirmButtonType : 'primary',
    confirmButtonText : 'Ekle',
    buttons: '<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Vazgeç</button>',
    backdrop: 'static',
    showCloseButton: false,
    content : `
    <div class="mb-3">
      <label for="note" class="form-label">Not</label>
      <textarea class="form-control" id="note" rows="3"></textarea>
    </div>
    `
  });
  modal.fire();
  $(document).on("click", "#addNoteModalBtn", function(){
    var note = $("#note").val();
    axios.post('/project/note/new', {id:id, note:note}).then((res) => {
      toastr[res.data.type](res.data.message);
      if(res.data.status){
        setInterval(() => {
          window.location.reload();
        }, 500)
      }
    });
  });
  
}

function removeNote(id){
  axios.post('/project/note/remove', {id:id}).then((res) => {
    toastr[res.data.type](res.data.message);
    if(res.data.status){
      setInterval(() => {
        window.location.reload();
      },500)
    }
  })
}

function addTime(id){
  const modal = new MellowModal({
    id : 'addTimeModal',
    title : 'Çalışma Süresi Ekle',
    footer: false,
    content : `<div class="d-flex justify-content-between mb-3">
                <button class="btn btn-success timeBtn" onclick="addWorkTime(1800, ${id})">30 DK</button>
                <button class="btn btn-success timeBtn" onclick="addWorkTime(3600, ${id})">1 Saat</button>
                <button class="btn btn-success timeBtn" onclick="addWorkTime(10800, ${id})">3 Saat</button>
                <button class="btn btn-success timeBtn" onclick="addWorkTime(18000, ${id})">5 Saat</button>
                <button class="btn btn-success timeBtn" onclick="addWorkTime(36000, ${id})">10 Saat</button>
              </div>`

  });
  modal.fire();
}
function addWorkTime(time, id){
  $(".timeBtn").attr("disabled", true);
  axios.post('/project/add-work-time', {time:time, id:id}).then((res)=>{
    toastr[res.data.type](res.data.message);
    if(res.data.status){
      window.location.reload();
    }
  });
}

function extendTime(id){
  const modal = new MellowModal({
    id : 'extendTimeModal',
    title : 'Proje Süresi Uzat',
    footer: false,
    content : `<div class="d-flex justify-content-between mb-3">
                <button class="btn btn-secondary extendTimeBtn" onclick="extendWorkTime(3600, ${id})">1 Saat</button>
                <button class="btn btn-secondary extendTimeBtn" onclick="extendWorkTime(21600, ${id})">6 Saat</button>
                <button class="btn btn-secondary extendTimeBtn" onclick="extendWorkTime(43200, ${id})">12 Saat</button>
                <button class="btn btn-secondary extendTimeBtn" onclick="extendWorkTime(86400, ${id})">1 Gün</button>
                <button class="btn btn-secondary extendTimeBtn" onclick="extendWorkTime(604800, ${id})">7 Gün</button>
              </div>`

  });
  modal.fire();
}

function extendWorkTime(time, id){
  $(".extendTimeBtn").attr("disabled", true);
  axios.post('/project/extend-work-time', {time:time, id:id}).then((res)=>{
    toastr[res.data.type](res.data.message);
    if(res.data.status){
      window.location.reload();
    }
  });
}

function complateProject(id){
  axios.post('/project/complate', {id:id}).then((res) => {
    toastr[res.data.type](res.data.message);
    if(res.data.status){
      setInterval(() => {
        window.location.reload();
      },1000)
    }
  })
}
    
</script>
@endsection
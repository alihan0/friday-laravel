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
    

    <div class="row">
      <div class="col-3">
        <div class="card">
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
      </div>
      <div class="col-7 border">8</div>
      <div class="col-2">
      
            <button class="btn btn-success col-12 mb-2" onclick="addPayment({{$project->id}})">Ödeme Ekle</button>
            <button class="btn btn-warning col-12 mb-2 text-white">Çalışma Süresi Ekle</button>
            <button class="btn btn-secondary col-12 mb-2 text-white">Süre Uzat</button>
            <button class="btn btn-primary col-12 mb-2">Kilometre Taşı Ekle</button>
            <button class="btn btn-primary col-12 mb-2">Not Ekle</button>
            <button class="btn btn-danger col-12 mb-2">Projeyi Sil</button>
      
      </div>
    </div>
 
@endsection

@section('script')
<script src="/static/assets/vendors/flatpickr/flatpickr.min.js"></script>
<script src="/static/assets/vendors/select2/select2.min.js"></script>
<script src="/static/assets/js/select2.js"></script>
<script src="/static/assets/js/flatpickr.js"></script>
<script>

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

    
</script>
@endsection
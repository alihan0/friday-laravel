@extends('layout.master')

@section('title', 'Yeni Teklif')
    
@section('style')
<link rel="stylesheet" href="/static/assets/vendors/jquery-steps/jquery.steps.css">
<link rel="stylesheet" href="/static/assets/css/demo1/style.css">
<link rel="stylesheet" href="/static/assets/vendors/select2/select2.min.css">

@endsection

@section('content')
<div class="row mb-4">
    <div class="col">
        <h4 class="card-title border-bottom pb-3">Yeni Teklif</h4>
    </div>
</div>

<div class="row">
    <div class="col-md-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <form id="offerForm">
                <div id="wizardVertical">
                <h2>Müşteri Seçimi</h2>
                <section>
                    <h4 class="mb-4 border-bottom pb-3">Müşteri Seçimi</h4>
                    
                    <div class="mb-3">
                        <label for="customer" class="form-label">Müşteri:</label>
                        <select name="customer" class="form-control" id="customer">
                            <option value="0">Müşteri Seçin</option>
                            @foreach ($customers as $customer)
                                <option value="{{$customer->id}}">{{$customer->name}}</option>
                            @endforeach
                        </select>
                    </div>

                </section>

                <h2>Proje Bilgileri</h2>
                <section>
                    <h4 class="mb-4 border-bottom pb-3">Proje Bilgileri</h4>
                    
                    <div class="mb-3">
                        <label for="customer" class="form-label">Proje Başlığı:</label>
                        <input type="text" class="form-control" name="title" id="title">
                    </div>
                    <div class="mb-3">
                        <label for="customer" class="form-label">Proje Özeti:</label>
                        <textarea name="detail" class="form-control" id="detail" rows="4"></textarea>
                    </div>
                </section>

                <h2>Paneller</h2>
                <section>
                    <h4 class="mb-4 border-bottom pb-3">Paneller</h4>
                    
                    <textarea name="panels" class="form-control" id="panels" cols="30" rows="10"></textarea>
                </section>

                <h2>Teknolojiler</h2>
                <section>
                    <div class="mb-3 border-bottom">
                        <h6 class="border-bottom pb-3">Back-end Teknolojileri</h6>
                        <select class="selectform form-select" id="backend"  multiple="multiple" data-width="100%">
                            @if ($techs->count() > 0)
                                @foreach ($techs as $tech)
                                    <option value="{{ $tech->title }}">{{$tech->title}}</option>
                                @endforeach
                                
                            @endif
                        </select>
                    </div>

                    <div class="mb-3 border-bottom">
                        <h6 class="border-bottom pb-3">Front-end Teknolojileri</h6>
                        <select class="selectform form-select" id="frontend"  multiple="multiple" data-width="100%">
                            @if ($techs->count() > 0)
                                @foreach ($techs as $tech)
                                    <option value="{{ $tech->title }}">{{$tech->title}}</option>
                                @endforeach
                                
                            @endif
                        </select>
                    </div>
                    <div class="mb-3 border-bottom">
                        <h6 class="border-bottom pb-3">Veritabanı Teknolojileri</h6>
                        <select class="selectform form-select" id="db"  multiple="multiple" data-width="100%">
                            @if ($techs->count() > 0)
                                @foreach ($techs as $tech)
                                    <option value="{{ $tech->title }}">{{$tech->title}}</option>
                                @endforeach
                                
                            @endif
                        </select>
                    </div>
                    <div class="mb-3 border-bottom">
                        <h6 class="border-bottom pb-3">Güvenlik Teknolojileri</h6>
                        <select class="selectform form-select" id="security"multiple="multiple" data-width="100%">
                            @if ($techs->count() > 0)
                                @foreach ($techs as $tech)
                                    <option value="{{ $tech->title }}">{{$tech->title}}</option>
                                @endforeach
                                
                            @endif
                        </select>
                    </div>
                </section>

                <h2>Süre ve Fiyatlandırma</h2>
                <section>
                    
                    <div class="mb-3 border-bottom">
                        <h6 class="border-bottom pb-3">Teklifin Geçerlilik Süresi (İş Günü)</h6>
                        <input type="text" class="form-control" name="validity" id="validity">
                    </div>
                    <div class="mb-3 border-bottom">
                        <h6 class="border-bottom pb-3">Proje süresi (Gün)</h6>
                        <input type="text" class="form-control" name="project_time" id="project_time">
                    </div>

                    <div class="mb-3 border-bottom">
                        <h6 class="border-bottom pb-3">Tahmini Teslim Tarihi</h6>
                        <input type="date" class="form-control" name="delivery_date" id="delivery_date">
                    </div>

                    <div class="mb-3 border-bottom">
                        <h6 class="border-bottom pb-3">Proje Ücreti</h6>
                        <input type="text" class="form-control" name="project_amount" id="project_amount">
                    </div>

                    <div class="mb-3 border-bottom">
                        <h6 class="border-bottom pb-3">Ön Ödeme Tutarı</h6>
                        <input type="text" class="form-control" name="first_amount" id="first_amount">
                    </div>
                    <div class="mb-3 border-bottom">
                        <h6 class="border-bottom pb-3">Teslim Tutarı</h6>
                        <input type="text" class="form-control" name="delivery_amount" id="delivery_amount">
                    </div>

                </section>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('script')
<script src="/static/assets/vendors/jquery-steps/jquery.steps.min.js"></script>
<script src="/static/assets/vendors/select2/select2.min.js"></script>

<script>
$("#wizard").steps({
    headerTag: "h2",
    bodyTag: "section",
    transitionEffect: "slideLeft"
});

$("#wizardVertical").steps({
    headerTag: "h2",
    bodyTag: "section",
    transitionEffect: "slideLeft",
    stepsOrientation: 'vertical',
    onFinishing: function (event, currentIndex)
    {
        var formData = $("#offerForm").serialize();
        formData += '&backend=' + $('#backend').val();
        formData += '&frontend=' + $('#frontend').val();
        formData += '&db=' + $('#db').val();
        formData += '&security=' + $('#security').val();
        
        axios.post('/offer/save', formData).then((res) => {
            toastr[res.data.type](res.data.message);
            if(res.data.status){
                window.location.assign('/offer/detail/'+res.data.id);
            }
        });
        
    }
});

$(document).ready(function() {
    $('#backend').select2();
    $('#frontend').select2();
    $('#db').select2();
    $('#api').select2();
    $('#security').select2();
    $('#version').select2();
});


</script>
@endsection
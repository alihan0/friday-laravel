@extends('layout.master')

@section('title', 'Yeni Müşteri')
    
@section('content')
<div class="row mb-4">
    <div class="col">
        <h4 class="card-title border-bottom pb-3">Yeni Müşteri</h4>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
              

                <div class="row">
                    <div class="col-6">
                        <form id="customerForm">
                            <div class="mb-3">
                                <label for="company" class="form-label">Şirket</label>
                                <input type="text" class="form-control" id="company" autocomplete="off" placeholder="Şirketin adı">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Müşteri Adı</label>
                                <input type="text" class="form-control" id="name" autocomplete="off" placeholder="Müşterinin adı soyadı">
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Telefon</label>
                                        <input type="text" class="form-control" id="phone" autocomplete="off" placeholder="Şirket telefonu">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">E-posta</label>
                                        <input type="text" class="form-control" id="email" autocomplete="off" placeholder="İletişim e-posta adresi">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="gsm" class="form-label">GSM</label>
                                        <input type="text" class="form-control" id="gsm" autocomplete="off" placeholder="İletişim telefon">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="website" class="form-label">Web Site</label>
                                <input type="text" class="form-control" id="website" autocomplete="off" placeholder="Web site">
                            </div>
                    </div>
                    <div class="col-6">
                        
                            <div class="mb-3">
                                <label for="address" class="form-label">Açık Adres</label>
                                <input type="text" class="form-control" id="address" autocomplete="off" placeholder="Şirketin açık adresi">
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="countru" class="form-label">Ülke</label>
                                        <input type="text" class="form-control" id="countru" autocomplete="off" placeholder="Ülke">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="city" class="form-label">Şehir</label>
                                        <input type="text" class="form-control" id="city" autocomplete="off" placeholder="Şehir">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="logo" class="form-label">Logo</label>
                                <input type="file" class="form-control" id="logo" autocomplete="off" onchange="uploadFile(this)">
                                <input type="hidden" id="logoData" name="logoData">
                            </div>
                            <div class="mb-3 float-end">
                                <button class="btn btn-primary" onclick="saveCustomer()">Oluştur</button>
                            </div>
                        </form>
                    </div>
                </div>


            </div> 
          </div>
    </div>
</div>
@endsection

@section('script')
<script>

function uploadFile(inputElement) {
    const file = inputElement.files[0];
    
    const formData = new FormData();
    formData.append('file', file);

    axios.post('/upload', formData)
        .then(response => {
            toastr[response.data.type](response.data.message);
            $("#logoData").val(response.data.path);
            console.log('Dosya başarıyla yüklendi:', response.data);
        })
}

function saveCustomer(){
    const form = $("#customerForm").serialize();
    axios.post('/customer/save', form).then((res) => {
        toastr[res.data.type](res.data.message);
        if(res.data.status){
            setInterval(() => {
                window.location.assign('/customer/all');
            }, 1000);
        }
    })
}

</script>
@endsection
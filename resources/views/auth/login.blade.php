@extends('layout.auth')

@section('title', 'Oturum Aç')
    

@section('content')
<div class="row w-100 mx-0 auth-page">
    <div class="col-md-8 col-xl-6 mx-auto">
        <div class="card">
            <div class="row">
                <div class="col-md-4 pe-md-0">
                    <div class="auth-side-wrapper"></div>
                </div>
                <div class="col-md-8 ps-md-0">
                <div class="auth-form-wrapper px-4 py-5">
                    <a href="#" class="noble-ui-logo d-block mb-2">Fri<span>day</span></a>
                    <h5 class="text-muted fw-normal mb-4">Devam edebilmek için lütfen oturum aç.</h5>
                    <form class="forms-sample">
                    <div class="mb-3">
                        <label for="email" class="form-label">E-posta</label>
                        <input type="text" class="form-control" id="email" placeholder="E-posta adresiniz">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Şifre</label>
                        <input type="password" class="form-control" id="password" placeholder="Şifreniz">
                    </div>
                    
                    <div>
                        <a href="javascript:;" class="btn btn-primary me-2 mb-2 mb-md-0 text-white" onclick="login()">Giriş</a>
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
        function login(){
            var email = $("#email").val();
            var password = $("#password").val();

            axios.post('/auth/login', {email:email, password:password}).then((res)=>{
                toastr[res.data.type](res.data.message);
                if(res.data.status){
                    setInterval(() => {
                        window.location.assign('/');
                    }, 1000);
                }
            })
        }
    </script>
@endsection
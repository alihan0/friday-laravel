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
    

      <div class="row profile-body">
        <!-- left wrapper start -->
        <div class="d-none d-md-block col-md-4 col-xl-3 left-wrapper">
          <div class="card rounded">
            <div class="card-body">
              <div class="d-flex align-items-center justify-content-between mb-2">
                <h6 class="card-title mb-0">{{$project->title}}</h6>
                <div class="dropdown">
                  <a type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                  </a>
                  
                </div>
              </div>
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
        <!-- left wrapper end -->
        <!-- middle wrapper start -->
        <div class="col-md-8 col-xl-6 middle-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              Ödemeler
            </div>
            
          </div>
        </div>
        <!-- middle wrapper end -->
        <!-- right wrapper start -->
        
        <!-- right wrapper end -->
      </div>
@endsection

@section('script')
<script src="/static/assets/vendors/flatpickr/flatpickr.min.js"></script>
<script src="/static/assets/vendors/select2/select2.min.js"></script>
<script src="/static/assets/js/select2.js"></script>
<script src="/static/assets/js/flatpickr.js"></script>
    <script>

       
    </script>
@endsection
@extends('layout.master')

@section('title', 'Pano')
    
@section('content')
<div class="row flex-grow-1">
    <div class="col-md-4 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-baseline">
            <h6 class="card-title mb-4">Projeler</h6>
          </div>
          <div class="row">
            <div class="col-12">
              <h6 class="mb-0">
                <span class="border-end pe-2">Devam Eden: <b>{{$projects->where('status',1)->count()}}</b></span>
                <span class="ps-2">Toplam: <b>{{$projects->count()}}</b></span>
              </h6>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="card-title mb-4">Teklifler</h6>
            </div>
            <div class="row">
              <div class="col-12">
                <h6 class="mb-0">
                  <span class="border-end pe-2">Bekleyen: <b>{{$offers->where('status',1)->count()}}</b></span>
                  <span class="ps-2">Toplam: <b>{{$offers->count()}}</b></span>
                </h6>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="card-title mb-4">Müşteriler</h6>
            </div>
            <div class="row">
              <div class="col-12">
                <h6 class="mb-0">
                  <span class="border-end pe-2">Aktif: <b>{{$customers->where('status',1)->count()}}</b></span>
                  <span class="ps-2">Toplam: <b>{{$customers->count()}}</b></span>
                </h6>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
    
    <div class="row flex-grow-1">
        <div class="col-md-4 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-baseline">
                <h6 class="card-title mb-4">Toplam Çalışma Süresi</h6>
              </div>
              <div class="row">
                <div class="col-12">
                  <h6 class="mb-0">
                    <span class="pe-2">{{formatSeconds($projects->sum('passing_time'))}}</span>
                  </h6>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline">
                  <h6 class="card-title mb-4">Tahmini Kazanç Tutarı</h6>
                </div>
                <div class="row">
                  <div class="col-12">
                    <h6 class="mb-0">
                      <span class="pe-2">{{$projects->sum('price')}} ₺</span>
                    </h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline">
                  <h6 class="card-title mb-4">Görevler</h6>
                </div>
                <div class="row">
                  <div class="col-12">
                    <h6 class="mb-0">
                      <span class="border-end pe-2">Bekleyen: <b>{{$tasks->where('status',1)->count()}}</b></span>
                      <span class="ps-2">Toplam: <b>{{$tasks->count()}}</b></span>
                    </h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection
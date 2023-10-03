@extends('layout.master')

@section('title', 'Tüm Müşteriler')
    
@section('content')
<div class="row mb-4">
    <div class="col">
        <h4 class="card-title border-bottom pb-3">Tüm Müşteriler</h4>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover mb-0">
                  <thead>
                    <tr>
                      <th class="pt-0">#</th>
                      <th class="pt-0">Logo</th>
                      <th class="pt-0">Firma</th>
                      <th class="pt-0">Yetkili</th>
                      <th class="pt-0">İletişim</th>
                      <th class="pt-0">Web Site</th>
                      <th class="pt-0">Konum</th>
                      <th class="pt-0">Teklif</th>
                      <th class="pt-0">Proje</th>
                      <th class="pt-0">Ödeme</th>
                      <th class="pt-0">Durum</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($customers as $customer)
                        <tr>
                            <td>{{$customer->id}}</td>
                            <td><img src="{{$customer->logo}}" alt=""></td>
                            <td>{{$customer->company}}</td>
                            <td>{{$customer->name}} <br>{{$customer->gsm}} </td>
                            <td>{{$customer->email}}<br>{{$customer->phone}}</td>
                            <td>{{$customer->website}}</td>
                            <td>{{$customer->country}}</td>
                            <td><span class="badge text-bg-primary">{{$customer->Offer->where('status', 2)->count()}}/{{$customer->Offer->count()}}</span></td>
                            <td><span class="badge text-bg-primary">{{$customer->Project->where('status', 2)->count()}}/{{$customer->Project->count()}}</span></td>
                            <td>{{$customer->Payment->sum('amount')}} TL</td>
                            <td>{!! $customer->status == 1 ? '<span class="badge text-bg-success">Aktif</span>' : '<span class="badge text-bg-danger">Pasif</span>' !!}<td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div> 
          </div>
    </div>
</div>
@endsection
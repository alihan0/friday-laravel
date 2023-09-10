@extends('layout.master')

@section('title', 'Tüm Teklifler')
    
@section('content')
<div class="row mb-4">
    <div class="col">
        <h4 class="card-title border-bottom pb-3">Tüm Teklifler</h4>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Müşteri</th>
                        <th scope="col">Teklif Başlığı</th>
                        <th scope="col">Fiyat</th>
                        <th scope="col">Geçerlilik Süresi</th>
                        <th scope="col text-center">Durum</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($offers as $offer)
                            <tr>
                                <td><a href="/offer/detail/{{$offer->id}}">{{$offer->id}}</a></td>
                                <td>{!! $offer->Customer->name . ' <spab class="text-muted">('. $offer->Customer->company .') </span>' !!}</td>
                                <td>{{$offer->title}}</td>
                                <td>{{$offer->project_amount}} ₺</td>
                                <td>
                                   {!! offerDuration($offer->id) !!}
                                </td>
                                <td>
                                    @if ($offer->status == 1)
                                        <span class="badge text-bg-warning text-white">Bekliyor</span>
                                    @elseif($offer->status == 2)
                                        <span class="badge text-bg-success">Onaylandı</span>
                                    @elseif($offer->status == 0)
                                        <span class="badge text-bg-danger" data-bs-toggle="tooltip" data-bs-title="{{$offer->reason}}">İptal Edildi</span>
                                    @else
                                        <span class="badge text-bg-danger" data-bs-toggle="tooltip" data-bs-title="{{$offer->reason}}">Reddedildi</span>
                                    @endif
                                </td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        
    </script>
@endsection
@extends('layout.master')

@section('title', 'Yeni Proje')


@section('style')
<link rel="stylesheet" href="/static/assets/vendors/flatpickr/flatpickr.min.css">
<link rel="stylesheet" href="/static/assets/vendors/select2/select2.min.css">

@endsection

@section('content')
    <div class="row mb-4">
        <div class="col">
            <h4 class="card-title border-bottom pb-3">Yeni Proje</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                          <label for="title" class="form-label">Proje Başlığı</label>
                          <input type="text" class="form-control" id="title" placeholder="Projenin görünen adını girin.">
                        </div>
                        <div class="mb-3">
                          <label for="detail" class="form-label">Açıklama</label>
                          <textarea class="form-control" id="detail" rows="3" placeholder="Projenin detaylarından bahsedin. (Zorunlu Değil)"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="customer" class="form-label">Müşteri</label>
                                    <select class="form-control" id="customer">
                                        <option value="0">Seçin...</option>
                                        @if ($customers->count() > 0)
                                            @foreach ($customers as $customer)
                                                <option value="{{ $customer->id }}">{{$customer->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                  </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="offer" class="form-label">Teklif</label>
                                    <select class="form-control" id="offer">
                                        <option value="0">Seçin...</option>
                                        @if ($offers)
                                            @foreach ($offers as $offer)
                                                <option value="{{ $offer->id }}">{{$offer->title}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                  </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="github" class="form-label">GitHub Repo</label>
                            <input type="text" class="form-control" id="github" placeholder="Projenin görünen adını girin.">
                          </div>
                      </form>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                          <label for="price" class="form-label">Fiyat</label>
                          <div class="input-group">
                            <input type="text" class="form-control" placeholder="Projenin fiyatı">
                            <span class="input-group-text">₺</span>
                            <span class="input-group-text">0.00</span>
                          </div>
                          
                        </div>


                        <div class="mb-3">
                            <label for="start_date" class="form-label">Başlama Tarihi</label>
                            <div class="input-group flatpickr" id="start_date">
                                <input type="text" class="form-control" placeholder="Select date" data-input>
                                <span class="input-group-text input-group-addon" data-toggle><i data-feather="calendar"></i></span>
                            </div>
                          </div>

                          <div class="mb-3">
                            <label for="dead_line" class="form-label">Teslim Tarihi</label>
                            <div class="input-group flatpickr" id="dead_line">
                                <input type="text" class="form-control" placeholder="Select date" data-input>
                                <span class="input-group-text input-group-addon" data-toggle><i data-feather="calendar"></i></span>
                            </div>
                          </div>

                          <div class="mb-3">
                            <label class="form-label" for="techstack">Teknoloji Yığını</label>
                            <select class="js-example-basic-multiple form-select" id="techstack" multiple="multiple" data-width="100%">
                                @if ($techs->count() > 0)
                                    @foreach ($techs as $tech)
                                        <option value="{{ $tech->id }}">{{$tech->title}}</option>
                                    @endforeach
                                    
                                @endif
                            </select>
                        </div>
                        
                        
                        <button type="submit" class="btn btn-primary float-end">Submit</button>
                      </form>
                </div>
            </div>
        </div>
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
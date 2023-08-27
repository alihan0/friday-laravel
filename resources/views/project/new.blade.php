@extends('layout.master')

@section('title', 'Yeni Proje')


@section('style')
<link rel="stylesheet" href="/static/assets/vendors/flatpickr/flatpickr.min.css">
<link rel="stylesheet" href="/static/assets/vendors/select2/select2.min.css">

@endsection

@section('content')
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
                          <textarea class="form-control" id="detail" rows="5" placeholder="Projenin detaylarından bahsedin. (Zorunlu Değil)"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="offer" class="form-label">Müşteri</label>
                                    <select class="form-control" id="offer">
                                        <option value="0">Seçin...</option>
                                    </select>
                                  </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="offer" class="form-label">Teklif Dokümanı</label>
                                    <select class="form-control" id="offer">
                                        <option value="0">Seçin...</option>
                                    </select>
                                  </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
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
                            <div class="input-group flatpickr" id="flatpickr-date">
                                <input type="text" class="form-control" placeholder="Select date" data-input>
                                <span class="input-group-text input-group-addon" data-toggle><i data-feather="calendar"></i></span>
                            </div>
                          </div>

                          <div class="mb-3">
                            <label for="start_date" class="form-label">Teslim Tarihi</label>
                            <div class="input-group flatpickr" id="flatpickr-date">
                                <input type="text" class="form-control" placeholder="Select date" data-input>
                                <span class="input-group-text input-group-addon" data-toggle><i data-feather="calendar"></i></span>
                            </div>
                          </div>

                          <div class="mb-3">
                            <label class="form-label">Teknoloji Yığını</label>
                            <select class="js-example-basic-multiple form-select" multiple="multiple" data-width="100%">
                                <option value="TX">Texas</option>
                                <option value="WY">Wyoming</option>
                                <option value="NY">New York</option>
                                <option value="FL">Florida</option>
                                <option value="KN">Kansas</option>
                                <option value="HW">Hawaii</option>
                            </select>
                        </div>
                        
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
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
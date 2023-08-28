@extends('layout.master')

@section('title', 'Tüm Projeler')


@section('style')
<link rel="stylesheet" href="/static/assets/vendors/flatpickr/flatpickr.min.css">
<link rel="stylesheet" href="/static/assets/vendors/select2/select2.min.css">

@endsection

@section('content')
    <div class="row mb-4">
        <div class="col">
            <h4 class="card-title border-bottom pb-3">Tüm Projeler</h4>
        </div>
    </div>
    

      <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Proje</th>
                            <th scope="col">Başlama T.</th>
                            <th scope="col">Teslim T.</th>
                            <th scope="col">Geçen Süre</th>
                            <th scope="col">Gerekli Z.</th>
                            <th scope="col">Kalan Z.</th>
                          </tr>
                        </thead>
                        <tbody>
                         
                            @foreach ($projects as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->title}}</td>
                                    <td>{{$item->start_at}}</td>
                                    <td>{{$item->dead_line}}</td>
                                    <td>{{$item->passing_time}}</td>
                                    <td>{{$item->required_time}}</td>
                                    <td>0</td>
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
<script src="/static/assets/vendors/flatpickr/flatpickr.min.js"></script>
<script src="/static/assets/vendors/select2/select2.min.js"></script>
<script src="/static/assets/js/select2.js"></script>
<script src="/static/assets/js/flatpickr.js"></script>
    <script>

    </script>
@endsection
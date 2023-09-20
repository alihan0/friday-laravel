@extends('layout.master')

@section('title', 'Teklif Detayları')

@section('style')
<link rel="stylesheet" href="https://printjs-4de6.kxcdn.com/print.min.css">

@endsection

@section('content')
<div class="row mb-4">
  <div class="col">
      <h4 class="card-title border-bottom pb-3 mb-3">{{$offer->title}}</h4>
  </div>


  <div class="row mb-4">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h4 class="border-bottom mb-3 pb-3">1 - Giriş</h4>

          <p class="text-muted mb-3">
            İşbu proje teklif dosyası <b>{{$offer->Customer->name}}</b> için özel olarak oluşturulmuştur. Proje kapsamında ortaya çıkacak olan tüm <b>çıktı</b>lar tarafına ait olup, herhangi bir sebeple izinsiz kopyalanmayacak, ücretli olarak satılmayacak ya da ücretsiz olarak dağıtılmayacaktır. İşbu çıktıların tamamı <b>{{$offer->Customer->name}}</b>'nın şahsına ait olup, üretildiği andan itibaren yayınlanması, dağıtılması ve/veya telif haklarının korunması kendi sorumluluğundadır.
          </p>
          <p class="text-muted mb-3">
            İşbu proje teklif dosyası, yüksek gizlilik korumasındadır ve hiçbir şekilde üçüncü şahıslarla, kişi ve kurumlarla paylaşılamaz. Teklif dosyasının içeriği özel proje detayları içerdiğinden dolayı dosyanın paylaşılması halinde fikri hakların ihlaline sebep olunabilir. Bu durumda sorumluluk dosyayı paylaşan kişiye aittir.
          </p>
          <p class="text-muted mb-3">
            <b>{{$offer->Customer->name}}</b>, teknik alanda danışmanlık aldığı kişi ve kurumlar ile işbu teklif dosyasını inceleyebilir ve değerlendirebilir. Bu değerlendirlemeler sonucunda oluşabilecek bilgi güvenliğinden kendisi sorumludur.
          </p>
          <hr>
          <p class="text-muted mb-3">
            <b>Çıktı:</b> İşbu proje kapsamında isteğe özel olarak üretilecek olan yazılım, tasarım, görsel, video, yazı algoritma vb. tüm görsel, işitsel ve yazılımsal materyalların tamamı.
          </p>
        </div>
      </div>
    </div>
  </div>

  <div class="row mb-4">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h4 class="border-bottom mb-3 pb-3">2 - Proje Detayları</h4>
            {!! $offer->detail !!}
        </div>
      </div>
    </div>
  </div>

  <div class="row mb-4">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h4 class="border-bottom mb-3 pb-3">3 - Proje Teknik Özellikleri</h4>
            {!! $offer->panels !!}
        </div>
      </div>
    </div>
  </div>

  <div class="row mb-4">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h4 class="border-bottom mb-3 pb-3">4 - Teknoloji Yığınları</h4>
            

          <div class="row">
            <div class="col-3">
              <ul class="list-group">
                <li class="list-group-item active" style="font-size:1.3rem">Front-end (Ön Uç)</li>
                @foreach ($frontend as $item)
                  <li class="list-group-item">{{$item}}</li>
                @endforeach
              </ul>
            </div>
            <div class="col-3">
              <ul class="list-group">
                <li class="list-group-item active" style="font-size:1.3rem">Back-end (Arka Uç)</li>
                @foreach ($backend as $item)
                  <li class="list-group-item">{{$item}}</li>
                @endforeach
              </ul>
            </div>
            <div class="col-3">
              <ul class="list-group">
                <li class="list-group-item active" style="font-size:1.3rem">Veritabanı</li>
                @foreach ($db as $item)
                  <li class="list-group-item">{{$item}}</li>
                @endforeach
              </ul>
            </div>
            <div class="col-3">
              <ul class="list-group">
                <li class="list-group-item active" style="font-size:1.3rem">Güvenlik</li>
                @foreach ($security as $item)
                  <li class="list-group-item">{{$item}}</li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

@endsection


@section('script')

<script>


</script>

@endsection
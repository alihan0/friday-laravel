@extends('layout.master')

@section('title', 'Teklif Detayları')

@section('style')
<link rel="stylesheet" href="https://printjs-4de6.kxcdn.com/print.min.css">

<style>
  @media print {
  body {
    width: 21cm;
    height: 29.7cm;
    margin: 0 auto;
    font-size: 12pt;
  }

  .card {
    page-break-inside: avoid;
  }
}

</style>
@endsection

@section('content')


<div class="row" id="print">
  
  <div class="col text-center border-bottom pb-3 mb-3">
    <img src="{{$system->logo}}" class="mx-auto" alt="{{$system->company_name}}" width="200px">
    <h2 class="card-title  pb-3 mb-3">{{$offer->title}}</h2>

    <div class="float-end" style="font-size:12px;"><span>{{$offer->created_at}} </span> | <span class="badge text-bg-{{ ($offer->status == 1 ? 'warning' : ($offer->status == 2 ? 'danger' : ($offer->status == 3 ? 'success' : 'secondary'))) }}">{{ ($offer->status == 1 ? 'Bekliyor' : ($offer->status == 2 ? 'Reddedildi' : ($offer->status == 3 ? 'Onaylandı' : 'İptal Edildi'))) }}</span></div>
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
            <div class="col-4">
              <ul class="list-group mb-3">
                <li class="list-group-item active" style="font-size:1.3rem">Front-end (Ön Uç)</li>
                @foreach ($frontend as $item)
                  <li class="list-group-item">{{$item}}</li>
                @endforeach
              </ul>
            </div>
            <div class="col-4">
              <ul class="list-group mb-3">
                <li class="list-group-item active" style="font-size:1.3rem">Back-end (Arka Uç)</li>
                @foreach ($backend as $item)
                  <li class="list-group-item">{{$item}}</li>
                @endforeach
              </ul>
            </div>
            <div class="col-4">
              <ul class="list-group mb-3">
                <li class="list-group-item active" style="font-size:1.3rem">Veritabanı</li>
                @foreach ($db as $item)
                  <li class="list-group-item">{{$item}}</li>
                @endforeach
              </ul>
            </div>
            <div class="col-4">
              <ul class="list-group mb-3">
                <li class="list-group-item active" style="font-size:1.3rem">Güvenlik</li>
                @foreach ($security as $item)
                  <li class="list-group-item">{{$item}}</li>
                @endforeach
              </ul>
            </div>
            <div class="col-4">
              <ul class="list-group mb-3">
                <li class="list-group-item active" style="font-size:1.3rem">API & Bağlantılar</li>
                <li class="list-group-item">CURL</li>
                <li class="list-group-item">Axios</li>
                <li class="list-group-item">Ajax</li>
              </ul>
            </div>
            <div class="col-4">
              <ul class="list-group mb-3">
                <li class="list-group-item active" style="font-size:1.3rem">Versiyon Kontrol</li>
                <li class="list-group-item">Git</li>
                <li class="list-group-item">GitHub</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row mb-4">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h4 class="border-bottom mb-3 pb-3">4 - Sistem Gereksinimleri</h4>
            

            <div class="row">
              <div class="col-6">
                <ul class="list-group mb-3">
                  <li class="list-group-item active" style="font-size:1rem">Minimum Sistem Özellikleri</li>
                  <li class="list-group-item"><b>İşletim Sistemi:</b> Ubuntu & Centos 7</li>
                  <li class="list-group-item"><b>Ram:</b> 2 GB</li>
                  <li class="list-group-item"><b>Disk:</b> 10 GB</li>
                  <li class="list-group-item"><b>İşlemci:</b> 2x1 Core</li>
                  <li class="list-group-item"><b>Trafik:</b> Limitsiz</li>
                  <li class="list-group-item"><b>PHP:</b> 8.1</li>
                </ul>
              </div>
              <div class="col-6">
                <ul class="list-group mb-3">
                  <li class="list-group-item active" style="font-size:1rem">Tavsiye Edilen Sistem Özellikleri</li>
                  <li class="list-group-item"><b>İşletim Sistemi:</b> Ubuntu & Centos 7</li>
                  <li class="list-group-item"><b>Ram:</b> 8 GB</li>
                  <li class="list-group-item"><b>Disk:</b> 100 GB SSD</li>
                  <li class="list-group-item"><b>İşlemci:</b> 4x2 Core</li>
                  <li class="list-group-item"><b>Trafik:</b> Limitsiz</li>
                  <li class="list-group-item"><b>PHP:</b> 8.1</li>
                </ul>
              </div>
            </div>

            
        </div>
      </div>
    </div>
  </div>
  <div class="row mb-4">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h4 class="border-bottom mb-3 pb-3">4.1 - Proje Yayınlama</h4>
          <p class="text-muted mb-4">
            İşbu projenin yayınlanması ve aktif olarak kullanılması için sunucu kullanımı gerekmektedir. Sunucular, herhangi bir servis sağlayıcan alınacak olan <b>VPS</b>, <b>VDS</b> ya da <b>Dedicated Sunucular</b> olabilir fakat <b>Google Cloud</b>, <b>Amazon AWS</b>, <b>Alibaba Cloud</b>, <b>Digital Ocean</b> gibi uluslararası ölçeklenebilir bulut sunucu hizmeti veren firmalardan alınması tavsiye edilir. Alınması gereken sunucun özellikleri aşağıdaki gibi olmalıdır.
          </p>
          <p class="text-muted mb-3">
            Konfigüre edilen sunuu özellikler yukarıdaki gibidir. Sorunssuz kurulum sağlanabilmesi için teslim sürecinde <code>Hosting Kontrol Paneli</code> ve <code>SSH Kullanıcısı</code> bilgilerinizi iletmiş olmanız gerekmektedir. Bu bilgilerin sağlanamaması durumunda sunucu kurulumu tamamlanamaz/yapılamaz. Tercih edilen sunucunun <code>Dikey Ölçeklenebilirliği</code> projenizin geleceği açaısından önemlidir. İstenildiği zaman sunucunun cpu, ram ve disk kapasitelerini artırabiliyor olmanız sağlıklı bir proje için elzemdir. Çok fazla dosya/resim yükleme işlemi yapılmadığı durumlarda <code>100 GB SSD</code> disk, proje için fazlasıyla büyük bir alandır ve virüs bulaşmadığı sürece dolmasını beklemeyiz. Bu disk alanına birden fazla proje kurmanız da mümkün olacak ve sorun çıkmayacaktır. Yine de gerektiği durumlarda ram ve cpu'nun artırılma ihtiyacı olabilir.
          </p>
          <p class="text-muted mb-3">
            Sunucuda <code>Cpanel</code>, <code>DirectAdmin</code>, <code>Plesk Panel</code> ya da <code>Cyber Panel</code> gibi hosting kontrol panellerinden herhangi birini kullanabilirsiniz. Bu kontrol yazılımları arasında <code>Cpanel</code> ya da <code>DirectAdmin</code> kullanmanız, kolay yönetilebilirlik açısından tavsiye ettiğimiz kontrol yazılımlarıdır. Burada dikkat etmeniz gereken konu ise, kontrol yazılımlarının lisanslarıdır. Sunucuda barındıracağınız websitesi ya da proje sayısında göre bir lisans temin etmeli ya da ücretsiz bir panel kullanmalısınız. Ücretsiz kontrol yazılımı ya da illegal lisans kullanımında oluşuabilecek olumsuzluklardan kendiniz sorumlu olacaksınız. 
          </p>
          <p class="text-muted mb-3">
            Hazırlancak sistemde size sadece yazılım tarafında güvenlik sağlayacağımızı unutmayın, sunucu tarafındaki güvenlikten siz sorumlusunuz ve oluşabilecek güvenlik açıklarından ya da saldırılardan sunucunuzu korumanız gerekmektedir. Bu tür güvenlik açıklarından dolayı olabilecek yazılımsal problemler için destek verememekteyiz.
          </p>
          <p class="text-muted mb-3">
            Barındırma sunucusu olarak <code>Paylaşımlı Hosting (Shared Hosting)</code> kullanamazsınız. Geliştirdiğimiz projeler kompleks sistemlerdir ve yoğun güç gereksinimleri vardır. Aynı zamanda terminal komutlarına erişim gerekmektedir. Paylaşımlı hostinglerde aynı makinede binlerce web sitesi barındırıldığından dolayı proje için yeterli kaynak ayrılması mümkün değildir ve termial erişiminiz bulunmaz. Bu yüzden paylaşımlı hostinglere kurulum yapmamaktayız. Eğer bize teslim ettiğiniz bilgiler bir paylaşımlı hostinge ait ise, kurulum tamamlanmayacak ve iptal edilecektir. Projeyi paylaşımlı hostinge kendiniz kurmanız ve/veya kurdurmanız durumunda ücretsiz teknik destek hakkınızı kaybedersiniz ve proje için yardım ve güncelleme alamazsınız.
          </p>
        </div>
      </div>
    </div>
  </div>
  

  

  <div class="row mb-4">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h4 class="border-bottom mb-3 pb-3">5 - Geliştirme & Güncelleme</h4>
            <p class="text-muted mb-3">
              Projeniz teslim edildikten sonra ihtiyacınız olan ek geliştirmeler ve özellikler için %50 indirim uygulanır ya da insiyatif kullanılarak ücret talep edilmez. Ücret talep edilmeme durumu istediğiniz özelliğin ya da geliştirmenin yapısına bağlı olarak değişir. Genellikle 4 saati geçmeyecek olan talepleriniz için müsaitlik durumumuz olduğu sürece ekstra ücret talep etmemeyi tercih ediyoruz. 
            </p>
            <p class="text-muted mb-3">
              Zaman içerisinde teknoloji gelişmeye devam ediyor ve bundan kaynaklı olarak kullandığımız teknolojiler değişiyor ya da desteğini yitiriyor. Örneğin <code>PHP 8</code> teknolojisi ile birlikte <code>mysql_query</code> komutları kaldırıldı ve veritabanına erişimi kesildi. Bu yöntemi kullanan tüm siteler hata aldı ve çalışmayı durdurdu. Bunun gibi durumlar için sürekli olarak projelerimizi takip ediyoruz ve gerekli durumlarda <u>ek güncelleme paketleri</u> yayınlıyoruz. Bu paketler için doğrudan iletişim kanalları aracılığıyla bilgilendirilirsiniz ya da sosyal medya hesaplarımızdan ve web sitemizden duyuru yayınlarınız. Yayınladığımız bu ek paketleri kabul etmeniz durumunda projenize ücretsiz kurulumu sağlanır ve güvenli bir şekilde kullanmaya devam edersiniz.
            </p>
            <p class="text-muted mb-3">
              <b>Not:</b> ek güncelleme paketlerini almaya devam etmek için <code>Ücretsiz Teknik Destek</code>, <code>Ücretli Teknik Destek</code> ya da <code>Ömür Boyu Garanti</code> haklarınızdan en az birinin devam etmesi gerekiyor. Bu haklarınızı yalnızca size önceden bildirilmiş kullanım şartlarından bir ya da birkaçını ihlal etmeniz durumunda kaybedersiniz. Bu durumlar haricinde, ücretsiz haklarınız kendiliğinden geçerli olur. Ücretli teknik destek almak ya da ek hizmet talep etmek için iletişime geçebilirsiniz.
            </p>
        </div>
      </div>
    </div>
  </div>

  <div class="row mb-4">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h4 class="border-bottom mb-3 pb-3">6 - Yedekleme, Yedek Yükeleme & Kurulum</h4>
            <p class="text-muted mb-3">
              Projeniz size teslim edildiği tarihten itibaren 1 (bir) yıl süreyle ücretsiz teknik destek hakkınız başlayacak ve bu teknik destek kapsamında, yılda 2 kere yedek alma ve yedek yükleme hakkınız bulunmaktadır. Talep ettiğiniz herhangi bir zaman diliminde (1 yıl içerisinde) bu hakkınızı iki kez kullanabilirsiniz. 
            </p>
            <p class="text-muted mb-3">
              Ücretsiz teknik destek hakkınız kapsamında, 2 kere sıfırdan kurulum hakkınız bulunmaktadır. Talep ettiğiniz herhangi bir zaman diliminde (1 yıl içerisnde) projenisi 2 kereye kadar sıfırdan kurdurabilirsiniz. Bu talebinizin yerine getirilmesi için kurulum şartlarını sağlanmanız gerekmetedir. 
            </p>
            <p class="text-muted mb-3">
              Ücretsiz teknik destek hakkınız kapsamında, projenizin ham dosyaları ve alınan yedekler taramızca 5 yıla kadar saklanır. Dosyalar saklandığı sürece istediğiniz zaman talep edebilirsiniz ve bunun ekstra ücret ödemezsiniz. Ücretsiz teknik destek hakkınız bittikten sonra yedek alma talepleriniz ek ücrete tabi olacaktır. Kendi aldığınız yedekleri ücretsiz teknik destek hakkınızın kapsamı dışıda kurulum talep edebilirsiniz. Yedekleme formatınız doğru olduğu sürece ücreti mukabilinde kurulum yaptırabilirsiniz.
            </p>
        </div>
      </div>
    </div>
  </div>

  <div class="row mb-4">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h4 class="border-bottom mb-3 pb-3">6.1 - Proje Lisansı</h4>
            <p class="text-muted mb-3">
              Geliştirilen proje 1 (bir) alan adı ile sınırlıdır ve belirttiğiniz alan adına lisanslanır. Bu lisansı dilediğiniz zaman değiştirmeyi talep edebilir ve farklı bir alan adı ve/veya sunucuya kurulum sağlayabilirsiniz fakat sistem aynı anda sadece 1 alan adında yayında kalabilir. Test sunucuları haricinde aynı projeyi birden fazla kopya ile kullanmanıza izin verilemeyecektir ve böyle bir kurulum talebinde bulunamazınız. Projenin tüm telif hakları size ait olduğundan dolayı projeyi istediğiniz kadar kopyalabilir ve kurulumunu kendiniz gerçekleştirebilirsiniz. Bunun için herhangi bir şekilde yazılıma müdehale etmiyoruz ya da kontrol etmiyoruz fakat bunun tespiti halinde tüm ücretsiz haklarınız ve garantileriniz sonlanır. Kopya kullanımından dolayı yaşanabilecek herhangi bir sorundan ya da yasal yükümlülükten bizi sorumlu tutamazsınız ya da destek talep edemezsiniz.
            </p>
        </div>
      </div>
    </div>
  </div>
  <div class="row mb-4">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h4 class="border-bottom mb-3 pb-3">7 - Süre ve Fiyatlandırma</h4>
            <p class="text-muted mb-3">
              İşbu teklif dosyasında detayları belirtilen proje aşağıdaki süre ve fiyatlandırma kapsamında geçerliliğini korumaktadır. Burada belirtilen sürelerin tahmini süreler olduğunu unutmayın. Bu sürelere ek olarak 15 (on beş) iş günü <code>Test Süresi</code> ve 15 (on beş) iş günü <code>Teslim Süresi</code> eklenebilir. Burada belirtilen süreler, işbu dokümanda detayları belirtilen yazılım projesi içindir ve bu sürelere kurulum süreleri dahil değildir.
            </p>
            <ul class="list-group mb-3 col-6">
              
              <li class="list-group-item d-flex justify-content-between"><b>Proje Süresi</b> {{$offer->project_time}} Gün</li>
              <li class="list-group-item d-flex justify-content-between"><b>Tahmini Teslim Tarihi:</b> {{$offer->delivery_date}}</li>
              <li class="list-group-item d-flex justify-content-between"><b>Proje Ücreti:</b> {{$offer->project_amount}} {{$offer->currency ?? "TL"}}</li>
              <li class="list-group-item d-flex justify-content-between"><b>Ön Ödeme Tutarı:</b> {{$offer->first_amount}} {{$offer->curreny ?? "TL"}}</li>
              <li class="list-group-item d-flex justify-content-between"><b>Son Ödeme Tutarı:</b> {{$offer->delivery_amount}} {{$offer->currency ?? "TL"}}</li>
            </ul>

            <p>
              <b>
                İşbu proje teklifi {{$offer->validity_time}} iş günü için geçerlidir. Proje süresi, teklifin onaylandığı tarihten itibaren geçerlidir ve tahimini teslim tarihi bu tarihten sonra hesaplanır.
              </b>
            </p>
        </div>
      </div>
    </div>
  </div>

  <div class="row mb-4">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h4 class="border-bottom mb-3 pb-3">8 - Teslim</h4>
            <p class="text-muted mb-3">
              İşbu proje, tamamlandıktan sonra GitHub üzerinden teslim edilecektir. Bilgileri sağlanan sunucuya kurulumu tamamlandıktan sonra <code>Proje Dosyaları</code> ve <code>Geliştirme Dokümanı</code> ile birlikte teslim edilecektir. Bu geliştirme dokümanı projenin geliştirilmesine devam edebilmek için gerekli olan tüm referanslar yer almaktadır ve projeyi geliştirmeye devam edecek olan geliştiricinin niteliklerini belirtir. Bu niteliklere sahip herhangi bir geliştirici ile çalışarak projeyi geliştirmeye devam edebilirsiniz (bunun garanti kapsamını sonlandıracağını unutmayın).
            </p>
        </div>
      </div>
    </div>
  </div>

  <div class="row mb-4">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h4 class="border-bottom mb-3 pb-3">8.1 - Teslim Şartları</h4>
            <p class="text-dark mb-3"><b>İşbu teklif dosyası, aynı zamanda projenin garanti belgesi niteliğindedir.</b></p>
            <p class="text-dark mb-3"><b>İşbu teklif dosyası, {{$offer->validity_time}} iş günü için geçerli olup, {{$offer->Customer->name}} adına özel olarak düzenlenmiştir. Üçüncü şahıslarla paylaşılamaz ve/veya devredilemez.</b></p>
        </div>
      </div>
    </div>
  </div>

  <div class="row mb-4 ">
    <div class="col">
        <div class="card">
            <div class="card-body ">

                <div class="row align-items-center">
                    <div class="col-3 text-center">
                        <img src="{{$system->logo}}" alt="{{$system->company_name}}" width="100%">
                    </div>
                    <div class="col-3">
                        <b class="align-items-center">{{$system->company_name}}</b>
                        <p>{{$system->website ?? ""}}</p>
                        <p>{{$system->company_phone ?? ""}}</p>
                        <p>{{$system->company_email ?? ""}}</p>
                    </div>
                    <div class="col-3">
                        <b>{{$system->contact_person}}</b>
                        <p>{{$system->person_phone ?? ""}}</p>
                        <p>{{$system->person_email ?? ""}}</p>
                    </div>

                    <div class="col-3">
                        <div class="row">
                            <div class="col-12">
                                <p class="mb-2">{!! $system->facebook ? '<img src="/static/assets/images/icons/facebook.png" alt="" width="20px"> /'.$system->facebook : '' !!}</p>
                                <p class="mb-2">{!! $system->twitter ? '<img src="/static/assets/images/icons/twitter.png" alt="" width="20px"> /'.$system->twitter : '' !!}</p>
                                <p class="mb-2">{!! $system->instagram ? '<img src="/static/assets/images/icons/instagram.png" alt="" width="20px"> /'.$system->instagram : '' !!}</p>
                            </div>

                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                {{$system->company_address ?? ""}}
            </div>
        </div>
    </div>
</div>



</div>

<div class="row">
  <div class="col text-end">
    <button type="button" class="btn btn-success me-1 {{$offer->status == 3 ? "d-none" : ""}}" onclick="confirmOffer({{$offer->id}})">Teklifi Onayla</button>
    <button type="button" class="btn btn-danger me-1 {{$offer->status == 2 ? "d-none" : ""}}" onclick="rejectOffer({{$offer->id}})">Teklifi Reddet</button>
    <button type="button" class="btn btn-secondary me-1 {{$offer->status == 0 ? "d-none" : ""}}" onclick="cancelOffer({{$offer->id}})">İptal Et</button>
    <button type="button" class="btn btn-primary" id="printPDF">
      <i data-feather="printer"></i>
    </button>
  </div>
</div>

@endsection


@section('script')
<script src="https://doersguild.github.io/jQuery.print/jQuery.print.js"></script>
<script>

$("#printPDF").on("click", function(){
  $("#print").print();
});

function confirmOffer(id){
  axios.post('/offer/confirm/', {id:id}).then((res)=>{
    toastr[res.data.type](res.data.message);
    if(res.data.status){
      window.location.reload();
    }
  })
}

function rejectOffer(id){
  axios.post('/offer/reject', {id:id}).then((res) => {
    toastr[res.data.type](res.data.message);
    if(res.data.status){
      window.location.reload();
    }
  });
}

function cancelOffer(id){
  axios.post('/offer/cancel', {id:id}).then((res) => {
    toastr[res.data.type](res.data.message);
    if(res.data.status){
      window.location.reload();
    }
  });
}

</script>

@endsection
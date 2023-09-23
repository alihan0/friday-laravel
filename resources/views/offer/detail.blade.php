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
          <h4 class="border-bottom mb-3 pb-3">4 - Proje Yayınlama</h4>
            <p class="text-muted mb-4">
              İşbu projenin yayınlanması ve aktif olarak kullanılması için sunucu kullanımı gerekmektedir. Sunucular, herhangi bir servis sağlayıcan alınacak olan <b>VPS</b>, <b>VDS</b> ya da <b>Dedicated Sunucular</b> olabilir fakat <b>Google Cloud</b>, <b>Amazon AWS</b>, <b>Alibaba Cloud</b>, <b>Digital Ocean</b> gibi uluslararası ölçeklenebilir bulut sunucu hizmeti veren firmalardan alınması tavsiye edilir. Alınması gereken sunucun özellikleri aşağıdaki gibi olmalıdır.
            </p>

            <div class="row mb-4">
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
            <p class="text-muted mb-3">
              Geliştirilen proje 1 (bir) alan adı ile sınırlıdır ve belirttiğiniz alan adına lisanslanır. Bu lisansı dilediğiniz zaman değiştirmeyi talep edebilir ve farklı bir alan adı ve/veya sunucuya kurulum sağlayabilirsiniz fakat sistem aynı anda sadece 1 alan adında yayında kalabilir. Test sunucuları haricinde aynı projeyi birden fazla kopya ile kullanmanıza izin verilemeyecektir ve böyle bir kurulum talebinde bulunamazınız. Projenin tüm telif hakları size ait olduğundan dolayı projeyi istediğiniz kadar kopyalabilir ve kurulumunu kendiniz gerçekleştirebilirsiniz. Bunun için herhangi bir şekilde yazılıma müdehale etmiyoruz ya da kontrol etmiyoruz fakat bunun tespiti halinde tüm ücretsiz haklarınız ve garantileriniz sonlanır. Kopya kullanımından dolayı yaşanabilecek herhangi bir sorundan ya da yasal yükümlülükten bizi sorumlu tutamazsınız ya da destek talep edemezsiniz.
            </p>
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
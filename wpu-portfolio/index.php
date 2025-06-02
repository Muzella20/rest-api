<?php
function get_CURL($url)
{
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  $result = curl_exec($curl);
  curl_close($curl);
  
return json_decode($result, true);
}

// YT API

$result = get_CURL( 'https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id=UCdPfnImylUq8zH7dQZtlizw&key=AIzaSyD8kbqRe8JTLdAdaRsEJT974FnQPVM-QPo');

$youtubeProfilePic = $result['items'][0]['snippet']['thumbnails']['medium']['url'];
$channelName = $result['items'][0]['snippet']['title'];
$subscriber = $result['items'][0]['statistics']['subscriberCount'];

// latest video
$urlLatestVideo = 'https://www.googleapis.com/youtube/v3/search?key=AIzaSyD8kbqRe8JTLdAdaRsEJT974FnQPVM-QPo&channelId=UCdPfnImylUq8zH7dQZtlizw&maxResults=1&order=date&part=snippet';
$result = get_CURL($urlLatestVideo);
$LatestVideoId = $result['items'][0]['id']['videoId'];

// Instagram API
$clientId = '17841406729669895';
$accessToken = 'IGAAYCOdgS7kZABZAE9yQ2RfZA25heEt0TVlfVWFDckRxeVdoZAmdvc19jY2NHVkJnbEhNQkhCUm9PdlVOWHBtbDhmQWF6VFFwZA001WVdUd2szTG9DcVNNanhwRjRQQmlPZAFpIV2ZA4ckFVS0E2Q3NqVmVrMldRV1p2ODVMWUQ4XzBSbwZDZD';

$result = get_CURL('https://graph.instagram.com/17841406729669895/?fields=username,profile_picture_url,followers_count&access_token=IGAAYCOdgS7kZABZAE9yQ2RfZA25heEt0TVlfVWFDckRxeVdoZAmdvc19jY2NHVkJnbEhNQkhCUm9PdlVOWHBtbDhmQWF6VFFwZA001WVdUd2szTG9DcVNNanhwRjRQQmlPZAFpIV2ZA4ckFVS0E2Q3NqVmVrMldRV1p2ODVMWUQ4XzBSbwZDZD');
$usernameIG = $result['username'];
$profilePictureIG = $result['profile_picture_url'];
$followersIG = $result['followers_count'];

// latest IG Post
$result = get_CURL('https://graph.instagram.com/17841406729669895/media?fields=id,caption,media_type,media_url,timestamp&access_token=IGAAYCOdgS7kZABZAE9yQ2RfZA25heEt0TVlfVWFDckRxeVdoZAmdvc19jY2NHVkJnbEhNQkhCUm9PdlVOWHBtbDhmQWF6VFFwZA001WVdUd2szTG9DcVNNanhwRjRQQmlPZAFpIV2ZA4ckFVS0E2Q3NqVmVrMldRV1p2ODVMWUQ4XzBSbwZDZD');

$photos = [];
foreach ($result['data'] as $photo) {
  $photos[] = $photo['media_url'];
}


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- My CSS -->
    <link rel="stylesheet" href="css/style.css">

    <title>My Portfolio</title>
  </head>
  <body>
    

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#home">Muzella Sabilla Risma</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#portfolio">Portfolio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#myproject">My Project</a>
            </li>

          </ul>
        </div>
      </div>
    </nav>


    <div class="jumbotron" id="home">
      <div class="container">
        <div class="text-center">
          <img src="img/profile33.jpg" width="200" class="rounded-circle img-thumbnail">
          <h1 class="display-4">Muzella Sabilla Risma</h1>
          <h3 class="lead">Student | Programmer | Youtuber</h3>
        </div>
      </div>
    </div>


    <!-- About -->
    <section class="about" id="about">
      <div class="container">
        <div class="row mb-4">
          <div class="col text-center">
            <h2>About</h2>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-5">
            <p>Saya adalah mahasiswa yang memiliki ketertarikan besar dalam bidang analisis data. Bagi saya, data bukan hanya sekumpulan angka, tetapi sumber informasi berharga yang bisa diolah menjadi wawasan strategis. Dalam proses belajar, saya terbiasa menggunakan berbagai tools untuk mengolah dan memvisualisasikan data agar lebih mudah dipahami dan bermanfaat dalam pengambilan keputusan.</p>
          </div>
          <div class="col-md-5">
            <p>Melalui beberapa proyek pribadi dan akademik, saya telah mengembangkan kemampuan dalam menganalisis tren, menyusun laporan berbasis data, serta menyampaikan hasil analisis dengan visualisasi yang informatif. Saya percaya bahwa kemampuan membaca data secara kritis akan menjadi salah satu keahlian penting dalam menghadapi tantangan dunia digital yang terus berkembang.</p>
          </div>
        </div>
      </div>
    </section>


 <!-- Social Media -->  
<section class="social bg-light" id="social">
  <div class="container">
    <div class="row pt-4 mb-4">
      <div class="col text-center">
        <h2>Social Media</h2>
      </div>
    </div>

    <div class="row justify-content-center">
      <!-- Kolom 1: YouTube -->
      <div class="col-md-5">
        <div class="row">
          <div class="col-md-4">
            <img src="<?= $youtubeProfilePic; ?>" width="200" class="rounded-circle img-thumbnail">
          </div>
          <div class="col-md-8">
            <h5><?= $channelName; ?></h5>
            <p><?= $subscriber; ?> Subscribers.</p>
            <div class="g-ytsubscribe" data-channelid="UCdPfnImylUq8zH7dQZtlizw" data-layout="default" data-count="default"></div>
          </div>
        </div>
        <div class="row mt-3 pb-3">
          <div class="col">
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $LatestVideoId?>" allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </div>

      <!-- Kolom 2: Instagram -->
       <div class="col-md-5">
            <div class="row">
              <div class="col-md-4">
                <img src="<?= $profilePictureIG; ?>" width="200" class="rounded-circle img-thumbnail">
              </div>
              <div class="col-md-8">
                <h5><?= $usernameIG; ?></h5>
                <p><?= $followersIG; ?> Followers.</p>
              </div>
            </div>

            <div class="row mt-3 pb-3">
              <div class="col">
                <?php foreach ($photos as $photo) : ?>
                <div class="ig-thumbnail">
                  <img src="<?= $photo; ?>">
                </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
</section>



    <!-- Portfolio -->
    <section class="portfolio " id="portfolio">
      <div class="container">
        <div class="row pt-4 mb-4">
          <div class="col text-center">
            <h2>Portfolio</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/portfolio/2.jpg" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">Menganalisis data Covid-19 pada tahun 2020 dengan menggunakan Tools Loker Studio .</p>
              </div>
            </div>
          </div>

          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/portfolio/1.jpg" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">Kerja Praktek di Bank Nagari Pusat Pengambiran pada Divisi Teknologi & Digitalisasi pada bagian IT Support.</p>
              </div>
            </div>
          </div>

          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/portfolio/3.jpg" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">Menganalisis data Logbook CSS IT Support Bank Nagari tahun 2020 dengan menggunakan Tools Loker Studio .</p>
              </div>
            </div>
          </div>   
        </div>

        <div class="row">
          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/portfolio/5.png" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">Proyek Tugas Kuliah Data mining dengan data online retail menggunakan tools Rapid Miner.
                </p>
              </div>
            </div>
          </div>
          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/portfolio/4.jpeg" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">Seorang mahasiswa Universitas Islam Negri Imam Bonjol pada Fakultas Saintek dengan jurusan Sistem informasi semester 6.</p>
              </div>
            </div>
          </div> 

          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/thumbs/2.png" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">Mencoba mempelajari membuat sebuah program dengan berbagai bahasa pemograman untuk meningkatkan skill.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- My Project -->
<section class="myproject bg-light" id="myproject">
  <div class="container">
    <div class="row pt-4 mb-4">
      <div class="col text-center">
        <h2>My Project</h2>
        <p class="text-muted">Kumpulan project sederhana saya menggunakan PHP, JSON, dan REST API.</p>
      </div>
    </div>

    <div class="row justify-content-center">
      <!-- Project: JSON -->
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
          <img class="card-img-top" src="img/project/1.png" width="50" alt="JSON Project">
          <div class="card-body text-center">
            <h5 class="card-title">JSON</h5>
            <p class="card-text">Folder berisi file JSON untuk latihan REST API.</p>
            <a href="http://localhost/rest-api/json" target="_blank" class="btn btn-primary">Lihat Project</a>
          </div>
        </div>
      </div>

      <!-- Project: WPU Hut -->
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
          <img class="card-img-top" src="img/project/2.png" width="50" alt="WPU Hut">
          <div class="card-body text-center">
            <h5 class="card-title">WPU Hut</h5>
            <p class="card-text">Project sederhana untuk belajar REST API dasar.</p>
            <a href="http://localhost/rest-api/wpu-hut" target="_blank" class="btn btn-primary">Lihat Project</a>
          </div>
        </div>
      </div>

      <!-- Project: WPU Movie -->
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
          <img class="card-img-top" src="img/project/3.jpg " width="50" alt="WPU Movie">
          <div class="card-body text-center">
            <h5 class="card-title">WPU Movie</h5>
            <p class="card-text">Aplikasi film yang mengambil data dari API OMDb.</p>
            <a href="http://localhost/rest-api/wpu-movie" target="_blank" class="btn btn-primary">Lihat Project</a>
          </div>
        </div>
      </div>

      <!-- Project: WPU Portfolio -->
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
          <img class="card-img-top" src="img/project/4.webp" width="50" alt="WPU Portfolio">
          <div class="card-body text-center">
            <h5 class="card-title">WPU Portfolio</h5>
            <p class="card-text">Halaman portfolio online yang menampilkan semua project saya.</p>
            <a href="http://localhost/rest-api/wpu-portfolio" target="_blank" class="btn btn-primary">Lihat Project</a>
          </div>
        </div>
      </div>

      
      <!-- Project: WPU Rest Server -->
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
          <img class="card-img-top" src="img/project/5.png" width="50" alt="WPU REST Server">
          <div class="card-body text-center">
            <h5 class="card-title">WPU REST Server</h5>
            <p class="card-text">RESTful server untuk manajemen data mahasiswa.</p>
            <a href="http://localhost/rest-api/wpu-rest-server" target="_blank" class="btn btn-primary">Lihat Project</a>
          </div>
        </div>
      </div>
      
      <!-- Project: WPU Rest Client -->
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
          <img class="card-img-top" src="img/project/6.jpeg" width="50" alt="WPU REST Client">
          <div class="card-body text-center">
            <h5 class="card-title">WPU REST Client</h5>
            <p class="card-text">Menampilkan data mahasiswa dari REST API menggunakan Client PHP.</p>
            <a href="http://localhost/rest-api/wpu-rest-client" target="_blank" class="btn btn-primary">Lihat Project</a>
          </div>
        </div>
      </div>


    </div>
  </div>
</section>


    <!-- Contact -->
    <section class="contact" id="contact">
      <div class="container">
        <div class="row pt-4 mb-4">
          <div class="col text-center">
            <h2>Contact</h2>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-4">
            <div class="card bg-primary text-white mb-4 text-center">
              <div class="card-body">
                <h5 class="card-title">Contact Me</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
            
            <ul class="list-group mb-4">
              <li class="list-group-item"><h3>Location</h3></li>
              <li class="list-group-item">My Home</li>
              <li class="list-group-item">Jl. Adinegoro no.100 ,Padang</li>
              <li class="list-group-item">West Sumatra, Indonesia</li>
            </ul>
          </div>

          <div class="col-lg-6">
            
            <form>
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email">
              </div>
              <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" class="form-control" id="phone">
              </div>
              <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" id="message" rows="3"></textarea>
              </div>
              <div class="form-group">
                <button type="button" class="btn btn-primary">Send Message</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </section>


    <!-- footer -->
    <footer class="bg-dark text-white mt-5">
      <div class="container">
        <div class="row">
          <div class="col text-center">
            <p>@muzellasabillarisma@gmail.com</p>
          </div>
        </div>
      </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="https://apis.google.com/js/platform.js"></script>            
  </body>
</html>
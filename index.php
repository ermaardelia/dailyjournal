<?php
include "koneksi.php"; 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daily Journal</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
    <link rel="icon" href="img/naturelogo.png" />
    <style>
      .section-padding {
        padding: 40px 0;
        background-color: rgb(249, 228, 231);
      }
      .section-article {
        padding: 60px 0;
        background-color: rgb(194, 194, 244);
      }
      .section-decor {
        border-top: 3px solid #ccc;
        margin: 50px 0;
      }
      .hero-section {
        background: #e8f6ff;
        padding: 100px 0;
        text-align: center;
      }
      .hero-section h1 {
        font-size: 3rem;
        color: #007bff;
      }
  

    </style>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
      <div class="container">
        <a class="navbar-brand" href="#">My Daily Journal</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto fs-4">
            <li class="nav-item">
              <a class="nav-link" href="#home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#gallery">Gallery</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#article">Article</a>
            <li class="nav-item">
              <a class="nav-link" href="#schedule">Schedule</a>
            <li class="nav-item">
              <a class="nav-link" href="#profile">Profile</a>
              <li class="nav-item">
                <a class="nav-link" href="logout.php">Login</a>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-section">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <img src="img/indonesia.jpg" height="400" width="500">
          </div>
          <div class="col-md-8">
        <h1 class="text-end">Welcome to Daily Journal</h1>
        <p class="fs-4 fw-semibold text-end">A Page for Every Moment.</p>
      </div>
    </section>

    <div class="section-decor"></div>

    <!-- Gallery Section -->
    <section id="gallery" class="section-padding">
      <div class="container">
      <section id="gallery" class="text-center p-5">
 
    <h1 class="fw-bold display-4 pb-3">Gallery</h1>
    <div id="galleryCarousel" class="carousel slide" data-bs-ride="carousel" style="height: 750px;" >
      <div class="carousel-inner">
        <?php
        $sql = "SELECT * FROM gallery ORDER BY tanggal DESC";
        $hasil = $conn->query($sql); 
        $isActive = true; // Flag to set the first item as active

        while ($row = $hasil->fetch_assoc()) {
        ?>
          <div class="carousel-item <?= $isActive ? 'active' : '' ?>">
            <img src="img/<?= $row['gambar'] ?>" class="d-block w-100" alt="<?= $row['judul'] ?>" />
            <div class="carousel-caption d-none d-md-block">
            </div>
          </div>
        <?php
          $isActive = false; // After the first item, set this to false
        }
        ?>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#galleryCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#galleryCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
</section>


    <div class="section-decor"></div>

    <!-- article begin -->
<section id="article" class="text-center p-5" class="section-article">
  <div class="container">
    <h1 class="fw-bold display-4 pb-3">article</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
      <?php
      $sql = "SELECT * FROM article ORDER BY tanggal DESC";
      $hasil = $conn->query($sql); 

      while($row = $hasil->fetch_assoc()){
      ?>
        <div class="col">
          <div class="card h-100">
            <img src="img/<?= $row["gambar"]?>" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title"><?= $row["judul"]?></h5>
              <p class="card-text">
                <?= $row["isi"]?>
              </p>
            </div>
            <div class="card-footer">
              <small class="text-body-secondary">
                <?= $row["tanggal"]?>
              </small>
            </div>
          </div>
        </div>
        <?php
      }
      ?> 
    </div>
  </div>
</section>
<!-- article end -->
    </section>
  </section>
  <div class="section-decor"></div>


 <!-- Schedule Section -->
  <section id="schedule" class="section-schedule">

    <section class="text-center">
      <h1 class="fw-semi-bold" style="color: black; ">Jadwal Kuliah & Kegiatan Mahasiswa</h1>
  </section>
  
  <!-- Schedule Section -->
  <div id="schedule" class="container my-5">
      <div class="row">
          <!-- Senin -->
          <div class="col-md-3 col-sm-12 mb-4">
              <div class="card text-center bg-primary text-white">
                  <div class="card-body">
                      <h2 class="card-title">Senin</h2>
                      <p class="card-text">08:00 - 10:30<br>Basis Data<br>Ruang H.3.4</p>
                      <p class="card-text">13:00 - 15:00<br>Dasar Pemrograman<br>Ruang H.3.1</p>
                  </div>
              </div>
          </div>
          
          <!-- Selasa -->
          <div class="col-md-3 col-sm-12 mb-4">
              <div class="card text-center bg-success text-white">
                  <div class="card-body">
                      <h2 class="card-title">Selasa</h2>
                      <p class="card-text">08:00 - 09:30<br>Pemrograman Berbasis Web<br>Ruang D.2.1</p>
                      <p class="card-text">14:00 - 16:00<br>Data Mining<br>Ruang D.3.M</p>
                  </div>
              </div>
          </div>
  
          <!-- Rabu -->
          <div class="col-md-3 col-sm-12 mb-4">
              <div class="card text-center bg-danger text-white">
                  <div class="card-body">
                      <h2 class="card-title">Rabu</h2>
                      <p class="card-text">10:00 - 12:00<br>Pemrograman Berbasis Object<br>Ruang D.2.A</p>
                      <p class="card-text">13:00 - 15:00<br>Sistem Operasi<br>Ruang D.2.B</p>
                  </div>
              </div>
          </div>
  
          <!-- Kamis -->
          <div class="col-md-3 col-sm-12 mb-4">
              <div class="card text-center bg-warning text-white">
                  <div class="card-body">
                      <h2 class="card-title">Kamis</h2>
                      <p class="card-text">08:00 - 10:00<br>Pengantar Teknologi Informasi<br>Ruang D.2.3</p>
                      <p class="card-text">13:00 - 15:00<br>Rapat Koordinasi DOSCOM<br>Ruang Rapat G.1</p>
                  </div>
              </div>
          </div>
  
          <!-- Jumat -->
          <div class="col-md-3 col-sm-12 mb-4">
              <div class="card text-center bg-info text-white">
                  <div class="card-body">
                      <h2 class="card-title">Jumat</h2>
                      <p class="card-text">08:00 - 10:00<br>Data Mining<br>Ruang G.2.3</p>
                      <p class="card-text">13:00 - 15:00<br>Information Retrieval<br>Ruang G.2.4</p>
                  </div>
              </div>
          </div>
  
          <!-- Sabtu -->
          <div class="col-md-3 col-sm-12 mb-4">
              <div class="card text-center bg-secondary text-white">
                  <div class="card-body">
                      <h2 class="card-title">Sabtu</h2>
                      <p class="card-text">08:00 - 10:00<br>Bimbingan Karier<br>Online</p>
                      <p class="card-text">10:30 - 15:00<br>Bimbingan Skripsi</p>
                  </div>
              </div>
          </div>
  
          <!-- Minggu -->
          <div class="col-md-3 col-sm-12 mb-4">
              <div class="card text-center bg-dark text-white">
                  <div class="card-body">
                      <h2 class="card-title">Minggu</h2>
                      <p class="card-text">Tidak Ada Jadwal</p>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class="section-decor"></div>

</section>
<!-- Profile -->
<section id="profile" class="text-start p-5">
  <div class="container">
    <div class="d-lg-flex flex-md-row align item-center justify-content-evenly"></div>
    <h1 class="fw-bold display-4 pb-3 text-center">Profile</h1>
    <div class="col">
          <div class="row g-0">
              <div class="col-md-4 d-flex justify-content-center align-item-start d-sm-flexalign-items-center">
                      <img src="img/profile.jpg" width="100" class="img-fluid rounded-circle"  style="width: 250px; height: auto;">
              </div>

              <div class="col-md-8">
                  <div style="display: flex; flex-direction: column; height: 100%;">
                          <div class="col-md-4 d-flex justify-content-center align-item-start d-sm-flexalign-items-center">
                            <h5>Erma Ardelia</h5>
                          </div>
                          
                          <p>
                            <table class="table">
                              <tbody>
                                <tr>
                                  <td>NIM</td>
                                  <td>: A11.2023.15356</td>
                                </tr>
                                <tr>
                                  <td>Program Studi</td>
                                  <td>: Teknik Informatika</td>
                                </tr>
                                <tr>
                                  <td>Email</td>
                                  <td>: 111202315356@mhs.dinus.ac.id</td>
                                </tr>
                                <tr>
                                  <td>Telephone</td>
                                  <td>: +62 852 2602 1213</td>
                                </tr>
                                <tr>
                                  <td>Alamat</td>
                                  <td>: Jl. Sadewa I No.65, Semarang</td>
                                </tr>
                              </tbody>
                            </table>
                          </p>
                      </div>
                      
                  </div>
                </div>
        </div>
  </div>


     </div>
 </div>
</section>

    <!-- Footer -->
    <footer class="bg-light py-4">
      <div class="container text-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
          <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
          <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
          <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z"/>
        </svg>
        <p class="mb-0"> Erma Ardelia © 2024</p>
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>

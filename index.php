<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <title>Aksa Rental</title>
    <link rel="stylesheet" href="css/style.css">
    <!--FONT AWESOME-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="assets/icon/icon_Aksa.png" type="image/png">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="css/profile.css">
</head>
<body>

<?php
//memanggil file helpers
require 'helpers.php';

//inisialisasi class helper
$helpers = new helpers();

//memanggil function hitung diskon berserta nilai yang diperlukan
// $harga = 100000;
// $diskon_persen=10;
// $harga_stlh_diskon = $helpers->hitung_diskon($harga,$diskon_persen);

// print_r($harga_stlh_diskon);exit();

 $subtitle ='Temukan kamera terbaik untuk mewujudkan ide kreatif Anda';
 $subtitle1 = 'Kami menyediakan berbagai pilihan kamera dan perlengkapan fotografi dengan harga terjangkau dan proses penyewaan yang mudah.
                View Product';

/* inisiasi array */ 
$produk=[];

/* add value array */ 
$produk[] = array(
            'nama_produk'=>'FUJIFILM X-H2*',
            'kategori_produk'=>'Camera*',
            'harga_produk'=>350000,
            'diskon_persen'=>0,
);

$produk[] = array(
  'nama_produk'=>'FUJIFILM X-T5*',
  'kategori_produk'=>'Camera*',
  'harga_produk'=>400000,
  'diskon_persen'=>100,
);

$produk[] = array(
  'nama_produk'=>'FUJIFILM X-T5**',
  'kategori_produk'=>'Camera*',
  'harga_produk'=>400000,
  'diskon_persen'=>50,
);




?>  
<!-- Bagian loading -->
<div id="loading">
  <img style="width: 300px; height: 300px;" src="assets/img-/LOADING-LENS.gif" alt="Loading Camera">
</div>
    <!-- Header and Navbar -->
    <header class="header">
        <nav class="navbar" id="navbar">
            <a href="#" class="navbar-logo">
                <img src="assets/icon/icon_Aksa.png" alt="logo" id="logo">
            </a>
            <ul class="nav-links">
                <li><a href="#Home">Home</a></li>
                <li><a href="admin/Our_Teams/our_teams.php">Our Teams</a></li>
                <li><a href="product/product.php">Product</a></li>
                <li><a href="#Brand">Brand</a></li>
                <li><a href="#Footer">Footer</a></li>
                <div class="profile-icon" id="profileIcon">
    <div class="circle"></div>
    <img src="https://img.icons8.com/android/48/FFFFFF/user.png" alt="User Icon">
</div>
            </ul>
            <div class="hamburger" id="hamburger"onclick="toggleSidebar()">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>
    </header>
<div class="dropdown" id="dropdown">
    <p><?= htmlspecialchars($username); ?></p>
    <center><a href="logout.php"><button>Logout</button></a></center>
</div>
    <!-- Sidebar for small devices -->
    <div class="sidebar" id="sidebar">
        <ul class="sidebar-links">
            <li><a href="#Home">Home</a></li>
            <li><a href="#Product">Product</a></li>
            <li><a href="#Brand">Brand</a></li>
            <li><a href="#Footer">Footer</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <main>
        <section class="hero-section" id="Home">
            <div class="kanan">
              <div class="typewriter" id="typewriter"></div>
                    <h2>Let’s <span class="highlight">Create</span> Beautiful <br> Work Together</h2>
                    <p><span class="highlight"><?php echo $subtitle;  ?></span><?php echo $subtitle1;  ?></p>
                <button class="animated-button">
                    <span class="button-text">View Product</span>
                    <span class="button-icon"><img src="assets/icon/iconmata.png" alt=""></span>
                </button>
            </div>
        </section>
    </main>
           <section class="sec-gallery">
            <div class="search-container">
              <img src="assets/icon/search.svg" alt="Search icon" class="search-icon" />
              <input type="text" placeholder="Search for product" class="search-input" />
              <div class="search-category">
                <h4>Select Category</h4>
                <img src="assets/icon/dropdown.svg" alt="Dropdown icon" class="dropdown-icon" />
              </div>
            </div>
            <div class="catalog-icon-product">
                <div class="main-icon">
                  <img width="30" height="30" src="https://img.icons8.com/ios-filled/50/FFFFFF/camera--v1.png" alt="camera--v1"/>
                    <p class="text-icon">Camera</p>
                </div>
                <div class="main-icon">
                  <img width="30" height="30" src="https://img.icons8.com/ios-filled/50/FFFFFF/aperture.png" alt="aperture"/>
                    <p class="text-icon">Lens</p>
                </div>
                <div class="main-icon">
                  <img width="30" height="30" src="https://img.icons8.com/ios-filled/50/FFFFFF/micro-sd.png" alt="micro-sd"/>
                    <p class="text-icon">memory</p>
                </div>
                <div class="main-icon">
                  <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/FFFFFF/charging-empty-battery.png" alt="charging-empty-battery"/>
                    <p class="text-icon">Battery</p>
                </div>
                <div class="main-icon">
                  <img width="30" height="30" src="https://img.icons8.com/external-phatplus-solid-phatplus/64/FFFFFF/external-action-camera-travel-tools-phatplus-solid-phatplus.png" alt="external-action-camera-travel-tools-phatplus-solid-phatplus"/>
                    <p class="text-icon">Action Cam</p>
                </div>
                <div class="main-icon">
                  <img width="30" height="30" src="https://img.icons8.com/external-photo3ideastudio-lineal-photo3ideastudio/64/FFFFFF/external-stabilizer-gadget-photo3ideastudio-lineal-photo3ideastudio.png" alt="external-stabilizer-gadget-photo3ideastudio-lineal-photo3ideastudio"/>
                    <p class="text-icon">Stabilizer</p>
                </div>
                <div class="main-icon">
                  <img width="30" height="30" src="https://img.icons8.com/ios/50/FFFFFF/drone-with-camera.png" alt="drone-with-camera"/>
                    <p class="text-icon">Drone</p>
                </div>
                <div class="main-icon">
                  <img width="30" height="30" src="https://img.icons8.com/external-yogi-aprelliyanto-detailed-outline-yogi-aprelliyanto/64/FFFFFF/external-flash-photography-yogi-aprelliyanto-detailed-outline-yogi-aprelliyanto.png" alt="external-flash-photography-yogi-aprelliyanto-detailed-outline-yogi-aprelliyanto"/>
                    <p class="text-icon">Flash</p>
                </div>
                <div class="main-icon">
                  <img width="30" height="30" src="https://img.icons8.com/external-yogi-aprelliyanto-detailed-outline-yogi-aprelliyanto/64/FFFFFF/external-tripod-photography-yogi-aprelliyanto-detailed-outline-yogi-aprelliyanto.png" alt="external-tripod-photography-yogi-aprelliyanto-detailed-outline-yogi-aprelliyanto"/>
                    <p class="text-icon">Tripod</p>
                </div>
                <div class="main-icon">
                  <img width="30" height="30" src="https://img.icons8.com/ios-filled/50/FFFFFF/microphone.png" alt="microphone"/>
                    <p class="text-icon">Microphone</p>
                </div>
                <div class="main-icon">
                  <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/FFFFFF/service--v2.png" alt="service--v2"/>
                    <p class="text-icon">Gear Support</p>
                </div>
            </div>
            <!-- End -->
            <!-- Catalog-Camera -->
            <div class="gallery-product">
              <?php for ($i=0; $i <count($produk) ; $i++) {  ?>
                <div class="content-gallery">
                    <img class="img-catalog" src="assets/img_produk/cammeraa1.png" alt="">
                    <h3> <?php echo $produk[$i]['nama_produk'] ?></h3>
                    <p class="camera"><?php echo $produk[$i]['kategori_produk'] ?></p>
                    <p class="line"></p>
                    <h6><s> Rp. <?php echo number_format($produk[$i]['harga_produk'], 0, ',', '.') ?> </s> /Day</h6>
                    <?php if ($produk[$i]['diskon_persen']>0 and $produk[$i]['diskon_persen']<100  ) { ?>
                      <h4>
                        <font style="color: green;"> 
                        <?php echo number_format($produk[$i]['diskon_persen'], 0, ',', '.')  ?>  % off
                        </font>
                      </h4>
                      <h4>
                        <font style="color:chartreuse"> 
                        <?php echo $helpers->hitung_diskon($produk[$i]['harga_produk'],$produk[$i]['diskon_persen']);  ?>
                        </font>
                      </h4>
                      <?php }elseif($produk[$i]['diskon_persen']==100){  ?>
                        <p>
                          <font style="color: green;">Gratis!!!</font>
                        </p>
                    <?php }else{  ?>
                        <p>
                          <font style="color: yellow;">Segera Diskon</font>
                        </p>
                        <h4>
                          <font style="color:chartreuse"> 
                            <?php echo $helpers->hitung_diskon($produk[$i]['harga_produk'],$produk[$i]['diskon_persen']);  ?>
                          </font>
                      </h4>
                    <?php }  ?>
                    

                  
                    <button class="buy-1">Tersedia</button>
                </div>
                <?php } ?>
            </div>
        </section>
        <section style="padding: 10px;"> 
            <div class="container"  >
                <!-- Baris pertama -->
                <div class="row">
                  <div class="card promo">
                    <div class="background-image"></div>
                    <div class="gradient-overlay"></div>
                    <img class="camera-image promo-hover" src="assets/img_produk/1 Promo Camera 1.png" alt="Camera Promo">
                    <div class="content">
                      <h2>PROMO<br>HARI INI!</h2>
                      <p>Dapatkan penawaran terbaik hanya untuk waktu terbatas! Jangan lewatkan kesempatan untuk memiliki peralatan impianmu dengan harga spesial!</p>
                      <button>Lihat</button>
                    </div>
                  </div>
                  <div class="card new">
                    <div class="background-image"></div>
                    <div class="gradient-overlay"></div>
                    <img class="camera-image new-hover" src="assets/img_produk/2 New Product 1.png" alt="Camera New" >
                    <div class="content">
                      <h2>NEW<br>PRODUCT!</h2>
                      <p>Produk terbaru kini hadir untuk memenuhi kebutuhan kreativitas! Inovasi terkini, kualitas terbaik, siap mendukung setiap proyekmu.</p>
                      <button>Lihat</button>
                    </div>
                  </div>
                </div>
            
                <!-- Baris kedua -->
                <div class="row">
                  <div class="card unggulan">
                    <div class="background-image"></div>
                    <div class="gradient-overlay"></div>
                    <img class="camera-image unggulan-hover" src="assets/img_produk/3 Produk Unggulan Camera 1.png" alt="Camera Unggulan" >
                    <div class="content">
                      <h2>PRODUK<br>UNGGULAN!</h2>
                      <p>Pilihan terbaik dari yang terbaik! Temukan produk unggulan yang paling diminati dan terbukti mendukung kreativitas tanpa batas.</p>
                      <button>Lihat</button>
                    </div>
                  </div>
                  <div class="card livestream">
                    <div class="background-image"></div>
                    <div class="gradient-overlay"></div>
                    <img class="camera-image livestream-hover" src="assets/img_produk/4 LIVE STREAM CAMERA 1.png" alt="Camera Live Stream">
                    <div class="content">
                      <h2>PRODUK<br>LIVE STREAM!</h2>
                      <p>Jadikan siaran langsung lebih profesional! Kami menyediakan peralatan lengkap untuk pengalaman live streaming yang mulus dan berkualitas tinggi.</p>
                      <button>Lihat</button>
                    </div>
                  </div>
                </div>
              </div>
        </section> 
        <section class="brand-section" id="Brand">
          <div class="brand-container">
              <h1 class="brand-title" style="font-size: 60px;">Brand</h1>
              <div class="brand-logos">
                  <img src="assets/icon/Canon-Logo.png" alt="DJI Logo" width="150">
                  <img src="assets/icon/DJI-Logo.png" alt="Godox Logo" width="100">
                  <img src="assets/icon/Fujifilm-Logo.png" alt="GoPro Logo" width="150">
                  <img src="assets/icon/Godox-logo.png" alt="Sony Logo" width="170">
                  <img src="assets/icon/Gopro-Logo.png" alt="Fujifilm Logo" width="170">
                  <img src="assets/icon/Sony-Logo.png" alt="Canon Logo" width="170">
              </div>
          </div>
          <div class="bundle-section">
            <div class="bundle-content">
              <h2><span class="bundle-text">PAKET</span> BUNDLING!</h2>
              <button>Lihat</button>
            </div>
            <div class="bundle-images">
              <img class="bundle-background" src="assets/img_background/1 Promo Background.png" alt="Background">
              <img class="bundle-camera" src="assets/img_produk/NIKON-2.png" alt="Camera">
            </div>
          </div>
        </div>
        </section>
        
        <section class="section-service">
          <div class="header-service">
            <h1>Why Choose Our Service?</h1>
            <p>Dengan pengetahuan kami yang luas tentang pasar properti Bali dan hubungan mendalam dengan pemilik dan pengembang properti lokal, memilih pelayanan kami berarti properti anda terdaftar di antara properti paling eksklusif dan paling dicari di pulau ini</p>
          </div>
          <div class="logos">
            <div class="slide-container">
                
            </div>
            <div class="logos-slide">
                <div class="testimonial">
                    <div class="container-testi">
                        <p>"Conversion turned our marketing game around! With their paid advertising strategies,we saw a  game around! With their paid advertising strategies,we saw a  game around! With their paid advertising strategies,we saw a  istrategies, we saw a remark</p>
                        <div class="down-testi">
                            <div class="round"></div>
                            <div class="name-testi">
                                <h1>Sarah Yanna</h1>
                                <h3> Director of Saturday </h3>
                            </div>
                        </div>
                    </div>
                    <div class="container-testi">
                        <p>"Conversion turned our marketing game around! With their paid advertising strategies,we saw a  game around! With their paid advertising strategies,we saw a  game around! With their paid advertising strategies,we saw a  istrategies, we saw a remark</p>
                        <div class="down-testi">
                            <div class="round"></div>
                            <div class="name-testi">
                                <h1>Sarah Yanna</h1>
                                <h3> Director of Saturday </h3>
                            </div>
                        </div>
                    </div>
                    <div class="container-testi">
                        <p>"Conversion turned our marketing game around! With their paid advertising strategies,we saw a  game around! With their paid advertising strategies,we saw a  game around! With their paid advertising strategies,we saw a  istrategies, we saw a remark</p>
                        <div class="down-testi">
                            <div class="round"></div>
                            <div class="name-testi">
                                <h1>Sarah Yanna</h1>
                                <h3> Director of Saturday </h3>
                            </div>
                        </div>
                    </div>
                    <div class="container-testi">
                        <p>"Conversion turned our marketing game around! With their paid advertising strategies,we saw a  game around! With their paid advertising strategies,we saw a  game around! With their paid advertising strategies,we saw a  istrategies, we saw a remark</p>
                        <div class="down-testi">
                            <div class="round"></div>
                            <div class="name-testi">
                                <h1>Sarah Yanna</h1>
                                <h3> Director of Saturday </h3>
                            </div>
                        </div>
                    </div>
                    
                    <div class="container-testi">
                        <p>"Conversion turned our marketing game around! With their paid advertising strategies,we saw a  game around! With their paid advertising strategies,we saw a  game around! With their paid advertising strategies,we saw a  istrategies, we saw a remark</p>
                        <div class="down-testi">
                            <div class="round"></div>
                            <div class="name-testi">
                                <h1>Sarah Yanna</h1>
                                <h3> Director of Saturday </h3>
                            </div>
                        </div>
                    </div>
                    
                </div>
        </section>

  
        <div class="gallery">
          <div class="gallery-pictures">
  
              <div class="gallery-picture">
                  <img src="assets/slider/img-slider/q1.JPG" alt="">
                  <div class="down-pic">
                      <div class="sec-down-font">
                          <h3 class="down-font-1">Leica D-Lux 8</h3>
                      </div>
                      <div class="sec-right-pic">
                          
                          <img class="bulet" src="assets/slider/icon_slider/leica-log-removebg-preview.png" alt="">
                          <div class="garis"></div>
                          <h3 class="down-font-2">144mm f/2.5 1/102s ISO50</h3>
                      </div>
                  </div>
              </div>
              <div class="gallery-picture">
                  <img src="assets/slider/img-slider/q2.JPG" alt="">
                  <div class="down-pic">
                      <div class="sec-down-font">
                          <h3 class="down-font-1">SONY A6700</h3>
                      </div>
                      <div class="sec-right-pic">
                          
                          <img class="bulet" src="assets/slider/icon_slider/sony-log.jpg" alt="">
                          <div class="garis"></div>
                          <h3 class="down-font-2">144mm f/2.5 1/102s ISO50</h3>
                      </div>
                  </div>
              </div>
              <div class="gallery-picture">
                  <img src="assets/slider/img-slider/q44.jpg" alt="">
                  <div class="down-pic">
                      <div class="sec-down-font">
                          <h3 class="down-font-1">FUJIFILM x-h2</h3>
                      </div>
                      <div class="sec-right-pic">
                          
                          <img class="bulet" src="assets/slider/icon_slider/fuji-logo.jpg" alt="">
                          <div class="garis"></div>
                          <h3 class="down-font-2">144mm f/2.5 1/102s ISO50</h3>
                      </div>
                  </div>
              </div>
              <div class="gallery-picture">
                  <img src="assets/slider/img-slider/q32.JPG" alt="">
                  <div class="down-pic">
                      <div class="sec-down-font">
                          <h3 class="down-font-1">CANON EOS R50</h3>
                      </div>
                      <div class="sec-right-pic">
                          
                          <img class="bulet" src="assets/slider/icon_slider/canon-logo.jpg" alt="">
                          <div class="garis"></div>
                          <h3 class="down-font-2">144mm f/2.5 1/102s ISO50</h3>
                      </div>
                  </div>
              </div>
              <div class="gallery-picture">
                  <img src="assets/slider/img-slider/13.png" alt="">
                  <div class="down-pic">
                      <div class="sec-down-font">
                          <h3 class="down-font-1">SONY A6700</h3>
                      </div>
                      <div class="sec-right-pic">
                          
                          <img class="bulet" src="assets/slider/icon_slider/sony-log.jpg" alt="">
                          <div class="garis"></div>
                          <h3 class="down-font-2">144mm f/2.5 1/102s ISO50</h3>
                      </div>
                  </div>
              </div>
              <div class="gallery-picture">
                  <img src="assets/slider/img-slider/12.png" alt="">
                  <div class="down-pic">
                      <div class="sec-down-font">
                          <h3 class="down-font-1">SONY A6700</h3>
                      </div>
                      <div class="sec-right-pic">
                          
                          <img class="bulet" src="assets/slider/icon_slider/sony-log.jpg" alt="">
                          <div class="garis"></div>
                          <h3 class="down-font-2">144mm f/2.5 1/102s ISO50</h3>
                      </div>
                  </div>
              </div>
              <div class="gallery-picture">
                  <img src="assets/slider/img-slider/11.png" alt="">
                  <div class="down-pic">
                      <div class="sec-down-font">
                          <h3 class="down-font-1">SONY A6700</h3>
                      </div>
                      <div class="sec-right-pic">
                          
                          <img class="bulet" src="assets/slider/icon_slider/sony-log.jpg" alt="">
                          <div class="garis"></div>
                          <h3 class="down-font-2">144mm f/2.5 1/102s ISO50</h3>
                      </div>
                  </div>
              </div>
              <div class="gallery-picture">
                  <img src="assets/slider/img-slider/q1.JPG" alt="">
                  <div class="down-pic">
                      <div class="sec-down-font">
                          <h3 class="down-font-1">Leica D-Lux 8</h3>
                      </div>
                      <div class="sec-right-pic">
                          
                          <img class="bulet" src="assets/slider/icon_slider/leica-log-removebg-preview.png" alt="">
                          <div class="garis"></div>
                          <h3 class="down-font-2">144mm f/2.5 1/102s ISO50</h3>
                      </div>
                  </div>
              </div>
          </div>
          <div class="gallery-pagination">
              <button class="gallery-pagination-dot" data-index="0"></button>
              <button class="gallery-pagination-dot" data-index="1"></button>
              <button class="gallery-pagination-dot" data-index="2"></button>
              <button class="gallery-pagination-dot" data-index="3"></button>
          </div>
      </div>


        <footer class="footer">
          <div class="container-footer" id="Footer">
            <!-- Logo dan Media Sosial -->
            <div class="footer-logo">
              <h1>AKSA RENTAL</h1>
              <div class="social-icons">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
        
            <!-- Footer Links dan Deskripsi -->
            <div class="footer-middle">
              <div class="footer-links">
                <a href="product/product.html">Product</a>
                <a href="#">About Us</a>
                <a href="#">Paket</a>
                <a href="#">Penyewaan</a>
                <a href="#"><i class="fa fa-heart"></i> Favorite</a>
              </div>
              <div class="footer-description">
                <p>
                  AKSA Rental <br> adalah layanan terdepan di bidang sewa kendaraan dengan
                  pelayanan terbaik. Kami menyediakan berbagai pilihan mobil untuk
                  kebutuhan perjalanan Anda. Reservasi mudah dengan berbagai paket
                  fleksibel yang sesuai dengan kebutuhan Anda.
                </p>
              </div>
            </div>
        <section>
            <!-- Kontak -->
            <div class="footer-contact">
              <h3>Any Questions?</h3>
              <form>
                <!-- Input Email dengan Ikon -->
                <div class="input-wrapper">
                  <input type="email" placeholder="ex@yourgmail.com" required/>
                  <i class="fa fa-envelope"></i>
                </div>
          
                <!-- Textarea untuk pesan dengan tombol ikon -->
                <div class="textarea-wrapper">
                  <textarea rows="4" placeholder="Your Message" required></textarea>
                  <button type="submit" class="send-button">
                    <i class="fa fa-paper-plane"></i>
                  </button>
                </div>
              </form>
            </div>
        </footer>
      </section>
      <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/profile.js"></script>
</body>
</html>

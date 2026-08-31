<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Catalog</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <style>
     * {
  margin: 0; /* Menghapus margin dari semua elemen */
  padding: 0; /* Menghapus padding dari semua elemen */
  box-sizing: border-box; /* Memastikan padding dan border dihitung dalam ukuran elemen */
  text-decoration: none;
  scroll-behavior: smooth; /* Menambahkan efek scroll halus */
}

body {
  font-family: "Poppins", sans-serif;
  color: #fff; /* Menetapkan warna teks putih */
  background: #1e1e1e;
  width: 100%;
  overflow-x: hidden;
  /* Menetapkan warna latar belakang gelap */
}

        .catalog-container {
            display: flex;
            max-width: 1200px;
            margin: 20px auto;
        }

        .sidebar {
            width: 200px;
            background-color: #2a2a2a;
            padding: 15px;
        }

        .sidebar h2 {
            color: #f0a500;
            margin-bottom: 15px;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar ul li {
            margin-bottom: 10px;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: white;
            display: flex;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            align-items: center;

        }

        .sidebar ul li a.active {
            background-color: #f0a500;
            color: black;
        }

        .sidebar ul li a:hover {
            background-color: #ffc72f;
            color: black;
        }

        .product-section {
            flex: 1;
            padding: 15px;
            display: flex; /*new */
            flex-direction: column;
        }

        .search-bar {
            /* display: flex; */
            margin-bottom: 20px;
            /* align-items: center; */
        }

        .search-bar .search-icon {
        width: 20px;
        height: 20px;
        margin-right: 10px;
        }

        .search-input-container {
        position: relative;
        display: flex;
        align-items: center;
        background-color: white;
        border-radius: 5px;
        overflow: hidden;
        }

        .search-bar input {
            flex: 1;
            padding: 10px;
            border: none;
            border-radius: 5px 0 0 5px;
        }

        .search-input-container .search-icon {
        position: absolute;
        left: 10px;
        /* top: 50%; */
        /* transform: translateY(-50%); */
        width: 20px;
        height: 20px;
        pointer-events: none; /* Agar tidak mengganggu input */
        }

        .search-input-container input {
        flex: 1;
        padding: 10px 40px 10px 40px; /* Tambahkan padding untuk memberi ruang pada ikon */
        border: none;
        outline: none;
        font-size: 16px;
        }
        .search-input-container button {
        background-color: #f0a500;
        color: black;
        border: none;
        padding: 10px 15px;
        cursor: pointer;
        font-size: 16px;
        }
        .search-input-container button:hover {
        background-color: #ffc72f;
        }
        .search-bar button {
            padding: 10px 20px;
            border: none;
            background-color: #f0a500;
            color: black;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
        }


        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            max-height: 500px; /* Atur tinggi maksimal */
            overflow-y: auto; /* Tambahkan scrolling jika produk melebihi tinggi */
            padding-right: 10px; /* Tambahkan ruang untuk scrollbar */
        }

        .product {
            background-color: #2a2a2a;
            padding: 15px;
            border-radius: 5px;
            text-align: center;
            display: none;
        }

        .product img {
            width: 100%;
            height: auto;
            border-radius: 5px;
            box-shadow: #777;
        }

        .product p {
            margin: 10px 0 0;
            color: #f0a500;
        }

        .product[data-category="camera"] {
            display: block;
        }

        .product-grid::-webkit-scrollbar {
        width: 8px;
        }

        .product-grid::-webkit-scrollbar-thumb {
            background-color: #555;
            border-radius: 4px;
        }

        .product-grid::-webkit-scrollbar-thumb:hover {
            background-color: #777;
        }

        .product-grid::-webkit-scrollbar-track {
            background-color: #2a2a2a;
        }

        .sidebar h2{
            text-align: center;
        }
        .cameraa li{
            display: flex;
            /* justify-content: center; */
        }
        .category-icon{
            width: 20px;
            height: 20px;
            margin-right: 10px;
        }
        .product button{
    text-align: center;
  font-size: 18px;
  font-weight: 550;
  color: #f0a500;
  width: 95%;
  padding: 15px;
  border: 0;
  cursor: pointer;
  margin-top: 30px;
  border-radius: 30px;
  background-color: #24282c;
}
.product button:hover{
    color: #1e1e1e;
    background-color: #ffc72f;
}
.product h5{
    font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
    font-size: small;
}
.header {
  width: 100%; /* Lebar header 100% dari lebar viewport */
  background-color: transparent; /* Latar belakang transparan */
  transition: background-color 0.3s ease; /* Efek transisi pada perubahan warna latar belakang */
}
/* Navbar */
.navbar {
  display: flex; /* Menggunakan flexbox untuk susunan elemen navbar */
  justify-content: space-between; /* Memberikan jarak antara elemen navbar */
  align-items: center; /* Memusatkan elemen secara vertikal */
  padding: 20px 20px; /* Memberikan padding pada navbar */
  color: white; /* Menetapkan warna teks putih */
  position: relative; /* Menetapkan posisi relatif */
  top: 0; /* Menempatkan navbar di atas halaman */
  width: 100%; /* Lebar navbar 100% dari lebar viewport */
  background-color: rgb(
    149 149 149 / 13%
  ); /* Warna latar belakang sticky navbar */
  backdrop-filter: blur(10px); /* Efek blur pada latar belakang saat sticky */
  transform: translateY(0); /* Reset transformasi */
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); /* Bayangan navbar saat sticky */
}


/* Gaya logo navbar */
.navbar-logo img {
  width: 30px; /* Lebar gambar logo */
  height: auto; /* Menjaga rasio aspek gambar */
  max-height: 50px; /* Menetapkan tinggi maksimum logo */
}

/* Daftar tautan navigasi */
.nav-links {
  list-style: none; /* Menghapus penanda daftar */
  display: flex; /* Menggunakan flexbox untuk susunan horizontal */
}

.nav-links li {
  margin: 0 15px; /* Memberikan jarak antara item navigasi */
}

.nav-links a {
  color: white; /* Menetapkan warna teks tautan menjadi putih */
  text-decoration: none; /* Menghapus garis bawah dari tautan */
  font-size: 18px; /* Menetapkan ukuran font */
  position: relative; /* Menetapkan posisi relatif untuk efek garis bawah */
}
.nav-links a:hover {
  text-decoration: underline; /* Garis bawah muncul saat hover */
}

/* Hamburger menu untuk perangkat kecil */
.hamburger {
  display: none; /* Menyembunyikan hamburger secara default */
  flex-direction: column; /* Menyusun ikon hamburger secara vertikal */
  cursor: pointer; /* Mengubah kursor menjadi pointer saat hover */
}

.hamburger span {
  width: 25px; /* Lebar garis hamburger */
  height: 3px; /* Tinggi garis hamburger */
  background-color: white; /* Warna garis hamburger */
  margin: 4px 0; /* Jarak antar garis */
  transition: 0.3s; /* Efek transisi pada hamburger */
}
.line {
  display: block;
  width: 80%;
  height: 2px;
  margin: 10px auto;
  background-color: #fff;
  align-items: center;
}

    </style>
</head>
<body>
    <header class="header">
        <nav class="navbar" id="navbar">
            <a href="#" class="navbar-logo">
                <img src="../assets/icon/icon_Aksa.png" alt="logo" id="logo">
            </a>
            <ul class="nav-links">  
                <li><a href="../utama.php">Home</a></li>
                <li><a href="product/product.php">Product</a></li>
                <li><a href="#Brand">Brand</a></li>
                <li><a href="#Footer">Footer</a></li>
            </ul>
            <div class="hamburger" id="hamburger"onclick="toggleSidebar()">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>
    </header>

    <div class="catalog-container">
        <div class="sidebar">
            <h2>Kategori</h2>
            <ul>
                <li><a href="#" data-filter="all" class="active">All</a></li>
                <li><a href="#" data-filter="camera">
                    <img width="25" height="25" src="https://img.icons8.com/ios-filled/50/FFFFFF/camera--v1.png" alt="camera--v1" class="category-icon">Camera</a></li>
                <li><a href="#" data-filter="lens">    
                    <img width="25" height="25" src="https://img.icons8.com/ios-filled/50/FFFFFF/aperture.png" alt="aperture" class="category-icon"> Lens</a> </li>
                <li><a href="#" data-filter="memory">
                    <img width="30" height="30" src="https://img.icons8.com/ios-filled/50/FFFFFF/micro-sd.png" alt="micro-sd" class="category-icon">Memory</a></li>
                <li><a href="#" data-filter="drone">
                    <img width="30" height="30" src="https://img.icons8.com/ios/50/FFFFFF/drone-with-camera.png" alt="drone-with-camera" class="category-icon">Drone</a></li>
                <li><a href="#" data-filter="tripot">
                    <img width="30" height="30" src="https://img.icons8.com/external-yogi-aprelliyanto-detailed-outline-yogi-aprelliyanto/64/FFFFFF/external-tripod-photography-yogi-aprelliyanto-detailed-outline-yogi-aprelliyanto.png" alt="external-tripod-photography-yogi-aprelliyanto-detailed-outline-yogi-aprelliyanto"class="category-icon"/>Tripot</a></li>
                <li><a href="#" data-filter="battery">
                    <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/FFFFFF/charging-empty-battery.png" alt="charging-empty-battery" class="category-icon">Battery</a></li>    
                <li><a href="#" data-filter="action_camp">
                    <img width="30" height="30" src="https://img.icons8.com/external-phatplus-solid-phatplus/64/FFFFFF/external-action-camera-travel-tools-phatplus-solid-phatplus.png" alt="external-action-camera-travel-tools-phatplus-solid-phatplus" class="category-icon">Action Camp</a></li>
                <li><a href="#" data-filter="flash">
                    <img width="30" height="30" src="https://img.icons8.com/external-yogi-aprelliyanto-detailed-outline-yogi-aprelliyanto/64/FFFFFF/external-flash-photography-yogi-aprelliyanto-detailed-outline-yogi-aprelliyanto.png" alt="external-flash-photography-yogi-aprelliyanto-detailed-outline-yogi-aprelliyanto" class="category-icon">Flash</a></li>
                <li><a href="#" data-filter="stabilizer">
                    <img width="30" height="30"  src="https://img.icons8.com/external-photo3ideastudio-lineal-photo3ideastudio/64/FFFFFF/external-stabilizer-gadget-photo3ideastudio-lineal-photo3ideastudio.png" alt="external-stabilizer-gadget-photo3ideastudio-lineal-photo3ideastudio" class="category-icon">Stabilizer</a></li>
                <li><a href="#" data-filter="microphone">
                    <img width="30" height="30" src="https://img.icons8.com/ios-filled/50/FFFFFF/microphone.png" alt="microphone" class="category-icon">Microphone</a></li>
                <li><a href="#" data-filter="gear_support">
                    <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/FFFFFF/service--v2.png" alt="service--v2" class="category-icon">Gear Support</a></li>
            </ul>


        </div>
        <div class="product-section">
            <div class="search-bar">
                <div class="search-input-container">
                    <img src="https://img.icons8.com/sf-regular/48/1A1A1A/menu.png" alt="menu" class="search-icon">
                    <input type="text" id="search" placeholder="Search for product">
                    <button id="searchBtn">Search</button>
                </div>
            </div>

            <div class="product-grid" id="productGrid">
                <div class="product" data-category="camera">
                    <img src="../assets/img_produk/144.png" alt="SONY A7III">
                        <h3>FUJIFILM X-H2</h3>
                        <h5>Camera</h5>
                        <center> <p class="line"></p></center>
                        <p>Rp310.000/day cam</p>
                        <button class="buy-1" onclick="win">Tersedia</button>
                </div>
                <div class="product" data-category="camera">
                    <img src="../assets/img_produk/155.png" alt="SONY A7III">
                    <h3>FUJIFILM X-H2</h3>
                    <h5>Camera</h5>
                   <center> <p class="line"></p></center>
                    <p>Rp310.000/day cam</p>
                    <button class="buy-1">Tersedia</button>
                </div>
                <div class="product" data-category="camera">
                    <img src="../assets/img_produk/166.png" alt="SONY A7III">
                    <h3>FUJIFILM X-H2</h3>
                    <h5>Camera</h5>
                   <center> <p class="line"></p></center>
                    <p>Rp310.000/day cam</p>
                    <button class="buy-1">Tersedia</button>
                </div>
                <div class="product" data-category="camera">
                    <img src="../assets/img_produk/177.png" alt="SONY A7III">
                    <h3>FUJIFILM X-H2</h3>
                    <h5>Camera</h5>
                   <center> <p class="line"></p></center>
                    <p>Rp310.000/day cam</p>
                    <button class="buy-1">Tersedia</button>
                </div>
                <div class="product" data-category="camera">
                    <img src="../assets/img_produk/188.png" alt="SONY A7III">
                    <h3>FUJIFILM X-H2</h3>
                    <h5>Camera</h5>
                   <center> <p class="line"></p></center>
                    <p>Rp310.000/day cam</p>
                    <button class="buy-1">Tersedia</button>
                </div>
                <div class="product" data-category="camera">
                    <img src="../assets/img_produk/199.png" alt="SONY A7III">
                    <h3>FUJIFILM X-H2</h3>
                    <h5>Camera</h5>
                   <center> <p class="line"></p></center>
                    <p>Rp310.000/day cam</p>
                    <button class="buy-1">Tersedia</button>
                </div>
                <div class="product" data-category="camera">
                    <img src="../assets/img_produk/cammeraa1.png" alt="SONY A7III">
                    <h3>FUJIFILM X-H2</h3>
                    <h5>Camera</h5>
                   <center> <p class="line"></p></center>
                    <p>Rp310.000/day cam</p>
                    <button class="buy-1">Tersedia</button>
                </div>
                <div class="product" data-category="camera">
                    <img src="../assets/img_produk/FUJIFILM X-T5.png" alt="SONY A7III">
                    <h3>FUJIFILM X-H2</h3>
                    <h5>Camera</h5>
                   <center> <p class="line"></p></center>
                    <p>Rp310.000/day cam</p>
                    <button class="buy-1">Tersedia</button>
                </div>
                <div class="product" data-category="camera">
                    <img src="../assets/img_produk/SONY A7C.png" alt="SONY A7III">
                    <h3>FUJIFILM X-H2</h3>
                    <h5>Camera</h5>
                   <center> <p class="line"></p></center>
                    <p>Rp310.000/day cam</p>
                    <button class="buy-1">Tersedia</button>
                </div>
                <div class="product" data-category="camera">
                    <img src="../assets/img_produk/SONY A7II(2).png" alt="SONY A7III">
                    <h3>FUJIFILM X-H2</h3>
                    <h5>Camera</h5>
                   <center> <p class="line"></p></center>
                    <p>Rp310.000/day cam</p>
                    <button class="buy-1">Tersedia</button>
                </div>
                <div class="product" data-category="camera">
                    <img src="../assets/img_produk/SONY A7II.png" alt="SONY A7III">
                    <h3>FUJIFILM X-H2</h3>
                    <h5>Camera</h5>
                   <center> <p class="line"></p></center>
                    <p>Rp310.000/day cam</p>
                    <button class="buy-1">Tersedia</button>
                </div>
                <div class="product" data-category="camera">
                    <img src="../assets/img_produk/SONY A7IV.png" alt="SONY A7III">
                    <h3>FUJIFILM X-H2</h3>
                    <h5>Camera</h5>
                   <center> <p class="line"></p></center>
                    <p>Rp310.000/day cam</p>
                    <button class="buy-1">Tersedia</button>
                </div>
                <div class="product" data-category="camera">
                    <img src="../assets/img_produk/SONY A7S III.png" alt="SONY A7III">
                    <h3>FUJIFILM X-H2</h3>
                    <h5>Camera</h5>
                   <center> <p class="line"></p></center>
                    <p>Rp310.000/day cam</p>
                    <button class="buy-1">Tersedia</button>
                </div>
                <div class="product" data-category="camera">
                    <img src="../assets/img_produk/SONY A6000.png" alt="SONY A7III">
                    <h3>FUJIFILM X-H2</h3>
                    <h5>Camera</h5>
                   <center> <p class="line"></p></center>
                    <p>Rp310.000/day cam</p>
                    <button class="buy-1">Tersedia</button>
                </div>
                <div class="product" data-category="camera">
                    <img src="../assets/img_produk/SONY A6400.png" alt="SONY A7III">
                    <h3>FUJIFILM X-H2</h3>
                    <h5>Camera</h5>
                   <center> <p class="line"></p></center>
                    <p>Rp310.000/day cam</p>
                    <button class="buy-1">Tersedia</button>
                </div>
                <div class="product" data-category="camera">
                    <img src="../assets/img_produk/SONY A6500.png" alt="SONY A7III">
                    <h3>FUJIFILM X-H2</h3>
                    <h5>Camera</h5>
                   <center> <p class="line"></p></center>
                    <p>Rp310.000/day cam</p>
                    <button class="buy-1">Tersedia</button>
                </div>
                <div class="product" data-category="camera">
                    <img src="../assets/img_produk/SONY A6700.png" alt="SONY A7III">
                    <h3>FUJIFILM X-H2</h3>
                    <h5>Camera</h5>
                   <center> <p class="line"></p></center>
                    <p>Rp310.000/day cam</p>
                    <button class="buy-1">Tersedia</button>
                </div>
                <div class="product" data-category="camera">
                    <img src="../assets/img_produk/SONY FX3.png" alt="SONY A7III">
                    <h3>FUJIFILM X-H2</h3>
                    <h5>Camera</h5>
                   <center> <p class="line"></p></center>
                    <p>Rp310.000/day cam</p>
                    <button class="buy-1">Tersedia</button>
                </div>
                <div class="product" data-category="camera" id="product-list">
                    <img src="../assets/img_produk/133.png" alt="SONY A7III">
                    <h3>FUJIFILM X-H2</h3>
                    <h5>Camera</h5>
                   <center> <p class="line"></p></center>
                    <p>Rp310.000/day cam</p>
                    <button class="buy-1">Tersedia</button>
                </div>

                <div class="product" data-category="lens">
                    <img src="../assets/img_produk_lens/SEL2470GM2_A_700x700.webp" alt="Canon EF 50mm">
                    <h3>Lensa Sony 24-70mm FE F/2.8
                        GM ll</h3>
                    <h5>Lens</h5>
                   <center> <p class="line"></p></center>
                    <p>Rp310.000/day cam</p>
                    <button class="buy-1">Tersedia</button>
                </div>
                <div class="product" data-category="lens">
                    <img src="https://sewakameralensabali.com/wp-content/uploads/2023/11/large_1657437514-300x300.jpg" alt="Sigma Art 35mm">
                    <h3>Samyang 24-70mm F 2.8 FE</h3>
                    <h5>Lens</h5>
                   <center> <p class="line"></p></center>
                    <p>Rp310.000/day cam</p>
                    <button class="buy-1">Tersedia</button>
                </div>
                <div class="product" data-category="memory">
                    <img src="https://via.placeholder.com/200" alt="SanDisk Extreme Pro">
                    <p>Rp25.000/day memor</p>
                </div>
                <div class="product" data-category="memory">
                    <img src="https://via.placeholder.com/200" alt="Samsung EVO Plus">
                    <p>Rp30.000/day memor</p>
                </div>
                <div class="product" data-category="drone">
                    <img src="https://sewakameralensabali.com/wp-content/uploads/2022/06/mavic-air-2s-300x300.png" alt="DJI Mavic Air 2">
                    <h3>Drone DJI Mini 4 Pro</h3>
                    <h5>Drone</h5>
                   <center> <p class="line"></p></center>
                    <p>Rp310.000/day cam</p>
                    <button class="buy-1">Tersedia</button>
                </div>
                <div class="product" data-category="drone">
                    <img src="https://sewakameralensabali.com/wp-content/uploads/2023/10/dji_mini_4_pro_3.jpg" alt="DJI Mini 3 Pro">
                    <h3>Drone DJI Mini 4 Pro</h3>
                    <h5>Drone</h5>
                   <center> <p class="line"></p></center>
                    <p>Rp310.000/day cam</p>
                    <button class="buy-1">Tersedia</button>
                </div>
                <div class="product" data-category="drone">
                    <img src="https://via.placeholder.com/200" alt="DJI Mavic Air 2">
                    <p>Rp250.000/day drone</p>
                </div>
                <div class="product" data-category="drone">
                    <img src="https://via.placeholder.com/200" alt="DJI Mini 3 Pro">
                    <p>Rp200.000/day drone</p>
                </div>
                <div class="product" data-category="drone">
                    <img src="https://via.placeholder.com/200" alt="DJI Mavic Air 2">
                    <p>Rp150.000/day drone</p>
                </div>
                <div class="product" data-category="battery">
                    <img src="https://sewakameralensabali.com/wp-content/uploads/2024/10/41J56bDfUKL._AC_UF10001000_QL80_-300x300.jpg" alt="DJI Mini 3 Pro">
                    <h3>Baterai Sony NP-FZ100</h3>
                    <h5>Baterai</h5>
                   <center> <p class="line"></p></center>
                    <p>Rp310.000/day cam</p>
                    <button class="buy-1">Tersedia</button>
                </div>
                <div class="product" data-category="battery">
                    <img src="https://sewakameralensabali.com/wp-content/uploads/2024/10/41J56bDfUKL._AC_UF10001000_QL80_-300x300.jpg" alt="DJI Mini 3 Pro">
                    <h3>Baterai Sony NP-FZ100</h3>
                    <h5>Baterai</h5>
                   <center> <p class="line"></p></center>
                    <p>Rp310.000/day cam</p>
                    <button class="buy-1">Tersedia</button>
                </div>
                <div class="product" data-category="battery">
                    <img src="https://sewakameralensabali.com/wp-content/uploads/2024/10/41J56bDfUKL._AC_UF10001000_QL80_-300x300.jpg" alt="DJI Mini 3 Pro">
                    <h3>Baterai Sony NP-FZ100</h3>
                    <h5>Baterai</h5>
                   <center> <p class="line"></p></center>
                    <p>Rp310.000/day cam</p>
                    <button class="buy-1">Tersedia</button>
                </div>
                <div class="product" data-category="battery">
                    <img src="https://sewakameralensabali.com/wp-content/uploads/2024/10/41J56bDfUKL._AC_UF10001000_QL80_-300x300.jpg" alt="DJI Mini 3 Pro">
                    <h3>Baterai Sony NP-FZ100</h3>
                    <h5>Baterai</h5>
                   <center> <p class="line"></p></center>
                    <p>Rp310.000/day cam</p>
                    <button class="buy-1">Tersedia</button>
                </div>
                <div class="product" data-category="tripot">
                    <img src="https://www.pondoklensa.com/files/photo/web/product/md/50497d9e247aefc86873bdce42c16d99_1700464912.jpg" alt="DJI Mini 3 Pro">
                    <h3>Monopod Video Manfrotto MVMX PRO 500</h3>
                    <h5>Tripod</h5>
                   <center> <p class="line"></p></center>
                    <p>Rp310.000/day cam</p>
                    <button class="buy-1">Tersedia</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            // Filter products by category
            $('.sidebar ul li a').click(function (e) {
                e.preventDefault();
                const filter = $(this).data('filter');

                // Remove active class from all buttons and add to the clicked button
                $('.sidebar ul li a').removeClass('active');
                $(this).addClass('active');

                if (filter === 'all') {
                    $('.product').show();
                } else {
                    $('.product').hide();
                    $(`.product[data-category="${filter}"]`).show();
                }
            });

            // Search functionality
            function filterProducts() {
                const searchValue = $('#search').val().toLowerCase();
                $('.product:visible').each(function () {
                    const productName = $(this).find('img').attr('alt').toLowerCase();
                    $(this).toggle(productName.includes(searchValue));
                });
            }

            $('#searchBtn').click(filterProducts);
            $('#search').on('input', filterProducts);
        });
    </script>
    <script src="../serverjs/product.js"></script>
</body>
</html>

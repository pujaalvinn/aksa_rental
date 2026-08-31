<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <title>Aksa Rental</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="assets/icon/icon_Aksa.png" type="image/png">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="/css/profile.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<style>
    body {
        margin: 0;
        font-family: "Poppins", sans-serif;
        background-color: #000000;
        color: white;
    }

    .header {
        background-color: #343a40;
        padding: 10px 20px;
    }

    .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .navbar-logo img {
        height: 40px;
    }

    .nav-links {
        list-style: none;
        display: flex;
        gap: 20px;
    }

    .nav-links li a {
        color: white;
        text-decoration: none;
        font-weight: bold;
        transition: color 0.3s;
    }

    .nav-links li a:hover {
        color: #ffc107;
    }

    .hamburger {
        display: none;
        flex-direction: column;
        cursor: pointer;
    }

    .hamburger span {
        height: 3px;
        background: white;
        margin: 4px;
        width: 25px;
    }

    .container {
        padding: 40px 20px;
    }

    h1 {
        color:rgb(253, 253, 253);
        margin-bottom: 40px;
    }

    .card-container {
    display: grid;
    grid-template-columns: repeat(5, 1fr); /* Menampilkan 5 kolom */
    gap: 30px;
    padding: 0 20px;
    }


    .card {
        background-color: white;
        border-radius: 12px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: transform 0.3s;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .card img {
        width: 100%;
        height: 250px;
        object-fit: cover;
    }

    .card-info {
        padding: 20px;
    }

    .card-info h3 {
        margin: 0;
        font-size: 1.2rem;
        color: #343a40;
    }

    .card-info p {
        font-size: 0.95rem;
        color: #555;
        margin-top: 10px;
    }

    @media (max-width: 1200px) {
    .card-container {
        grid-template-columns: repeat(4, 1fr);
    }
}

    @media (max-width: 992px) {
    .card-container {
        grid-template-columns: repeat(3, 1fr);
    }
}

    @media (max-width: 768px) {
    .card-container {
        grid-template-columns: repeat(2, 1fr);
    }
}

    @media (max-width: 480px) {
    .card-container {
        grid-template-columns: 1fr;
    }
}

</style>

<body>
    <header class="header">
        <nav class="navbar" id="navbar">
            <a href="#" class="navbar-logo">
                <img src="assets/icon/icon_Aksa.png" alt="logo" id="logo">
            </a>
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="">Our Teams</a></li>
                <li><a href="/product/product.php">Product</a></li>
            </ul>
            <div class="hamburger" id="hamburger" onclick="toggleSidebar()">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>
    </header>

    <section class="container" id="Teams">
        <center><h1>Our Teams</h1></center>

        <div class="card-container">
            <?php
            $teams = [
                
                    ["nama" => "Ius", "gambar" => "assets/img_team/amba.jpg", "deskripsi" => "Ketua tim pengembang dan penanggung jawab utama proyek."],
                    ["nama" => "Denis", "gambar" => "assets/img_team/denis.jpg", "deskripsi" => "Spesialis frontend, fokus pada tampilan dan interaksi pengguna."],
                    ["nama" => "Jeri", "gambar" => "assets/img_team/jerry.jpg", "deskripsi" => "Backend engineer, bertanggung jawab atas logika dan basis data."],
                    ["nama" => "Doyok", "gambar" => "assets/img_team/jinx.jpg", "deskripsi" => "Quality Assurance, memastikan sistem berjalan dengan baik tanpa bug."],
                    ["nama" => "Mario", "gambar" => "assets/img_team/mario.jpg", "deskripsi" => "Desainer UI/UX, menciptakan antarmuka yang menarik dan mudah digunakan."],
                    ["nama" => "Owi", "gambar" => "assets/img_team/owi.jpg", "deskripsi" => "Manajer proyek, mengatur timeline dan koordinasi tim."],
                    ["nama" => "Owo", "gambar" => "assets/img_team/owo.jpg", "deskripsi" => "DevOps, bertanggung jawab atas deployment dan infrastruktur."],
                    ["nama" => "Aaan", "gambar" => "assets/img_team/plankton.jpg", "deskripsi" => "Penulis dokumentasi teknis dan user guide."],
                    ["nama" => "Tom", "gambar" => "assets/img_team/tom.jpg", "deskripsi" => "Data analyst yang memberikan insight dari data pengguna."],
                    ["nama" => "Ripal", "gambar" => "assets/img_team/well.jpg", "deskripsi" => "Support teknis dan pemeliharaan sistem."]
                ];

$cards = [
            '<div class="card">
            <img src="' . $teams[1]["gambar"] . '" alt="' . $teams[1]["nama"] . '">
            <div class="card-info">
                <h3>' . $teams[1]["nama"] . '</h3>
                <p>' . $teams[1]["deskripsi"] . '</p>
            </div>
        </div>',
        '<div class="card">
            <img src="' . $teams[0]["gambar"] . '" alt="' . $teams[0]["nama"] . '">
            <div class="card-info">
                <h3>' . $teams[0]["nama"] . '</h3>
                <p>' . $teams[0]["deskripsi"] . '</p>
            </div>
        </div>',

        // '<div class="card">
        //     <img src="' . $teams[1]["gambar"] . '" alt="' . $teams[1]["nama"] . '">
        //     <div class="card-info">
        //         <h3>' . $teams[1]["nama"] . '</h3>
        //         <p>' . $teams[1]["deskripsi"] . '</p>
        //     </div>
        // </div>',

        '<div class="card">
            <img src="' . $teams[2]["gambar"] . '" alt="' . $teams[2]["nama"] . '">
            <div class="card-info">
                <h3>' . $teams[2]["nama"] . '</h3>
                <p>' . $teams[2]["deskripsi"] . '</p>
            </div>
        </div>',

        '<div class="card">
            <img src="' . $teams[3]["gambar"] . '" alt="' . $teams[3]["nama"] . '">
            <div class="card-info">
                <h3>' . $teams[3]["nama"] . '</h3>
                <p>' . $teams[3]["deskripsi"] . '</p>
            </div>
        </div>',

        '<div class="card">
            <img src="' . $teams[4]["gambar"] . '" alt="' . $teams[4]["nama"] . '">
            <div class="card-info">
                <h3>' . $teams[4]["nama"] . '</h3>
                <p>' . $teams[4]["deskripsi"] . '</p>
            </div>
        </div>',

        '<div class="card">
            <img src="' . $teams[5]["gambar"] . '" alt="' . $teams[5]["nama"] . '">
            <div class="card-info">
                <h3>' . $teams[5]["nama"] . '</h3>
                <p>' . $teams[5]["deskripsi"] . '</p>
            </div>
        </div>',

        '<div class="card">
            <img src="' . $teams[6]["gambar"] . '" alt="' . $teams[6]["nama"] . '">
            <div class="card-info">
                <h3>' . $teams[6]["nama"] . '</h3>
                <p>' . $teams[6]["deskripsi"] . '</p>
            </div>
        </div>',

        '<div class="card">
            <img src="' . $teams[7]["gambar"] . '" alt="' . $teams[7]["nama"] . '">
            <div class="card-info">
                <h3>' . $teams[7]["nama"] . '</h3>
                <p>' . $teams[7]["deskripsi"] . '</p>
            </div>
        </div>',

        '<div class="card">
            <img src="' . $teams[8]["gambar"] . '" alt="' . $teams[8]["nama"] . '">
            <div class="card-info">
                <h3>' . $teams[8]["nama"] . '</h3>
                <p>' . $teams[8]["deskripsi"] . '</p>
            </div>
        </div>',

        '<div class="card">
            <img src="' . $teams[9]["gambar"] . '" alt="' . $teams[9]["nama"] . '">
            <div class="card-info">
                <h3>' . $teams[9]["nama"] . '</h3>
                <p>' . $teams[9]["deskripsi"] . '</p>
            </div>
        </div>',
    ];

    echo implode("\n", $cards);
    ?>
</div>

    </section>
</body>
</html>

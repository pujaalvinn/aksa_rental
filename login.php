<?php
session_start();
require 'admin/config.php'; // Pastikan path ini benar

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $message = ""; // Variabel untuk menampung pesan error

    if (isset($_POST['register'])) {
        // Proses registrasi
        $first_name = trim($_POST['first_name']);
        $last_name = trim($_POST['last_name']);
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        // Validasi input
        if (empty($first_name) || empty($last_name) || empty($username) || empty($password)) {
            $message = "Semua field harus diisi.";
        } else {
            // Hash password
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);

            // Simpan ke database
            $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, username, password) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $first_name, $last_name, $username, $hashed_password);

            if ($stmt->execute()) {
                $message = "Registrasi berhasil. Silakan login.";
                header("Location: ?"); // Redirect ke halaman login
                exit;
            } else {
                $message = "Terjadi kesalahan saat registrasi.";
            }

            $stmt->close();
        }
    } else {
        // Proses login
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        if (empty($username) || empty($password)) {
            $message = "Username dan password tidak boleh kosong.";
        } else {
            $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();

                if (password_verify($password, $user['password'])) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    header("Location: admin/utama.php");
                    exit;
                } else {
                    $message = "Password salah.";
                }
            } else {
                $message = "Username tidak ditemukan.";
            }
            $stmt->close();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
    <link rel="stylesheet" href="assets/fontawesome/css/font-awesome.min.css">
    <title>Login dan Registrasi</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #1c1c1c;
            color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            overflow: hidden;
        }
        .form-container {
            background-color: #2a2a2a;
            padding: 30px;
            border-radius: 10px;
            width: 350px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #f0f0f0;
        }
        .form-container input {
            width: 92%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #444;
            border-radius: 8px;
            background-color: #333;
            color: #fff;
            font-size: 16px;
        }
        .form-container input:focus {
            outline: none;
            border-color: #ffcc00;
        }
        .form-container button {
            width: 80%;
            padding: 12px;
            background-color: #ffcc00;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            color: #000;
            font-weight: bold;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        .form-container button:hover {
            background-color: #e6b800;
        }
        .form-container a {
            color: #ffffff;
            text-decoration: none;
            display: block;
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }
        .form-container a:hover {
            text-decoration: underline;
        }

        .alert {
            color: #ffcc00;
            text-align: center;
            margin-bottom: 15px;
            font-size: 14px;
        }

        /* Styling for password eye icon */
        .password-container {
            position: relative;
        }
        .toggle-password {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>
</head>
<body>
    <?php $page = isset($_GET['page']) ? $_GET['page'] : 'login'; ?>

    <?php if ($page === 'login'): ?>
        <div class="form-container">
            <h2>Login</h2>
            <?php if (!empty($message)): ?>
                <div class="alert"> <?php echo $message; ?> </div>
            <?php endif; ?>
            <form method="post" action="">
                <input type="text" name="username" placeholder="Username" required>
                <div class="password-container">
                    <input type="password" name="password" placeholder="Password" required id="password-login">
                    <i class="far fa-eye toggle-password" id="togglePasswordLogin"></i>
                </div>
                <center><button type="submit">Login</button></center>
            </form>
            <a href="?page=register">Apakah belum memiliki akun? Registrasi</a>
        </div>
    <?php elseif ($page === 'register'): ?>
        <div class="form-container">
            <h2>Registrasi</h2>
            <?php if (!empty($message)): ?>
                <div class="alert"> <?php echo $message; ?> </div>
            <?php endif; ?>
            <form method="POST">
                <input type="text" name="first_name" placeholder="First Name" required>
                <input type="text" name="last_name" placeholder="Last Name" required>
                <input type="text" name="username" placeholder="Username" required>
                <div class="password-container">
                    <input type="password" name="password" placeholder="Password" required id="password-register">
                </div>
                <center><button type="submit" name="register">Registrasi</button></center>
            </form>
            <a href="?">Sudah memiliki akun? Login</a>
        </div>
    <?php endif; ?>

    <script>
        // Toggle password visibility for login
        const togglePasswordLogin = document.getElementById("togglePasswordLogin");
        const passwordLogin = document.getElementById("password-login");

        togglePasswordLogin.addEventListener("click", function() {
            const type = passwordLogin.type === "password" ? "text" : "password";
            passwordLogin.type = type;
            togglePasswordLogin.classList.toggle("fa-eye-slash");
        });

        // Toggle password visibility for registration
        const togglePasswordRegister = document.getElementById("togglePasswordRegister");
        const passwordRegister = document.getElementById("password-register");

        togglePasswordRegister.addEventListener("click", function() {
            const type = passwordRegister.type === "password" ? "text" : "password";
            passwordRegister.type = type;
            togglePasswordRegister.classList.toggle("fa-eye-slash");
        });
    </script>
</body>
</html>

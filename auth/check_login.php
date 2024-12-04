<?php
// Mengatur parameter cookie sesi sebelum memulai sesi
// $cookieParams = session_get_cookie_params();
// session_set_cookie_params(
//     86400,                    // Waktu kedaluwarsa cookie (1 hari)
//     $cookieParams["path"],    // Jalur di mana cookie tersedia
//     $cookieParams["domain"],  // Domain di mana cookie tersedia
//     true,                     // Kirim cookie hanya melalui HTTPS
//     true                      // Hanya akses cookie melalui HTTP(S), bukan JavaScript
// );

session_start();
include('../db.php');

// Fungsi untuk menghasilkan token sesi acak
function generateSessionToken()
{
    return bin2hex(random_bytes(32));
}

// if (!isset($_SESSION['csrf_token']) || !isset($_POST['csrf_token'])) {
//     die("CSRF token is missing.");
// }

// if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
//     die("Invalid CSRF token.");
// }

// Solusi Celah Keamanan Server-Side Request Forgery (SSRF)

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users u join roles r on u.role_id = r.id WHERE username='$username' AND password=MD5('$password')";
$result = $conn->query($sql);
// Celah Keamanan , ' or true limit 1-- ## 

// Solusi Celah Keamanan SQL Injection
// $stmt = $conn->prepare("SELECT * FROM users u join roles r on u.role_id = r.id WHERE username=? AND password=MD5(?)");
// $stmt->bind_param("ss", $username, $password);
// $stmt->execute();
// $result = $stmt->get_result();

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $_SESSION['logged_in'] = true;
    $_SESSION['username'] = $username;
    $_SESSION['role_name'] = $row['role_name'];

    // Mengumpulkan token sesi untuk pengguna
    // if (!isset($_SESSION['token'])) {
    //     $_SESSION['token'] = generateSessionToken();
    // }

    // // Ubah cookie yang tidak ditandatangani dan berisi informasi yang dapat dimanipulasi
    // $cookie_name = "secure_cookie";
    // $cookie_value = "SecureValue";
    // $cookie_expire = time() + (86400 * 30); // 30 hari
    // $cookie_path = "/";
    // $cookie_secure = true; // Hanya kirim cookie melalui HTTPS
    // $cookie_httponly = true; // Cookie hanya dapat diakses melalui HTTP(S), bukan JavaScript

    // setcookie($cookie_name, $cookie_value, $cookie_expire, $cookie_path, "", $cookie_secure, $cookie_httponly);

    $url_target = '../dashboard/index.php?page=' . $_SESSION['role_name'];
    header("Location: $url_target");
    // echo $url_target;
} else {
    // Pengujian Session Management Schema
    // Solusi Celah Session fixation

    // session_unset();
    // session_destroy();

    // // Mengambil parameter cookie sesi saat ini
    // $params = session_get_cookie_params();

    // // Mengatur ulang cookie sesi untuk menghapusnya dari browser
    // setcookie(
    //     session_name(),    // Nama cookie sesi
    //     '',                // Nilai cookie (kosong)
    //     time() - 42000,    // Waktu kedaluwarsa (set ke waktu lampau)
    //     $params["path"],   // Jalur cookie
    //     $params["domain"], // Domain cookie
    //     $params["secure"], // Cookie hanya dikirim melalui HTTPS
    //     $params["httponly"] // Cookie hanya dapat diakses melalui HTTP(S)
    // );

    // session_abort();
    echo "User Tidak Ditemukan <script>setTimeout(()=>{window.location.href='./login.php'},2000)</script>";
}

$conn->close();

<?php
session_start();

if (isset($_SESSION['logged_in'])) {
    $url_target = '../dashboard/index.php?page=' . $_SESSION['role_name'];
    header("Location: $url_target");
    exit();
} else {
    session_unset();
    session_destroy();

    // Mengambil parameter cookie sesi saat ini
    $params = session_get_cookie_params();
    
    // Mengatur ulang cookie sesi untuk menghapusnya dari browser
    setcookie(
        session_name(),    // Nama cookie sesi
        '',                // Nilai cookie (kosong)
        time() - 42000,    // Waktu kedaluwarsa (set ke waktu lampau)
        $params["path"],   // Jalur cookie
        $params["domain"], // Domain cookie
        $params["secure"], // Cookie hanya dikirim melalui HTTPS
        $params["httponly"] // Cookie hanya dapat diakses melalui HTTP(S)
    );
    
    session_abort();
}

// $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
// Solusi Celah Keamanan Server-Side Request Forgery (SSRF)

?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../assets/dist/css/bootstrap-icons.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            DTAC06 | <b>Secure Coding</b>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in</p>

                <form action="check_login.php" method="post">
                    <!-- Solusi Celah Keamanan Server-Side Request Forgery (SSRF) -->
                    <!-- <input type="hidden" name="csrf_token" value="<?=/*$_SESSION['csrf_token']*/""?>"> -->
                    <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="bi bi-lock"></i>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/dist/js/adminlte.min.js"></script>
</body>

</html>
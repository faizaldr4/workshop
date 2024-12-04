<?php
if (isset($_GET['command'])) {
    $command = $_GET['command'];
    $doc = $_GET['doc'];
    $filepath = "../assets/docs/$doc";
    // kerentanan :
    // workshop/menu/show_pdf.php?command=dir%20c:\&doc=doc.pdf

    // Solusi Celah Keamanan Code injection
    // Validasi input untuk hanya mengizinkan perintah tertentu
    // $allowed_commands = ['dir', 'ls', 'whoami', 'open_pdf'];
    // if (in_array($command, $allowed_commands)) {
    if ($command == 'open_pdf') {
        $safe_command = escapeshellcmd("start $filepath");
    } else {
        $safe_command = escapeshellcmd($command);
    }

    $output = shell_exec($safe_command);
    echo "<pre>$output</pre>";
    // } else {
    //     echo "Perintah tidak diizinkan.";
    // }
} else {
    echo "Tidak ada perintah yang diberikan.";
}

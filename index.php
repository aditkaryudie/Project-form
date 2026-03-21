<?php
require_once 'class/FormData.php';

$hasil = '';
$data = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama  = $_POST['nama'] ?? '';
    $email = $_POST['email'] ?? '';
    $pesan = $_POST['pesan'] ?? '';

    if (!empty($nama) && !empty($email)) {
        $data = new FormData($nama, $email, $pesan);
        $hasil = $data->tampilkanHasil();
    } else {
        $hasil = "<p style='color:red'>Nama dan Email wajib diisi!</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Sederhana</title>
    <style>
        body { font-family: Arial; margin: 50px; }
        .container { max-width: 500px; margin: auto; }
        label { display: block; margin-top: 10px; }
        input, textarea { width: 100%; padding: 8px; margin-top: 5px; }
        button { margin-top: 15px; padding: 8px 15px; background: #4CAF50; color: white; border: none; cursor: pointer; }
        .hasil { margin-top: 20px; border-top: 1px solid #ccc; padding-top: 20px; }
    </style>
</head>
<body>
<div class="container">
    <h2>Form Sederhana</h2>

    <?php if (empty($hasil) || strpos($hasil, 'wajib') !== false): ?>
        <form method="post" action="">
            <label>Nama:</label>
            <input type="text" name="nama" required>

            <label>Email:</label>
            <input type="email" name="email" required>

            <label>Pesan:</label>
            <textarea name="pesan" rows="4"></textarea>

            <button type="submit">Kirim</button>
        </form>
    <?php else: ?>
        <div class="hasil">
            <h3>Data yang Dikirim:</h3>
            <?php echo $hasil; ?>
            <button onclick="window.location.href='index.php'">Tutup Form</button>
        </div>
    <?php endif; ?>
</div>
</body>
</html>
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
        $hasil = "<p class='error'>Nama dan Email wajib diisi!</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Modern Poppins</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #6366f1;
            --primary-hover: #4f46e5;
            --bg-color: #f8fafc;
            --text-color: #1e293b;
        }

        body { 
            font-family: 'Poppins', sans-serif; 
            background-color: var(--bg-color);
            color: var(--text-color);
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .container { 
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px; 
        }

        h2, h3 { 
            margin-top: 0; 
            color: var(--primary-color);
            font-weight: 600;
        }

        label { 
            display: block; 
            margin-top: 15px; 
            font-size: 0.9rem;
            font-weight: 400;
        }

        input, textarea { 
            width: 100%; 
            padding: 10px; 
            margin-top: 5px; 
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            box-sizing: border-box; /* Agar padding tidak merusak lebar */
            font-family: 'Poppins', sans-serif;
            transition: border-color 0.3s;
        }

        input:focus, textarea:focus {
            outline: none;
            border-color: var(--primary-color);
            ring: 2px solid #e0e7ff;
        }

        button { 
            width: 100%;
            margin-top: 20px; 
            padding: 12px; 
            background: var(--primary-color); 
            color: white; 
            border: none; 
            border-radius: 6px;
            cursor: pointer; 
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            transition: background 0.3s ease;
        }

        button:hover { 
            background: var(--primary-hover); 
        }

        .hasil { 
            background: #f1f5f9;
            padding: 15px;
            border-radius: 8px;
            margin-top: 10px;
        }

        .error {
            color: #ef4444;
            font-size: 0.85rem;
            background: #fee2e2;
            padding: 10px;
            border-radius: 6px;
        }

        .btn-secondary {
            background: #64748b;
        }

        .btn-secondary:hover {
            background: #475569;
        }
    </style>
</head>
<body>

<div class="container">
    <?php if (empty($hasil) || strpos($hasil, 'wajib') !== false): ?>
        <h2>Hubungi Kami</h2>
        <?php if (strpos($hasil, 'wajib') !== false) echo $hasil; ?>
        
        <form method="post" action="">
            <label>Nama Lengkap</label>
            <input type="text" name="nama" placeholder="Masukkan nama Anda" required>

            <label>Alamat Email</label>
            <input type="email" name="email" placeholder="contoh@mail.com" required>

            <label>Pesan</label>
            <textarea name="pesan" rows="4" placeholder="Tuliskan pesan Anda di sini..."></textarea>

            <button type="submit">Kirim Pesan</button>
        </form>
    <?php else: ?>
        <div class="hasil-container">
            <h3>Terima Kasih!</h3>
            <div class="hasil">
                <?php echo $hasil; ?>
            </div>
            <button class="btn-secondary" onclick="window.location.href='index.php'">Kembali ke Form</button>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
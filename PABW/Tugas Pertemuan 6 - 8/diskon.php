<?php

// Fungsi untuk menghitung diskon
function hitungDiskon($totalBelanja) {
    $diskon = 0;

    if ($totalBelanja >= 100000) {
        $diskon = 0.10 * $totalBelanja;
    } elseif ($totalBelanja >= 50000) {
        $diskon = 0.05 * $totalBelanja;
    }

    return $diskon;
}

// Fungsi untuk mengubah angka menjadi format Rupiah
function rupiah($angka) {
    return "Rp " . number_format($angka, 0, ',', '.');
}

// Inisialisasi variabel
$totalBelanja = 0;
$diskon = 0;
$totalBayar = 0;
$persenDiskon = 0;
$hitung = false;
$error = "";

// Memeriksa data yang dikirim melalui form
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['total_belanja']) &&
        $_POST['total_belanja'] !== '' &&
        is_numeric($_POST['total_belanja']) &&
        $_POST['total_belanja'] >= 0) {

        $totalBelanja = (float) $_POST['total_belanja'];

        // Memanggil fungsi untuk menghitung diskon
        $diskon = hitungDiskon($totalBelanja);

        // Menghitung total pembayaran
        $totalBayar = $totalBelanja - $diskon;

        // Menentukan persentase diskon
        if ($totalBelanja >= 100000) {
            $persenDiskon = 10;
        } elseif ($totalBelanja >= 50000) {
            $persenDiskon = 5;
        }

        $hitung = true;

    } else {
        $error = "Masukkan total belanja yang valid!";
    }
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Program Penghitung Diskon</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 30px 15px;
            color: #333;
        }

        .container {
            width: 100%;
            max-width: 550px;
            margin: 30px auto;
        }

        .content {
            background-color: white;
            padding: 25px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        h2 {
            margin-top: 0;
            font-size: 24px;
            color: #222;
        }

        p {
            font-size: 14px;
            line-height: 1.6;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 15px;
            font-size: 14px;
        }

        input:focus {
            outline: none;
            border-color: #2563eb;
        }

        button {
            background-color: #2563eb;
            color: white;
            border: none;
            padding: 10px 18px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        button:hover {
            background-color: #1d4ed8;
        }

        .hasil {
            margin-top: 25px;
            padding-top: 15px;
            border-top: 1px solid #ddd;
        }

        .hasil h3 {
            font-size: 18px;
            margin-bottom: 15px;
        }

        .baris {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
            font-size: 14px;
        }

        .total {
            border-top: 1px solid #ddd;
            padding-top: 15px;
            margin-top: 15px;
            font-weight: bold;
        }

        .total .nominal {
            color: #2563eb;
        }

        .error {
            color: #dc2626;
            margin-top: 15px;
        }

        .ketentuan {
            margin-top: 20px;
            padding: 15px;
            background-color: #fafafa;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .ketentuan h3 {
            font-size: 16px;
            margin-top: 0;
        }

        .ketentuan ul {
            padding-left: 20px;
            font-size: 13px;
            line-height: 1.8;
        }

        .footer {
            text-align: center;
            color: #777;
            font-size: 12px;
            margin-top: 20px;
        }

        @media (max-width: 480px) {
            .content {
                padding: 18px;
            }

            h2 {
                font-size: 21px;
            }
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="content">

            <h2>Program Penghitung Diskon</h2>

            <p>
                Silakan masukkan total belanja untuk mengetahui
                jumlah diskon dan total pembayaran.
            </p>

            <hr>

            <!-- Form input total belanja -->
            <form method="POST" action="">

                <label for="total_belanja">
                    Total Belanja (Rp)
                </label>

                <input
                    type="number"
                    id="total_belanja"
                    name="total_belanja"
                    min="0"
                    step="1"
                    placeholder="Contoh: 120000"
                    value="<?php
                        if (isset($_POST['total_belanja'])) {
                            echo htmlspecialchars($_POST['total_belanja']);
                        }
                    ?>"
                    required
                >

                <button type="submit">Hitung Diskon</button>

            </form>

            <!-- Menampilkan pesan kesalahan -->
            <?php if ($error != ""): ?>
                <p class="error">
                    <?php echo $error; ?>
                </p>
            <?php endif; ?>

            <!-- Menampilkan hasil perhitungan -->
            <?php if ($hitung): ?>

                <div class="hasil">

                    <h3>Hasil Perhitungan</h3>

                    <div class="baris">
                        <span>Total Belanja</span>
                        <span><?php echo rupiah($totalBelanja); ?></span>
                    </div>

                    <div class="baris">
                        <span>Diskon (<?php echo $persenDiskon; ?>%)</span>
                        <span><?php echo rupiah($diskon); ?></span>
                    </div>

                    <div class="baris total">
                        <span>Total yang Harus Dibayar</span>
                        <span class="nominal">
                            <?php echo rupiah($totalBayar); ?>
                        </span>
                    </div>

                </div>

            <?php endif; ?>

        </div>

        <!-- Ketentuan diskon -->
        <div class="ketentuan">

            <h3>Ketentuan Diskon</h3>

            <ul>
                <li>Belanja minimal Rp100.000 mendapatkan diskon 10%.</li>
                <li>Belanja minimal Rp50.000 mendapatkan diskon 5%.</li>
                <li>Belanja kurang dari Rp50.000 tidak mendapatkan diskon.</li>
            </ul>

        </div>

        <div class="footer">
            Program Penghitung Diskon - PHP
        </div>

    </div>

</body>
</html>
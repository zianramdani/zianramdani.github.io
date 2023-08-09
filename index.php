<!DOCTYPE html>
<html>

<head>
    <title>Pemesanan Nasi Baim</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
        }

        form {
            width: 300px;
            margin: 0 auto;
        }

        label,
        input,
        select {
            display: block;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            margin-top: 10px;
        }

        .result {
            display: grid;
            align-items: center;
            justify-content: center;
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
        }
    </style>
</head>

<body>
    <h1>Form Pemesanan Nasi Kotak</h1>
    <form method="post" action="">
        <label for="branch">Cabang:</label>
        <select name="branch" id="branch">
            <option value="pilih cabang anda">PILIH CABANG ANDA</option>
            <option value="Talaga">Talaga</option>
            <option value="Bandung">Bandung</option>
            <option value="Sumedang">Sumedang</option>
        </select>
        <label for="namaa">Nama Pelanggan:</label>
        <input type="text" name="namaa" id="namaa" required>
        <label for="nomortelp">No. HP:</label>
        <input type="text" name="nomortelp" id="nomortelp" required>
        <label for="jumlahpesan">Jumlah Pesanan:</label>
        <input type="text" name="jumlahpesan" id="jumlahpesan" required>
        <input type="submit" name="submit" value="Pesan">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $branch = $_POST['branch'];
        $name = $_POST['namaa'];
        $phoneNumber = $_POST['nomortelp'];
        $quantity = $_POST['jumlahpesan'];
        $pricePerItem = 50000; // Harga satuannya (50 ribu)
        $discountPerItem = 50000; // Diskon per item jika lebih dari 10 pesanan
        $minimumQuantityForDiscount = 10; // Jumlah pesanan minimal untuk mendapat diskon

        $totalPriceBeforeDiscount = $pricePerItem * $quantity;
        $totalDiscount = 0;

        if ($quantity > $minimumQuantityForDiscount) {
            $totalDiscount = $discountPerItem * floor($quantity / $minimumQuantityForDiscount);
        }

        $totalPriceAfterDiscount = $totalPriceBeforeDiscount - $totalDiscount;

        echo "<div class='result'>";
        echo "<strong>Pesanan telah diterima:</strong><br>";
        echo "<strong>Cabang:</strong> " . $branch . "<br>";
        echo "<strong>Nama:</strong> " . $name . "<br>";
        echo "<strong>No. HP:</strong> " . $phoneNumber . "<br>";
        echo "<strong>Jumlah:</strong> " . $quantity . "<br>";
        echo "<strong>Tagihan Awal Sebelum Diskon:</strong> Rp " . number_format($totalPriceBeforeDiscount, 0, ',', '.') . "<br>";

        if ($totalDiscount > 0) {
            echo "<strong>Diskon:</strong> Rp " . number_format($totalDiscount, 0, ',', '.') . "<br>";
        }

        echo "<strong>Tagihan Akhir Setelah Diskon:</strong> Rp " . number_format($totalPriceAfterDiscount, 0, ',', '.') . "<br>";
        echo "</div>";
    }
    ?>
</body>

</html>
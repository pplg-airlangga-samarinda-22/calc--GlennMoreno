<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Sederhana</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
        }
        form {
            display: inline-block;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 2px 2px 10px rgba(0,0,0,0.1);
        }
        input, select, button {
            margin: 10px;
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>
<body>

    <h2>Kalkulator Sederhana</h2>

    <form method="POST">
        <input type="number" name="bilangan1" placeholder="Bilangan Pertama" required>
        <select name="operator">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">×</option>
            <option value="/">÷</option>
        </select>
        <input type="number" name="bilangan2" placeholder="Bilangan Kedua" required>
        <br>
        <button type="submit">Hitung</button>
    </form>

    <?php
    function tambah($a, $b) { return $a + $b; }
    function kurang($a, $b) { return $a - $b; }
    function kali($a, $b) { return $a * $b; }
    function bagi($a, $b) {
        return $b == 0 ? "Error: Tidak bisa dibagi dengan nol!" : $a / $b;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $bilangan1 = $_POST["bilangan1"];
        $bilangan2 = $_POST["bilangan2"];
        $operator = $_POST["operator"];

        if (is_numeric($bilangan1) && is_numeric($bilangan2)) {
            switch ($operator) {
                case "+": $hasil = tambah($bilangan1, $bilangan2); break;
                case "-": $hasil = kurang($bilangan1, $bilangan2); break;
                case "*": $hasil = kali($bilangan1, $bilangan2); break;
                case "/": $hasil = bagi($bilangan1, $bilangan2); break;
                default: $hasil = "Operator tidak valid!";
            }

            echo "<h3>Hasil: $bilangan1 $operator $bilangan2 = $hasil</h3>";
        } else {
            echo "<h3 style='color:red;'>Error: Masukkan angka yang valid!</h3>";
        }
    }
    ?>

</body>
</html>

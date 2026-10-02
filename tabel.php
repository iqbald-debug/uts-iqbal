<?php

$daftarBuku = [$buku1, $buku2, $buku3, $buku4, $buku5];
$totalKeseluruhan = 0;
?>

<!DOCTYPE html>
<html>
<head>
    <title>UTS PBO</title>
    <style>
        table { width: 80%; border-collapse: collapse; margin: 20px 0; }
        table, th, td { border: 1px solid black; padding: 8px; text-align: center; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>No</th>
            <th>ID</th>
            <th>Nama</th>
            <th>Jenis</th>
            <th>Harga Dasar</th>
            <th>Detail (Bonus)</th>
            <th>Total</th>
        </tr>
        <?php 
        $no = 1;
        foreach ($daftarBuku as $buku) { 
            $totalBuku = $buku->hitungTotal(); 
            $totalKeseluruhan += $totalBuku;
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $buku->getId(); ?></td>
            <td><?= $buku->getNama(); ?></td>
            <td><?= $buku->getJenis(); ?></td>
            <td>Rp <?= number_format($buku->getHargaDasar(), 0, ',', '.'); ?></td>
            <td><?= $buku->cetakDetail(); ?></td>
            <td>Rp <?= number_format($totalBuku, 0, ',', '.'); ?></td>
        </tr>
        <?php } ?>
        
        <tr>
            <td colspan="6" style="text-align: right; font-weight: bold;">Total Keseluruhan:</td>
            <td style="font-weight: bold;">Rp <?= number_format($totalKeseluruhan, 0, ',', '.'); ?></td>
        </tr>
    </table>
</body>
</html>


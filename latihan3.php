<?php

include_once "latihan1.php";

function formatTanggal($tanggal) {
    $bulanArray = [
        '01' => 'Januari', '02' => 'Februari', '03' => 'Maret',
        '04' => 'April', '05' => 'Mei', '06' => 'Juni',
        '07' => 'Juli', '08' => 'Agustus', '09' => 'September',
        '10' => 'Oktober', '11' => 'November', '12' => 'Desember'
    ];
    
    $tanggalArray = explode('-', $tanggal);
    return $tanggalArray[2] . ' ' . $bulanArray[$tanggalArray[1]] . ' ' . $tanggalArray[0];
}

// Sort the $siswa array by the 'nama' field
usort($siswa, function ($a, $b) {
    return strcmp($a['nama'], $b['nama']);
});
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <center><h3>Latihan Menampilkan data siswa yang berumur 15 saja</h3></center>
    <center><table border="1">
        <!-- Link untuk berpindah ke latihan 2 -->
    <p><a href="latihan4.php">Ke Latihan 4</a></p>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Umur</th>
                <th>Tempat Tanggal Lahir</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($siswa as $anime) {
                if ($anime['umur'] == 15) { // Tampilkan hanya data siswa yang berumur 15 tahun
            ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $anime['nama'] ?></td>
                <td><?php echo $anime['kelas'] ?></td>
                <td><?php echo $anime['umur'] ?></td>
                <td><?php echo $anime['tempat_lahir'] ?>, <?php echo formatTanggal($anime['tanggal_lahir']) ?></td>
                <td><?php echo $anime['alamat'] ?></td>
            </tr>
            <?php 
                }
            } 
            ?>
        </tbody>
    </table></center>
</body>

</html>

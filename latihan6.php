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

// Periksa apakah variabel $siswa tersedia dan berisi data
if (isset($siswa) && is_array($siswa)) {
    // Sort array siswa berdasarkan nama
    usort($siswa, function ($a, $b) {
        return strcmp($a['nama'], $b['nama']);
    });
} else {
    echo "Data siswa tidak tersedia.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa - Alamat di Jl. Mawar</title>
</head>
<body>
    <center><h3>Data Siswa yang Alamatnya di Jl. Mawar</h3></center>
    <center>
        <table border="1">
            <p><a href="latihan7.php">Ke Latihan 7</a></p>
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
                $dataDitemukan = false;

                foreach ($siswa as $anime) {
                    // Cek apakah alamat mengandung "Jl. Mawar"
                    if (strpos(($anime['alamat']), 'Jl. Mawar') !== false) {
                        $dataDitemukan = true;
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo htmlspecialchars($anime['nama']); ?></td>
                    <td><?php echo htmlspecialchars($anime['kelas']); ?></td>
                    <td><?php echo htmlspecialchars($anime['umur']); ?></td>
                    <td><?php echo htmlspecialchars($anime['tempat_lahir']) . ', ' . formatTanggal($anime['tanggal_lahir']); ?></td>
                    <td><?php echo htmlspecialchars($anime['alamat']); ?></td>
                </tr>
                <?php 
                    }
                }
                
                // Pesan jika tidak ada data yang sesuai
                if (!$dataDitemukan) {
                    echo "<tr><td colspan='6' style='text-align:center;'>Tidak ada siswa dengan alamat di Jl Mawar.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </center>
</body>
</html>

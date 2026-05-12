<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Stok Farid Store</title>
</head>
<body>
    <h2>Daftar Barang</h2>
    <a href="tambah.php">+ Tambah Barang Baru</a>
    <br><br>
    
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Nama Barang</th>
            <th>Stok</th>
            <th>Harga (Modal/Jual)</th>
            <th>Aksi</th>
        </tr>
        
        <?php
        // Mengambil semua data dari tabel barang, diurutkan dari yang terbaru
        $query = mysqli_query($conn, "SELECT * FROM barang ORDER BY id DESC");
        $no = 1;
        
        while($data = mysqli_fetch_array($query)) {
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $data['kode_barang']; ?></td>
            <td><?= $data['nama_barang']; ?></td>
            <td><?= $data['stok']; ?></td>
            <td>Rp <?= number_format($data['harga'], 0, ',', '.'); ?></td>
            <td>
                <!-- Melempar ID barang ke halaman edit dan hapus -->
                <a href="edit.php?id=<?= $data['id']; ?>">Edit</a> | 
                <a href="hapus.php?id=<?= $data['id']; ?>" onclick="return confirm('Yakin ingin menghapus?');">Hapus</a>
            </td>
        </tr>
        <?php } ?>
        
    </table>
</body>
</html>

<?php

 $query = mysqli_query($koneksi, "SELECT laporan_gaji.id_laporan, laporan_gaji.total_masuk, laporan_gaji.tanggal_laporan, jabatan.*, pegawai.nama_pegawai FROM laporan_gaji JOIN jabatan ON jabatan.id_jabatan = laporan_gaji.jabatan_id JOIN pegawai ON pegawai.id_pegawai = laporan_gaji.pegawai_id ");

?>
<html>
<head>
	<title>Print</title>
</head>
<style>
	table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px;
}
</style>
<center>
<body>
<br>
<br>
<h1>Laporan Gaji Karyawan</h1>

<table border="1">
	<tr >
		<th>No</th>
		<th>Nama Karyawan</th>
		<th>Jabatan Karyawan</th>
		<th>Total Masuk</th>
		<th>Gaji Bersih</th>
		<th>PPH</th>
 		<th>Jamsostek</th>
		<th>Total Gaji</th>
		<th>Tanggal Laporan</th>
	</tr>
 <?php $no = 1 ?>
	<?php while ($row = mysqli_fetch_assoc($query)) { ?>
	<tr>
		<td><?= $no++; ?></td>
		<td><?= $row['nama_pegawai'] ?></td>
        <td><?= $row['nama_jabatan'] ?></td>
        <td><?= $row['total_masuk'] ?></td>

        <td>Rp. <?= number_format(getTotalGaji($row['total_masuk'], $row['gaji_pokok'], $row['tunjangan_jabatan'])) ?></td>

        <td>Rp. <?= number_format(getPajak($row['total_masuk'], $row['gaji_pokok'], $row['tunjangan_jabatan'])) ?></td>

        <td>Rp. 141.000</td>

        <td>Rp. <?= number_format(getTotal($row['total_masuk'], $row['gaji_pokok'], $row['tunjangan_jabatan'])) ?></td>

         <td><?= $row['tanggal_laporan'] ?></td>
	</tr>
	<?php } ?>
</table>
<br>
<br>
<br>
<br>
<br>
<br>
<p class="mt-5 float-right ">Yang bertanda tangan HRD &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>
<br>
<br>
<br>
<div class="container float-right">
	<p class="mt-5 float-right">----------------- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>
</div>

</body>
</html>
</center>

<script>
        window.print();
    </script>
</body>
</html>
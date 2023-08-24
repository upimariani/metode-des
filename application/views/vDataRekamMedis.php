<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>

	<h1>REKAM MEDIS PENYAKIT</h1>

	<h3>PREDIKSI PERAMALAN METODE DES</h3>
	<h5>Prediksi Tahun <?= $thn_prediksi ?> | <?= $prediksi ?></h5>
	<form action="<?= base_url('cAnalisisDES/hitung') ?>" method="POST">
		<table>
			<tr>
				<td>Tahun</td>
				<td><input type="text" value="<?= $thn_prediksi ?>" name="tahun"></td>
			</tr>
			<tr>
				<td>Tahun Berikutnya</td>
				<td><input type="text" name="tahun_berikutnya"></td>
			</tr>
			<tr>
				<td>Jumlah Fakta Pengidap</td>
				<td><input type="text" name="jml_pengidap"></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><button type="submit">Hitung</button></td>
			</tr>
		</table>
	</form>
</body>

</html>
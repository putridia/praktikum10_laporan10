<?php
include('koneksi.php');
$label = ["India","Japan","S.Korea","Turkey","Vietnam","Taiwan","Iran","Indonesia","Malaysia","Israel"];

for($bulan = 1;$bulan < 11;$bulan++){
	$query = mysqli_query($koneksi,"SELECT sum(totalcases) AS jumlah FROM tb_covid19 WHERE id_covid='$bulan'");
	$row = $query->fetch_array();
	$jumlah_kasus[] = $row['jumlah'];
}

for($bulan = 1;$bulan < 11;$bulan++){
	$query = mysqli_query($koneksi,"SELECT sum(totaldeath) AS jumlah FROM tb_covid19 WHERE id_covid='$bulan'");
	$row = $query->fetch_array();
	$jumlah_death[] = $row['jumlah'];
}

for($bulan = 1;$bulan < 11;$bulan++){
	$query = mysqli_query($koneksi,"SELECT sum(totalrecover) AS jumlah FROM tb_covid19 WHERE id_covid='$bulan'");
	$row = $query->fetch_array();
	$jumlah_recover[] = $row['jumlah'];
}

for($bulan = 1;$bulan < 11;$bulan++){
	$query = mysqli_query($koneksi,"SELECT sum(activecases) AS jumlah FROM tb_covid19 WHERE id_covid='$bulan'");
	$row = $query->fetch_array();
	$jumlah_acases[] = $row['jumlah'];
}

for($bulan = 1;$bulan < 11;$bulan++){
	$query = mysqli_query($koneksi,"SELECT sum(totaltest) AS jumlah FROM tb_covid19 WHERE id_covid='$bulan'");
	$row = $query->fetch_array();
	$jumlah_test[] = $row['jumlah'];
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Membuat Grafik Menggunakan Chart JS</title>
		<script type="text/javascript" src="Chart.js"></script>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
			integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
			<style>
				body {
					padding-top: 1%;
				}
				.container {
					width: 1400px;
					height: 650px;
				}
			</style>
	</head>

	<body>
		<center><h2>GRAFIK BAR KASUS COVID-19</h2><center>
		<br>
		<center>
			<div class="container">
				<canvas id="myChart"></canvas>
			</div>
		<center>

		<script>
			var ctx = document.getElementById("myChart").getContext('2d');
			var myChart = new Chart(ctx, {
				type: 'bar',
				data: {
					labels: <?php echo json_encode($label); ?>,
					datasets: [{
						label: 'Total Case COVID-19',
						data: <?php echo json_encode($jumlah_kasus); ?>,
						backgroundColor: [
							'rgba(255, 99, 132, 0.2)',
							'rgba(255, 99, 132, 0.2)',
							'rgba(255, 99, 132, 0.2)',
							'rgba(255, 99, 132, 0.2)',
							'rgba(255, 99, 132, 0.2)',
							'rgba(255, 99, 132, 0.2)',
							'rgba(255, 99, 132, 0.2)',
							'rgba(255, 99, 132, 0.2)',
							'rgba(255, 99, 132, 0.2)',
							'rgba(255, 99, 132, 0.2)'
						],
						borderColor: [
							'rgba(255, 99, 132, 1)',
							'rgba(255, 99, 132, 1)',
							'rgba(255, 99, 132, 1)',
							'rgba(255, 99, 132, 1)',
							'rgba(255, 99, 132, 1)',
							'rgba(255, 99, 132, 1)',
							'rgba(255, 99, 132, 1)',
							'rgba(255, 99, 132, 1)',
							'rgba(255, 99, 132, 1)',
							'rgba(255, 99, 132, 1)'
						],
						borderWidth: 1
					},{
						label: 'Total Death COVID-19',
						data: <?php echo json_encode($jumlah_death); ?>,
						backgroundColor: [
							'rgba(54, 162, 235, 0.2)',
							'rgba(54, 162, 235, 0.2)',
							'rgba(54, 162, 235, 0.2)',
							'rgba(54, 162, 235, 0.2)',
							'rgba(54, 162, 235, 0.2)',
							'rgba(54, 162, 235, 0.2)',
							'rgba(54, 162, 235, 0.2)',
							'rgba(54, 162, 235, 0.2)',
							'rgba(54, 162, 235, 0.2)',
							'rgba(54, 162, 235, 0.2)'
						],
						borderColor: [
							'rgba(54, 162, 235, 1)',
							'rgba(54, 162, 235, 1)',
							'rgba(54, 162, 235, 1)',
							'rgba(54, 162, 235, 1)',
							'rgba(54, 162, 235, 1)',
							'rgba(54, 162, 235, 1)',
							'rgba(54, 162, 235, 1)',
							'rgba(54, 162, 235, 1)',
							'rgba(54, 162, 235, 1)',
							'rgba(54, 162, 235, 1)'
						],
						borderWidth: 1
					},{
						label: 'Total Recovered COVID-19',
						data: <?php echo json_encode($jumlah_recover); ?>,
						backgroundColor: [
							'rgba(255, 206, 86, 0.2)',
							'rgba(255, 206, 86, 0.2)',
							'rgba(255, 206, 86, 0.2)',
							'rgba(255, 206, 86, 0.2)',
							'rgba(255, 206, 86, 0.2)',
							'rgba(255, 206, 86, 0.2)',
							'rgba(255, 206, 86, 0.2)',
							'rgba(255, 206, 86, 0.2)',
							'rgba(255, 206, 86, 0.2)',
							'rgba(255, 206, 86, 0.2)'
						],
						borderColor: [
							'rgba(255, 206, 86, 1)',
							'rgba(255, 206, 86, 1)',
							'rgba(255, 206, 86, 1)',
							'rgba(255, 206, 86, 1)',
							'rgba(255, 206, 86, 1)',
							'rgba(255, 206, 86, 1)',
							'rgba(255, 206, 86, 1)',
							'rgba(255, 206, 86, 1)',
							'rgba(255, 206, 86, 1)',
							'rgba(255, 206, 86, 1)'
						],
						borderWidth: 1
					},{
						label: 'Active Cases COVID-19',
						data: <?php echo json_encode($jumlah_acases); ?>,
						backgroundColor: [
							'rgba(75, 192, 192, 0.2)',
							'rgba(75, 192, 192, 0.2)',
							'rgba(75, 192, 192, 0.2)',
							'rgba(75, 192, 192, 0.2)',
							'rgba(75, 192, 192, 0.2)',
							'rgba(75, 192, 192, 0.2)',
							'rgba(75, 192, 192, 0.2)',
							'rgba(75, 192, 192, 0.2)',
							'rgba(75, 192, 192, 0.2)',
							'rgba(75, 192, 192, 0.2)'
						],
						borderColor: [
							'rgba(75, 192, 192, 1)',
							'rgba(75, 192, 192, 1)',
							'rgba(75, 192, 192, 1)',
							'rgba(75, 192, 192, 1)',
							'rgba(75, 192, 192, 1)',
							'rgba(75, 192, 192, 1)',
							'rgba(75, 192, 192, 1)',
							'rgba(75, 192, 192, 1)',
							'rgba(75, 192, 192, 1)',
							'rgba(75, 192, 192, 1)'
						],
						borderWidth: 1
					},{
						label: 'Total Test COVID-19',
						data: <?php echo json_encode($jumlah_test); ?>,
						backgroundColor: [
							'rgba(133, 196, 155, 0.2)',
							'rgba(133, 196, 155, 0.2)',
							'rgba(133, 196, 155, 0.2)',
							'rgba(133, 196, 155, 0.2)',
							'rgba(133, 196, 155, 0.2)',
							'rgba(133, 196, 155, 0.2)',
							'rgba(133, 196, 155, 0.2)',
							'rgba(133, 196, 155, 0.2)',
							'rgba(133, 196, 155, 0.2)',
							'rgba(133, 196, 155, 0.2)'
						],
						borderColor: [
							'rgba(133, 196, 155, 1)',
							'rgba(133, 196, 155, 1)',
							'rgba(133, 196, 155, 1)',
							'rgba(133, 196, 155, 1)',
							'rgba(133, 196, 155, 1)',
							'rgba(133, 196, 155, 1)',
							'rgba(133, 196, 155, 1)',
							'rgba(133, 196, 155, 1)',
							'rgba(133, 196, 155, 1)',
							'rgba(133, 196, 155, 1)'
						],
						borderWidth: 1
					}]
				},
				options: {
					responsive:true,
					maintainAspectRatio: false,
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero:true
							}
						}]
					}
				}
			});
		</script>
	</body>
</html>
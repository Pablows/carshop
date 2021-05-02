<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC"); // using mysqli_query instead
?>

<html>

<head>
	<title>Início</title>

	<link rel="stylesheet" href="css/bootstrap.css">

</head>

<body class="bg-dark text-white">
	<?php include 'navbar.php' ?> 
	<!-- <a href="add.html">Add New Data</a><br/><br/> -->
	<div class="container mt-5">
		<table class="table table-dark table-striped shadow" width='80%' border=0>
			<thead>
				<td>Modelo</td>
				<td>Ano</td>
				<td>Placa</td>
				<td></td>
			</thead>
			
			<?php
			//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
			while ($res = mysqli_fetch_array($result)) {
				echo "<tr>";
				echo "<td>" . $res['name'] . "</td>";
				echo "<td>" . $res['age'] . "</td>";
				echo "<td>" . $res['email'] . "</td>";
				echo "<td><a class=\"btn btn-outline-primary me-3\" href=\"edit.php?id=$res[id]\">Editar</a>  <a class=\"btn btn-outline-danger\" href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Você tem certeza que quer apagar?')\">Apagar</a></td>";
			}
			?>
		</table>
	</div>

</body>

</html>
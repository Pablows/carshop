<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$age = mysqli_real_escape_string($mysqli, $_POST['age']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);	
	
	// checking empty fields
	if(empty($name) || empty($age) || empty($email)) {	
			
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($age)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}
		
		if(empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}		
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE users SET name='$name',age='$age',email='$email' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$name = $res['name'];
	$age = $res['age'];
	$email = $res['email'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
	<?php include "bootstrap.php"?>
</head>

<body class="bg-dark text-white">
<?php include "navbar.php"?>
	<div class="container mt-5">
        <form class="w-25" name="form1" method="post" action="edit.php">

        <div class="mb-3">
            <label class="form-label">Modelo</label>
            <input class="form-control" type="text" name="name" value="<?php echo $name;?>">
        </div>
        
        <div class="mb-3">
            <label class="form-label">Ano</label>
            <input class="form-control" type="text" name="age" 
			value="<?php echo $age;?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Placa</label>
            <input class="form-control" type="text" name="email"
			value="<?php echo $email;?>">
        </div>

		
		<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input class="btn btn-primary" type="submit" name="update" value="Editar">

        
        </form>
    </div>

	<!-- <form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Modelo</td>
				<td><input type="text" name="name" value="<?php echo $name;?>"></td>
			</tr>
			<tr> 
				<td>Ano</td>
				<td><input type="text" name="age" value="<?php echo $age;?>"></td>
			</tr>
			<tr> 
				<td>Placa</td>
				<td><input type="text" name="email" value="<?php echo $email;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form> -->
</body>
</html>

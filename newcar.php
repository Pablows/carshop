<html>

<head>
    <title>Add Data</title>
    <?php include 'bootstrap.php' ?>
</head>

<body class="bg-dark text-white">
    <?php include 'navbar.php' ?>
    <div class="container mt-5">
        <form class="w-25" action="add.php" method="post" name="form1">

        <div class="mb-3">
            <label class="form-label">Modelo</label>
            <input class="form-control" type="text" name="name">
        </div>
        
        <div class="mb-3">
            <label class="form-label">Ano</label>
            <input class="form-control" type="text" name="age">
        </div>

        <div class="mb-3">
            <label class="form-label">Placa</label>
            <input class="form-control" type="text" name="email">
        </div>


            <input class="btn btn-primary" type="submit" name="Submit" value="Adicionar"></td>

        
        </form>
    </div>
</body>

</html>
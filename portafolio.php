<?php

session_start();
if(isset($_SESSION['user']) != 'josemelendez'){

    header('location:login.php');
}


?>



<?php include "header.php" ?>
<?php include "db_config.php" ?>

<?php

if ($_POST) {

    $name = $_POST["name"];

    $description = $_POST['description'];

    $fecha = new DateTime();

    $imagen = $fecha->getTimestamp() . "_" . $_FILES["imagen"]["name"];

    $imagen_temporal = $_FILES['imagen']['tmp_name'];

    move_uploaded_file($imagen_temporal, "image/" . $imagen);

    $objConection = new Conection();

    $sql = "INSERT INTO `projects` (`id`, `name`, `imagen`, `description`) VALUES (NULL, '$name', '$imagen', '$description');";

    $objConection->executer($sql);

    header("location:portafolio.php");
}

if ($_GET) {

    $id = $_GET['borrar'];
    $objConection = new Conection();

    $imagen = $objConection->read("SELECT imagen FROM `projects` WHERE id=" . $id);
    unlink("image/" . $imagen[0]['imagen']);


    $sql = "DELETE FROM projects WHERE `projects`.`id` =" . $id;
    $objConection->executer($sql);

    header("location:portafolio.php");
}

$objConection = new Conection();

$projects = $objConection->read("SELECT * FROM `projects`");


?>

<br />


<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Datos del pryecto
                </div>
                <div class="card-body">
                    <form action="portafolio.php" method="post" enctype="multipart/form-data">
                        <label for="name">Project Name</label>
                        <input required class="form-control" type="text" name="name" id="name">

                        <br />

                        <label for="image">Project Image</label>
                        <input required class="form-control" type="file" name="imagen" id="image">

                        <br />

                        <label for="description">Description</label>
                        <textarea required class="form-control" name="description" id="description" cols="30" rows="2"></textarea>
                        <br />

                        <input class="btn btn-success" type="submit" value="Send project">

                </div>
            </div>




        </div>

        <div class="col-md-6">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($projects as $project) { ?>
                        <tr>
                            <?php //print_r($project) 
                            ?>
                            <td><?php echo $project['id'] ?></td>
                            <td><?php echo $project['name'] ?></td>
                            <td>
                                <img width="100" src="image/<?php echo $project['imagen']; ?>" alt="">
                            </td>
                            <td><?php echo $project['description'] ?></td>
                            <td><a class="btn btn-danger" href="?borrar=<?php echo $project['id']; ?>">Delete</a></td>
                        <?php } ?>
                        </tr>
                </tbody>
            </table>



        </div>
    </div>

</div>
<?php include 'footer.php' ?>
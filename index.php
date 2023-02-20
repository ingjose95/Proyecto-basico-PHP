<?php include 'header.php' ?>
<?php include 'db_config.php'?>


<?php


    $objConection = new Conection();

    $projects = $objConection->read("SELECT * FROM `projects`");



?>

<div class="container">

    <div class="p-5 bg-light mb-4">
        <div class="container">
            <h1 class="display-3">
                Bienvenidos
            </h1>
            <p class="lead">Este es un portafolio cerrado</p>
            <hr class="my-2">
            <p>Mas información</p>
        </div>

    </div>


    <div class="row row-cols-1 row-cols-md-3 g-4">

        <?php foreach ($projects as $project) { ?>

            <div class="col">
                <div class="card">
                    <img src="image/<?php echo $project['imagen']?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $project["name"];?></h5>
                        <p class="card-text"><?php echo $project["description"];?>.</p>
                    </div>
                </div>
            </div>

        <?php } ?>

    </div>

    <?php include 'footer.php' ?>
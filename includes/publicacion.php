<?php
    include 'config/Mysql.php';
    include 'modelos/Publicacion.php';
    $base = new Mysql();
    $cx = $base->connect();
    $publicaciones = new Publicacion($cx);
?>

<div class="container-fluid">
        <h1>Pasajeros <span>Satisfechos</span></h1>
        <div class="row">
          <?php foreach ($publicaciones->listar(0,1) as $publicacion):?>
            <div class="col-md-4">
              <article>
                <img src="img/articulos/<?=$publicacion->imagen?>" alt="Imagen del artículo" style="width: 450px; height: 200px;" >
                <h2><?=$publicacion->titulo?></h2>
                <p>Fecha de creación: <span><?=formatearFecha($publicacion->fecha_creacion)?></span></p>
                <exp><?=textoCorto($publicacion->texto,100)?></p>
                <a href="detalle.php?id=<?=$publicacion->id?>" class="btn2">Ver más</a>
              </article>
            </div>
          <?php endforeach; ?>    
      </div>
    </div>

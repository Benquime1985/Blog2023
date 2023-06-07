<?php 
    include "../includes/header.php";
    include '../config/Mysql.php';
    include '../modelos/Publicacion.php';
    $base = new Mysql();
    $cx = $base->connect();
    $publicacion = new Publicacion($cx);
?>


    <div class="row">
        <div class="col-sm-6">
            <h3>Lista de Publicaciones</h3>
        </div> 
        <div class="col-sm-4 offset-2">
            <a href="crear_publi.php" class="btn btn-success w-100"><i class="bi bi-plus-circle-fill"></i> Nueva Publicacion</a>
        </div>    
    </div>
    <div class="row mt-2 caja">
        <div class="col-sm-12">
                <table id="tblPublica" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titulo</th>
                            <th>Imagen</th> 
                            <th>Texto</th>
                            <th>Fecha de creación</th>              
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($publicacion->listar() as $publicacion):?>
                            <tr>
                                <td><?=$publicacion->id?></td>
                                <td><?=$publicacion->titulo?></td>
                                <td>
                                    <img class="<?=RUTA_FRONT?>img/articulos/<?=$publicacion->imagen?>" style="width:80px;">
                                </td>
                                <td><?=$publicacion->texto?></td>
                                <td><?=$publicacion->fecha_creacion?></td>                      
                                <td>
                                <a href="editar_articulo.php" class="btn btn-warning"><i class="bi bi-pencil-fill"></i></a>                       
                                </td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>       
                </table>
        </div>
    </div>
    <?php include("../includes/footer.php") ?>

    <script>
        $(document).ready( function () {
            $('#tblPublica').DataTable();
        });
    </script>
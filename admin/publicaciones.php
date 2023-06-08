<?php 
    include "../includes/header.php";
    include '../config/Mysql.php';
    include '../modelos/Publicacion.php';
    $base = new Mysql();
    $cx = $base->connect();
    $publicacion = new Publicacion($cx);
    if (isset($_GET['mensaje'])){
        $mensaje = $_GET['mensaje'];
    }
?>


    <div class="row">
        <div class="col-sm-6">
            <h3>Lista de Publicaciones</h3>
        </div> 
        <div class="col-sm-4 offset-2">
            <a href="gestion_publi.php?op=1" class="btn btn-success w-100"><i class="bi bi-plus-circle-fill"></i> Nueva Publicacion</a>
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
                            <?php if($_SESSION['rol_id']==1):?>
                            <th>Autor</th>
                            <?php endif;?>
                            <th>Fecha de creación</th>              
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($publicacion->listar($_SESSION['id'], $_SESSION['rol_id']) as $publicacion):?>
                            <tr>
                                <td><?=$publicacion->id?></td>
                                <td><?=$publicacion->titulo?></td>
                                <td>
                                    <img src="<?=RUTA_FRONT?>img/articulos/<?=$publicacion->imagen?>" style="width:180px;">
                                </td>
                                <td><?=$publicacion->texto?></td>
                                <?php if($_SESSION['rol_id']==1):?>
                                <td><?=$publicacion->autor?></td>
                                <?php endif;?>
                                <td><?=$publicacion->fecha_creacion?></td>                      
                                <td>
                                <a href="gestion_publi.php?op=2&id=<?=$publicacion->id?>" class="btn btn-warning"><i class="bi bi-pencil-fill"></i></a>                       
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
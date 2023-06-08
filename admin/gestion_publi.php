<?php 
    include '../includes/header.php';
    include '../config/Mysql.php';
    include '../modelos/Publicacion.php';
    $base = new Mysql();
    $cx = $base->connect();
    $publicacion = new Publicacion($cx);
    if (isset($_GET['op'])){
        $op = $_GET['op'];
        if ($op == 1){
            $titulo = "Crear articulo";
        }else{
            $titulo = "Editar articulo";
            $id = $_GET['id'];
            $publice = $publicacion->getPublicacion($id);
        }
    }if (isset($_POST['gestionPubli'])){
        $titulo = $_POST['titulo'];
        $texto = $_POST['texto'];
        if (empty($titulo) || $titulo =='' || empty($texto) || $texto==''){
            $error = "Algunos campos estan vacios";
        }else {
            if ($_FILES['imagen']['error']>0){
                if ($op!=2){
                    $error = "Error al subir la imagen";
                }else{
                    if ($publicacion->editar($id,$titulo,'',$texto)){
                        $mensaje = "Publicacion editada correctamente!!";
                        header("Location:publicaciones.php?mensaje=".urlencode($mensaje));
                    }
                }
            }else{
                $image = $_FILES['imagen']['name'];
                $imageArr = explode('.',$image);
                $rand = rand(1000, 9999);
                $newImage = $imageArr[0].$rand.".".$imageArr[1];
                $rutaFinal = '../img/articulos/'.$newImage;
                if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaFinal)){
                    if ($op==1){
                        if ($publicacion->crear($titulo, $newImage, $texto, $_SESSION['id'])){
                            $mensaje = 'Publicacion enviada correctamente';
                            header("Location:publicaciones.php?mensaje=".urlencode($mensaje));
                        }else{
                            $error = 'Ocurrio un error al enviar la publicacion';
                        }
                    }else{
                        if ($publicacion->editar($id,$titulo,$newImage,$texto)){
                            $mensaje = "Publicacion editada correctamente!!";
                            header("Location:publicaciones.php?mensaje=".urlencode($mensaje));
                        } else {
                            $error ="No se pudo editar la publicacion";
                        }
                    }
                }
            }
        }
    }if (isset($_POST['borrarPubli'])){
        if ($publicacion->eliminar($id)){
            $mensaje = "Publicacion eliminado correctamente!!";
            header("Location:publicaciones.php?mensaje=".urlencode($mensaje));
        } else {
            $error ="No se pudo borrar la publicacion";
        }
    }
?>


<!--Imprimir el error o el mensaje -->
<div class="row">
        <div class="col-md-12">
            <?php if (isset($error)) :?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong><?=$error?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif ;?>
        </div>
    </div>
        <div class="row">
            <div class="col-sm-12">
                <?php if (isset($mensaje)) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong><?=$mensaje?></strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif ;?>    
            </div>
    </div>



    <div class="row">
            <div class="col-sm-12">
                <h3 class="text-center"><?=$titulo?></h3>
            </div>            
        </div>
        <div class="row">
            <div class="col-sm-6 offset-3">
            <form method="POST" action="" enctype="multipart/form-data">

                    <input type="hidden" name="id" value="<?=isset($publice->id)?$publice->id:1?>">

                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título:</label>
                        <input type="text" class="form-control" name="titulo" id="titulo" value="<?=isset($publice->titulo)?$publice->titulo:''?>">               
                    </div>
                    <?php if ($op==2):?>
                        <div class="mb-3">
                            <img class="img-fluid img-thumbnail" src="../img/articulos/<?=isset($publice->imagen)?$publice->imagen:''?>">
                        </div>
                    <?php endif; ?>
                    
                        <div class="mb-3">
                            <label for="imagen" class="form-label">Imagen:</label>
                            <input type="file" accept=".jpg, .png" class="form-control" name="imagen" id="imagen" placeholder="Selecciona una imagen">               
                        </div>
                    
                    
                    <div class="mb-3">
                        <label for="texto">Texto</label>   
                        <textarea class="form-control" placeholder="Escriba el texto de su artículo" name="texto" style="height: 200px">
                        <?=isset($publice->texto)?$publice->texto:''?>
                        </textarea>              
                    </div>          
                
                    <br />
                    <?php if ($op==2):?>
                        <button type="submit" name="gestionPubli" class="btn btn-success float-left"><i class="bi bi-person-bounding-box"></i> Editar Publicacion</button>
                        <button type="submit" name="borrarPubli" class="btn btn-danger float-right"><i class="bi bi-person-bounding-box"></i> Borrar Publicacion</button>
                    <?php else:?>
                        <button type="submit" name="gestionPubli" class="btn btn-primary float-left"><i class="bi bi-person-bounding-box"></i> Crear Publicacion</button>
                    <?php endif;?>
                </from>
            </div>
        </div>
    <?php include("../includes/footer.php") ?>
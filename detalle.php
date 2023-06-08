<?php 
    include 'includes/header_front.php';
    include 'config/Mysql.php';
    include 'modelos/Publicacion.php';
    include 'modelos/Comentario.php';

    $base = new Mysql();
    $cx = $base->connect();
    $publicacion = new Publicacion($cx);
    $comentario = new Comentario($cx);
    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $publice = $publicacion->getPublicacion($id);
    }
    if (isset($_POST['enviarComentario'])){
        $texto = $_POST['comentario'];
        if (!(empty($texto) || $texto=='')){
            $usuario_id = $_SESSION['id'];
            $publicacion_id = $_POST['publicacion'];
            if ($comentario->crear_comentario($texto, $usuario_id, $publicacion_id)){
                header("Location:index.php");
            } else {
                $error = "Error al crear el comentario";
            }
        }else {
            $error = "Tiene que escribir algún comentario";
        }
    } 
?>

<!--IMPRIMIR MENSAJES-->
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
 
<!--FVISTA DE LOS COMENTARIOS Y Publicacion-->
    <div class="row">
       
    </div>

    <div class="container-fluid"> 
      
        <div class="row">
                
        <div class="row">
        <div class="col-sm-12">
            
        </div>  
    </div>

            <div class="col-sm-12">
                <div class="card">
                   <div class="card-header">
                        <h1><?=$publice->titulo?></h1>
                   </div>
                    <div class="card-body">
                        <div class="text-center">
                            <img class="img-fluid img-thumbnail" src="img/articulos/<?=$publice->imagen?>">
                        </div>

                        <p><?=$publice->texto?></p>

                    </div>
                </div>
            </div>
        </div>  
  
        
        <div class="row">        

<!--FORMULARIO DE LOS COMENTARIOS-->

        <?php if (isset($_SESSION['auth'])):?>        
            <div class="col-sm-6 offset-3">
            <form method="POST" action="">
                <input type="hidden" name="publicacion" value="<?=$id?>">
                        <div class="mb-3">
                            <label for="usuario" class="form-label">Usuario:</label>
                            <input type="text" class="form-control" name="usuario" id="usuario" value="<?=$_SESSION['email']?>" readonly>               
                        </div>
                    
                        <div class="mb-3">
                            <label for="comentario">Comentario</label>   
                            <textarea class="form-control" name="comentario" style="height: 200px"></textarea>              
                        </div>          
                    
                        <br />
                        <button type="submit" name="enviarComentario" class="btn btn-primary w-100"><i class="bi bi-person-bounding-box"></i> Crear Nuevo Comentario</button>
                    </form>
                </div>
            </div>
        <?php endif;?>
    </div>

<!--VISTA DE LOS COMENTARIOS-->
    <div class="row">
    <h3 class="text-center mt-5">Comentarios</h3>
        <?php foreach ($comentario->comentarios_publicacion($id) as $comentario):?>
            <h4><i class="bi bi-person-circle"></i><?=$comentario->autor?></h4>
            <p><?=$comentario->comentario?></p>
        <?php endforeach; ?>
    </div>
         
    </div>
<?php include("includes/footer.php") ?>
       
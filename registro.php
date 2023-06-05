<?php
    include 'includes/header_front.php';
    include 'config/Mysql.php';
    include 'modelos/Usuario.php';
    $base = new Mysql();
    $cx = $base->connect();
    $u = new Usuario($cx);
    if (isset($_POST['registrarse'])){
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmar_password = $_POST['confirmar_password'];
        if (empty($nombre) || $nombre=='' || empty($email) || $email=='' || empty($password) || $password=='' || empty($confirmar_password) || $confirmar_password==''){
            $error = "Algunos campos están vacíos, verifique !!";
        } else {
            if ($password != $confirmar_password){
                $error = "Las contraseñas no coinciden, verifique!!";
            }else{
                if (!$u->valida_email($email)){
                    if ($u->registro($nombre, $email, $password)){
                        $mensaje = "Se registro correctamente";
                    } else {
                    $error = "Ocurrió un error al registrar al usuario";
                        } 
                }else {
                        
                    $error = "Ya existe ese correo electrónico, verifique o coloque otro!!";
                }
            }
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


<!--Formulario de registro-->
    <section class="registro">
        <h2>Registro</h2>
            <div class="singupForm">
                <form method="POST" action="">

                    <label form="nombre">Nombre</label>
                    <input type="text" placeholder="Ingresa tu nombre" name="nombre">
                
                    <label form="email">Email</label>
                    <input type="email" placeholder="Ingresa tu email" name="email">
                
                    <label form="password">Contraseña</label>
                    <input type="password" placeholder="Ingresa el password" name="password">

                    <label form="confirmar_password">Confimar Contraseña</label>
                    <input type="password" placeholder="Confirma el password" name="confirmar_password">

                    <button type="submit" class="registrarse" id="registrarse" name="registrarse">registrar</button>
                </form>
            </div>
        <p>No Tienes una cuenta?<a href="acceder.php">Iniciar Seccion</a></p>
    </section>

<?php
    include 'includes/footer.php';
?>
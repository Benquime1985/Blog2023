<?php
    include 'includes/header_front.php';
    include 'config/Mysql.php';
    include 'modelos/Usuario.php';
    $base = new Mysql();
    $cx = $base->connect();
    $usuario = new Usuario($cx);
    if (isset($_POST['acceder'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        if (empty($email) || $email=='' || empty($password) || $password==''){
            $error = "Algunos campos están vacíos, verifique !!";
        }else {
            if ($usuario->acceder($email, $password)){
                $_SESSION['auth']=true;
                $_SESSION['email']=$email;
                $u = $usuario->usuario_email($email);
                $_SESSION['id'] = $u->id;
                $_SESSION['nombre'] = $u->nombre;
                $_SESSION['rol_id'] = $u->rol_id;
                header("location:". RUTA_FRONT ."index.php");
                die();
            } else {
                $error = "Correo y/o contraseña incorrectos";
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



    <section class="login">
        <h2>Login</h2>
        <form method='POST' action='' class="loginForm">
            
            <label">Email</label>
            <input type="email" placeholder="email" name="email">
            
            <label">Contraseña</label>
            <input type="password" placeholder="password" name="password">
            
            <button type="submit" class="button" id="acceder" name="acceder">Acceder</button>
        </form>
        <p>No Tienes una cuenta? <a href="registro.php">Resgistrarse</a></p>
    </section>

<?php
    include 'includes/footer.php';
?>
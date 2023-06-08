 <!-- Responsive navbar-->
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">Skygate</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <?php if(isset($_SESSION['auth'])):?>
                <ul class="navbar-nav "> 
                      
                    <li class="nav-item dropdown">
                    <?php if ($_SESSION['rol_id']==1):?>
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Abministrar
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="<?=RUTA_ADMIN;?>publicaciones.php">Publicaciones</a></li>
                            <li><a class="dropdown-item" href="<?=RUTA_ADMIN;?>comentarios.php">Comentarios</a></li> 
                            <li><a class="dropdown-item" href="<?=RUTA_ADMIN;?>usuarios.php">Usuarios</a></li>                         
                        </ul>

                    </li>
                    <?php endif;?>                     
                </ul>  
                <?php endif;?>


                <?php if(isset($_SESSION['auth'])):?>      
                <ul class="navbar-nav "> 
                <?php if ($_SESSION['rol_id']==2):?>  
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Mis Publicaciones
                        </a>
                       
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="<?=RUTA_ADMIN;?>Publicaciones.php">Publicaciones</a></li>
                            <li><a class="dropdown-item" href="<?=RUTA_ADMIN;?>comentarios.php">Comentarios</a></li>                        
                        </ul>

                    </li>
                    <?php endif;?>
                </ul>  
                <?php endif;?>




                <ul class="navbar-nav ms-md-auto">                       
                        <li class="nav-item">
                            <a class="nav-link" href="<?=RUTA_FRONT;?>index.php">Inicio</a>
                        </li> 
                        <?php if(!isset($_SESSION['auth'])):?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?=RUTA_FRONT;?>registro.php">Registrarse</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?=RUTA_FRONT;?>acceder.php">Acceder</a>
                            </li>
                        <?php endif;?>

                       
                        <?php if(isset($_SESSION['auth'])):?>
                            <li class="nav-item">
                                <p class="text-white mt-2">
                                    <i class="bi bi-person-circle"></i>
                                    <?=$_SESSION['nombre']?> 
                                </p>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?=RUTA_FRONT;?>salir.php">Salir</a>
                            </li>  
                        <?php endif;?>         
                    </ul>    
            </div>
        </div>
    </nav>


        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="index.php">SkyGate</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ">
                        <?php if(isset($_SESSION['auth'])):?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Administrar</a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Publicaciones</a></li>
                                    <li><a class="dropdown-item" href="<?=RUTA_ADMIN?>usuarios.php">Usuarios</a></li>
                                </ul>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="#">Mis Publicaciones</a></li>
                        <?php endif;?>
                    </ul>

                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="<?=RUTA_FRONT?>index.php">Inicio</a></li>
                        
                        <li class="nav-item"><a class="nav-link" href="#">Destinos</a></li>
                    
                        <li class="nav-item"><a class="nav-link" href="<?=RUTA_FRONT?>acceder.php">Acceder</a></li>
                        
                        <li class="nav-item"><a class="nav-link" href="<?=RUTA_FRONT?>registro.php">Registrarse</a></li>

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
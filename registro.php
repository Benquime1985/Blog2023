<?php
    include 'includes/header_front.php';
?>

    <section class="registro">
        <h2>Registro</h2>
        <form class="singupForm">
            <label>Nombre</label>
            <input type="text" placeholder="Nombre" id="nombre" required autofocus>
            <label">Email</label>
            <input type="email" placeholder="Email" class="Email" required >
            <label">Contraseña</label>
            <input type="password" placeholder="passwor" class="passwor" required>
            <input type="submit" value="Registrarse">
        </form>
        <p>No Tienes una cuenta?<a href="acceder.php"> Iniciar Seccion</a></p>
    </section>

<?php
    include 'includes/footer.php';
?>
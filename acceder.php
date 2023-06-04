<?php
    include 'includes/header_front.php';
?>

    <section class="">
        <h2>Login</h2>
        <form class="loginForm">
            <label">Email</label>
            <input type="email" placeholder="Email" class="Email" required autofocus>
            <label">Contraseña</label>
            <input type="password" placeholder="passwor" class="passwor" required>
            <input type="submit" value="Iniciar Sesión">
        </form>
        <p>No Tienes una cuenta?<a href="registro.php"> Resgistrarse</a></p>
    </section>
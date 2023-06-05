<?php
    include 'includes/header_front.php';
?>

    <section class="login">
        <h2>Login</h2>
        <form class="loginForm">
            <label">Email</label>
            <input type="email" placeholder="Email" class="Email" required autofocus>
            <label">Contraseña</label>
            <input type="password" placeholder="password" class="password" required>
            <input type="submit" value="Iniciar Sesión">
        </form>
        <p>No Tienes una cuenta?<a href="registro.php"> Resgistrarse</a></p>
    </section>

<?php
    include 'includes/footer.php';
?>
<h2>Recuperar contraseña</h2>

<form method="POST" action="index.php?route=recover">
    Email: <input type="email" name="email" required><br><br>

    Nueva contraseña: <input type="password" name="password" required><br><br>

    Confirmar contraseña: <input type="password" name="confirm_password" required><br><br>

    <button type="submit">Cambiar contraseña</button>
</form>

<br>
<a href="index.php?route=showLogin">Volver al login</a>
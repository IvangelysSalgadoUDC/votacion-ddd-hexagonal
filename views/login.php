<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Iniciar Sesión</h2>

<form method="POST" action="index.php?route=login">
    Email: <input type="email" name="email" required><br><br>
    Contraseña: <input type="password" name="password" required><br><br>

    <button type="submit">Ingresar</button>
    <br><br>
    <a href="index.php?route=showRegister">Registrarse</a>
</form>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
</head>
<body>
    <header></header>
    <main>
        <form action="../model/registrar.php" method="post">
            <input type="text" name="nombre" placeholder="Ingrese nombre" required>
            <input type="password" name="clave" placeholder="Ingrese clave" required>
            <input type="submit" value="Registrar" name="registrar">
        </form>
        <a href="formLogin.php">Logearse</a>
    </main>
    <footer></footer>
</body>
</html>
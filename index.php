<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>

    <link rel="stylesheet" href="style.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
</head>

<?php
session_start();
if (!isset($_SESSION["id_login"]))
    echo "<a href='views/formLogin.php'>Logearse</a>";
?>

<body>
    <header>
        <img src="" alt="logo">
        <nav id="nav">
            <a href="">Inicio</a>
            <a href="">Galería</a>
            <a href="">Contacto</a>
        </nav>

        <img id="menu" src="views/imgs/desplegar.png" alt="menu">

        <ul id="lista">
            <li><a href="">Inicio</a></li>
            <li><a href="">Galería</a></li>
            <li><a href="">Contacto</a></li>
        </ul>

    </header>


    <script>

        let click = false;

        document.getElementById("menu").addEventListener("click", () => {
            if (click) document.getElementById("lista").style.display = "flex";
            else document.getElementById("lista").style.display = "none";
            click = !click;
        });

    </script>

    <main>
        <?php
        require("controller/conex.php");

        $result = $conex->query("SELECT * FROM productos");

        $desc = $conex->query("DESC productos");

        if ($result->num_rows > 0) {
            echo "<table border='1'>";

            echo "<tr>";
            while ($tabla = $desc->fetch_assoc()) {
                echo "<th>" . $tabla["Field"] . "</th>";
            }
            echo "</tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id_producto"] . "</td>";
                echo "<td>" . $row["nombre"] . "</td>";
                echo "<td>$ " . $row["precio"] . "</td>";
                echo "<td>" . $row["stock"] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else
            echo "No hay datos";

        if (isset($_SESSION["id_login"])) {
            echo '<h3>Ingrese el producto</h3>
                <form action="model/insertar.php" method="post">
                    <input type="text" name="nombre" placeholder="Ingrese nombre" required>
                    <input type="number" min="1" step="0.01" name="precio" placeholder="Ingrese precio" required>
                    <input type="number" min="0" name="stock" placeholder="Ingrese stock" required>
                    <input type="submit" value="Insertar" name="insertar">
                </form>';

            echo '<form action="model/deslogearse.php" method="post">
                <input type="submit" value="Cerrar sesion">
                </form>';
        }

        ?>
    </main>

    <footer></footer>

    <script>
        <?php if (isset($_SESSION["alerta"])) { ?>

            Swal.fire({
                text: "<?php echo $_SESSION["alerta"]; ?>",
                icon: "<?php echo $_SESSION["icono"]; ?>",
            });

            <?php
            unset($_SESSION["alerta"]);
            unset($_SESSION["icono"]);
        }
        ?>
    </script>
</body>

</html>
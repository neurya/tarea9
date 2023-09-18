<?php 
include 'config.php'; // Esto incluye tu archivo de conexión.
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Biblioteca Virtual</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Catálogo de Libros</h1>

    <div class="menu">
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="catalogo.html">Catálogo</a></li>
            <li><a href="prestamos.html">Préstamos</a></li>
            <li><a href="eventos.html">Eventos</a></li>
            <li><a href="ayuda.html">Ayuda</a></li>
        </ul>
    </div>
	<style>
    .catalogo {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        gap: 20px;
    }
    .libro {
        text-align: center;
    }
    .libro img {
        max-width: 100%;
        height: auto;
    }
</style>


    
    <div class="catalogo">
        <?php
        $sql = "SELECT titulo, autor, imagen_portada FROM libros";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="libro">';
                echo '<img src="' . $row["imagen_portada"] . '" alt="' . $row["titulo"] . '">';
                echo '<h3>' . $row["titulo"] . '</h3>';
                echo '<p>' . $row["autor"] . '</p>';
                echo '</div>';
            }
        } else {
            echo "<p>No hay libros disponibles</p>";
        }
        ?>
    </div>
    
</section>

<?php 
$conn->close(); 
?>

</body>
</html>
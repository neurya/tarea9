<?php 
session_start();
include 'config.php'; // Esto incluye tu archivo de conexión.
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca en Línea</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Estilos aquí -->
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e9e9e9;
        }
        .header {
            background-color: #333;
            color: #fff;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .menu {
            list-style-type: none;
            padding: 0;
            margin-bottom: 20px;
        }
        .menu li {
            padding: 10px;
            text-align: center;
            background-color: #f1f1f1;
            cursor: pointer;
        }
        .menu li:hover {
            background-color: #ddd;
        }
        .footer {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
            clear: both;
        }
        .carousel-item {
            height: 400px;
        }
        .carousel-item img {
            max-height: 400px;
            margin: 0 auto;
        }
        .header div button, .header div input {
            vertical-align: middle;
            height: 38px;
        }
.libro {
    border: 1px solid #ddd;
    padding: 10px;
    margin: 10px;
    display: inline-block;
    vertical-align: top;
    width: 180px;
    text-align: center;
}

.libro img {
    max-width: 100%;
    height: auto;
}

.libro h3 {
    font-size: 16px;
    margin: 10px 0;
}
    </style>
</head>
<body>
<?php
if (isset($_SESSION['registro_exitoso']) && $_SESSION['registro_exitoso']) {
    echo '<div class="alert alert-success" role="alert">Registro exitoso</div>';
    $_SESSION['registro_exitoso'] = false;
}
?>
<?php if (isset($_SESSION['login_error'])): ?> 
    <div class="alert alert-danger" role="alert"><?= $_SESSION['login_error'] ?></div>
    <?php unset($_SESSION['login_error']); ?>
<?php endif; ?>

<?php if (isset($_SESSION['login_user'])): ?>
    <button class="btn btn-info ml-2" data-toggle="modal" data-target="#profileModal">Mi Perfil</button>
    <a href="logout.php" class="btn btn-danger ml-2">Cerrar Sesión</a>
<?php endif; ?>
<div class="header">
    <h1>Biblioteca Virtual</h1>
    <div>
        <input type="text" id="searchBox" class="form-control" placeholder="Buscar..." style="width:200px; display:inline-block;">
        <ul id="bookList" style="display: none; max-height: 200px; overflow-y: scroll; width: 200px; position: absolute; background: white; border: 1px solid #ccc;">
            <!-- Tus libros aquí -->
<li style="display: block;">Título del libro 1</li>
    <li style="display: block;">Título del libro 2</li>
    <li>Título del libro 1</li>
    <li>Título del libro 2</li>
    <li>Libro sobre programación</li>
    <li>Libro sobre diseño</li>
    <li>Historia de la literatura</li>
        </ul>
        <?php if (!isset($_SESSION['login_user'])): ?> 
            <button class="btn btn-info ml-2" data-toggle="modal" data-target="#loginModal">Login</button>
            <button class="btn btn-info ml-2" data-toggle="modal" data-target="#registerModal">Registrar</button>
        <?php endif; ?>
    </div>
</div>

<!-- El resto de tu contenido HTML -->

<!-- Comienza el contenido principal -->
<div class="container-fluid">
    <!-- Tu contenido aquí -->
<div class="row">
        <!-- Menú a la izquierda -->
        <div class="col-lg-2">
            <ul class="menu">
             <li><a href="index.php">Inicio</a></li>
        <li><a href="catalogo.php">Catálogo</a></li>
        <li><a href="prestamos.html">Préstamos</a></li>
        <li><a href="eventos.html">Eventos</a></li>
        <li><a href="ayuda.html">Ayuda</a></li>
            </ul>
</div>
<div class="col-lg-10">
            <div class="carousel-container">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="imagen1.jpg" alt="Imagen 1">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="imagen2.jpg" alt="Imagen 2">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="imagen3.jpg" alt="Imagen 3">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

<!-- Sección sobre nuestra biblioteca -->
            <section>
                <h2>Sobre nuestra biblioteca</h2>
                <p>Nuestra biblioteca en línea ofrece una amplia colección de libros de diferentes géneros, autores reconocidos y títulos recientes. Nuestra misión es promover la lectura y el aprendizaje continuo a través de un fácil acceso a la literatura.</p>
            </section>

            <!-- Sección de libros recomendados -->
            <section>
                <h2>Libros recomendados</h2>
                          <ul>
                <div>
    <div class="libro">
        <img src="portada1.png" alt="Título del libro 1">
        <h3>Analogías del amor y sus realidades</h3>
        <p>Neury Martinez</p>
    </div>
    <div class="libro">
        <img src="portada11.jpg" alt="Título del libro 2">
        <h3>El Hombre Más Rico de Babilonia</h3>
        <p>George S. Clason</p>
    </div>
<div class="libro">
        <img src="portada12.jpg" alt="Título del libro 3">
        <h3>De la nada al todo</h3>
        <p>José Contreras</p>
    </div>
<div class="libro">
        <img src="portada13.jpg" alt="Título del libro 4">
        <h3>La Tregua</h3>
        <p>Mario Benedetti</p>
    </div>
<div class="libro">
        <img src="portada14.jpg" alt="Título del libro 5">
        <h3>Paradigms</h3>
        <p>Joel Arthur Barker</p>
    </div>
</div>
                </ul>
            </section>
        </div>
    </div>
</div>

<!-- Modales de Registro y Login aquí -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Iniciar sesión</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
<!-- Modales y resto del contenido -->
<div class="modal-body">
                <!-- Formulario de inicio de sesión -->
				<!-- Codigo nuevo -->
                <form method="post" action="login.php"> 
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Ingresar email">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Contraseña:</label>
                        <input type="password" class="form-control" id="pwd" placeholder="Ingresar contraseña">
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox"> Recordarme
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true"> <!-- Codigo nuevo -->
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profileModalLabel">Mi Perfil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="updateProfile.php">
                    <!-- Aquí los campos del perfil, como nombre, apellido y cambiar contraseña -->
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Comienza el modal de registro -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerModalLabel">Registrar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <!-- Aquí comienza el formulario -->

                <form method="post" action="register.php">
                    <!--<div class="form-group">
                        <label for="profile">Perfil:</label>
                        <select id="profile" class="form-control" name="profile">
                            <option value="1">Administrador</option>
                            <option value="2">Usuario</option>
                        </select>
                    </div>-->

                    <div class="form-group">
                        <label for="registerEmail">Email:</label>
                        <input type="email" class="form-control" id="registerEmail" name="email" placeholder="Ingresar email">
                    </div>

                    <div class="form-group">
                        <label for="registerCedula">Cédula:</label>
                        <input type="text" class="form-control" id="registerCedula" name="cedula" placeholder="Ingresar Cédula">
                    </div>

                    <div class="form-group">
                        <label for="registerTelefono">Teléfono:</label>
                        <input type="text" class="form-control" id="registerTelefono" name="telefono" placeholder="Ingresar Teléfono">
                    </div>

                    <div class="form-group">
                        <label for="registerDireccion">Dirección:</label>
                        <input type="text" class="form-control" id="registerDireccion" name="direccion" placeholder="Ingresar Dirección">
                    </div>

                    <div class="form-group">
                        <label for="registerPwd">Contraseña:</label>
                        <input type="password" class="form-control" id="registerPwd" name="password" placeholder="Ingresar contraseña">
                    </div>

                    <div class="form-group">
                        <label for="confirmPwd">Confirmar Contraseña:</label>
                        <input type="password" class="form-control" id="confirmPwd" name="confirmPassword" placeholder="Confirmar contraseña">
                    </div>

                    <!-- El botón de envío -->
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </form>
                <!-- Aquí termina el formulario -->

            </div>
        </div>
    </div>
</div>



<!-- Modales aquí -->
<form method="post" action="register.php">
<!-- Footer con enlaces de redes sociales -->
<div class="footer">
    <p>Conéctate con nosotros:</p>
        <a href="#"><img src="facebook-7442092_1280.png" alt="Facebook" width="30px"></a>
    <a href="#"><img src="instagram-7411557_1280.png" alt="Instagram" width="30px"></a>
</div>
<script>
    const searchBox = document.getElementById('searchBox');
    const bookList = document.getElementById('bookList');
    const books = bookList.getElementsByTagName('li');

    searchBox.addEventListener('keyup', function() {
        const searchTerm = searchBox.value.toLowerCase();

        let count = 0;
        for (let book of books) {
            if (book.innerText.toLowerCase().includes(searchTerm)) {
                book.style.display = '';
                count++;
            } else {
                book.style.display = 'none';
            }
        }

        bookList.style.display = count ? '' : 'none';
    });

    document.addEventListener('click', function(event) {
        if (event.target !== searchBox) {
            bookList.style.display = 'none';
        }
    });
</script>
<?php 
$conn->close(); 
?>
<!-- Cierre de las etiquetas -->
</body>
</html>
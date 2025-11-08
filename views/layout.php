<?php
$auth = $_SESSION['login'] ?? null;


//temporal --
if (!isset($inicio)) {
  $inicio = false;
}
?>


<!-- header -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bienes Raices</title>
  <link rel="stylesheet" href="../public/build/css/app.css" />
</head>

<body>
  <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
    <div class="contenedor contenido-header">
      <div class="barra">
        <a href="/">
          <img src="/build/img/logo.svg" alt="logo" />
        </a>
        <div class="mobile-menu">
          <img src="/build/img/barras.svg" alt="icono de menu" />
        </div>

        <div class="derecha">
          <img
            src="/build/img/dark-mode.svg"
            alt="boton modo dark"
            class="dark-mode-boton" />
          <nav class="navegacion">
            <a href="/src/html/nosotros.php">Nosotros</a>
            <a href="/src/html/anuncios.php">Anuncios</a>
            <a href="/src/html/blog.php">Blog</a>
            <a href="/src/html/contacto.php">Contacto</a>
            <?php if ($auth): ?>
              <a href="/src/html/cerrar-sesion.php">Cerrar Sesión</a>
            <?php endif ?>
          </nav>
        </div>
      </div>

      <?php echo $inicio ? '<h1>Venta de casas y departamento exclusivos de lujo</h1>' : ''; ?>
    </div>
  </header>

  <?php echo $contenido; ?>

  <!-- footer -->
  <footer class="footer seccion">
    <div class="contenedor contenido-footer">
      <nav class="navegacion">
        <a href="/src/html/nosotros.php">Nosotros</a>
        <a href="/src/html/anuncios.php">Anuncios</a>
        <a href="/src/html/blog.php">Blog</a>
        <a href="/src/html/contacto.php">Contacto</a>
      </nav>
    </div>

    <p class="copyright">Todos los derechos reservados <?php echo date('20y'); ?> &copy;</p>
  </footer>
  <script src="../public/build/js/bundle.min.js"></script>
</body>

</html>
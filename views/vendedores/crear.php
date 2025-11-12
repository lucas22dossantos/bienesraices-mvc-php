<main class="contenedor seccion">

    <a href="/admin" class="boton boton-verde">Volver</a>
    <h1>Crear Vendedor</h1>

    <?php foreach ($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>

    <?php endforeach; ?>

    <form method="POST" class="formulario" enctype="multipart/form-data">
        <?php require __DIR__ . '/formulario.php'; ?>

        <input type="submit" value="Crear Vendedor" class="boton boton-verde">
    </form>

</main>
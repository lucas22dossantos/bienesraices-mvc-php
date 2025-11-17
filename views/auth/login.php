<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar Sesión</h1>

    <?php if (!empty($errores)) : ?>
        <?php foreach ($errores as $error) : ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach ?>
    <?php endif; ?>


    <form method="POST" class="formulario" action="/login">
        <fieldset>
            <legend>Correo y Contraseña</legend>

            <label for="email">Email:</label>
            <input
                type="email"
                id="email"
                name="correo"
                placeholder="Tu correo electrónico" required />

            <label for="contraseña">Contraseña:</label>
            <input
                type="password"
                id="contraseña"
                name="contrasena"
                placeholder="Tu contraseña" required />

        </fieldset>

        <input type="submit" value="Iniciar sesión" class="boton boton-verde">
    </form>
</main>
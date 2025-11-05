<?php

use App\Propiedad;

// Si se incluye desde index.php -> mostrar solo 3 propiedades
if (basename($_SERVER['SCRIPT_NAME']) === 'index.php') {
    $propiedades = Propiedad::get(3);
} else {
    // En anuncios.php u otras páginas -> mostrar todas
    $propiedades = Propiedad::todas();
}

?>


<div class="contenedor-anuncios">
    <?php foreach ($propiedades as $propiedad): ?>
        <div class="anuncio">
            <picture>
                <img src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="">
            </picture>

            <div class="contenido-anuncio">
                <h3><?php echo $propiedad->titulo; ?></h3>
                <p>
                    <?php echo $propiedad->descripcion; ?>
                </p>
                <p class="precio"><?php echo $propiedad->precio; ?></p>

                <ul class="icono-caracteristicas">
                    <li>
                        <img
                            class="icono"
                            loading="lazy"
                            src="/build/img/icono_wc.svg"
                            alt="Icono WC" />
                        <p><?php echo $propiedad->wc; ?></p>
                    </li>
                    <li>
                        <img
                            class="icono"
                            loading="lazy"
                            src="/build/img/icono_estacionamiento.svg"
                            alt="Icono estacionamiento" />
                        <p><?php echo $propiedad->estacionamiento; ?></p>
                    </li>
                    <li>
                        <img
                            class="icono"
                            loading="lazy"
                            src="/build/img/icono_dormitorio.svg"
                            alt="Icono dormitorio" />
                        <p><?php echo $propiedad->habitaciones; ?></p>
                    </li>
                </ul>

                <a href="anuncio.php?id=<?php echo $propiedad->id; ?>" class="boton boton-amarillo-block">
                    Ver propiedades
                </a>
            </div>
        </div>
    <?php endforeach; ?>
</div>
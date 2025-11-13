<main class="contenedor seccion contenido-centrado">

    <h1><?php echo $propiedad->titulo; ?></h1>

    <picture>
        <img loading="lazy" src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="Anuncio">
    </picture>

    <div class="resumen-propiedad">
        <p class="precio">$<?php echo number_format($propiedad->precio); ?></p>
        <ul class="icono-caracteristicas">
            <li>
                <img
                    class="icono"
                    loading="lazy"
                    src="../../build/img/icono_wc.svg"
                    alt="Icono WC" />
                <p><?php echo $propiedad->wc; ?></p>
            </li>
            <li>
                <img
                    class="icono"
                    loading="lazy"
                    src="../../build/img/icono_estacionamiento.svg"
                    alt="Icono estacionamiento" />
                <p><?php echo $propiedad->estacionamiento; ?></p>
            </li>
            <li>
                <img
                    class="icono"
                    loading="lazy"
                    src="../../build/img/icono_dormitorio.svg"
                    alt="Icono dormitorio" />
                <p><?php echo $propiedad->habitaciones; ?></p>
            </li>
        </ul>

        <p><?php echo $propiedad->descripcion; ?></p>
    </div>
</main>

<script src="../../build/js/bundle.min.js"></script>
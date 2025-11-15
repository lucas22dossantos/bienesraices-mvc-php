document.addEventListener("DOMContentLoaded", function () {
  desplegarMenu();
  darkMode();
  DesplegarContacto();
});

function desplegarMenu() {
  const mobileMenu = document.querySelector(".mobile-menu");

  mobileMenu.addEventListener("click", navResponsive);
}

function DesplegarContacto() {
  // Mostrar campos condicionales del formulario de contacto
  const metodoContacto = document.querySelectorAll(
    'input[name="contacto[contacto]"]'
  );

  metodoContacto.forEach((input) =>
    input.addEventListener("click", mostrarMetodoContacto)
  );
}

function mostrarMetodoContacto(e) {
  const contactoDiv = document.querySelector("#contacto");

  if (e.target.value === "telefono") {
    contactoDiv.innerHTML = `
    <label for="telefono">Teléfono:</label>
    <input type="tel" id="telefono" name="contacto[telefono]" placeholder="Tu teléfono" required pattern="[0-9]{10}" />
    
    <p>Seleccione fecha y hora para la llamada:</p>
    <label for="fecha">Fecha:</label>
    <input type="date" id="fecha" name="contacto[fecha]" require />
    
    <label for="hora">Hora:</label>
    <input type="time" id="hora" name="contacto[hora]" min="09:00" max="18:00" require />
        
    `;
  } else {
    contactoDiv.innerHTML = `
    <label for="email">Email:</label>
    <input type="email" id="email" name="contacto[email]" placeholder="Tu correo electrónico" required />
    `;
  }

  console.log(e);
}

function navResponsive() {
  const navegacion = document.querySelector(".navegacion");

  navegacion.classList.toggle("mostrar");
}

function darkMode() {
  const btnDarkMode = document.querySelector(".dark-mode-boton");

  // 1) Revisamos si hay un tema guardado en localStorage
  const temaGuardado = localStorage.getItem("tema");

  if (temaGuardado) {
    // Si el usuario ya eligió un tema antes, aplicamos ese
    if (temaGuardado === "oscuro") {
      document.body.classList.add("dark-mode");
    } else {
      document.body.classList.remove("dark-mode");
    }
  } else {
    // Si no hay preferencia guardada, seguimos la del sistema
    const modoOscuroQuery = window.matchMedia("(prefers-color-scheme: dark)");
    if (modoOscuroQuery.matches) {
      document.body.classList.add("dark-mode");
    }

    // Escuchamos cambios en el sistema SOLO si el usuario no eligió manualmente
    modoOscuroQuery.addEventListener("change", function (e) {
      if (e.matches) {
        document.body.classList.add("dark-mode");
      } else {
        document.body.classList.remove("dark-mode");
      }
    });
  }

  // 2) Al hacer clic en el botón, alternamos el tema y lo guardamos
  btnDarkMode.addEventListener("click", function () {
    document.body.classList.toggle("dark-mode");

    if (document.body.classList.contains("dark-mode")) {
      localStorage.setItem("tema", "oscuro");
    } else {
      localStorage.setItem("tema", "claro");
    }
  });
}

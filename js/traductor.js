// Idioma que está usando la página
let idioma = localStorage.getItem("idioma") || "es";

// Traducciones
const traducciones = {
    es: {
        inicio: "Inicio",
        nosotros: "Nosotros",
        servicios: "Servicios",
        contacto: "Contacto",
        iniciarSesion: "Iniciar sesión",
        cerrarSesion: "Cerrar sesión",
        usuario: "Usuario",
        contraseña: "Contraseña",
        enviar: "Enviar",
        cancelar: "Cancelar",
        guardar: "Guardar",
        modificar: "Modificar",
        eliminar: "Eliminar",
        volver: "Volver",
        buscar: "Buscar",
        editar: "Editar",
        crear: "Crear",
        ticket: "Ticket",
        tickets: "Tickets",
        solicitudes: "Solicitudes",
        usuarios: "Usuarios",
        tecnicos: "Técnicos",
        activos: "Activos",
        administrador: "Administrador",
        dashboard: "Dashboard",
        informes: "Informes",
        idioma: "Idioma"
    },

    en: {
        inicio: "Home",
        nosotros: "About us",
        servicios: "Services",
        contacto: "Contact",
        iniciarSesion: "Log in",
        cerrarSesion: "Log out",
        usuario: "User",
        contraseña: "Password",
        enviar: "Send",
        cancelar: "Cancel",
        guardar: "Save",
        modificar: "Edit",
        eliminar: "Delete",
        volver: "Back",
        buscar: "Search",
        editar: "Edit",
        crear: "Create",
        ticket: "Ticket",
        tickets: "Tickets",
        solicitudes: "Requests",
        usuarios: "Users",
        tecnicos: "Technicians",
        activos: "Assets",
        administrador: "Administrator",
        dashboard: "Dashboard",
        informes: "Reports",
        idioma: "Language"
    }
};


// Cambiar idioma
function cambiarIdioma(nuevoIdioma) {

    idioma = nuevoIdioma;

    // Guardamos el idioma elegido
    localStorage.setItem("idioma", nuevoIdioma);

    // Buscamos todos los elementos que tengan data-traducir
    const elementos = document.querySelectorAll("[data-traducir]");

    elementos.forEach(function(elemento) {

        const clave = elemento.getAttribute("data-traducir");

        if (traducciones[idioma][clave]) {
            elemento.textContent = traducciones[idioma][clave];
        }

    });
}


// Ejecutar cuando carga la página
document.addEventListener("DOMContentLoaded", function() {

    cambiarIdioma(idioma);

});

let idioma = localStorage.getItem("idioma") || "es";

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
        idioma: "Idioma",

        panelAdministrador: "Panel de administrador",
        descripcionPanel: "Desde este panel puede administrar los usuarios, activos, tickets y solicitudes del sistema.",
        registrarActivo: "Registrar activo",
        descripcionRegistrarActivo: "Registre un nuevo activo tecnológico en el sistema.",
        agregarActivo: "Agregar activo",
        gestionUsuarios: "Gestión de usuarios",
        descripcionUsuarios: "Registre, consulte y elimine usuarios del sistema.",
        administrarUsuarios: "Administrar usuarios",
        gestionActivos: "Gestión de activos",
        descripcionActivos: "Administre computadoras, impresoras y otros equipos.",
        administrarActivos: "Administrar activos",
        todosTickets: "Todos los tickets",
        descripcionTickets: "Consulte los problemas registrados por los usuarios.",
        verTickets: "Ver tickets",
        descripcionSolicitudes: "Consulte las solicitudes de servicio realizadas.",
        verSolicitudes: "Ver solicitudes",
        descripcionTecnicos: "Consulte los técnicos, sus áreas y tickets asignados.",
        administrarTecnicos: "Administrar técnicos",
        descripcionInformes: "Consulte estadísticas generales para tomar decisiones.",
        verInformes: "Ver informes",
        resumenGeneral: "Resumen general",
        usuariosRegistrados: "Usuarios registrados",
        activosTecnologicos: "Activos tecnológicos",
        ticketsPendientes: "Tickets pendientes",
        solicitudesPendientes: "Solicitudes pendientes",
        piePagina: "© 2026 Covasg - Sistema de soporte informático.",

        panelTecnico: "Panel del Técnico",
        descripcionPanelTecnico: "Desde este panel puedes consultar y gestionar los tickets y solicitudes del sistema.",
        descripcionTicketsTecnico: "Consultar los tickets registrados y actualizar su estado.",
        descripcionSolicitudesTecnico: "Consultar las solicitudes registradas y actualizar su estado.",
        pieTecnico: "© 2026 Covasg - Sistema de Gestión de Soporte",

        descripcionListaTickets: "Consulta los tickets registrados en el sistema.",
        id: "ID",
        titulo: "Título",
        prioridad: "Prioridad",
        estado: "Estado",
        accion: "Acción",
        ver: "Ver",

        descripcionListaSolicitudes: "Consulta las solicitudes registradas en el sistema.",
        tipo: "Tipo",

        detalleSolicitud: "Detalle de la solicitud",
        informacionSolicitud: "Información de la solicitud seleccionada.",
        solicitud: "Solicitud",
        descripcion: "Descripción",
        fechaCreacion: "Fecha de creación",
        cambiarEstado: "Cambiar estado",
        nuevoEstado: "Nuevo estado:",
        pendiente: "Pendiente",
        enProceso: "En proceso",
        finalizada: "Finalizada",
        guardarEstado: "Guardar estado",
        volverSolicitudes: "Volver a solicitudes",

        detalleTicket: "Detalle del ticket",
        informacionTicket: "Información del ticket seleccionado.",
        fechaCierre: "Fecha de cierre:",
        abierto: "Abierto",
        cerrado: "Cerrado",
        volverTickets: "Volver a tickets"

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
        idioma: "Language",

        panelAdministrador: "Administrator Panel",
        descripcionPanel: "From this panel you can manage the system's users, assets, tickets and requests.",
        registrarActivo: "Register Asset",
        descripcionRegistrarActivo: "Register a new technological asset in the system.",
        agregarActivo: "Add Asset",
        gestionUsuarios: "User Management",
        descripcionUsuarios: "Register, view and delete system users.",
        administrarUsuarios: "Manage Users",
        gestionActivos: "Asset Management",
        descripcionActivos: "Manage computers, printers and other equipment.",
        administrarActivos: "Manage Assets",
        todosTickets: "All Tickets",
        descripcionTickets: "View problems reported by users.",
        verTickets: "View Tickets",
        descripcionSolicitudes: "View submitted service requests.",
        verSolicitudes: "View Requests",
        descripcionTecnicos: "View technicians, their areas and assigned tickets.",
        administrarTecnicos: "Manage Technicians",
        descripcionInformes: "View general statistics to make decisions.",
        verInformes: "View Reports",
        resumenGeneral: "General Summary",
        usuariosRegistrados: "Registered Users",
        activosTecnologicos: "Technological Assets",
        ticketsPendientes: "Pending Tickets",
        solicitudesPendientes: "Pending Requests",
        piePagina: "© 2026 Covasg - IT Support System.",

        panelTecnico: "Technician Panel",
        descripcionPanelTecnico: "From this panel you can view and manage the system's tickets and requests.",
        descripcionTicketsTecnico: "View registered tickets and update their status.",
        descripcionSolicitudesTecnico: "View registered requests and update their status.",
        pieTecnico: "© 2026 Covasg - Support Management System",

        descripcionListaTickets: "View the tickets registered in the system.",
        id: "ID",
        titulo: "Title",
        prioridad: "Priority",
        estado: "Status",
        accion: "Action",
        ver: "View",

        descripcionListaSolicitudes: "View the requests registered in the system.",
        tipo: "Type",

        detalleSolicitud: "Request Details",
        informacionSolicitud: "Information about the selected request.",
        solicitud: "Request",
        descripcion: "Description",
        fechaCreacion: "Creation Date",
        cambiarEstado: "Change Status",
        nuevoEstado: "New Status:",
        pendiente: "Pending",
        enProceso: "In Progress",
        finalizada: "Completed",
        guardarEstado: "Save Status",
        volverSolicitudes: "Back to Requests",

        detalleTicket: "Ticket Details",
        informacionTicket: "Information about the selected ticket.",
        fechaCierre: "Closing Date:",
        abierto: "Open",
        cerrado: "Closed",
        volverTickets: "Back to Tickets"


    }
};


// Cambiar idioma
function cambiarIdioma(nuevoIdioma) {

    idioma = nuevoIdioma;

    localStorage.setItem("idioma", nuevoIdioma);

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

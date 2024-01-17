// Función para validar el formulario
function validarFormulario() {
    // Obtener referencias a los elementos del formulario
    var nombre = document.getElementById("nombre");
    var apellidos = document.getElementById("apellidos");
    var genero = document.querySelector('input[name="genero"]:checked');
    var usuario = document.getElementById("usuario");
    var contrasena = document.getElementById("pwd");
    var aceptarTerminos = document.getElementById("checkbox");

    // Expresiones regulares para validar los campos
    var regexNombre = /^[A-Z][a-zA-Záéíóú]{2,}([ ]?[A-Z][a-zA-Záéíóú]{2,})?$/;
    var regexApellidos = /^[A-Z][a-zA-Záéíóú]+ [A-Z][a-zA-Záéíóú]+$/;
    var regexUsuario = /^[a-zA-Z0-9\_\-]{4,16}$/;
    var regexContrasena = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;

    // Restablecer estilos de validación antes de realizar una nueva validación
    resetValidationStyles();

    // Variable que indica si el formulario es válido
    var isValid = true;
    
    // Validar el campo "nombre" con la expresión regular
    if (!nombre.value.match(regexNombre)) {
        setValidationError(nombre, "nombreError");
        isValid = false;
    }
    // Validar el campo "apellidos" con la expresión regular
    if (!apellidos.value.match(regexApellidos)) {
        setValidationError(apellidos, "apellidosError");
        isValid = false;
    }
     
     // Validar el campo "genero" para asegurarse de que se haya seleccionado una opción
    if (!genero) {
        setValidationError(document.querySelector('.radio'), "generoError");
        isValid = false;
    }

    // Validar el campo "usuario" con la expresión regular
    if (!usuario.value.match(regexUsuario)) {
        setValidationError(usuario, "usuarioError");
        isValid = false;
    }

    // Validar el campo "contrasena" con la expresión regular   
    if (!contrasena.value.match(regexContrasena)) {
        setValidationError(contrasena, "contrasenaError");
        isValid = false;
    }
    // Validar que se haya marcado la casilla de aceptar términos
    if (!aceptarTerminos.checked) {
        setValidationError(document.querySelector('.checkbox'), "terminosError");
        isValid = false;
    }

    // Devolver si el formulario es válido o no
    return isValid;
}


// Función para establecer estilos de error en un campo y mostrar el mensaje de error correspondiente
function setValidationError(inputElement, errorElementId) {
    // Agregar clase "invalid" al campo para resaltarlo como inválido
    inputElement.classList.add("invalid");
     // Obtener referencia al elemento de mensaje de error
    var errorElement = document.getElementById(errorElementId);
     // Mostrar el mensaje de error
    errorElement.style.display = "block";
}

// Función para restablecer estilos de validación en todos los campos del formulario
function resetValidationStyles() {
    // Obtener todos los elementos del formulario con la clase "form-control" y quitar la clase "invalid"
    var formElements = document.querySelectorAll(".form-control");
    formElements.forEach(function (element) {
        element.classList.remove("invalid");
    });


    // Obtener todos los elementos de mensaje de error y ocultarlo
    var errorElements = document.querySelectorAll(".error-message");
    errorElements.forEach(function (element) {
        element.style.display = "none";
    });

}


// Seleccionamos el formulario y sus campos
const form = document.querySelector('#contactus form');
const inputName = form.querySelector('input[placeholder="Nombres y Apellidos"]');
const inputNumber = form.querySelector('input[placeholder="(+57) 310 456 8796"]');
const inputSubject = form.querySelector('input[placeholder="Solicitud, Queja, Reclamos, Felicitaciones"]');
const inputComments = form.querySelector('textarea');

// Función para validar el campo de texto
function validateText(input) {
    return input.value.trim() !== '';
}

// Función para validar el campo de número de contacto
function validateNumber(input) {
    const phonePattern = /^[0-9]{10}$/; // Validación para un número de 10 dígitos
    return phonePattern.test(input.value.trim());
}

// Función para mostrar mensajes de error
function showError(input, message) {
    input.style.border = '2px solid red';
    alert(message);
}

// Función para limpiar errores
function clearError(input) {
    input.style.border = '';
}

// Manejar el envío del formulario
form.addEventListener('submit', (event) => {
    event.preventDefault(); // Evita el envío automático del formulario

    // Validar campos
    if (!validateText(inputName)) {
        showError(inputName, 'Por favor, ingrese sus nombres y apellidos.');
        return;
    } else {
        clearError(inputName);
    }

    if (!validateNumber(inputNumber)) {
        showError(inputNumber, 'Por favor, ingrese un número de contacto válido (10 dígitos).');
        return;
    } else {
        clearError(inputNumber);
    }

    if (!validateText(inputSubject)) {
        showError(inputSubject, 'Por favor, ingrese el asunto del mensaje.');
        return;
    } else {
        clearError(inputSubject);
    }

    if (!validateText(inputComments)) {
        showError(inputComments, 'Por favor, ingrese sus comentarios.');
        return;
    } else {
        clearError(inputComments);
    }

    // Si todos los campos son válidos, mostramos un mensaje de éxito
    alert('Formulario enviado exitosamente. ¡Gracias por contactarnos!');
    form.reset(); // Reiniciar el formulario
});

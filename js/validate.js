$(function() {
    /*-------------------FUNCIONES-------------------*/
    $.validator.addMethod('strongPassword', function(value, element){
        return this.optional(element)
        || value.length >= 6
        && /\d/.test(value)
        && /[a-z]/i.test(value);
    }, 'La constraseña tiene que ser mayor o igual a 6 carácteres y debe tener al menos un número');
    
    $.validator.addMethod( "lettersonly", function( value, element ) {
	return this.optional( element ) || /^[a-z]+$/i.test( value );
}, "Solo letras" );
    /*-------------------FUNCIONES-------------------*/
    
    $("#register-form").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            user: "required",
            pass: {
                required: true,
                strongPassword: true
            },
            pass2: {
                required: true,
                equalTo: "#password"
            },
            edad: {
                required: true,
                min: 18
            },
            nombre: {
                required: true,
                lettersonly: true 
            },  
            apellido: {
                required: true,
                lettersonly: true 
            }, 
            tipo: {
                required:true
            },
            sexo: {
                required: true
            }
            
        },
        messages: {
            email: {
                required: 'Este campo es requerido',
                email: 'Por favor ingresa un correo electrónico válido'
            },
            pass: {
              required: 'Este campo es requerido'  
            },
            pass2: {
                required: 'Este campo es requerido',
                equalTo: 'Las contraseñas no son iguales, por favor ingreselas de nuevo'
            },
            use: {
              required: 'Este campo es requerido'  
            },
            edad: {
                required: 'Este campo es requerido',
                min: 'Debes ser mayor de 18 años'
            },
            nombre: {
                required: 'Este campo es requerido'
            },
            apellido: {
                required: 'Este campo es requerido'
            },
            tipo: {
                required: '<b>Este campo es requerido</b>'
            }, 
            sexo: {
                required: 'Este campo es requerido'
            }
        }
    });
})
<?php

namespace App\Helpers\Enum;

class Message
{
    // Mensajes de validaciones
    public final const MODEL_IS_DIRTY = 'Se debe especificar al menos un valor diferente para actualizar.';
    public final const CREDENTIALS_INVALID = 'Credenciales inválidas.';
    public final const USER_IS_VERIFIED = 'El usuario ya fue verificado.';
    public final const USER_NOT_VERIFIED = 'Usuario no verificado.';
    public final const USER_INACTIVE = 'El usuario está inactivo.';
    public final const USER_BLOCKED = 'El usuario está bloqueado.';
    public final const INVALID_QUERY_PARAMETER = 'Parámetro de consulta inválido.';
    public final const INVALID_ID_PARAMETER_WITH_ID_BODY = 'El id es diferente al id del parámetro de ruta.';

    // Mensajes de excepciones
    public final const AUTHENTICATION_EXCEPTION = 'No autenticado.';
    public final const MODEL_NOT_FOUND_EXCEPTION = 'No existe el registro.';
    public final const AUTHORIZATION_EXCEPTION = 'No tiene permisos para ejecutar esta acción.';
    public final const NOT_FOUND_HTTP_EXCEPTION = 'No se encontró la URL especificada.';
    public final const METHOD_NOT_ALLOWED_HTTP_EXCEPTION = 'Método no válido.';
    public final const QUERY_EXCEPTION_1451 = 'No se puede eliminar el registro porque está relacionado con algún otro.';
    public final const INTERNAL_SERVER_ERROR = 'Ocurrió algo inesperado. Consulte al administrador.';
    public final const THROTTLE_REQUESTS_EXCEPTION = 'Muchos intentos realizados.';

    // Mensajes de asunto de correo electrónico
    public final const CONFIRM_EMAIL = 'Confirma tu correo electrónico';
    public final const EMAIL_UPDATED = 'Confirma tu nuevo correo electrónico';
    public final const RESTORE_PASSWORD = 'Nueva contraseña';

    public static function getMessageHasNotAllowedSorts(string $class): string
    {
        return "Establezca la propiedad pública allowedSorts dentro de $class";
    }
}

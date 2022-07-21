<?php

namespace App\Models\Enums;

enum TypeLookup: int
{
    case STATUS_USER = 1; // ESTATUS DEL USUARIO
    case SERVICES_LIST = 2; // SERVICIOS (REUNIÓN, CHOFER, AUTO)
    case STATUS_REQUEST = 3; // ESTATUS DE SOLICITUD (NUEVA, CANCELADA, EN REVISIÓN, ETC)
    case LEVEL_MEETING = 4; // TIPO DE REUNIÓN (ADMINISTRATIVA O DIRECTIVA)
    case INVENTORY_TYPE = 5; // TIPO DE INVENTARIO (Papelería, Botiquín, Limpieza, Cafetería)
    case UNIT_TYPE = 6; // UNIDAD DE MEDIDA (Pieza, Caja, Paquete, Kilo, Galón, Garrafa, Par, Bolsa, Bote)
    case STATUS_ROOM = 7; // (ACTIVA, BAJA, MANTENIMIENTO)
}

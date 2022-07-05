<?php

namespace App\Models\Enums;

enum TypeLookup: int
{
    case StatusUser = 1; // ESTATUS DEL USUARIO
    case ServicesList = 2; // SERVICIOS (REUNIÓN, CHOFER, AUTO)
    case StatusRequest = 3; // ESTATUS DE SOLICITUD (NUEVA, CANCELADA, EN REVISIÓN, ETC)
    case LevelMeeting = 4; // TIPO DE REUNIÓN (ADMINISTRATIVA O DIRECTIVA)
    case TypeSnack = 5; // (BEBIDA, SNACK, BOCADILLO)
     
}

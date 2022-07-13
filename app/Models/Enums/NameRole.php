<?php

namespace App\Models\Enums;

enum NameRole: string
{
    case ADMIN = 'Administrador';
    case RECEPCIONIST = 'Recepción';
    case APPLICANT = 'Solicitante';
}

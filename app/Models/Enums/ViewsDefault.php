<?php

namespace App\Models\Enums;

class ViewsDefault
{
    final public const VIEWS_DEFAULT_ADMIN = [
        [
            'path' => '/dashboard/usuario',
            'submenus' => []
        ]
    ];

    final public const VIEWS_DEFAULT_RECEPCIONIST = [
        [
            'path' => '/dashboard/solicitud',
            'submenus' => [
                ['path' => '/sala'],
                ['path' => '/auto'],
                ['path' => '/conductor']
            ]
        ],
        [
            'path' => '/dashboard/historial',
            'submenus' => [
                ['path' => '/sala'],
                ['path' => '/auto'],
                ['path' => '/conductor']
            ]
        ],
        [
            'path' => '/dashboard/calendario',
            'submenus' => []
        ],
        [
            'path' => '/dashboard/inventario',
            'submenus' => []
        ],
        [
            'path' => '/dashboard/reporte',
            'submenus' => []
        ],
    ];

    final public const VIEWS_DEFAULT_APPLICANT = [
        [
            'path' => '/dashboard/solicitud',
            'submenus' => [
                ['path' => '/sala'],
                ['path' => '/conductor']
            ]
        ],
        [
            'path' => '/dashboard/calendario',
            'submenus' => []
        ]
    ];
}

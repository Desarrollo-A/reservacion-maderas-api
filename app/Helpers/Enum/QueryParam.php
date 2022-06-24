<?php

namespace App\Helpers\Enum;

class QueryParam
{
    // Ordenado
    public final const ORDER_BY_KEY = 'sort';

    // Paginación
    public final const PAGINATION_KEY = 'per_page';
    public final const SKIP_PAGINATION_KEY = 'skip_paging';
    public final const PAGINATION_ITEMS_DEFAULT = 5;
    public final const SKIP_PAGINATION_DEFAULT = false;

    // Filtros
    public final const FILTERS_KEY = 'q';
    public final const FILTERS_FIELD_KEY = 'filters';
    public final const FIELD_KEY = 'field';
    public final const TYPE_KEY = 'type';
    public final const VALUE_KEY = 'value';
    public final const VALIDATION_KEY = 'validation';
}

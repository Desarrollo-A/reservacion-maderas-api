<?php

namespace App\Helpers;

use App\Exceptions\CustomErrorException;
use App\Helpers\Enum\Message;
use App\Helpers\Enum\QueryParam;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class Validation
{
    // Formatos
    final public const FORMAT_DATE_YMD = 'Y-m-d';

    // Expresiones regulares
    final public const PHONE_REGEX = '/^[0-9]{10}$/';

    public static function getPerPage(string $queryParam = null): int
    {
        if (is_null($queryParam)) {
            return QueryParam::PAGINATION_ITEMS_DEFAULT;
        }

        return (intval($queryParam) > 0) ? intval($queryParam) : QueryParam::PAGINATION_ITEMS_DEFAULT;
    }

    /**
     * @throws CustomErrorException
     */
    public static function getFilters(string $queryParam = null): array
    {
        if (is_null($queryParam)) {
            return [];
        }

        $json = urldecode($queryParam);
        $filters = json_decode($json, true);

        if (!isset($filters[QueryParam::FILTERS_FIELD_KEY])) {
            throw new CustomErrorException(Message::INVALID_QUERY_PARAMETER,Response::HTTP_BAD_REQUEST);
        }

        $arrayFilters = [];
        foreach ($filters[QueryParam::FILTERS_FIELD_KEY] as $filter) {
            if (!isset($filter[QueryParam::FIELD_KEY]) || !isset($filter[QueryParam::TYPE_KEY]) || !isset($filter[QueryParam::VALUE_KEY])) {
                throw new CustomErrorException(Message::INVALID_QUERY_PARAMETER, Response::HTTP_BAD_REQUEST);
            }

            switch ($filter[QueryParam::TYPE_KEY]) {
                case 'array':
                    if (!is_array($filter[QueryParam::VALUE_KEY])) {
                        throw new CustomErrorException(Message::INVALID_QUERY_PARAMETER, Response::HTTP_BAD_REQUEST);
                    }

                    $arrayFilters[$filter[QueryParam::FIELD_KEY]] = $filter[QueryParam::VALUE_KEY];
                    break;
                case 'boolean':
                    if (!is_bool($filter[QueryParam::VALUE_KEY])) {
                        throw new CustomErrorException(Message::INVALID_QUERY_PARAMETER, Response::HTTP_BAD_REQUEST);
                    }

                    $arrayFilters[$filter[QueryParam::FIELD_KEY]] = $filter[QueryParam::VALUE_KEY];
                    break;
                case 'date':
                    $arrayFilters[$filter[QueryParam::FIELD_KEY]] = self::validateDate($filter[QueryParam::VALUE_KEY]);
                    break;
                case 'double':
                    if (!is_double($filter[QueryParam::VALUE_KEY])) {
                        throw new CustomErrorException(Message::INVALID_QUERY_PARAMETER, Response::HTTP_BAD_REQUEST);
                    }

                    $arrayFilters[$filter[QueryParam::FIELD_KEY]] = $filter[QueryParam::VALUE_KEY];
                    break;
                case 'int':
                    if (!is_int($filter[QueryParam::VALUE_KEY])) {
                        throw new CustomErrorException(Message::INVALID_QUERY_PARAMETER, Response::HTTP_BAD_REQUEST);
                    }

                    $arrayFilters[$filter[QueryParam::FIELD_KEY]] = $filter[QueryParam::VALUE_KEY];
                    break;
                case 'string':
                    if (!is_string($filter[QueryParam::VALUE_KEY])) {
                        throw new CustomErrorException(Message::INVALID_QUERY_PARAMETER, Response::HTTP_BAD_REQUEST);
                    }

                    $arrayFilters[$filter[QueryParam::FIELD_KEY]] = $filter[QueryParam::VALUE_KEY];
                    break;
                default:
                    throw new CustomErrorException(Message::INVALID_QUERY_PARAMETER, Response::HTTP_BAD_REQUEST);
            }
        }

        return $arrayFilters;
    }

    /**
     * Función para validar una fecha en formato AAAA/MM/DD
     * @throws CustomErrorException
     */
    public static function validateDate(string $date = null): string | null
    {
        if (is_null($date)) {
            throw new CustomErrorException(Message::INVALID_QUERY_PARAMETER, Response::HTTP_BAD_REQUEST);
        }

        $dateParse = null;

        if (Str::of($date)->contains('/')) {
            $dateParse = explode('/', $date);
        }

        if (Str::of($date)->contains('-')) {
            $dateParse = explode('-', $date);
        }

        if (is_null($dateParse)) {
            throw new CustomErrorException(Message::INVALID_QUERY_PARAMETER, Response::HTTP_BAD_REQUEST);
        }

        if (count($dateParse) !== 3 && !checkdate($dateParse[1], $dateParse[2], $dateParse[0])) {
            throw new CustomErrorException(Message::INVALID_QUERY_PARAMETER, Response::HTTP_BAD_REQUEST);
        }

        return $date;
    }
}

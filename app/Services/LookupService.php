<?php

namespace App\Services;

use App\Contracts\Repositories\ILookupRepository;
use App\Contracts\Services\ILookupService;
use App\Core\BaseService;
use App\Core\Contracts\IBaseRepository;
use App\Exceptions\CustomErrorException;
use Illuminate\Http\Response;

class LookupService extends BaseService implements ILookupService
{
    protected IBaseRepository $entityRepository;

    public function __construct(ILookupRepository $lookupRepository)
    {
        $this->entityRepository = $lookupRepository;
    }

    /**
     * @throws CustomErrorException
     */
    public function validateLookup(int $lookupId, int $type, string $message = 'Lookup no válido'): void
    {
        $lookups = $this->entityRepository->findAllByType($type, ['id']);
        $exist = $lookups->contains(fn ($lookup) => $lookup->id === $lookupId);
        if (!$exist) {
            throw new CustomErrorException($message, Response::HTTP_BAD_REQUEST);
        }
    }
}

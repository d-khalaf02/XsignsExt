<?php
declare(strict_types=1);

namespace Xsigns\XsignsExt\Application\JsonImport;

use Xsigns\XsignsExt\Application\Abstractions\Repository\JsonDataRepositoryInterface;
use Xsigns\XsignsExt\Domain\Model\JsonData;

class ImportJsonDataCommandHandler
{
    private JsonDataRepositoryInterface $repository;

    public function __construct(JsonDataRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function handle(ImportJsonDataCommand $command): void
    {
        /*$error = [
            'error_code' => 'VALIDATION_ERROR',
            'message' => 'Invalid JSON data', //message from sympfony/validator
            'path' => 'amenity',
            'stack' => 'dsafsadfsaf/safasdfwadf/sadfasdfasdf/dfsadfsadf' //stack from ValidationException???
        ];*/

        $title = $command->getTitle();
        $payload = $command->getPayload();

        if (empty($title) || empty($payload)) {
            echo 'Empty title or payload';
            return;
        }

        $jsonData = new JsonData();
        $jsonData->setTitle($title);
        $jsonData->setPayload($payload);

        $this->repository->save($jsonData);
    }

    public function findAll(): array
    {
        return $this->repository->getSavedData();
    }
}
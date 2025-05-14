<?php
namespace Xsigns\XsignsExt\Application\Abstractions\Repository;

use Xsigns\XsignsExt\Domain\Model\JsonData;

interface JsonDataRepositoryInterface
{
    public function save(JsonData $jsonData): void;
    public function getSavedData(): array;
}
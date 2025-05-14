<?php
namespace Xsigns\XsignsExt\Infrastructure\Persistence;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings;
use Xsigns\XsignsExt\Domain\Model\JsonData;
use Xsigns\XsignsExt\Application\Abstractions\Repository\JsonDataRepositoryInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

class JsonDataRepository extends Repository implements JsonDataRepositoryInterface
{
    public function save(JsonData $jsonData): void
    {
        $this->objectType = JsonData::class;

        $this->add($jsonData);
    }

    public function getSavedData(): array
    {
        $this->objectType = JsonData::class;
        return $this->findAll()->toArray();
    }

    public function initializeObject(): void
    {
        $querySettings = GeneralUtility::makeInstance(Typo3QuerySettings::class);
        $querySettings->setRespectStoragePage(false); // Deaktiviere Filter nach `pid`
        $this->setDefaultQuerySettings($querySettings);
    }
}
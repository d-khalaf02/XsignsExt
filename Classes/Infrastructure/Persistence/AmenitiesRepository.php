<?php
namespace Xsigns\XsignsExt\Infrastructure\Persistence;

use TYPO3\CMS\Extbase\Persistence\Repository;
use Xsigns\XsignsExt\Application\Abstractions\Amenities\IAmenitiesRepository;
use Xsigns\XsignsExt\Domain\Model\Amenity;
use Exception;

class AmenitiesRepository extends Repository implements IAmenitiesRepository
{
    public function insert(Amenity $amenity): void
    {
        $this->objectType = Amenity::class;

        try {
            $this->add($amenity);
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
    }

    public function selectAll(): array
    {
        $this->objectType = Amenity::class;
        $amenities = $this->findAll()->toArray();

        echo json_encode($amenities);

        return $amenities;
    }
}
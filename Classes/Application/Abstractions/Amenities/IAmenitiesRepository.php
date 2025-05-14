<?php
namespace Xsigns\XsignsExt\Application\Abstractions\Amenities;

use Xsigns\XsignsExt\Domain\Model\Amenity;

interface IAmenitiesRepository
{
    public function insert(Amenity $amenity): void;
    public function selectAll(): array;
}
<?php
namespace Xsigns\XsignsExt\Application\Abstractions\Amenities;
use Xsigns\XsignsExt\Domain\Model\Amenity;

interface IAmenityValidator
{
    public function validate(Amenity $amenity);
    public function notEmpty(string $value): bool;
}
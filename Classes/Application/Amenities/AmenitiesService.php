<?php
namespace Xsigns\XsignsExt\Application\Amenities;

use Xsigns\XsignsExt\Application\Abstractions\Amenities\IAmenitiesRepository;
use Xsigns\XsignsExt\Domain\Model\Amenity;
use TYPO3\CMS\Extbase\Validation\Validator\ConjunctionValidator;

class AmenitiesService
{
    private IAmenitiesRepository $repository;
    private ConjunctionValidator $validator;

    public function __construct(IAmenitiesRepository $repository)
    {
        $this->repository = $repository;
    }

    public function setValidator(ConjunctionValidator $validator): void
    {
        $this->validator = $validator;
    }

    public function handle(Amenity $amenity): array
    {
        $results = $this->validator->validate($amenity);

        if ($results->hasErrors()) {
            $errors = [];
            foreach ($results->getFlattenedErrors() as $property => $violations) {
                foreach ($violations as $violation) {
                    $errors[] = [
                        'property' => $property,
                        'message'  => $violation->getMessage(),
                    ];
                }
            }
            return  [
                'errors' => $errors
            ];
        }

        $this->repository->insert($amenity);

        return [ 'success' => 'true' ];
    }

    public function getAmenities(): array
    {
        return $this->repository->selectAll();
    }
}
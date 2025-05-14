<?php
namespace Xsigns\XsignsExt\Application\Amenities\Validator;

use InvalidArgumentException;
use Xsigns\XsignsExt\Application\Abstractions\Amenities\IAmenityValidator;
use Xsigns\XsignsExt\Domain\Model\Amenity;
use Respect\Validation\Validator as v;

class AmenityValidator implements IAmenityValidator
{
    public function __construct() {}

    public function validate(Amenity $amenity): bool
    {
        try {

            $rules = [
                'id' => v::stringType()->notBlank()->length(2, 255),
                'icon' => v::stringType()->notBlank()->length(2, 255),
                'name' => v::stringType()->notBlank()->length(2, 255),
            ];
            echo 'validator:' . "\n";
        } catch (\Exception $e){
          echo $e->getMessage();
        }



        $errors = [];

        foreach ($rules as $property => $rule) {
            $value = $amenity->$property;
            if (!$rule->validate($value)) {
                $errors[] = sprintf(
                    '%s: Wert "%s" ist ungültig',
                    $property,
                    $value
                );
            }
        }

        if (!empty($errors)) {
            throw new InvalidArgumentException(json_encode([
                'error_code' => 'VALIDATION_ERROR',
                'violations' => $errors,
            ]));
        }

        return true;
    }

    public function notEmpty(string $value): bool
    {
        return !empty($value);
    }
}
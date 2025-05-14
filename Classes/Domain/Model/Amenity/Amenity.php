<?php
namespace Xsigns\XsignsExt\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Annotation\Validate;

class Amenity extends AbstractEntity
{
    #[Validate([
        'validator' => 'StringLength',
        'options' => [
            'maximum' => 255,
            'minimum' => 5
        ],
    ])]
    protected string $icon;

    #[Validate([
        'validator' => 'NotEmpty',
    ])]
    protected string $id;

    #[Validate([
        'validator' => 'StringLength',
        'options' => ['maximum' => 255, 'minimum' => 5],
    ])]
    protected string $name;

    public function getIcon(): string
    {
        return $this->icon;
    }

    public function setIcon(string $icon): void
    {
        $this->icon = $icon;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }
}
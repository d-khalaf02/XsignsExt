<?php
namespace Xsigns\XsignsExt\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class JsonData extends AbstractEntity
{
    protected string $title;
    protected string $payload;

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getPayload(): string
    {
        return $this->payload;
    }

    public function setPayload(string $payload): void
    {
        $this->payload = $payload;
    }
}
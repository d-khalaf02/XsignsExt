<?php
namespace Xsigns\XsignsExt\Application\JsonImport;

readonly class ImportJsonDataCommand
{
    public function __construct(
        private string $title,
        private string  $payload
    ) {}

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getPayload(): string
    {
        return $this->payload;
    }
}
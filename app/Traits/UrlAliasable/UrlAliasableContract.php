<?php


namespace App\Traits\UrlAliasable;

interface UrlAliasableContract
{
    public function generateUrlSource(): string;

    public function generateUrlAlias(string $rawAliasPath = null): string;
}

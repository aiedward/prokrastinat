<?php
namespace Prokrastinat\DBAL\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;

class String1252Type extends StringType
{
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return mb_convert_encoding($value, 'UTF-8', 'Windows-1252');
    }
}
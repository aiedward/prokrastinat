<?php
namespace Prokrastinat\DBAL\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\DateTimeType;

class MSDateTimeType extends DateTimeType
{
    private $datetimeFormat = 'M j Y h:i:s:uA';

    /* zaenkrat ni potrebno
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return ($value !== null)
            ? $value->format($platform->getDateTimeFormatString()) : null;
    }
    */

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        
        if ($value === null || $value instanceof \DateTime) {
            return $value;
        }

        $val = \DateTime::createFromFormat($this->datetimeFormat, $value);
        if ( ! $val) {
            throw ConversionException::conversionFailedFormat($value, $this->getName(), $this->datetimeFormat);
        }
        return $val;
    }
}
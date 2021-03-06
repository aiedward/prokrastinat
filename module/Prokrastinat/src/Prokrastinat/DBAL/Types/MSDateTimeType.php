<?php
namespace Prokrastinat\DBAL\Types;

use Doctrine\DBAL\Types\ConversionException;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\DateTimeType;

class MSDateTimeType extends DateTimeType
{
    private $datetimeFormat = 'M j Y h:i:s:uA';

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        
        if ($value === null || $value instanceof \DateTime) {
            return $value;
        }

        $val = \DateTime::createFromFormat($this->datetimeFormat, $value);
        if (!$val) {
            $val = \DateTime::createFromFormat($platform->getDateTimeFormatString(), $value);
            if (!$val) {
                throw ConversionException::conversionFailedFormat($value, $this->getName(), $this->datetimeFormat . ' or ' . $platform->getDateTimeFormatString());
            }
        }
        return $val;
    }
}
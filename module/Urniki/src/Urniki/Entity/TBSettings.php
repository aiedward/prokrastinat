<?php
namespace Urniki\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/** @ORM\Entity */
class TBSettings extends BaseEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(length=40)
     */
    protected $Name;

    /** @ORM\Column(length=40) */
    protected $Value;

}

<?php
namespace Urniki\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="dbo.TBTime")
 */
class TBTime extends BaseEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $Time_Id;

    /** @ORM\Column(length=20) */
    protected $Start_Hour;

    /** @ORM\Column(length=20) */
    protected $End_Hour;

}

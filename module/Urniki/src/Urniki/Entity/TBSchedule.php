<?php
namespace Urniki\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/** @ORM\Entity */
class TBSchedule extends BaseEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $Schedule_Id;

    /** @ORM\Column(type="integer") */
    protected $Course_Id;

    /** @ORM\Column(type="integer") */
    protected $TurnPart_Id;

    /** @ORM\Column(type="integer") */
    protected $Room_Id;

    /** @ORM\Column(type="integer") */
    protected $Day_Id;

    /** @ORM\Column(type="integer") */
    protected $Time_Id;

    /** @ORM\Column(type="integer") */
    protected $Duration;

    /** @ORM\Column(type="integer") */
    protected $Valid_From;

    /** @ORM\Column(type="integer") */
    protected $Valid_To;

    /** @ORM\Column(type="integer") */
    protected $Merge_Id;

    /** @ORM\Column(type="integer") */
    protected $Flags;

}

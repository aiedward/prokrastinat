<?php
namespace Urniki\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/** @ORM\Entity */
class TBReservation extends BaseEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $Reservation_Id;

    /** @ORM\Column(type="integer") */
    protected $Type;

    /** @ORM\Column(length=512) */
    protected $Note;

    /** @ORM\Column(type="integer") */
    protected $Owner_Id;

    /** @ORM\Column(type="integer") */
    protected $From_Week;

    /** @ORM\Column(type="integer") */
    protected $To_Week;

    /** @ORM\Column(type="integer") */
    protected $From_Day;

    /** @ORM\Column(type="integer") */
    protected $To_Day;

    /** @ORM\Column(type="integer") */
    protected $Begins_At;

    /** @ORM\Column(type="integer") */
    protected $Duration;

    /** @ORM\Column(type="integer") */
    protected $Merge_Id;

    /** @ORM\Column(type="integer") */
    protected $Status;

}

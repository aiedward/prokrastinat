<?php
namespace Urniki\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/** @ORM\Entity */
class TBTurnPart extends BaseEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $TurnPart_Id;

    /** @ORM\Column(type="integer") */
    protected $Turn_Id;

    /** @ORM\Column(length=80) */
    protected $Display_Name;

    /** @ORM\Column(type="integer") */
    protected $Use_Custom_Stud_Num;

    /** @ORM\Column(type="integer") */
    protected $Actual_Stud_Num;

    /** @ORM\Column(type="integer") */
    protected $Merge_Id;

}

<?php
namespace Urniki\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/** @ORM\Entity */
class TBStudent extends BaseEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $Student_Id;

    /** @ORM\Column(length=40) */
    protected $First_Name;

    /** @ORM\Column(length=40) */
    protected $Last_Name;

    /** @ORM\Column(length=16) */
    protected $Student_Num;

    /** @ORM\Column(length=20) */
    protected $Branch_Code;

    /** @ORM\Column(type="integer") */
    protected $Year;

    /** @ORM\Column(type="integer") */
    protected $Merge_Id;

}

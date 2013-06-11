<?php
namespace Urniki\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/** @ORM\Entity */
class TBBranch extends BaseEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $Branch_Id;

    /** @ORM\Column(type="integer") */
    protected $Program_Id;

    /** @ORM\Column(length=100) */
    protected $Name;

    /** @ORM\Column(length=40) */
    protected $Code;

    /** @ORM\Column(type="integer") */
    protected $Year;

    /** @ORM\Column(type="integer") */
    protected $Students_Num;

    /** @ORM\Column(type="integer") */
    protected $Seq_Num;

    /** @ORM\Column(type="integer") */
    protected $Merge_Id;

}

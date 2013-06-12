<?php
namespace Urniki\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="dbo.TBCourse")
 */
class TBCourse extends BaseEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $Course_Id;

    /** @ORM\Column(type="integer") */
    protected $Execution_Type;

    /** @ORM\Column(length=100) */
    protected $Name;

    /** @ORM\Column(length=40) */
    protected $Code;

    /** @ORM\Column(type="integer") */
    protected $Preferred_Time;

    /** @ORM\Column(type="integer") */
    protected $Seq_Num;

    /** @ORM\Column(type="integer") */
    protected $Merge_Id;

    /** @ORM\Column(type="integer") */
    protected $Flags;

}

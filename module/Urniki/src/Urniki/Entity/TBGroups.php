<?php
namespace Urniki\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/** @ORM\Entity */
class TBGroups extends BaseEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $Groups_Id;

    /** @ORM\Column(type="integer") */
    protected $Branch_Id;

    /** @ORM\Column(length=40) */
    protected $Name;

    /** @ORM\Column(type="integer") */
    protected $Students_Num;

    /** @ORM\Column(length=128) */
    protected $Note;

    /** @ORM\Column(length=20) */
    protected $Password;

    /** @ORM\Column(type="integer") */
    protected $Flags;

    /** @ORM\Column(type="integer") */
    protected $Parent_Group_Id;

    /** @ORM\Column(type="integer") */
    protected $Group_Class;

    /** @ORM\Column(type="integer") */
    protected $City_Id;

    /** @ORM\Column(type="integer") */
    protected $Merge_Id;

}

<?php
namespace Urniki\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="dbo.TBTutor")
 */
class TBTutor extends BaseEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $Tutor_Id;

    /** @ORM\Column(length=40) */
    protected $First_Name;

    /** @ORM\Column(length=40) */
    protected $Last_Name;

    /** @ORM\Column(length=20) */
    protected $Password;

    /** @ORM\Column(type="string1252", length=255) */
    protected $Note;

    /** @ORM\Column(length=20) */
    protected $Code;

    /** @ORM\Column(length=40) */
    protected $Email;

    /** @ORM\Column(type="integer") */
    protected $Room_Id;

    /** @ORM\Column(type="integer") */
    protected $City_Id;

    /** @ORM\Column(type="integer") */
    protected $Flags;

    /** @ORM\Column(type="integer") */
    protected $Merge_Id;

}

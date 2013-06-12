<?php
namespace Urniki\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/** @ORM\Entity */
class TBCoursePart_RProp extends BaseEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $CoursePart_Id;

    /** @ORM\Column(type="integer") */
    protected $RProp_Id;

}

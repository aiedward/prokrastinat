<?php
namespace Urniki\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/** @ORM\Entity */
class TBCourseType extends BaseEntity
{
	/** @ORM\Column(type="integer") */
	protected $CourseType_Id;

	/** @ORM\Column(length=100) */
	protected $Name;

}

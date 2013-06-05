<?php
namespace Urniki\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/** @ORM\Entity */
class TBCoursePart_RProp extends BaseEntity
{
	/** @ORM\Column(type="Integer") */
	protected $CoursePart_Id;

	/** @ORM\Column(type="Integer") */
	protected $RProp_Id;

}

<?php
namespace Urniki\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/** @ORM\Entity */
class TBStudent_Course extends BaseEntity
{
	/** @ORM\Column(type="Integer") */
	protected $Student_Id;

	/** @ORM\Column(type="Integer") */
	protected $Course_Id;

}
<?php
namespace Urniki\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/** @ORM\Entity */
class TBCourse_Branch extends BaseEntity
{
	/** @ORM\Column(type="Integer") */
	protected $Course_Id;

	/** @ORM\Column(type="Integer") */
	protected $Branch_Id;

}

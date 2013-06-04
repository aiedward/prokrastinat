<?php
namespace Urniki\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/** @ORM\Entity */
class TBCourse extends BaseEntity
{
	/** @ORM\Column(type="Integer") */
	protected $Course_Id;

	/** @ORM\Column(type="Integer") */
	protected $Execution_Type;

	/** @ORM\Column(length=100) */
	protected $Name;

	/** @ORM\Column(length=40) */
	protected $Code;

	/** @ORM\Column(type="Integer") */
	protected $Preferred_Time;

	/** @ORM\Column(type="Integer") */
	protected $Seq_Num;

	/** @ORM\Column(type="Integer") */
	protected $Merge_Id;

	/** @ORM\Column(type="Integer") */
	protected $Flags;

}

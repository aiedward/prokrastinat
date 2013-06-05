<?php
namespace Urniki\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/** @ORM\Entity */
class TBTurn extends BaseEntity
{
	/** @ORM\Column(type="Integer") */
	protected $Turn_Id;

	/** @ORM\Column(type="Integer") */
	protected $CoursePart_Id;

	/** @ORM\Column(type="Integer") */
	protected $Seq_Num;

	/** @ORM\Column(type="Integer") */
	protected $Room_Id;

	/** @ORM\Column(length=128) */
	protected $Duration;

	/** @ORM\Column(type="Integer") */
	protected $Merge_Id;

	/** @ORM\Column(type="Integer") */
	protected $No_Pauses;

	/** @ORM\Column(type="Integer") */
	protected $Start_Hour;

	/** @ORM\Column(type="Integer") */
	protected $Flags;

	/** @ORM\Column(type="Integer") */
	protected $Valid_From;

	/** @ORM\Column(type="Integer") */
	protected $Valid_To;

}

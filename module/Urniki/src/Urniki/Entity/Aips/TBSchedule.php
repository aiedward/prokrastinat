<?php
namespace Urniki\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/** @ORM\Entity */
class TBSchedule extends BaseEntity
{
	/** @ORM\Column(type="Integer") */
	protected $Schedule_Id;

	/** @ORM\Column(type="Integer") */
	protected $Course_Id;

	/** @ORM\Column(type="Integer") */
	protected $TurnPart_Id;

	/** @ORM\Column(type="Integer") */
	protected $Room_Id;

	/** @ORM\Column(type="Integer") */
	protected $Day_Id;

	/** @ORM\Column(type="Integer") */
	protected $Time_Id;

	/** @ORM\Column(type="Integer") */
	protected $Duration;

	/** @ORM\Column(type="Integer") */
	protected $Valid_From;

	/** @ORM\Column(type="Integer") */
	protected $Valid_To;

	/** @ORM\Column(type="Integer") */
	protected $Merge_Id;

	/** @ORM\Column(type="Integer") */
	protected $Flags;

}

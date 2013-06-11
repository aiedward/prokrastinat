<?php
namespace Urniki\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/** @ORM\Entity */
class TBTurn extends BaseEntity
{
	/** @ORM\Column(type="integer") */
	protected $Turn_Id;

	/** @ORM\Column(type="integer") */
	protected $CoursePart_Id;

	/** @ORM\Column(type="integer") */
	protected $Seq_Num;

	/** @ORM\Column(type="integer") */
	protected $Room_Id;

	/** @ORM\Column(length=128) */
	protected $Duration;

	/** @ORM\Column(type="integer") */
	protected $Merge_Id;

	/** @ORM\Column(type="integer") */
	protected $No_Pauses;

	/** @ORM\Column(type="integer") */
	protected $Start_Hour;

	/** @ORM\Column(type="integer") */
	protected $Flags;

	/** @ORM\Column(type="integer") */
	protected $Valid_From;

	/** @ORM\Column(type="integer") */
	protected $Valid_To;

}

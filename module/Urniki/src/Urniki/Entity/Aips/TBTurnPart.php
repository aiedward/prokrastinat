<?php
namespace Urniki\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/** @ORM\Entity */
class TBTurnPart extends BaseEntity
{
	/** @ORM\Column(type="Integer") */
	protected $TurnPart_Id;

	/** @ORM\Column(type="Integer") */
	protected $Turn_Id;

	/** @ORM\Column(length=80) */
	protected $Display_Name;

	/** @ORM\Column(type="Integer") */
	protected $Use_Custom_Stud_Num;

	/** @ORM\Column(type="Integer") */
	protected $Actual_Stud_Num;

	/** @ORM\Column(type="Integer") */
	protected $Merge_Id;

}

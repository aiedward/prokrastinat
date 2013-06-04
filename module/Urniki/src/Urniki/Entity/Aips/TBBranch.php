<?php
namespace Urniki\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/** @ORM\Entity */
class TBBranch extends BaseEntity
{
	/** @ORM\Column(type="Integer") */
	protected $Branch_Id;

	/** @ORM\Column(type="Integer") */
	protected $Program_Id;

	/** @ORM\Column(length=100) */
	protected $Name;

	/** @ORM\Column(length=40) */
	protected $Code;

	/** @ORM\Column(type="Integer") */
	protected $Year;

	/** @ORM\Column(type="Integer") */
	protected $Students_Num;

	/** @ORM\Column(type="Integer") */
	protected $Seq_Num;

	/** @ORM\Column(type="Integer") */
	protected $Merge_Id;

}

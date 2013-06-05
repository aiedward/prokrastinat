<?php
namespace Urniki\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/** @ORM\Entity */
class TBGroups extends BaseEntity
{
	/** @ORM\Column(type="Integer") */
	protected $Groups_Id;

	/** @ORM\Column(type="Integer") */
	protected $Branch_Id;

	/** @ORM\Column(length=40) */
	protected $Name;

	/** @ORM\Column(type="Integer") */
	protected $Students_Num;

	/** @ORM\Column(length=128) */
	protected $Note;

	/** @ORM\Column(length=20) */
	protected $Password;

	/** @ORM\Column(type="Integer") */
	protected $Flags;

	/** @ORM\Column(type="Integer") */
	protected $Parent_Group_Id;

	/** @ORM\Column(type="Integer") */
	protected $Group_Class;

	/** @ORM\Column(type="Integer") */
	protected $City_Id;

	/** @ORM\Column(type="Integer") */
	protected $Merge_Id;

}

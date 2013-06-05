<?php
namespace Urniki\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/** @ORM\Entity */
class TBProgram extends BaseEntity
{
	/** @ORM\Column(type="Integer") */
	protected $Program_Id;

	/** @ORM\Column(length=150) */
	protected $Name;

	/** @ORM\Column(length=40) */
	protected $Code;

	/** @ORM\Column(type="Integer") */
	protected $Years;

	/** @ORM\Column(type="Integer") */
	protected $City_Id;

	/** @ORM\Column(type="Integer") */
	protected $Merge_Id;

}

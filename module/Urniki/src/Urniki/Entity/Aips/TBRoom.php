<?php
namespace Urniki\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/** @ORM\Entity */
class TBRoom extends BaseEntity
{
	/** @ORM\Column(type="Integer") */
	protected $Room_Id;

	/** @ORM\Column(length=100) */
	protected $Name;

	/** @ORM\Column(type="Integer") */
	protected $Seats_Num;

	/** @ORM\Column(type="Integer") */
	protected $Strict;

	/** @ORM\Column(type="Integer") */
	protected $City_Id;

	/** @ORM\Column(type="Integer") */
	protected $Building_Id;

	/** @ORM\Column(type="Integer") */
	protected $Merge_Id;

}

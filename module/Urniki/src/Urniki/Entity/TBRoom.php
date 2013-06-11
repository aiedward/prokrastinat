<?php
namespace Urniki\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/** @ORM\Entity */
class TBRoom extends BaseEntity
{
	/** @ORM\Column(type="integer") */
	protected $Room_Id;

	/** @ORM\Column(length=100) */
	protected $Name;

	/** @ORM\Column(type="integer") */
	protected $Seats_Num;

	/** @ORM\Column(type="integer") */
	protected $Strict;

	/** @ORM\Column(type="integer") */
	protected $City_Id;

	/** @ORM\Column(type="integer") */
	protected $Building_Id;

	/** @ORM\Column(type="integer") */
	protected $Merge_Id;

}

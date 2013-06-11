<?php
namespace Urniki\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/** @ORM\Entity */
class TBBuilding_Dist extends BaseEntity
{
	/** @ORM\Column(type="integer") */
	protected $Building_Dist_Id;

	/** @ORM\Column(type="integer") */
	protected $Parent_Id;

	/** @ORM\Column(type="integer") */
	protected $Building_Id;

	/** @ORM\Column(type="integer") */
	protected $Distance;

}

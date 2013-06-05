<?php
namespace Urniki\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/** @ORM\Entity */
class TBTurn_Tutor extends BaseEntity
{
	/** @ORM\Column(type="Integer") */
	protected $Turn_Id;

	/** @ORM\Column(type="Integer") */
	protected $Tutor_Id;

}

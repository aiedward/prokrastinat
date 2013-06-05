<?php
namespace Urniki\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/** @ORM\Entity */
class TBTurnPart_Groups extends BaseEntity
{
	/** @ORM\Column(type="Integer") */
	protected $TurnPart_Id;

	/** @ORM\Column(type="Integer") */
	protected $Groups_Id;

}

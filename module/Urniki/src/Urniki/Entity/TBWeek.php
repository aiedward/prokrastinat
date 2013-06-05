<?php
namespace Urniki\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/** @ORM\Entity */
class TBWeek extends BaseEntity
{
	/** @ORM\Column(type="Integer") */
	protected $Week_Id;

	/** @ORM\Column(type="Datetime") */
	protected $First_Day;

	/** @ORM\Column(type="Datetime") */
	protected $Last_Day;

}

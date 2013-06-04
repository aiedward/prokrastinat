<?php
namespace Urniki\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/** @ORM\Entity */
class TBCity extends BaseEntity
{
	/** @ORM\Column(type="Integer") */
	protected $City_Id;

	/** @ORM\Column(length=60) */
	protected $Name;

}

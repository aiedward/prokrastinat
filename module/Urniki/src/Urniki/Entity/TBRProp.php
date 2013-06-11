<?php
namespace Urniki\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/** @ORM\Entity */
class TBRProp extends BaseEntity
{
	/** @ORM\Column(type="integer") */
	protected $RProp_Id;

	/** @ORM\Column(length=40) */
	protected $Name;

}

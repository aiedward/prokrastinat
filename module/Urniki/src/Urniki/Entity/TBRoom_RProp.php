<?php
namespace Urniki\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/** @ORM\Entity */
class TBRoom_RProp extends BaseEntity
{
	/** @ORM\Column(type="Integer") */
	protected $Room_Id;

	/** @ORM\Column(type="Integer") */
	protected $RProp_Id;

}

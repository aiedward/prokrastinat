<?php
namespace Urniki\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/** @ORM\Entity */
class TBHistoryLog extends BaseEntity
{
	/** @ORM\Column(type="Integer") */
	protected $HistoryLog_Id;

	/** @ORM\Column(type="Datetime") */
	protected $ChangeDate;

	/** @ORM\Column(length=100) */
	protected $Username;

	/** @ORM\Column(length=250) */
	protected $Description;

	/** @ORM\Column(type="Integer") */
	protected $EventType;

}

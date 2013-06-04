<?php
namespace Urniki\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/** @ORM\Entity */
class TBReservation extends BaseEntity
{
	/** @ORM\Column(type="Integer") */
	protected $Reservation_Id;

	/** @ORM\Column(type="Integer") */
	protected $Type;

	/** @ORM\Column(length=512) */
	protected $Note;

	/** @ORM\Column(type="Integer") */
	protected $Owner_Id;

	/** @ORM\Column(type="Integer") */
	protected $From_Week;

	/** @ORM\Column(type="Integer") */
	protected $To_Week;

	/** @ORM\Column(type="Integer") */
	protected $From_Day;

	/** @ORM\Column(type="Integer") */
	protected $To_Day;

	/** @ORM\Column(type="Integer") */
	protected $Begins_At;

	/** @ORM\Column(type="Integer") */
	protected $Duration;

	/** @ORM\Column(type="Integer") */
	protected $Merge_Id;

	/** @ORM\Column(type="Integer") */
	protected $Status;

}

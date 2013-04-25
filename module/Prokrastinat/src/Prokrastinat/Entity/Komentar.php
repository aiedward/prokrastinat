<?php
namespace Prokrastinat\Entity;

use Doctrine\ORM\Query\Expr\Base,
Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\InheritanceType("SINGLE_TABLE")
 */
class Komentar
{
	/**
	 * @ORM\Id @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * @ORM\SequenceGenerator(sequenceName="user_seq", initialValue=1000)
	 */
	protected $id;

	/**
	 * @ORM\ManyToOne(targetEntity="User")
	 * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
	 */
	protected $user;

	/**
	 * @ORM\ManyToOne(targetEntity="Objava")
	 * @ORM\JoinColumn(name="objava_id", referencedColumnName="id")
	 */
	protected $objava;

	/** @ORM\Column(length=512) */
	protected $vsebina;
}

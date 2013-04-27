<?php
namespace Prokrastinat\Entity;

use Doctrine\ORM\Query\Expr\Base,
	Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\InheritanceType("SINGLE_TABLE")
 */
class Objava extends BaseEntity
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

	/** @ORM\Column(length=30) */
	protected $naslov;

	/** @ORM\Column(length=512) */
	protected $vsebina;

	/** @ORM\Column(type="datetime") */
	protected $datum_objave;

	/**
	 * @ORM\ManyToMany(targetEntity="Oznaka")
	 * @ORM\JoinTable(name="Objava_Oznaka")
	 * @ORM\JoinColumn(name="oznaka_id", referencedColumnName="id")
	 */
	protected $oznake;
}

<?php
namespace Prokrastinat\Entity;

use Doctrine\ORM\Query\Expr\Base,
    Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="tip", type="integer")
 * @ORM\DiscriminatorMap({1 = "Vprasanje"})
 */
class Objava
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
	
	// to-do: tags many to many
}

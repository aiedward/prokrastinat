<?php
namespace Prokrastinat\Entity;

use Doctrine\ORM\Query\Expr\Base,
    Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity */
class User
{
	/**
	 * @ORM\Id @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * @ORM\SequenceGenerator(sequenceName="user_seq", initialValue=1000)
	 */
	protected $id;
	
	/** @ORM\Column(length=100) */
	protected $email;
	
	/** @ORM\Column(length=30) */
	protected $username;
	
	/** @ORM\Column(length=30, nullable=true) */
	protected $vpisna_st;
	
	/** @ORM\Column(length=30) */
	protected $ime;
	
	/** @ORM\Column(length=30) */
	protected $priimek;
	
	/** @ORM\Column(type="integer") */
	protected $tip;
	
	/** @ORM\Column(length=32) */
	protected $password;
	
	/** @ORM\Column(type="datetime") */
	protected $datum_registracije;
	
	/** @ORM\Column(type="datetime") */
	protected $datum_logina;
	
	/** @ORM\Column(type="boolean") */
	protected $enabled;
	
	/** @ORM\Column(length=32, nullable=true) */
	protected $confirmation;	
}

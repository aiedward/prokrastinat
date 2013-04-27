<?php
namespace Prokrastinat\Entity;

use Doctrine\ORM\Query\Expr\Base,
	Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity */
class User extends BaseEntity
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

	/** @ORM\Column(length=60) */
	protected $password;
    
    /** @ORM\Column(type="integer") */
	protected $salt;

	/** @ORM\Column(type="datetime") */
	protected $datum_registracije;

	/** @ORM\Column(type="datetime") */
	protected $datum_logina;

	/** @ORM\Column(type="boolean") */
	protected $enabled;

	/** @ORM\Column(length=32, nullable=true) */
	protected $confirmation;

	/** @ORM\Column(length=64, nullable=true) */
	protected $mesto;

	/** @ORM\Column(length=64, nullable=true) */
	protected $drzava;

	/** @ORM\Column(length=8, nullable=true) */
	protected $jezik = 'sl_SI';

	/** @ORM\Column(length=255, nullable=true) */
	protected $opis;

	/** @ORM\Column(length=64, nullable=true) */
	protected $splet;

	/** @ORM\Column(length=16, nullable=true) */
	protected $icq;

	/** @ORM\Column(length=64, nullable=true) */
	protected $skype;

	/** @ORM\Column(length=64, nullable=true) */
	protected $aim;

	/** @ORM\Column(length=64, nullable=true) */
	protected $yahoo;

	/** @ORM\Column(length=32, nullable=true) */
	protected $telefon;

	/** @ORM\Column(length=64, nullable=true) */
	protected $naslov;

}

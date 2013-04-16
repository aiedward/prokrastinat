<?php
namespace Prokrastinat\Entities;

use Doctrine\ORM\Query\Expr\Base;

use Doctrine\ORM\Mapping as ORM;

/**
 * @author Jurij
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="Repository\User")
 */
class User
{
	/**
	 * @ORM\Id @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="auto")
	 * @ORM\SequenceGenerator(sequence_name="user_seq", initialValue=1000)
	 */
	protected $id;
	
	/**
	 * @ORM\Column(length=100)
	 */
	protected $email;
	
	/**
	 * @ORM\Column(length=30)
	 */
	protected $username;
	
	/**
	 * @ORM\Column(length=30, nullable=true)
	 */
	protected $vpisna_st;
	
	/**
	 * @ORM\Column(length=30)
	 */
	protected $ime;
	
	/**
	 * @ORM\Column(length=30)
	 */
	protected $priimek;
	
	/**
	 * @ORM\Column(type="int")
	 */
	protected $tip;
	
	/**
	 * @ORM\Column(length=32)
	 */
	protected $password_hash;
	
	/**
	 * @ORM\Column(length=32)
	 */
	protected $password_salt;
	
	/**
	 * @ORM\Column(type="datetime")
	 */
	protected $datum_registracije;
	
	/**
	 * @ORM\Column(type="datetime")
	 */
	protected $datum_logina;
	
	/**
	 * @ORM\Column(type="boolean")
	 */
	protected $enabled;
	
	/**
	 * @ORM\Column(length=32, nullable=true)
	 */
	protected $confirmation;
	
}
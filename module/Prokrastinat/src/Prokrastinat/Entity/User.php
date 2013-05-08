<?php
namespace Prokrastinat\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity(repositoryClass="Prokrastinat\Repository\UserRepository") */
class User extends BaseEntity
{
	/**
	 * @ORM\Id @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
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

	/** @ORM\Column(length=60) */
	protected $password;

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

	/** @ORM\Column(length=255, nullable=true) */
	protected $opis;

	/** @ORM\Column(length=64, nullable=true) */
	protected $splet;

	/** @ORM\Column(length=32, nullable=true) */
	protected $telefon;

	/** @ORM\Column(length=64, nullable=true) */
	protected $naslov;

        /** @ORM\ManyToMany(targetEntity="Role", inversedBy="user")
         *  @ORM\JoinTable(name="rbac_user_roles") */
        protected $roles;

        public function __construct () {
            $this->roles = new \Doctrine\Common\Collections\ArrayCollection();
        }

        public function getPolnoIme()
        {
            return $this->ime . ' ' . $this->priimek;
        }
}

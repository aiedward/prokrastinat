<?php
namespace Datoteke\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @author Damjan
 * @ORM\Entity
 */
class Datoteka extends BaseEntity
{
	/**
	 * @ORM\Id @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * @ORM\SequenceGenerator(sequenceName="user_seq", initialValue=1000)
	 */
	protected $id;
	
	/**
	 * @ORM\Column(length=100, nullable=true)
	 */
	protected $imeDatoteke;
	
	/**
	 * @ORM\Column(length=30, nullable=true)
	 */
	protected $kategorija;
	
	/**
	 * @ORM\Column(length=200, nullable=true)
	 */
	protected $opis;
	
	/**
	 * @ORM\Column(type="datetime", nullable=true)
	 */
	protected $datum_uploada;
	
	/**
	 * @ORM\Column(type="integer", nullable=true)
	 */
	protected $st_prenosov;

        
        /**
	 * @ORM\Column(type="integer", nullable=true)
	 */
	protected $velikost;

	
}
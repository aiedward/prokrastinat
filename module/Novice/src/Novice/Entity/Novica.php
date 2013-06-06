<?php
namespace Novice\Entity;

use Prokrastinat\Entity\BaseEntity;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\User;

/** 
 * @ORM\Entity(repositoryClass="Novice\Repository\NovicaRepository") 
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"novica" = "Novica", "dodatnanovica" = "DodatnaNovica"})
 * @ORM\Table(name="novica")
 */
class Novica extends BaseEntity
{
    /**
     * @ORM\Id @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /** @ORM\ManyToOne(targetEntity="Prokrastinat\Entity\User") */
    protected $user;

    /** @ORM\Column(length=100) */
    protected $naslov;

    /** @ORM\Column(length=10000) */
    protected $vsebina;

    /** @ORM\Column(type="datetime") */
    protected $datum_objave;

}
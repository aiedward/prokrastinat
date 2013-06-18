<?php
namespace Prokrastinat\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="komentar")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="tip", type="string")
 * @ORM\DiscriminatorMap({
 *      "odgovor" = "Vprasanja\Entity\Odgovor",
 *      "stack_odgovor" = "Vprasanja\Entity\StackOdgovor",  
 * })
 */
class Komentar extends BaseEntity
{
    /**
     * @ORM\Id @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /** @ORM\ManyToOne(targetEntity="User") */
    protected $user;

    /** @ORM\ManyToOne(targetEntity="Objava", inversedBy="komentarji") */
    protected $objava;

    /** @ORM\Column(length=5000) */
    protected $vsebina;

    /** @ORM\Column(type="datetime") */
    protected $datum_objave;
}

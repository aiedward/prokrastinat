<?php
namespace Prokrastinat\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Prokrastinat\Repository\KategorijaRepository")
 * @ORM\Table(name="kategorija")
 */
class Kategorija extends BaseEntity
{
    /**
     * @ORM\Id @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /** @ORM\Column(length=128) */
    protected $ime;

    /** @ORM\OneToMany(targetEntity="Objava", mappedBy="kategorija") */
    protected $objave;
}

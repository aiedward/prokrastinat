<?php
namespace Urniki\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/**
 * @ORM\Entity(repositoryClass="Urniki\Repository\ProgramRepository")
 */
class Program extends BaseEntity
{
     /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $id;
    
    /** @ORM\Column(length=50) */
    protected $ime;
    
    /** @ORM\Column(type="string", length=20) */
    protected $koda;
    
    /** @ORM\Column(type="integer") */
    protected $st_let;
}

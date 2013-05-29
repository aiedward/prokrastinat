<?php
namespace Aips\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/** @ORM\Entity */
class Prostor extends BaseEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $id;
    
    /** @ORM\Column(length=100) */
    protected $ime;
    
    /** @ORM\Column(type="integer") */
    protected $st_sedezev;
}

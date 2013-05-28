<?php
namespace Aips\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/**
 * @ORM\Entity
 * @ORM\InheritanceType("SINGLE_TABLE")
 */
class Program extends BaseEntity
{
     /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $id;
}

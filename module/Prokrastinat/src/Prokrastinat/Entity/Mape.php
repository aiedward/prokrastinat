<?php
namespace Prokrastinat\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;

/** 
 * @ORM\Entity(repositoryClass="Prokrastinat\Repository\MapeRepository")
 * @ORM\Table(name="mape")
 */
class Mape extends BaseEntity
{
    /**
     * @ORM\Id @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /** @ORM\Column(length=30) */
    protected $ime;

    /** @ORM\Column(length=50) */
    protected $pot;
}

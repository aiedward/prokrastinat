<?php
namespace Vprasanja\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\Komentar;

/**
 * @ORM\Entity
 * @ORM\Table(name="stack_odgovor")
 */
class StackOdgovor extends Komentar
{
    /** @ORM\Column */
    protected $avtor;

    /** @ORM\Column(type="integer") */
    protected $rating;
}

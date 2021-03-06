<?php
namespace Urniki\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/**
 * @ORM\Entity(repositoryClass="Urniki\Repository\ProgramRepository")
 * @ORM\Table(name="dbo.TBProgram")
 */

class TBProgram extends BaseEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $Program_Id;

    /** @ORM\Column(length=150) */
    protected $Name;

    /** @ORM\Column(length=40) */
    protected $Code;

    /** @ORM\Column(type="integer") */
    protected $Years;

    /** @ORM\Column(type="integer") */
    protected $City_Id;

    /** @ORM\Column(type="integer") */
    protected $Merge_Id;
    
}

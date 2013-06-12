<?php
namespace Urniki\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="dbo.TBWeek")
 */
class TBWeek extends BaseEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $Week_Id;

    /** @ORM\Column(type="smalldatetime") */
    protected $First_Day;

    /** @ORM\Column(type="smalldatetime") */
    protected $Last_Day;

}

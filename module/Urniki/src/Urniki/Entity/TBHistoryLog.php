<?php
namespace Urniki\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/** @ORM\Entity */
class TBHistoryLog extends BaseEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $HistoryLog_Id;

    /** @ORM\Column(type="msdatetime") */
    protected $ChangeDate;

    /** @ORM\Column(length=100) */
    protected $Username;

    /** @ORM\Column(length=250) */
    protected $Description;

    /** @ORM\Column(type="integer") */
    protected $EventType;

}

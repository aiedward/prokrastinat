<?php
namespace Urniki\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/**
 * @ORM\Entity(repositoryClass="Urniki\Repository\ScheduleRepository")
 * @ORM\Table(name=dbo.TBSchedule)
 */
class TBSchedule extends BaseEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $Schedule_Id;

    /** @ORM\Column(type="integer") */
    protected $Course_Id;

    /**
     * @ORM\ManyToOne(targetEntity="TBCourse")
     * @ORM\JoinColumn(name="Course_Id", referencedColumnName="Course_Id")
     */
    protected $predmet;
    
    /** @ORM\Column(type="integer") */
    protected $TurnPart_Id;

    /** @ORM\Column(type="integer") */
    protected $Room_Id;

    /** @ORM\Column(type="integer") */
    protected $Day_Id;

    /** @ORM\Column(type="integer") */
    protected $Time_Id;

    /** @ORM\Column(type="integer") */
    protected $Duration;

    /** @ORM\Column(type="integer") */
    protected $Valid_From;

    /** @ORM\Column(type="integer") */
    protected $Valid_To;

    /** @ORM\Column(type="integer") */
    protected $Merge_Id;

    /** @ORM\Column(type="integer") */
    protected $Flags;
    
    /**
     * @ORM\ManyToOne(targetEntity="TBWeek")
     * @ORM\JoinColumn(name="Valid_From", referencedColumnName="Week_Id")
     */
    protected $week_from;
    
    /**
     * @ORM\ManyToOne(targetEntity="TBWeek")
     * @ORM\JoinColumn(name="Valid_To", referencedColumnName="Week_Id")
     */
    protected $week_to;
}

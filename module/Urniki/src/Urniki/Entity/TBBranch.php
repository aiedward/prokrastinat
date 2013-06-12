<?php
namespace Urniki\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;
use Prokrastinat\Entity\BaseEntity;

/**
 * @ORM\Entity(repositoryClass="Urniki\Repository\SmerRepository")
 * @ORM\Table(name="dbo.TBBranch")
 */
class TBBranch extends BaseEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $Branch_Id;

    /** @ORM\Column(type="integer") */
    protected $Program_Id;

    /** @ORM\Column(length=100) */
    protected $Name;

    /** @ORM\Column(length=40) */
    protected $Code;

    /** @ORM\Column(type="integer") */
    protected $Year;

    /** @ORM\Column(type="integer") */
    protected $Students_Num;

    /** @ORM\Column(type="integer") */
    protected $Seq_Num;

    /** @ORM\Column(type="integer") */
    protected $Merge_Id;

    /**
     * @ORM\ManyToMany(targetEntity="TBCourse")
     * @ORM\JoinTable(name="TBCourse_Branch",
     *      joinColumns={
     *          @ORM\JoinColumn(name="Branch_Id", referencedColumnName="Branch_Id")},
     *      inverseJoinColumns={
     *          @ORM\JoinColumn(name="Course_Id", referencedColumnName="Course_Id")}
     * )
     */
    protected $courses;
    
    public function __construct() {
        $this->courses = new \Doctrine\Common\Collections\ArrayCollection();
    }
}

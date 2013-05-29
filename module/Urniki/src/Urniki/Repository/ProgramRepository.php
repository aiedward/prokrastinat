<?php
namespace Urniki\Repository;

use Doctrine\ORM\EntityRepository;
use Urniki\Entity\Program;

class ProgramRepository extends EntityRepository
{
    public function getProgrami()
    {
        $em = $this->getEntityManager();
        $programi = $em->getRepository('Urniki\Entity\Program')->findAll();
        $progs = array();
        
        foreach ($programi as $prog)
        {
            $progs[$prog->id] = $prog->ime;
        }
        
        return $progs;
    }
}
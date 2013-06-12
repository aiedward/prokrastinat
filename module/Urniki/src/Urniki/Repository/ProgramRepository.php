<?php
namespace Urniki\Repository;

use Doctrine\ORM\EntityRepository;
use Urniki\Entity\Program;

class ProgramRepository extends EntityRepository
{
    public function getProgrami()
    {
        $programi = $this->findAll();
        $progs = array();
        
        foreach ($programi as $prog)
        {
            $progs[$prog->Program_Id] = $prog->Name;
        }
        
        return $progs;
    }
}
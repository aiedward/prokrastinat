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
    /*
    public function getLetnikSmer($program, int $letnik) {
        $em = $this->getEntityManager();
        
        $smer_repository = $em->getRepository("Urniki\Entity\TBBranch");
        $smer_q = $smer_repository->findBy(array(
            'Program_Id' => $program,
            'Letnik' => $letnik));
        $smeri = array();
        
        foreach ($smer_q as $smer)
        {
            $smeri[$smer->Branch_Id] = $smer->Name;
        }
    }*/
}
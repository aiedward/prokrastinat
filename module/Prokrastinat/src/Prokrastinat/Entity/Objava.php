<?php
namespace Prokrastinat\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="objava")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="tip_objave", type="string")
 * @ORM\DiscriminatorMap({
 *      "objava" = "Objava",
 *      "novica" = "Novice\Entity\Novica",
 *      "exnovica" = "Novice\Entity\ExtremeNovica",
 *      "dodatna_novica" = "Novice\Entity\DodatnaNovica",
 *      "oglas" = "Deska\Entity\Oglas",
 *      "vprasanje" = "Vprasanja\Entity\Vprasanje",
 *      "stack_vprasanje" = "Vprasanja\Entity\StackVprasanje",
 *      
 * })
 */
class Objava extends BaseEntity implements InputFilterAwareInterface
{
    /**
     * @ORM\Id @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /** @ORM\ManyToOne(targetEntity="User") */
    protected $user;

    /** @ORM\Column(length=100) */
    protected $naslov;

    /** @ORM\Column(length=5000) */
    protected $vsebina;

    /** @ORM\Column(type="datetime") */
    protected $datum_objave;

    /** @ORM\ManyToOne(targetEntity="Kategorija", inversedBy="objave") */
    protected $kategorija;

    /** @ORM\OneToMany(targetEntity="Komentar", mappedBy="objava") */
    protected $komentarji;

    /**
     * @ORM\ManyToMany(targetEntity="Oznaka", mappedBy="objave")
     * @ORM\JoinTable(name="objava_oznaka")
     */
    protected $oznake;
    
    // VALIDACIJA PODATKOV
    
    protected $inputFilter;
    
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }
    
    public function getInputFilter()
    {
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();
            $factory = new InputFactory();
            
            // ID
            $inputFilter->add($factory->createInput(array(
                'name' => 'id',
                'required' => true,
                'filters' => array(
                    array('name' => 'Int'),
                ),
            )));
            
            // NASLOV
            $inputFilter->add($factory->createInput(array(
                'name' => 'naslov',
                'required' => 'true',
                'filters' => array(
                    array('name' => 'StringTrim')
                ),
                'validators' => array(
                    array(
                        'name' => 'NotEmpty',
                        'options' => array(
                            'messages' => array(
                                Validator\NotEmpty::IS_EMPTY => 'Vnesite naslov oglasa!',
                            ),
                        ),
                    ),
                ),
            )));
            
            // VSEBINA
            $inputFilter->add($factory->createInput(array(
                'name' => 'vsebina',
                'required' => 'true',
                'filters' => array(
                    array('name' => 'StringTrim')
                ),
                'validators' => array(
                    array(
                        'name' => 'NotEmpty',
                        'options' => array(
                            'messages' => array(
                                Validator\NotEmpty::IS_EMPTY => 'Vnesite vsebino oglasa!',
                             ),
                        ),
                    ),
                ),
            )));
        }
    }
}

<?php
namespace Prokrastinat\Entity;

use Doctrine\ORM\Query\Expr\Base;
use Doctrine\ORM\Mapping as ORM;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\Validator;

/**
 * @ORM\Entity(repositoryClass="Prokrastinat\Repository\KategorijaRepository")
 * @ORM\Table(name="kategorija")
 */
class Kategorija extends BaseEntity implements InputFilterAwareInterface
{
    /**
     * @ORM\Id @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /** @ORM\Column(length=128) */
    protected $ime;

    /** @ORM\OneToMany(targetEntity="Objava", mappedBy="kategorija") */
    protected $objave;

    /**
     * @ORM\ManyToMany(targetEntity="User", mappedBy="kategorije")
     * @ORM\JoinTable(name="kategorija_user")
     */
    protected $users;
    
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
            
            $inputFilter->add($factory->createInput(array(
                'name' => 'id',
                'required' => true,
                'filters' => array(
                    array('name' => 'Int'),
                ),
            )));
            
            $inputFilter->add($factory->createInput(array(
                'name' => 'ime',
                'required' => 'true',
                'filters' => array(
                    array('name' => 'StringTrim')
                ),
                'validators' => array(
                    array(
                        'name' => 'NotEmpty',
                        'options' => array(
                            'messages' => array(
                                Validator\NotEmpty::IS_EMPTY => 'Vnesite ime kategorije!',
                            ),
                        ),
                    ),
                ),
            )));
            
            $this->inputFilter = $inputFilter; 
        }
        
        return $this->inputFilter;
    }
}

<?php
/*
namespace Datoteke\Model;
 
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

 
class Datoteke implements InputFilterAwareInterface
{
    protected $inputFilter;
     
    public function exchangeArray($data)
    {
        $this->opis = (isset($data['opis']))  ? $data['opis']     : null; 
        $this->fileupload  = (isset($data['fileupload']))  ? $data['fileupload']     : null; 
        $this->imeDatoteke  = (isset($data['imeDatoteke']))  ? $data['imeDatoteke']     : null; 
        $this->id  = (isset($data['id']))  ? $data['id']     : null; 
        $this->datum_uploada  = (isset($data['datum_uploada']))  ? $data['datum_uploada']     : null; 
        $this->st_prenosov  = (isset($data['st_prenosov']))  ? $data['st_prenosov']     : null; 
        $this->st_ogledov  = (isset($data['st_ogledov']))  ? $data['st_ogledov']     : null; 
        $this->user  = (isset($data['user']))  ? $data['user']     : null; 
        $this->velikost  = (isset($data['velikost']))  ? $data['velikost']     : null; 
    }
     
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }
     
    public function getInputFilter()
    {
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();
            $factory     = new InputFactory();
              
            $inputFilter->add(
                $factory->createInput(array(
                    'name'     => 'opis',
                    'required' => true,
                    'filters'  => array(
                        array('name' => 'StripTags'),
                        array('name' => 'StringTrim'),
                    ),
                    'validators' => array(
                        array(
                            'name'    => 'StringLength',
                            'options' => array(
                                'encoding' => 'UTF-8',
                                'min'      => 1,
                                'max'      => 100,
                            ),
                        ),
                    ),
                ))
            );
             
            $inputFilter->add(
                $factory->createInput(array(
                    'name'     => 'fileupload',
                    'required' => true,
                ))
            );
             
            $this->inputFilter = $inputFilter;
        }
         
        return $this->inputFilter;
    }
}*/
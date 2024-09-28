<?php 


namespace App\Classes;


/**
 * Classe de Validação
 * 
 * Classe para fazer a validação de inúmeros tipos
 * 
 * 
 * @package classes
 * @author Samuel Oliveira <samueloliveira900@gmail.com>
 */
class Validate1
{

    /**
     * Propriedades com todas as validações
     * @var array
     * @return void
     */
    private $validations = [];


    /**
     * Summary of validate
     * @param string $param1
     * @param string $param2
     * @param string|int $param3
     * @return bool|string[]
     */
    public function validate(string $param1, string $param2, string|int $param3)
    {
        $result = [];
        $param = '';
        foreach($this->validations as $field => $validate)
        {
            $result[$field] = (!str_contains($validate, '|')) ? 
            $this->singleValidation($validate,$field,$param) :
            $this->multipleValidations($validate, $field, $param);

        }

        if(in_array(false, $result))
        {
            return false;
        }
        return $result;
    }

    
    /**
     * Summary of setValidations
     * @param array $validations
     * @return void
     */
    public function setValidations(array $validations)
    {
        $this->validations = $validations;
    }

    private function singleValidation(){

        return 'single validation';

    }

    private function multipleValidations()
    {
        return 'multiple validation';
    }

}
<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author Kadisley
 */
class Application_Form_Usuario extends Zend_Form{
    
    public function init(){
        
        $this->setName("Usuario");
        $this->setMethod('post');
        $this->addElement('hidden', 'id', '1');
        
        $this->addElement('text','username',
            array(
                'filters' => array('StringTrim', 'StringToLower'),
                'validators' => array (
                    array(
                        'Validator' => 'NotEmpty',
                        'options'=> array('messages'=>'Usuario deve ser informado'),
                        'breakChainOnFailure'=> true  
                    ),
                    array('StringLength', false, array(0,40))
                    ),
                'required' => true,
                'label' => 'Usuario:',
                'class' => 'input-small'
            ));
        
        $this->addElement('password','password',
            array(
                'validators' => array (
                    array(
                        'Validator' => 'NotEmpty',
                        'options'=> array('messages'=>'Senha deve ser informado'),
                        'breakChainOnFailure'=> true  
                    ),
                    array('StringLength', false, array(0,150))
                    ),
                'required' => true,
                'label' => 'Senha:',
                'class' => 'input-small'
            ));
        
        $confirmarSenha = new Zend_Form_Element_Password('password-confirm');
        $confirmarSenha->setLabel('confirme sua senha')
            ->addValidator('StringLength', false, array(4,24))
            ->setAttrib('class', 'input-small')
            ->addValidator(new Zend_Validate_Identical($_POST['password']))
            ->setRequired(true);
        $this->addElement($confirmarSenha);
        
        $this->addElement('text','date_created',
            array(
                'filters' => array('StringTrim'),
                'validators' => array (
                    array(
                        new Zend_Validate_Date(
                                array('format'=> 'YYYY-MM-DD', 'locale' => 'en_US')
                            ),
                        'validator' => 'NotEmpty',
                        'options'=> array('messages'=>'Data deve ser informado'),
                        'breakChainOnFailure'=> true  
                    ),
                    
                    array('StringLength', false, array(0,10))
                    ),
                'required' => true,
                'label' => 'Data',
                'class' => 'input-small'
            ));
        
         $this->addElement('select','role',
            array(
                'filters' => array('StringTrim'),
                'validators' => array (
                    array(
                        'validator' => 'NotEmpty',
                        'options'=> array('messages'=>'Tido de Usuario deve ser informado'),
                        'breakChainOnFailure'=> true  
                    ),
                    array('StringLength', false, array(0,40))
                    ),
                'required' => true,
                'label' => 'Tipo de Usuario',
                'class' => 'input-short',
                'MultiOptions' => array(
                    ''=>'--Selecionar--',
                    'Administrador'=>'Administrador',
                    'Usuario'=>'Usuario')
                
            ));
        
        $this->addElement('submit','Gravar',
            array(
           
                'required' => false,
                'ignore'=> true,
                'class' => 'submit-green'
            ));
        
        $this->addElement('button','Listar',
            array(
                'label' => 'Listar',
                'required' => false,
                'ignore'=> true,
                'order' =>'1',
                'class' => 'submit-gray',
                'attribs'=> array('onclik'=> 'Usuario/index') 
                ));
                
                
        $this->clearDecorators();
        
        
        $this->addDecorator('FormElements')
             ->addDecorator('HtmlTag',
                        array('tag' => '<div>', 'class'=>'module-body'))
             ->addDecorator('Form');
        
        $this->setElementDecorators(array(
                array('ViewHelper'),
                array('Errors'),
                array('Description'),
                array('Label', array('separator'=>'')),
                array('HtmlTag', array('tag' => 'p')),
         ));
        
        $this->getElement('Gravar')->removeDecorator('label')
                ->setDecorators(
                        array('ViewHelper',
                                array('HtmlTag',
                                array('tag'=> '<fildset>', 'id'=>'element'
                                ))));
        $this->getElement('Listar')->removeDecorator('label'); 
        
    }
    
    
}

?>

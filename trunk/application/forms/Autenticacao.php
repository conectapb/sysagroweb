<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Autenticacao
 *
 * @author Axel
 */

class Application_Form_Autenticacao extends Zend_Form
{

    public function init()
    {
        $this->setName('login')->setAttrib('accept-charset', 'UTF-8');
        $this->setMethod('post');
        $this->addElement('text', 'username', array(
               'filters'    => array('StringTrim', 'StringToLower'),
               'validators' => array(
                array(
                    'validator'=>'NotEmpty',
                    'options'=>array(
                            'messages'=>'usuario deve ser informado '
                            ),
                            'breakChainOnFailure'=>true
                    ),
                    array( 'StringLength', false, array(0, 50) ),
                    ),
                'required'   => true,
                'label'      => 'Usuario:',
                'class'      => 'input-medium password'
            ));




       $this->addElement('password', 'password', array(
               'filters'    => array('StringTrim'),
               'validators' => array(
                    array(
                    'validator'=>'NotEmpty',
                    'options'=>array(
                            'messages'=>'senha deve ser informado'
                            ),
                            'breakChainOnFailure'=>true
                    ),
                    array('StringLength', false, array(0, 50)),
                    ),
               'required'   => true,
               'label'      => 'Senha:',
               'class'      => 'input-medium password'
      ));

      $this->addElement('submit', 'enviar', array(
                    'required' => false,
                    'ignore'   => true,
                     'class'   => 'submit-green'
      ));
     
        // decorado form com css
       $this->clearDecorators();

       $this->addDecorator('FormElements')
               ->addDecorator('HtmlTag', array('tag' => '<div>','class'=>'module-body'))
               ->addDecorator('Form');

          $this->setElementDecorators(array(
                      array('ViewHelper'),
                        array('Errors'),
                        array('Description'),
                        array('Label', array('separator'=>' ')),
                        array('HtmlTag', array('tag' => 'p')),
           )); 
          $this->getElement('enviar')->removeDecorator('label')
                ->setDecorators(array('ViewHelper',
                                array('HtmlTag',
                                array('tag'=>'<fieldset>', 'id'=>'element'))));
      }



}


<?php

class Application_Form_Login extends Zend_Form
{

    public function init()
    {

        /*
        $this->setName('login');
        $this->setMethod('post');     
        // username
        $username= new Zend_Form_Element_Text('username');
        $username->setLabel('Username')
		->setRequired(true)
		->addFilter('StripTags')
		->addFilter('StringTrim')
                ->setAttrib('class', 'input-medium password')
		->addValidator('NotEmpty', false, array('messages'=>'Por favor informe tu usuario'));
        // password
	$password = new Zend_Form_Element_Text('password');
        $password->setLabel('Sena')
                 ->setRequired(true)
		 ->addFilter('StripTags')
                 ->addFilter('StringTrim')
                 ->addValidator('NotEmpty')
                 ->setAttrib('class', 'input-medium password')
		 ->addErrorMessage('Por favor informe o titulo!');
        // submit
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Enviar')
               ->setAttrib('class', 'submit-green')
	       ->setAttrib('id', 'submitbutton');
        // Reset
        $reset = new Zend_Form_Element_Reset('reset');
        $reset->setLabel('Reset')
                ->setAttrib('class', 'submit-gray')
                ->setAttrib('id', 'btnCancelar');
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
        $this->addElements(array( $username, $password, $submit, $reset));
        */


        //<span class="notification-input ni-correct">This is correct, thanks!</span>

                $output = '<div class="form_element">'
                . $label
                . $input
                . $errors
                . $desc
                . '</div>';


        $this->setName('login')
        ->setAttrib('accept-charset', 'UTF-8');

        $this->setMethod('post');
        $this->addElement('text', 'username', array(
               'filters'    => array('StringTrim', 'StringToLower'),
               'validators' => array(
               
                    array(
                    'validator'=>'NotEmpty',
                    'options'=>array(
                            'messages'=>'usuario deve ser informado'
                            ),
                            'breakChainOnFailure'=>true
                    ),
                    array( 'StringLength', false, array(0, 50) ),
                    ),
                'required'   => true,
                'label'      => 'Username:',
                'class'      => 'input-medium password'
            ));




       $this->addElement('password', 'password', array(
               'filters'    => array('StringTrim'),
               'validators' => array(
                    array(
                    'validator'=>'NotEmpty',
                    'options'=>array(
                            'messages'=>'informe la contrasena'
                            ),
                            'breakChainOnFailure'=>true
                    ),
                    array('StringLength', false, array(0, 50)),
                    ),
               'required'   => true,
               'label'      => 'Password:',
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


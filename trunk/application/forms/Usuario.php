<?php
/**
 * Description class Evento
 *
 * @author Administrador
 */

class Application_Form_Usuario extends Zend_Form{

    public function init()
    {
        $this->setName("Usuario");
        $this->setMethod('post');
        $this->addElement('hidden', 'id', '1');
        
        $this->addElement('text', 'username', 
          array(
                 'filters'    => array('StringTrim', 'StringToLower'),
                 'validators' => array(
                      array(
                      'validator'=>'NotEmpty',
                      'options'=>array(
                              'messages'=>'Usuario deve ser informado'
                              ),
                              'breakChainOnFailure'=>true
                      ),
                    array( 'StringLength', false, array(0, 150) ),
              ),
                'required'   => true,
                'label'      => 'Usuario:',
                'class'      => 'input-small'
        ));

       $this->addElement('password', 'password', 
        array(
              // 'filters'    => array('StringTrim', 'StringToLower'),
               'validators' => array(
                    array(
                    'validator'=>'NotEmpty',
                    'options'=>array(
                            'messages'=>'Password deve ser informado'
                            ),
                            'breakChainOnFailure'=>true
                    ),
                    array( 'StringLength', false, array(0, 150) ),
                    ),
                'required'   => true,
                //'description' => 'titulo del Evento',
                'label'      => 'Password:',
                'class'      => 'input-small'

       ));

      $password2 = new Zend_Form_Element_Password('password-confirm');
      $password2->setLabel('Confirme su password:')
            ->addValidator('StringLength', false, array(4,24))
            //->setLabel('Confirme su password:')
            ->setAttrib('class','input-small')
            ->addValidator(new Zend_Validate_Identical($_POST['password']))
            ->setRequired(true);
      $this->addElement($password2);

      $this->addElement('text', 'date_created', array(
               'filters'    => array('StringTrim'),
               'validators' => array(
                  array(
                          new Zend_Validate_Date(
                          array('format'=>'YYYY-MM-DD', 'locale' => 'en_US') 
                      ),
                    

                    'validator'=>'NotEmpty',
                    
                    'options'=>array(
                            'messages'=>'Dia del criación deve ser informado'
                            ),
                            'breakChainOnFailure'=>true
                    ),
                    array('StringLength', false, array(0, 15)),
                    ),
               'required'   => true,
               'label'      => 'Dia de criacion:',
               'class'      => 'input-small'
      ));

      $this->addElement('select', 'role', array(
               'filters'    => array('StringTrim'),
               'validators' => array(
                    array(
                    'validator'=>'NotEmpty',
                    'options'=>array(
                            'messages'=>'Role deve ser informado'
                            ),
                            'breakChainOnFailure'=>true
                    ),
                    array('StringLength', false, array(0, 150)),
                    ),
               'required'   => true,
               'label'      => 'Role:',
               'class'      => 'input-short',
               'MultiOptions' =>array('' => '-- Selesionar --',
                                      'Administrador' => 'Administrador',
                                              'Usuario'       => 'Usuario')
      ));

      
      $this->addElement('submit', 'enviar', array(
                    'required' => false,
                    'ignore'   => true,
                    'class'    => 'submit-green'
      ));

      $this->addElement('button', 'Listar', array(
        'label'    => 'Listar',
        'required' => false,
        'ignore'   => true,
        'order'    => '1',
        'class'    => 'submit-gray',
        'attribs'  => array('onclick'=>'List("Usuario/index")')
        ));



      // decorado form com css
      $this->clearDecorators();
      $this->addDecorator('FormElements')
           ->addDecorator('HtmlTag', 
                array('tag' => '<div>','class'=>'module-body'))
           ->addDecorator('Form');

      $this->setElementDecorators(array(
                    array('ViewHelper'),
                    array('Errors'),
                    array('Description'),
                    array('Label', array('separator'=>' ')),
                    array('HtmlTag', array('tag' => 'p')),
       ));

       $this->getElement('enviar')->removeDecorator('label')
            ->setDecorators(

                          array('ViewHelper',
                            array('HtmlTag',
                              array('tag'=>'<fieldset>', 'id'=>'element'))));
       $this->getElement('Listar')->removeDecorator('label');

   } //end init form
}
?>

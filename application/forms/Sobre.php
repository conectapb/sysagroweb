<?php
/**
 * Description class Evento
 *
 * @author Administrador
 */

class Application_Form_Sobre extends Zend_Form{

    public function init()
    {
        $this->setName("Sobre");
        $this->setAttrib('accept-charset', 'utf-8');
        $this->setAttrib('enctype', 'multipart/form-data');
        $this->setMethod('post');
        $this->addElement('hidden', 'id', '1');
        $this->addElement('text', 'nome', array(
            //'filters'    => array('StringTrim', 'StringToLower'),
            'filters'    => array('StringTrim'),
               'validators' => array(
                    array(
                    'validator'=>'NotEmpty',
                    'options'=>array(
                            'messages'=>'Institucion deve ser informado'
                            ),
                            'breakChainOnFailure'=>true
                    ),
                    array( 'StringLength', false, array(0, 150) ),
                    ),
                'required'   => true,
                //'description' => 'titulo del Evento',
                'label'      => 'Institucion:',
                'class'      => 'input-long'

       ));
       $this->addElement('textarea', 'quemsou', array(
               'filters'    => array('StringTrim'),
               'validators' => array(
                    array(
                    'validator'=>'NotEmpty',
                    'options'=>array(
                            'messages'=>'Queim somos deve ser informado'
                            ),
                            'breakChainOnFailure'=>true
                    ),
                   // array('StringLength', false, array(0, 600)),
                    ),
               'required'   => true,
               'label'      => 'Queim somos:',
               'class'      => 'ckeditor'
      ));
      $this->addElement('textarea', 'quemfaco', array(
               'filters'    => array('StringTrim'),
               'validators' => array(
                    array(
                    'validator'=>'NotEmpty',
                    'options'=>array(
                            'messages'=>'Lo que hacemos deve ser informado'
                            ),
                            'breakChainOnFailure'=>true
                    ),
                    //array('StringLength', false, array(0, 600)),
                    ),
               'required'   => true,
               'label'      => 'Lo que hacemos:',
               'class'      => 'ckeditor'
      ));
      $this->addElement('textarea', 'filosofia', array(
               'filters'    => array('StringTrim'),
               'validators' => array(
                    array(
                    'validator'=>'NotEmpty',
                    'options'=>array(
                            'messages'=>'Filasofia deve ser informado'
                            ),
                            'breakChainOnFailure'=>true
                    ),
                    //array('StringLength', false, array(0, 600)),
                    ),
               'required'   => true,
               'label'      => 'Nuestra filosofia:',
               'class'      => 'ckeditor'
      ));

       $this->addElement('textarea', 'nossamissao', array(
               'filters'    => array('StringTrim'),
               'validators' => array(
                    array(
                    'validator'=>'NotEmpty',
                    'options'=>array(
                            'messages'=>'Mission deve ser informado'
                            ),
                            'breakChainOnFailure'=>true
                    ),
                    //array('StringLength', false, array(0, 600)),
                    ),
               'required'   => true,
               'label'      => 'Nuestra Mission:',
               'class'      => 'ckeditor'
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
        'attribs'  => array('onclick'=>'List("Sobre/index")')
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
       $this->getElement('Listar')->removeDecorator('label');

   } //end init form
}
?>

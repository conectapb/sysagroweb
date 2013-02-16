<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Categoria
 *
 * @author Administrador
 */
class Application_Form_Categorianoticia extends Zend_Form{

    public function init()
    {
        $this->setName("Categoria");
        $this->setMethod('post');
        //$this->setAttrib('enctype', 'application/x-www-form-urlencoded');
        $this->addElement('hidden', 'id', '1');
        $this->addElement('text', 'descricao', array(
               'filters'    => array('StringTrim'),
               'validators' => array(
                    array(
                    'validator'=>'NotEmpty',
                    'options'=>array(
                            'messages'=>'Categoria deve ser informado'
                            ),
                            'breakChainOnFailure'=>true
                    ),
                    array( 'StringLength', false, array(0, 150) ),
                    ),
                'required'   => true,
                'label'      => 'Categoria:',
                'class'      => 'input-small'

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
        'attribs'  => array('onclick'=>'List("Categoria/Index")')
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

       $this->getElement( 'enviar')->removeDecorator('label')
            ->setDecorators(array('ViewHelper',
                            array('HtmlTag',
                            array('tag'=>'<fieldset>', 'id'=>'element'))));

       $this->getElement('Listar')->removeDecorator('label');
      }

    //put your code here
}
?>


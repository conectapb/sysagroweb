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
class Application_Form_Servico extends Zend_Form{

    public function init()
    {
        $this->setName("Servico");
        $this->setMethod('post');
        //$this->setName('Deejay')->setAttrib('accept-charset', 'ISO-8859-1');
        $this->setAttrib('accept-charset', 'utf-8');
        //$this->setAttrib('accept-charset', 'ISO-8859-1');
	$this->setAttrib('enctype', 'multipart/form-data');
        //$this->setAttrib('enctype', 'application/x-www-form-urlencoded');
        $this->addElement('hidden', 'id', '1');
        $this->addElement('text', 'nome', array(
               'filters'    => array('StringTrim'),
               'validators' => array(
                    array(
                    'validator'=>'NotEmpty',
                    'options'=>array(
                            'messages'=>'Servicio deve ser informado'
                            ),
                            'breakChainOnFailure'=>true
                    ),
                    array( 'StringLength', false, array(0, 255) ),
                    ),
                'required'   => true,
                'label'      => 'Servicio:',
                'class'      => 'input-small'

       ));

       $this->addElement('textarea', 'observacao', array(
               'filters'    => array('StringTrim'),
               'validators' => array(
                    array(
                    'validator'=>'NotEmpty',
                    'options'=>array(
                            'messages'=>'Destaque deve ser informado'
                            ),
                            'breakChainOnFailure'=>true
                    ),
                    array('StringLength', false, array(0, 600)),
                    ),
               'required'   => true,
               'label'      => 'Descripcion:',
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
        'attribs'  => array('onclick'=>'List("Servico/Index")')
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


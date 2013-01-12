<?php
/**
 * Description class Evento
 *
 * @author Administrador
 */

class Application_Form_Evento extends Zend_Form{

    public function init()
    {
        $this->setName("Deejay");
        //$this->setName('Deejay')->setAttrib('accept-charset', 'ISO-8859-1');
        $this->setAttrib('accept-charset', 'utf-8');
        //$this->setAttrib('accept-charset', 'ISO-8859-1');
	$this->setAttrib('enctype', 'multipart/form-data');
        $this->setMethod('post');
        $this->addElement('hidden', 'id', '1');
        $this->addElement('text', 'title', array(
            //'filters'    => array('StringTrim', 'StringToLower'),
            'filters'    => array('StringTrim'),
               'validators' => array(
                    array(
                    'validator'=>'NotEmpty',
                    'options'=>array(
                            'messages'=>'Titulo deve ser informado'
                            ),
                            'breakChainOnFailure'=>true
                    ),
                    array( 'StringLength', false, array(0, 150) ),
                    ),
                'required'   => true,
                //'description' => 'titulo del Evento',
                'label'      => 'Titulo:',
                'class'      => 'input-long'

       ));

        $this->addElement('text', 'url', array(
            //'filters'    => array('StringTrim', 'StringToLower'),
            'filters'    => array('StringTrim'),
               'validators' => array(
                    array(
                    'validator'=>'NotEmpty',
                    'options'=>array(
                            'messages'=>'Link deve ser informado'
                            ),
                            'breakChainOnFailure'=>true
                    ),
                    array( 'StringLength', false, array(0, 150) ),
                    ),
                'required'   => true,
                //'description' => 'titulo del Evento',
                'label'      => 'Link:',
                'class'      => 'input-long'

       ));
        
       $this->addElement('textarea', 'body', array(
               'filters'    => array('StringTrim'),
               'validators' => array(
                    array(
                    'validator'=>'NotEmpty',
                    'options'=>array(
                            'messages'=>'Destaque deve ser informado'
                            ),
                            'breakChainOnFailure'=>true
                    ),
                    //array('StringLength', false, array(0, 600)),
                    ),
               'required'   => true,
               'label'      => 'Destaque:',
               'class'      => 'ckeditor'
      ));

       $this->addElement('text', 'start', array(
               'filters'    => array('StringTrim'),
                'validators' => array(
                    //('format' => 'DD/MM/YYYY', 'locale' => 'pt_BR'),
                    new Zend_Validate_Date(
                                array('format'=>'YYYY-MM-DD', 'locale' => 'en_US')),
                    array(
                    'validator'=>'NotEmpty',
                    'options'=>array(
                            'messages'=>'Dia Inicial deve ser informado'
                            ),
                            'breakChainOnFailure'=>true
                    ),
                    array('StringLength', false, array(0, 22)),
                    ),
               'required'   => true,
               'label'      => 'Dia Inicial:',
               'class'      => 'input-small'
      ));

      $this->addElement('text', 'end', array(
               'filters'    => array('StringTrim'),
               'validators' => array(
                    array(
                    new Zend_Validate_Date(
                             array('format'=>'YYYY-MM-DD', 'locale' => 'en_US')),
                    'validator'=>'NotEmpty',
                    'options'=>array(
                            'messages'=>'Dia Final deve ser informado'
                            ),
                            'breakChainOnFailure'=>true
                    ),
                    array('StringLength', false, array(0, 22)),
                    ),
               'required'   => true,
               'label'      => 'Dia Final:',
               'class'      => 'input-small'
      ));

      $this->addElement('select', 'ativo', array(
               'filters'    => array('StringTrim'),
               'validators' => array(
                    array(
                    'validator'=>'NotEmpty',
                    'options'=>array(
                            'messages'=>'Celular deve ser informado'
                            ),
                            'breakChainOnFailure'=>true
                    ),
                    array('StringLength', false, array(0, 150)),
                    ),
               'required'   => true,
               'label'      => 'Ativo:',
               'class'      => 'input-short',
               'MultiOptions' =>array('' => '-- Selesionar --',
                                      'Si' => 'Si',
				      'No' => 'No')
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
        'attribs'  => array('onclick'=>'List("Evento/index")')
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

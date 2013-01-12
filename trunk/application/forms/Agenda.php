<?php
/**
 * Description class Evento
 *
 * @author Administrador
 */

class Application_Form_Agenda extends Zend_Form{

    public function init()
    {
        $this->setName("Agenda");
        $this->setMethod('post');
        $this->addElement('hidden', 'id', '1');
        $this->addElement('text', 'nome', array(
            'filters'    => array('StringTrim'),
               'validators' => array(
                    array(
                    'validator'=>'NotEmpty',
                    'options'=>array('messages'=>'Nombre deve ser informado'),
                    'breakChainOnFailure'=> true
                    ),
                    array( 'StringLength', false, array(0, 150) ),
                    ),
                'required'   => true,
                'label'      => 'Nombre',
                'class'      => 'input-block grande_3'
       ));

       $this->addElement('text', 'telefone', array(
               'filters'    => array('StringTrim'),
               'validators' => array(
                    array(
                    'validator'=>'NotEmpty',
                    'options' =>array('messages'=>'Telefono deve ser informado'),
                    'breakChainOnFailure'=>true
                    ),
                    array('StringLength', false, array(0, 20)),
                    ),
               'required'   => true,
               'label'      => 'Telefono',
               'class'      => 'input-block medio'
      ));

       $this->addElement('text', 'celular', array(
               'filters'    => array('StringTrim'),
                'validators' => array(
                    array(
                    'validator'=>'NotEmpty',
                    'options'=>array(
                            'messages'=>'Celular deve ser informado'
                            ),
                            'breakChainOnFailure'=>true
                    ),
                    array('StringLength', false, array(0, 20)),
                    ),
               'required'   => true,
               'label'      => 'Celular',
               'class'      => 'input-block medio'
      ));
      $this->addElement('select', 'solicitacao', array(
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
               'label'      => 'Solicitacion',
               'class'      => 'select-block grande_2',
               'MultiOptions' =>array('' => '-- Selesionar --',
                                      'Si' => 'Si',
				      'No' => 'No')
       ));
       $this->addElement('textarea', 'destaque', array(
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
               'label'      => 'Observacion',
               'class'      => 'ckeditor'
      ));
       
      $this->addElement('text', 'data_evento', array(
               'filters'    => array('StringTrim'),
               'validators' => array(
                    array(
                    new Zend_Validate_Date(
                             array('format'=>'YYYY-MM-DD', 'locale' => 'en_US')),
                    'validator'=>'NotEmpty',
                    'options'=>array(
                            'messages'=>'Dia del Evento deve ser informado'
                            ),
                            'breakChainOnFailure'=>true
                    ),
                    array('StringLength', false, array(0, 150)),
                    ),
               'required'   => true,
               'label'      => 'Dia del Evento',
               'class'      => 'input-block medio'
      ));
     $this->addElement('button', 'Enviar', array(
                    'required' => false,
                    'ignore'   => true,
                    'class'    => 'button_mas',
                    'type'     => 'submit'
      ));
      
      $this->addElement('button', 'cancelar', array(
                    'required' => false,
                    'ignore'   => true,
                    'class'    => 'button_mas',
                    'type'     => 'reset'
      ));

      $this->addElement('button', 'Listar', array(
        'label'    => 'Listar',
        'required' => false,
        'ignore'   => true,
        'order'    => '1',
        'class'    => 'button_mas',
        'attribs'  => array('onclick'=>'List("Agenda/index")')
        ));

      // decorado form com css
      $this->clearDecorators();
      $this->addDecorator('FormElements')
           ->addDecorator('HtmlTag', array('tag' => '<div>','class'=>'form-block'))
           ->addDecorator('Form');
      
      $this->setElementDecorators(array(
                    array('ViewHelper'),
                    array('Errors'),
                    array('Description'),
                    //array('Label', array('separator'=>'')),
                    array('Label', array( 'class'=>'label-block')),
                    array('HtmlTag', array('tag' => 'p')),
       )); 

      
      $this->getElement('Enviar')->removeDecorator('label');
      $this->getElement('cancelar')->removeDecorator('label');
      $this->getElement('Listar')->removeDecorator('label');
      /*
      $this->getElement('enviar')->removeDecorator('label')
            ->setDecorators(array('ViewHelper',
                            array('HtmlTag',
                            array('tag'=>'<fieldset>', 'id'=>'element'))));
       $this->getElement('Listar')->removeDecorator('label'); */

   } //end init form
}
?>

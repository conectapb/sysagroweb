<?php
/**
 * Description class Evento
 *
 * @author Administrador
 */

class Application_Form_Texto extends Zend_Form{

    public function init()
    {
        $this->setName("Texto");      
        $this->setAttrib('accept-charset', 'utf-8');     
	      $this->setAttrib('enctype', 'multipart/form-data');
        $this->setMethod('post');      
        $this->addElement('hidden', 'id', '1');
        $this->addElement('text', 'rotulo', array(
            'filters'    => array('StringTrim'),
               'validators' => array(
                    array(
                    'validator'=>'NotEmpty',
                    'options'=>array(
                            'messages'=>'Rotulo deve ser informado'
                            ),
                            'breakChainOnFailure'=>true
                    ),
                    array( 'StringLength', false, array(0, 150) ),
                    ),
                'required'   => true,
                //'description' => 'titulo del Evento',
                'label'      => 'Rotulo:',
                'class'      => 'input-long'
        ));
        $this->addElement('text', 'titulo', array(
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
        $this->addElement('textarea', 'comentario', array(
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
                  //'class'      => 'input-long'
        ));
        $this->addElement('select', 'ativo', array(
               'filters'    => array('StringTrim'),
               'validators' => array(
                    array(
                    'validator'=>'NotEmpty',
                    'options'=>array(
                            'messages'=>'Status deve ser informado'
                            ),
                            'breakChainOnFailure'=>true
                    ),
                    array('StringLength', false, array(0, 150)),
                    ),
               'required'   => true,
               'label'      => 'Status:',
               'class'      => 'input-short',
               'MultiOptions' =>array('' => '-- Selesionar --',
                                      'Si' => 'Si',
				      'No' => 'No')
        ));

        $this->addElement('hidden', 'foto', '1');

        $foto = new Zend_Form_Element_File('foto1');
        $foto->setLabel('Foto:')
                   ->addValidator('Extension', false, array('jpg', 'png', 'gif'))
                   ->addValidator('Size', false, 1002400)
                   ->setDescription("Images")
                   ->setDestination('../public/upload/'); 
         $this->addElement($foto);

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
          'attribs'  => array('onclick'=>'List("Texto/index")')
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

        $this->getElement('foto1')->setDecorators(
         array('File','Errors',
         array(array('td' => 'HtmlTag'), array('tag' => 'p')),
               array('Label', array('tag' => 'p')),
               array(array('tr' => 'HtmlTag'), array('tag' => 'p'))
         ));

        $this->getElement('enviar')->removeDecorator('label')
            ->setDecorators(array('ViewHelper',
                            array('HtmlTag',
                            array('tag'=>'<fieldset>', 'id'=>'element'))) );        
        $this->getElement('Listar')->removeDecorator('label');

   } //end init form
}
?>

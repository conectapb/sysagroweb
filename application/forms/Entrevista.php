<?php

class Application_Form_Entrevista extends Zend_Form
{

   public function init() {
        $this->setName("Entrevista");
        //$this->setName('Deejay')->setAttrib('accept-charset', 'ISO-8859-1');
        $this->setAttrib('accept-charset', 'utf-8');
        //$this->setAttrib('accept-charset', 'ISO-8859-1');
        $this->setAttrib('enctype', 'multipart/form-data');
        $this->setMethod('post');
        $this->addElement('hidden', 'id', '1');
        
        

        $this->addElement('text', 'titulo', array(
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
                'label'      => 'Titulo:',
                'class'      => 'input-long'
        ));
        
        $this->addElement('textarea', 'comentario', array(
               'filters'    => array('StringTrim'),
               'validators' => array(
                    array(
                    'validator'=>'NotEmpty',
                    'options'=>array(
                            'messages'=>'Comentario deve ser informado'
                            ),
                            'breakChainOnFailure'=>true
                    ),
                    //array('StringLength', false, array(0, 350)),
                    ),
               'required'   => true,
               'label'      => 'Comentario:',
               'class'      => 'ckeditor'
        ));

        $this->addElement('textarea', 'entrevista', array(
               'filters'    => array('StringTrim'),
               'validators' => array(
                    array(
                    'validator'=>'NotEmpty',
                    'options'=>array(
                            'messages'=>'Artigo deve ser informado'
                            ),
                            'breakChainOnFailure'=>true
                    ),
                    //array('StringLength', false, array(0, 1350)),
                    ),
               'required'   => true,
               'label'      => 'Entrevista:',
               'class'      => 'ckeditor'
        ));

        $this->addElement('text', 'data', array(
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
               'label'      => 'Data:',
               'class'      => 'input-small'
        ));

        $this->addElement('text', 'entrevistado', array(
               'filters'    => array('StringTrim'),
               'validators' => array(
                    array(
                    'validator'=>'NotEmpty',
                    'options'=>array(
                            'messages'=>'Entrevistado deve ser informado'
                            ),
                            'breakChainOnFailure'=>true
                    ),
                    array('StringLength', false, array(0, 150)),
                    ),
               'required'   => true,
               'label'      => 'Entrevistado:',
               'class'      => 'input-long'
        ));
        
        $this->addElement('text', 'reporter', array(
               'filters'    => array('StringTrim'),
               'validators' => array(
                    array(
                    'validator'=>'NotEmpty',
                    'options'=>array(
                            'messages'=>'Reporter deve ser informado'
                            ),
                            'breakChainOnFailure'=>true
                    ),
                    array('StringLength', false, array(0, 150)),
                    ),
               'required'   => true,
               'label'      => 'reporter:',
               'class'      => 'input-long'
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
                                      'S' => 'Sim',
				      				  'N' => 'Não')
      ));


		    $this->addElement('hidden', 'foto', '1');
        $fotodeejay = new Zend_Form_Element_File('foto1');
        $fotodeejay->setLabel('Foto:')
                 ->addValidator('Extension', false, array('jpg', 'png', 'gif'))
                 ->addValidator('Size', false, 1002400)
                 ->setDescription("Images")
                 ->setDestination('../public/upload/entrevista/');
        $this->addElement($fotodeejay);   
        
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
          'attribs'  => array('onclick'=>'List("Entrevista/Index")')
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

        $this->getElement('enviar')
            ->removeDecorator('label')
            ->setDecorators(array('ViewHelper',
                            array('HtmlTag', 
                            array('tag'=>'<fieldset>', 'id'=>'element'))
        ));   
        
        $this->getElement('Listar')->removeDecorator('label');
	   
    }
	//put your code here


}
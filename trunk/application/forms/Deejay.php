<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Deejay
 *
 * @author Administrador
 */

class Application_Form_Deejay extends Zend_Form{

    public function init()
    {
        $this->setName("Deejay");
        //$this->setName('Deejay')->setAttrib('accept-charset', 'ISO-8859-1');
        $this->setAttrib('accept-charset', 'utf-8');
        //$this->setAttrib('accept-charset', 'ISO-8859-1');
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
                            'messages'=>'Nombre deve ser informado'
                            ),
                            'breakChainOnFailure'=>true
                    ),
                    array( 'StringLength', false, array(0, 150) ),
                    ),
                'required'   => true,
                'label'      => 'Nombre:',
                'class'      => 'input-long'

       ));

       $this->addElement('text', 'endereco', array(
               'filters'    => array('StringTrim'),
               'validators' => array(
                    array(
                    'validator'=>'NotEmpty',
                    'options'=>array(
                            'messages'=>'La Dereccion deve ser informado'
                            ),
                            'breakChainOnFailure'=>true
                    ),
                    array('StringLength', false, array(0, 150)),
                    ),
               'required'   => true,
               'label'      => 'Dereccion:',
               'class'      => 'input-long'
      ));

      $this->addElement('text', 'bairro', array(
               'filters'    => array('StringTrim'),
               'validators' => array(
                    array(
                    'validator'=>'NotEmpty',
                    'options'=>array(
                            'messages'=>'El barrio deve ser informado'
                            ),
                            'breakChainOnFailure'=>true
                    ),
                    array('StringLength', false, array(0, 150)),
                    ),
               'required'   => true,
               'label'      => 'Barrio:',
               'class'      => 'input-long'
      ));

      $this->addElement('text', 'email', array(
               'filters'    => array('StringTrim'),
               'validators' => array(
                    array(
                    'validator'=>'EmailAddress',
                    'options'=>array(
                           'messages' => array(
                            Zend_Validate_EmailAddress::INVALID => 'Por favor introduzca un email correcto',
                            Zend_Validate_EmailAddress::INVALID_FORMAT => 'Por favor introduzca un email correcto',
                            Zend_Validate_EmailAddress::INVALID_HOSTNAME => 'Por favor introduzca un email correcto',
                            Zend_Validate_EmailAddress::INVALID_MX_RECORD => 'Por favor introduzca un email correcto',
                            Zend_Validate_EmailAddress::INVALID_SEGMENT => 'Por favor introduzca un email correcto',
                            Zend_Validate_EmailAddress::DOT_ATOM => 'Por favor introduzca un email correcto',
                            Zend_Validate_EmailAddress::QUOTED_STRING => 'Por favor introduzca un email correcto',
                            Zend_Validate_EmailAddress::INVALID_LOCAL_PART => 'Por favor introduzca un email correcto'
                            ),

                            ),
                        'breakChainOnFailure'=>true
                    ),
                    array('StringLength', false, array(0, 150)),
                 ),
               'required'   => true,
               'label'      => 'Email:',
               'class'      => 'input-long'
      ));


       $this->addElement('textarea', 'bibliografia', array(
               'filters'    => array('StringTrim'),
               'validators' => array(
                    array(
                    'validator'=>'NotEmpty',
                    'options'=>array(
                            'messages'=>'La Biografia deve ser informado'
                            ),
                            'breakChainOnFailure'=>true
                    ),
                    array('StringLength', false, array(0, 350)),
                    ),
               'required'   => true,
               'label'      => 'Bibliografia:',
               'class'      => 'input-long'
      ));

       $this->addElement('text', 'telefone', array(
               'filters'    => array('StringTrim'),
               'validators' => array(
                    array(
                    'validator'=>'NotEmpty',
                    'options'=>array(
                            'messages'=>'Telefono deve ser informado'
                            ),
                            'breakChainOnFailure'=>true
                    ),
                    array('StringLength', false, array(0, 150)),
                    ),
               'required'   => true,
               'label'      => 'Telefono:',
               'class'      => 'input-small'
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
                    array('StringLength', false, array(0, 150)),
                    ),
               'required'   => true,
               'label'      => 'Celular:',
               'class'      => 'input-small'
		));


         $this->addElement('hidden', 'foto', '1');
     
        

       /*
	$this->addElement('file', 'foto1', array(
			'size' => '80',
			'label' => 'Seleccione un archivo de imagen que desea subir.',
			'destination' =>  '../public/upload/',
			'required' => false,
			'description' => 'Tipo de archivos permitidos: bmp, gif, jpg, png',
			'validators' => array(
			'Size' => array('min' => 8000, 'max' => 1000000),
			//'IsImage' => array('image/bmp', 'image/gif', 'image/jpeg', 'image/pjpeg', 'image/png')
                        'IsImage' => array('bmp', 'gif', 'jpg','jpeg', 'pjpeg', 'png')
			)
        ));
        */
      
      $fotodeejay = new Zend_Form_Element_File('foto1');
      $fotodeejay->setLabel('Foto:')
                 ->addValidator('Extension', false, array('jpg', 'png', 'gif'))
                 ->addValidator('Size', false, 102400)
                 ->setDescription("Images");
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
        'attribs'  => array('onclick'=>'List("Deejay/Index")')
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
?>

<?php
/**
 * Description of Galeria
 *
 * @author Axel Alexander
 */

class Application_Form_Galeria extends Zend_Form{

    public function init()
    {
        $this->setName("Galeria");
        //$this->setName('Deejay')->setAttrib('accept-charset', 'ISO-8859-1');
        $this->setAttrib('accept-charset', 'utf-8');
        //$this->setAttrib('accept-charset', 'ISO-8859-1');
	$this->setAttrib('enctype', 'multipart/form-data');
        $this->setMethod('post');
        $this->addElement('hidden', 'id', '1');
        $this->addElement('text', 'rotulo', array(
            //'filters'    => array('StringTrim', 'StringToLower'),
            'filters'    => array('StringTrim'),
               'validators' => array(
                    array(
                    'validator'=>'NotEmpty',
                    'options'=>array(
                            'messages'=>'Leyenda deve ser informado'
                            ),
                            'breakChainOnFailure'=>true
                    ),
                    array( 'StringLength', false, array(0, 255) ),
                    ),
                'required'   => true,
                'label'      => 'Rotulo:',
                'class'      => 'input-long'

       ));

       $this->addElement('textarea', 'legenda', array(
               'filters'    => array('StringTrim'),
               'validators' => array(
                    array(
                    'validator'=>'NotEmpty',
                    'options'=>array(
                            'messages'=>'La Dereccion deve ser informado'
                            ),
                            'breakChainOnFailure'=>true
                    ),
                    array('StringLength', false, array(0, 255)),
                    ),
               'required'   => true,
               'label'      => 'Leyenda:',
               'class'      => 'ckeditor'
      ));
      $this->addElement('hidden', 'foto', '1');
      $fotodeejay = new Zend_Form_Element_File('foto1');
      $fotodeejay->setLabel('Foto:')
                 ->addValidator('Extension', false, array('jpg', 'png', 'gif'))
                 ->addValidator('Size', false, 302400)
                 ->setDescription("Images");
       $this->addElement($fotodeejay);
      
       $categoria = new Zend_Form_Element_Select('categoria_id');
		$categoria->setLabel('Categoria')
			->setRequired(true)
			->addFilter('Int')
			->addFilter('StripTags')
			->addFilter('StringTrim')
                        ->setAttrib('class', 'input-short')
			->addValidator('NotEmpty')
			->addErrorMessage('Por favor informe selecione a categoria!');
                        $retorno   = new Application_Model_DbTable_Categoria();
			foreach ($retorno->getCategoriaList() as $c) 
			{
                            $categoria->addMultiOption($c->id, $c->descricao);
			}
			$categoria->setValue('-1');                  
                        
      $this->addElement($categoria);               
      /*   
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
        */
      
      
      
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
        'attribs'  => array('onclick'=>'List("Galeria/Index")')
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

      /*
       $this->getElement('Categoria_id')->setDecorators(
       array('File','Errors',
       array(array('td' => 'HtmlTag'), array('tag' => 'p')),
             array('Label', array('tag' => 'p')),
             array(array('tr' => 'HtmlTag'), array('tag' => 'p'))
       ));*/
      
      
      
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

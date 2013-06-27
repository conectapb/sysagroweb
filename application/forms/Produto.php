<?php

class Application_Form_Produto extends Zend_Form
{

    public function init(){
        //Set the form method, action and attributes for the display form to post
        $this->setName("Produto");
        $this->setMethod('post');
        $this->setAction('/Produto/Add');    
        //$this->setAttrib('accept-charset', 'ISO-8859-1');
        $this->setAttrib('accept-charset', 'utf-8');
        //$this->setAttrib('accept-charset', 'ISO-8859-1');
        $this->setAttrib('enctype', 'multipart/form-data');
        $this->addElement('hidden', 'id', '1');
       
        //$this->setAttribs(array('id' => 'frmCreate', 'class' => 'baal'));
        $this->setDecorators(array(
            'FormElements',
            'Form'
        ));

        // Grupo
        $grupo = new Zend_Form_Element_Select('grupo_id');
          $grupo->setLabel('Grupo')
          ->setRequired(true)
          ->setAttrib('class', 'input-short')
          ->setAttrib('title', 'Selecionar Grupos')
          //->addFilter('StripTags')
          //->addFilter('StringTrim')
          ->addFilter('Int')
          ->addValidator('NotEmpty',true, array('integer','zero'))
          ->addErrorMessage('Por favor informe o grupo!');
          $retorno   = new Application_Model_DbTable_Produtogrupo();
               foreach ($retorno->getList() as $c) 
               {
                  $grupo->addMultiOption(0, "--Selecione--");
                  $grupo->addMultiOption($c->id, utf8_encode($c->nome));
               }
          //$grupo->setValue('-1');                                      
        $this->addElement($grupo);
        
        // Marca
        $marca = new Zend_Form_Element_Select('marca_id');
          $marca->setLabel('Marca')
          ->setRequired(true)
          ->setAttrib('class', 'input-short')
          ->setAttrib('title', 'Selecionar Marcas')
          ->addFilter('Int')
          ->addValidator('NotEmpty',true, array('integer','zero'))
          ->addErrorMessage('Por favor informe a marca!');
             $retorno   = new Application_Model_DbTable_Produtomarca();
               foreach ($retorno->getList() as $c) 
               {
                  $marca->addMultiOption(0, "--Selecione--");
                  $marca->addMultiOption($c->id, utf8_encode($c->nome));
               }
          $marca->setValue('0');                                      
        $this->addElement($marca);
        
        // Modelo
        $modelo = new Zend_Form_Element_Select('modelo_id');
          $modelo->setLabel('Modelo')
          ->setRequired(true)
          ->setAttrib('class', 'input-short')
          ->setAttrib('title', 'Selecionar Modelos')
          ->addFilter('Int')
          ->addValidator('NotEmpty',true, array('integer','zero'))
          ->addErrorMessage('Por favor informe o modelo!');
             $retorno   = new Application_Model_DbTable_Produtomodelo();
               foreach ($retorno->getList() as $c) 
               {
                  $modelo->addMultiOption(0, "--Selecione--");
                  $modelo->addMultiOption($c->id, utf8_encode($c->nome));
               }
          $modelo->setValue('0'); 
        $this->addElement($modelo);
        
        // Unidade
        $unidade = new Zend_Form_Element_Select('unidade_id');
          $unidade->setLabel('Unidades')
          ->setRequired(true)
          ->setAttrib('class', 'input-short')
          ->setAttrib('title', 'Selecionar Unidades')
          ->addFilter('Int')
          ->addValidator('NotEmpty',true, array('integer','zero'))
          ->addErrorMessage('Por favor informe a unidade!');
             $retorno   = new Application_Model_DbTable_Produtounidade();
               foreach ($retorno->getList() as $c) 
               {
                  $unidade->addMultiOption(0, '--Selecione--');
                  $unidade->addMultiOption($c->id, $c->sigla);
               }
          $unidade->setValue('-1');                                      
        $this->addElement($unidade);

        //tipi
        $tipi = new Zend_Form_Element_Select('tipi');
          $tipi->setLabel('Imposto sobre Produtos Industrializados')
          ->setRequired(true)    
          ->setAttrib('class', 'input-short')
          ->setAttrib('title', 'Imposto sobre Produtos Industrializados')
          ->addFilter('Int')
          ->addValidator('NotEmpty',true, array('integer','zero'))
          ->addErrorMessage('Por favor informe o Imposto sobre Produtos Industrializados deve ser informado!');
             $retorno   = new Application_Model_DbTable_Produtotipi();
               foreach ($retorno->getList() as $c) 
               {
                  $tipi->addMultiOption(0, '--Selecione--');
                  $tipi->addMultiOption($c->id, utf8_encode($c->descricao));
               }
          $tipi->setValue('-1');                                         
        $this->addElement($tipi);

        $genero = new Zend_Form_Element_Select('genero_id');
          $genero->setLabel('Genero')
          ->setRequired(true)      
          ->setAttrib('class', 'input-short')
          ->setAttrib('title', 'Selecionar Genero')
          ->addFilter('Int')
          ->addValidator('NotEmpty',true, array('integer','zero'))
          ->addErrorMessage('Por favor informe a genero!');
             $retorno   = new Application_Model_DbTable_Produtogenero();
               foreach ($retorno->getList() as $c) 
               {
                  $genero->addMultiOption(0, '--Selecione--');
                  $genero->addMultiOption($c->id, utf8_encode($c->genero));
               }
          $genero->setValue('-1');                                      
        $this->addElement($genero);
         
        $ncm = new Zend_Form_Element_Select('ncm');
          $ncm->setLabel('Nomenclatura Comum do Mercosul')
          ->setRequired(true)
          ->setAttrib('class', 'input-short')
          ->setAttrib('title', 'Selecionar Nomenclatura Comum do Mercosul')
          ->setAttrib('autocomplete', 'off')
          ->addFilter('Int')
          ->addValidator('NotEmpty',true, array('integer','zero'))
          ->addErrorMessage('Por favor informe a Nomenclatura Comum do Mercosul!');
             $retorno   = new Application_Model_DbTable_Produtoncm();
               foreach ($retorno->getList() as $c) 
               {
                  $ncm->addMultiOption(0, '--Selecione--');
                  $ncm->addMultiOption($c->id, utf8_encode($c->numero.'-'.$c->descricao));
               }
          $ncm->setValue('0');                                      
        $this->addElement($ncm);
        
        $cor = new Zend_Form_Element_Select('cor_id');
          $cor->setLabel('Cor do Produto')
          ->setRequired(true)
          ->setAttrib('class', 'input-short')
          ->setAttrib('title', 'Selecionar cor do Produto')
          ->setAttrib('autocomplete', 'off')
          ->addFilter('Int')
          ->addValidator('NotEmpty',true, array('integer','zero'))
          ->addErrorMessage('Por favor informe a cor do Produto!');
             $retorno   = new Application_Model_DbTable_Cor();
               foreach ($retorno->getList() as $c) 
               {
                  $cor->addMultiOption('0', '--Selecione--');
                  $cor->addMultiOption($c->id, utf8_encode($c->cor));
               }
          $cor->setValue('0');                                      
        $this->addElement($cor);

        //Codigo de Barra
        $codBarras = $this->createElement('text', 'codBarras');
          $codBarras->setLabel('Codigo de Barra: ')
                         ->setAttrib('size', 25)
                         ->setAttrib('autocomplete', 'off')
                         ->setAttrib('maxlength', 50)
                         ->setAttrib('class', 'input-short')
                         ->setValue('')
                         ->setRequired(true)
                         //->addFilter('htmlentities')
                         //->addFilter('striptags')
                         ->addValidator('NotEmpty')
                         ->addErrorMessage('Por favor informe o Codigo de Barra!')
                         ->addValidator('StringLength', false,array(0,60));      
        $this->addElement($codBarras);

        // nome
        $nome = $this->createElement('text', 'nome');
          $nome->setLabel('Nome: ')
                         ->setAttrib('size', 25)
                         ->setAttrib('autocomplete', 'off')
                         ->setAttrib('maxlength', 100)
                         ->setValue('')
                         ->setRequired(true)
                         ->setAttrib('class', 'input-long')
                         ->addValidator('NotEmpty')
                         ->addErrorMessage('Por favor informe o nome do Produto')
                         ->addValidator('StringLength', false,array(0,100));
        $this->addElement($nome);
        
        //Referencia do Fabricante
        $refFabricante = $this->createElement('text', 'refFabricante');
          $refFabricante->setLabel('Ref-Fabricante: ')
                         ->setAttrib('size', 25)
                         ->setAttrib('autocomplete', 'off')
                         ->setAttrib('maxlength', 50)
                         ->setAttrib('class', 'input-long')
                         ->setValue('')
                         ->setRequired(true)
                         ->addValidator('NotEmpty')
                         ->addErrorMessage('Por favor informe o nome do Produto')
                         ->addValidator('StringLength', false,array(0,30));
        $this->addElement($refFabricante);
        
        //Referencia Auxiliar
        $refAuxiliar = $this->createElement('text', 'refAuxiliar');
          $refAuxiliar->setLabel('Ref-Auxiliar: ')
                         ->setAttrib('size', 25)
                         ->setAttrib('autocomplete', 'off')
                         ->setAttrib('maxlength', 50)
                         ->setAttrib('class', 'input-long')
                         ->addValidator('StringLength', false,array(0,60))
                         ->setValue('')
                         ->setRequired(true);
        $this->addElement($refAuxiliar);
 
        //Icmsc
        //$classname = new Zend_Form_Subform();
        $icmsc = $this->createElement('text', 'icmsc');
          $icmsc->setLabel('Icmsc: ')
                         ->setAttrib('size', 25)
                         ->setAttrib('autocomplete', 'off')
                         ->setAttrib('maxlength', 50)
                         ->setAttrib('class', 'input-short')
                         ->addValidator('StringLength', false,array(0,60))
                         ->setValue('');      
        $this->addElement($icmsc);

        //Icmsv
        $icmsv = $this->createElement('text', 'icmsv');
          $icmsv->setLabel('Icmsv: ')
                         ->setAttrib('size', 25)
                         ->setAttrib('autocomplete', 'off')
                         ->setAttrib('maxlength', 50)
                         ->setAttrib('class', 'input-short')
                         ->addValidator('StringLength', false,array(0,60))
                         ->setValue('');   
        $this->addElement($icmsv);

        //Icmsv
        $ipiVenda = $this->createElement('text', 'ipiVenda');
          $ipiVenda->setLabel('Ipi-Venda: ')
                         ->setAttrib('size', 25)
                         ->setAttrib('autocomplete', 'off')
                         ->setAttrib('maxlength', 50)
                         ->setAttrib('class', 'input-short')
                         ->addValidator('StringLength', false,array(0,60))
                         ->setValue('');    
        $this->addElement($ipiVenda);
        
        //Codigo de Situaco Tributaria
        $cst =  $this->createElement('text', 'cst', array(
               'filters'    => array('StringTrim'),
               'validators' => array(
                    array(
                    'validator'=>'NotEmpty',
                    'options'=>array(
                           'messages'=>'Codigo de Situaco Tributaria'
                            //'messages'=> $this->translate('C&oacute;digo de Situa&ccedil;&atilde;o Tribut&aacute;ria deve ser informado'),
                            ),
                            'breakChainOnFailure'=>true
                    ),
                    //array('StringLength', false, array(0, 350)),
                    ),              
               //'escape'=>false,
               'required'   => true,
               //'label'      => 'C&oacute;digo de Situa&ccedil;&atilde;o Tribut&aacute;ria',
               //'title'      => 'C&oacute;digo de Situa&ccedil;&atilde;o Tribut&aacute;ria',
               'label'      => 'Codigo de Situaco Tributaria',
               'title'      => 'Codigo de Situaco Tributaria',
               'class'      => 'input-short'
        ));
        $this->addElement($cst);

        //margenLucro
        $margenLucro = $this->createElement('text', 'margenLucro');
          $margenLucro->setLabel('Margen de Lucro: ')
                         ->setAttrib('size', 25)
                         ->setAttrib('autocomplete', 'off')
                         ->setAttrib('maxlength', 50)
                         ->setAttrib('class', 'input-short')
                         ->addValidator('StringLength', false,array(0,60))
                         ->setValue('');     
        $this->addElement($margenLucro);

        //precoCusto
        $precoCusto = $this->createElement('text', 'precoCusto');
          $precoCusto->setLabel('Preco de Custo: ')
                         ->setAttrib('size', 25)
                         ->setAttrib('autocomplete', 'off')
                         ->setAttrib('maxlength', 50)
                         ->setAttrib('class', 'input-short')
                         ->addValidator('StringLength', false,array(0,60))
                         ->setValue('');      
        $this->addElement($precoCusto);

        //precoVenda
        $precoVenda = $this->createElement('text', 'precoVenda');
          $precoVenda->setLabel('Preco de Venda: ')
                         ->setAttrib('size', 25)
                         ->setAttrib('autocomplete', 'off')
                         ->setAttrib('maxlength', 50)
                         ->setAttrib('class', 'input-short')
                         ->addValidator('StringLength', false,array(0,60))
                         ->setValue('');          
        $this->addElement($precoVenda);

        //margenDesconto
        $margenDesconto = $this->createElement('text', 'margenDesconto');
          $margenDesconto->setLabel('Margen de Desconto: ')
                         ->setAttrib('size', 25)
                         ->setAttrib('autocomplete', 'off')
                         ->setAttrib('maxlength', 50)
                         ->setAttrib('class', 'input-short')
                         ->addValidator('StringLength', false,array(0,60))
                         ->setValue('');      
        $this->addElement($margenDesconto);
        
        $this->addElement('hidden', 'foto', '1');
        
        $foto_images = new Zend_Form_Element_File('foto_images');
          $foto_images->setLabel('Foto - 1:')
                   ->addValidator('Extension', false, array('jpg', 'png', 'gif'))
                   ->addValidator('Size', false, 1002400)
                   ->setDescription("Images")
                   ->setDestination('../public/upload/produto/');   
        $this->addElement($foto_images);
        
        /* 
        $foto2 = new Zend_Form_Element_File('foto2');
          $foto2->setLabel('Foto - 2:')
                   ->addValidator('Extension', false, array('jpg', 'png', 'gif'))
                   ->addValidator('Size', false, 1002400)
                   ->setDescription("Images")
                   ->setDestination('../public/upload/entrevista/');     
        $this->addElement($foto2);
        
        $foto3= new Zend_Form_Element_File('foto3');
          $foto3->setLabel('Foto - 3:')
                   ->addValidator('Extension', false, array('jpg', 'png', 'gif'))
                   ->addValidator('Size', false, 1002400)
                   ->setDescription("Images")
                   ->setDestination('../public/upload/entrevista/');  
        $this->addElement($foto3);

        */
        
        $buttonEnviar = $this->createElement('submit', 'Gravar', array(
                      'required' => false,
                      'ignore'   => true,
                      //'label'    =>'<span><em>Gravar</em></span>',
                      'class'    => 'submit-green',
        ));

      
        $buttonEnviar1 = $this->createElement('button', 'btnBuscarGrupo',array(
          'class'=>'button2',
          'label'=>'<span><em>Gravar</em></span>',
          'escape'=>false,
          'type'=>'submit',
          'value'=>'Buscar',
          'class'    => 'button-gray'
          //'decorators' => $this->_buttonElementDecorator,
        ));
        
        $this->addElement($buttonEnviar); 
      
        // decorado form com css
        $this->addDecorator('FormElements')
             ->addDecorator('HtmlTag', array('tag' => '<div>','class'=>'module-body'))
             ->addDecorator('Form');     
    
        $this->setElementDecorators(array(
                    array('ViewHelper'),
                    array('Errors'),
                    array('Description'),
                    array('Label', array('separator'=>' ')),
                    array('HtmlTag', array('tag' => 'div', 'class' => 'editor-field')),
        ));  


        $this->getElement('foto_images')->setDecorators(
          array('File','Errors',
          array(
              array('td' => 'HtmlTag'), array('tag' => 'p')),
              array('Label', array('separator'=>' ')),
              array('HtmlTag', array('tag' => 'div', 'class' => 'editor-field'))
        )); 


        // remove decorator hidden
        $this->getElement('id')->setDecorators(array('ViewHelper')); 
        $this->getElement('foto')->setDecorators(array('ViewHelper'));  
  }
  //put your code here
}
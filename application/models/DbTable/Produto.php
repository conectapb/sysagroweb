<?php
class Application_Model_DbTable_Produto extends Zend_Db_Table_Abstract
{

    protected $_name = 'mestre_produtos';

    protected $_dependentTables = array(
                                        'Application_Model_DbTable_Cor',
                                        'Application_Model_DbTable_Produtotipi',
                                        'Application_Model_DbTable_Produtoncm');

/*
     protected $_referenceMap = array(
                           'Member' => array(
                                    'columns'=> array('c_id'),
                                    'refTableClass'=> 'Default_Model_DbTable_Member',
                                    'refColumns'=> array('c_m_id')
                                   ) */
    
    public function getId ($id){
        $id = (int) $id;
        $row = $this->fetchRow('id = ' . $id);
        if (! $row) {
            throw new Exception("Could not find row $id");
        }
        return $row->toArray();
    }
    
    public function getList(){
		$select  = $this->select()->from($this->_name);
		$select->order('id');
		return $this->fetchAll($select);
    }
    
    public function add($grupo_id, $marca_id, $modelo_id,$unidade_id, $codBarras, $nome, $refFabricante,                  
     $refAuxiliar, $icmsc, $icmsv, $ipiVenda, $cst, $margenLucro, $precoCusto, $precoVenda,$margenDesconto,                   
     $tipi, $ncm,  $genero_id, $cor_id, $foto){
        try {
            $dados = array( 
                'grupo_id'      => $grupo_id, 
                'marca_id'      => $marca_id,
                'modelo_id'     => $modelo_id,
                'unidade_id'    => $unidade_id,
                'codBarras'     => $codBarras,
                'nome'          => $nome,
                'refFabricante' => $refFabricante,
                'refAuxiliar'   => $refAuxiliar,
                'icmsc'         => $icmsc,
                'icmsv'         => $icmsv,
                'ipiVenda'      => $ipiVenda,
                'cst'           => $cst,
                'margenLucro'   => $margenLucro,
                'precoCusto'    => $precoCusto,
                'precoVenda'    => $precoVenda,
                'margenDesconto' => $margenDesconto,
                'tipi'          => $tipi,
                'ncm'           => $ncm,
                'genero_id'     => $genero_id,
                'cor_id'        => $cor_id,
                'foto'          => $foto);
            parent::insert($dados);
        }
        catch (Exception $e){
             echo 'Opa... algum problema aconteceu.';
        }
    }  
   
    public function updates($id, $grupo_id, $marca_id, $modelo_id,$unidade_id, $codBarras, $nome, 
     $refFabricante, $refAuxiliar, $icmsc, $icmsv, $ipiVenda, $cst, $margenLucro, $precoCusto, 
     $precoVenda,$margenDesconto,  $tipi, $ncm,  $genero_id, $cor_id, $foto){    
        try {
            $dados = array( 
                'grupo_id'      => $grupo_id, 
                'marca_id'      => $marca_id,
                'modelo_id'     => $modelo_id,
                'unidade_id'    => $unidade_id,
                'codBarras'     => $codBarras,
                'nome'          => $nome,
                'refFabricante' => $refFabricante,
                'refAuxiliar'   => $refAuxiliar,
                'icmsc'         => $icmsc,
                'icmsv'         => $icmsv,
                'ipiVenda'      => $ipiVenda,
                'cst'           => $cst,
                'margenLucro'   => $margenLucro,
                'precoCusto'    => $precoCusto,
                'precoVenda'    => $precoVenda,
                'margenDesconto' => $margenDesconto,
                'tipi'          => $tipi,
                'ncm'           => $ncm,
                'genero_id'     => $genero_id,
                'cor_id'        => $cor_id,
                'foto'          => $foto);
            parent::update($dados, 'id = ' . (int) $id);
        }
        catch (Exception $e){
             echo 'Opa... algum problema aconteceu.';
        }
    }
    
    public function delete($id){
         try{
           parent::delete($id);
         }catch (Exception $e){
                 echo 'Opa... algum problema aconteceu.';
         }
    }
   
}
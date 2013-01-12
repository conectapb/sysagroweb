<?php
require_once 'Zend/Validate/Abstract.php';   
 
class My_Validate_PasswordConfirmation extends Zend_Validate_Abstract
{
    const NOT_MATCH = 'passwordConfirmationNotMatch';
 
    protected $_messageTemplates = array(
        self::NOT_MATCH => "Las contrasenas no coinciden"
    );
 
    protected $fieldToMatch = '';
 
    public function __construct($fieldToMatch)
    {
        $this->fieldToMatch = (string) $fieldToMatch;
    }
    public function isValid($value, $context = null)
    {
        $valueString = (string) $value;
        $this->_setValue($valueString);
 
        if (!isset($context[$this->fieldToMatch]) || $context[$this->fieldToMatch] !==  $valueString)
        {
            $this->_error(self::NOT_MATCH);
            return false;
        }
 
        return true;
    }
}
?>
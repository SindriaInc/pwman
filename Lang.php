<?php

class Lang {

    /**
     * @var array
     *
     */
    private $translations = array();
    private $_language = 'en';

    protected $_staticTranslator = '';
    protected $_dynamicTranslator = [];

    public function __construct($_language = 'en'){
        $this->_language = $_language;
        $this->_staticTranslator = $this->_getStaticTranslator();
        $this->_dynamicTranslator = $this->_getDynamicTranslator();
    }

    private function _getStaticTranslator() {
        return file_get_contents('./' . $this->_language . '.mess');
    }

    private function _getDynamicTranslator(){
        $_fileContentArray = file('./' . $this->_language . '.lang');
        array_walk($_fileContentArray, function(&$item){$item = explode("|.|", $item);});
        var_dump($_fileContentArray);
        return $_fileContentArray;
        //stringa lingua base|.|stringa lingua che voglio
    }

    public function translate($_string){
        $_matchingKey = array_search($_string, array_column($this->_dynamicTranslator, 0));
        if(isset($this->_dynamicTranslator[$_matchingKey])){
            return $this->_dynamicTranslator[$_matchingKey][1];
        } else {
            return $_string;
        }
    }

    public function getGreetings(){
        return $this->_staticTranslator;
    }
}



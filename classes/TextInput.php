<?php

class TextInput extends Input {
    protected function _renderSetting() {
        return "<input class='inputText' type='text' name='{$this->_name}' value='{$this->_value}' />";
    }

    public function validate() {
        foreach($_POST as $input){
            if(empty($input)){
                return false;
            }
        }
        
        return true;
    }
}
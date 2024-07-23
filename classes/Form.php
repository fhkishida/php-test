<?php
class Form {

    protected $_inputs;

    public function __construct() {
        $this->_inputs = [];
    }

    /**
     *  adds an input instance to the collection of inputs managed by this form object
     */
    public function addInput(Input $input) {
        $this->_inputs[$input->name()] = $input;
    }

    /**
     *  iterates over all inputs managed by this form and returns false if any of them don't validate
     */
    public function validate() {
        foreach ($this->_inputs as $input) {
            if (!$input->validate()) {
                return false;
            }
        }
        return true;
    }

    /**
     * returns the value of the input by $name
     */
    public function getValue($name) {
        if (isset($this->_inputs[$name])) {
            return $this->_inputs[$name]->getValue();
        }
        return null;
    }

    public function setValue($name, $value) {
        if (isset($this->_inputs[$name])) {
            $this->_inputs[$name]->setValue($value);
        }
    }

    /**
     *  draws the outer form element, and the markup for each input, one input per row
     */
    public function display($hasError = false) {
        $formHtml = '<form class="formContainer" method="POST">';
        if($hasError){
            $formHtml .= '<p class="errorMessage"=>Oops! Please ensure all required fields are filled.</p>';
        }
        foreach ($this->_inputs as $input) {
            $formHtml .= '<div class="formRow">' . $input->render() . '</div>';
        }
        $formHtml .= "<div class='formRow'> <div class='formLabel'></div>" . "<div class='formInput'> <button class='buttonSubmit'>SUBMIT</button></div></div>";
        $formHtml .= '</form>';
        
        echo $formHtml;
    }
}

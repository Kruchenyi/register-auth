<?php

namespace myfrm;

class Validator
{
    public $errors = [];
    protected $rules_list = ['required', 'min', 'max', 'email'];
    protected $messages = [
        'required' => 'this field :a: is empty',
        'min' => 'this field :a: has too few characters or empty',
        'max' => 'this field :a: has too many characters',
        'email' => 'this field :a: Invalid entered'
    ];

    public function valid($data, $rules)
    {
        foreach ($data as $key => $value) {
            if (isset($rules[$key])) {
                $this->check([
                    'fildname' => $key,
                    'fildvalue' => $value,
                    'rules' => $rules[$key]
                ]);
            }
        }
        return $this;
    }
    public function check($field)
    {
        foreach ($field['rules'] as $rule_key => $rule_value) {
            if (!call_user_func_array([$this, $rule_key], [$field['fildvalue'], $rule_value])) {
                $this->addError($field['fildname'], str_replace(':a:', $field['fildname'], $this->messages[$rule_key]));
            }
        }
    }


    public function hasError()
    {
        return !empty($this->errors);
    }
    public function addError($fildname, $error)
    {
        $this->errors[$fildname] = $error;
    }
    public function required($value, $rule_value)
    {
        return !empty(trim($value));
    }
    public function min($value, $rule_value)
    {
        return mb_strlen($value) > $rule_value;
    }
    public function max($value, $rule_value)
    {
        return mb_strlen($value) < $rule_value;
    }
    public function email($value, $rule_value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    public function output($error_name): string
    {
        $output = '';
        if (!empty($this->errors)) {
            foreach ($this->errors as $key => $value) {
                if ($error_name == $key) {
                    $output = "<ul><li style='color:red'>";
                    $output .= $value;
                    $output .= "</li></ul>";
                }
            }
        }

        return $output;
    }
    public function getUniqEmail($data = [])
    {
    }
}

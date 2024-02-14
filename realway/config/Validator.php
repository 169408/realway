<?php

class Validator
{

    protected $problems = [];

    protected $rules_list = ["required", "min", "max", "email"];
    protected $messages = [
        "required" => "The :fieldname: is required",
        "min" => "The :fieldname: must be a minimum :rule_value: characters",
        "max" => "The :fieldname: must be a maximum :rule_value: characters",
        "email" => "Not valid email"
    ];

    public function __construct()
    {
    }

    public function validate($data, $rules) {
        //print_r($data);
        $problems = [];
        foreach ($data as $fieldname => $value) {
            if(in_array($fieldname, array_keys($rules))) {
                $this->check([
                    "fieldname" => $fieldname,
                    "value" => $value,
                    "rules" => $rules[$fieldname]
                ]);
            }
        }
        /*foreach ($data as $key => $value) {
            if($key == "id") {
                if(!is_null($value) || !is_int($value)) {
                    array_push($problems, $key);
                }
            }
            if($key == "name") {
                if(!is_null($value) || !is_string($value)) {
                    array_push($problems, $key);
                }
            }
        }*/

        return $this;
    }

    public function check($field) {
        foreach ($field["rules"] as $rule => $rule_value) {
            if(in_array($rule, $this->rules_list)) {
                if(!call_user_func_array([$this, $rule], [$field["value"], $rule_value])) {
                    $this->addProblem($field["fieldname"], str_replace(
                        [":fieldname:", ":rule_value:"],
                        [$field["fieldname"], $rule_value],
                        $this->messages[$rule]));
                }
            }
        }
    }

    protected function addProblem($fieldname, $problem) {
        $this->problems[$fieldname][] = $problem;
    }

    public function getProblems() {
        return $this->problems;
    }

    public function hasProblems() {
        return !empty($this->problems);
    }

    protected function required($value, $rule_value) {
        return !empty(trim($value));
    }

    protected function min($value, $rule_value) {
        return mb_strlen($value, "UTF-8") >= $rule_value;
    }

    protected function max($value, $rule_value) {
        return mb_strlen($value, "UTF-8") <= $rule_value;
    }

    protected function email($value, $rule_value) {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    public function avatarSecurity($avatar) {
        $name = $avatar["name"];
        $type = $avatar["type"];
        $size = $avatar["size"];

        $blacklist = [".php", ".js", ".java", ".html"];

        foreach ($blacklist as $row) {
            if(preg_match("/$row\$/i", $name)) return false;
        }

        if(($type != "image/png") && ($type != "image/jpg") && ($type != "image/jpeg") && ($type != "image/svg")) return false;

        if($size > 7 * 1024 * 1024) return false;

        return true;
    }

    public function postImageSecurity($image) {
        $name = $image["name"];
        $type = $image["type"];
        $size = $image["size"];

        $blacklist = [".php", ".js", ".java", ".html"];

        foreach ($blacklist as $row) {
            if(preg_match("/$row\$/i", $name)) return false;
        }

        if(($type != "image/png") && ($type != "image/jpg") && ($type != "image/jpeg") && ($type != "image/svg") && ($type != "image/gif")) return false;

        if($size > 7 * 1024 * 1024) return false;

        return true;
    }
}
<?php

class ParamManager
{
    // All GET/POST HTTP request parameters
    protected $all_params = array();

    // Holder for sanitized versions of specified parameters
    protected $sanitized_params = array();


    function __construct()
    {
        // Record all params from GET/POST requests in parameter store array
        foreach($_REQUEST as $param_key => $param_value) {
            $this->all_params[$param_key] = $param_value;
        }
    }


    //{{{ getParam(string, any)
    public function getParam($param_key, $fail_value = null)
    {
        if(!isset($this->sanitized_params[$param_key])) {
            // Produce sanitized version of param if it is not already found
            $value_sanitized = $this->sanitizeParam($param_key, $fail_value);
            $this->setParam($param_key, $value_sanitized);
        }

        return $this->sanitized_params[$param_key];
    }
    //}}}


    //{{{ setParam(string, any)
    protected function setParam($param_key, $param_value)
    {
        $this->sanitized_params[$param_key] = $param_value;
    }
    //}}}


    //{{{ sanitizeParam(string, any)
    protected function sanitizeParam($param_key, $fail_value)
    {
        // Parameter does not exist, use default value
        if(!isset($this->all_params[$param_key])) {
            return $fail_value;
        }


        // Sanitize raw value
        $raw_value = trim($this->all_params[$param_key]);

        switch($param_key) {

        //{{{ url_path
        case 'url_path':
            // Remove trailing URL slash
            if(substr($raw_value, -1, 1) === '/') {
                $raw_value = substr($raw_value, 0, strlen($raw_value) - 1);
            }
            return $raw_value;
        //}}}

        default:
            return $raw_value;
        }
    }
    //}}}
}

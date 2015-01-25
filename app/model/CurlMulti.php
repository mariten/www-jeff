<?php

class CurlMulti
{
    protected $options = array();

    //{{{ parseOptions(array)
    protected function parseOptions($received_options)
    {
        // Clear option
        $this->options = array(
            'decode_json'   => false,
        );

        foreach($this->options as $opt_key => $opt_value) {
            if(isset($received_options[$opt_key])) {
                $this->options[$opt_key] = $received_options[$opt_key];
            }
        }
    }
    //}}}


    //{{{ performParallelRequests(array)
    public function performParallelRequests($set_of_urls, $request_options = array())
    {
        if(empty($set_of_urls)) {
            return array();
        }

        // Init options, CURL handlers and, result array
        $this->parseOptions($request_options);
        $curl_handler = curl_multi_init();
        $all_requests = array();
        $all_responses = array();
        foreach($set_of_urls as $key => $request_url) {
            $all_responses[$key] = '';

            if(empty($request_url)) {
                continue;
            }

            // Create new CURL request for this URL
            $curl_request = curl_init();
            curl_setopt($curl_request, CURLOPT_URL,             $request_url);
            curl_setopt($curl_request, CURLOPT_RETURNTRANSFER,  true);
            curl_setopt($curl_request, CURLOPT_FOLLOWLOCATION,  true);
            curl_multi_add_handle($curl_handler, $curl_request);
            $all_requests[$key] = $curl_request;
        }

        // Execute queries in parallel
        $this->curlMultiExec($curl_handler);

        // Fetch responses and close all handles
        foreach($all_requests as $key => $curl_single_handler) {
            $raw_response = curl_multi_getcontent($curl_single_handler);
            curl_multi_remove_handle($curl_handler, $curl_single_handler);
            curl_close($curl_single_handler);

            // Decode if necessary
            if($this->options['decode_json']) {
                $all_responses[$key] = $this->decodeResponseJSON($raw_response);
            } else {
                $all_responses[$key] = $raw_response;
            }
        }
        curl_multi_close($curl_handler);

        return $all_responses;
    }
    //}}}


    //{{{ curlMultiExec(curl-multi)
    /**
      * Execute curl_multi_exec statement and wait for all to finish
      * @param   curl-multi  A handler created by the "curl_multi_init()" statement
      */
    private function curlMultiExec(&$curl_handler)
    {
        // Start query
        $is_running = null;
        do {
            $exec_code = curl_multi_exec($curl_handler, $is_running);
        }
        while($exec_code == CURLM_CALL_MULTI_PERFORM);

        // Wait for all to finish
        while($is_running && $exec_code == CURLM_OK) {
            if(curl_multi_select($curl_handler) != -1) {
                do {
                    $exec_code = curl_multi_exec($curl_handler, $is_running);
                }
                while($exec_code == CURLM_CALL_MULTI_PERFORM);
            }
            else {
                // Log unexpected error
                return;
            }
        }

        return;
    }
    //}}}


    //{{{ decodeResponseJSON(string)
    protected function decodeResponseJSON($response_string)
    {
        if(empty($response_string)) {
            return array();
        } else {
            return json_decode($response_string, true);
        }
    }
    //}}}
}

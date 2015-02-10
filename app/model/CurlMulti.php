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
            'use_cache'     => true,
            'cache_expires' => 0,
            'cache_path'    => '',
        );

        foreach($this->options as $opt_key => $opt_value) {
            if(isset($received_options[$opt_key])) {
                $this->options[$opt_key] = $received_options[$opt_key];
            }
        }

        // Only use cache if expiration and path are correctly specified
        if($this->options['cache_expires'] > 0
        && !empty($this->options['cache_path'])
        && file_exists($this->options['cache_path'])) {
            $this->options['use_cache'] = true;
        } else {
            $this->options['use_cache'] = false;
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

            // Check if result for this URL is already cached
            if($this->options['use_cache']) {
                $cached_result = $this->readCachedResult($request_url);
                if(!is_null($cached_result)) {
                    // Found valid cached result, do not query this URL
                    $all_responses[$key] = $cached_result;
                    continue;
                }
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
            $all_responses[$key] = $raw_response;

            if($this->options['use_cache']) {
                // Store for later use if caching is turned on
                $request_url = curl_getinfo($curl_single_handler, CURLINFO_EFFECTIVE_URL);
                $this->writeCachedResult($request_url, $raw_response);
            }

            curl_multi_remove_handle($curl_handler, $curl_single_handler);
            curl_close($curl_single_handler);
        }
        curl_multi_close($curl_handler);

        // Post-processing of results
        foreach($all_responses as $key => $raw_response) {
            // Decode if necessary
            if($this->options['decode_json']) {
                $all_responses[$key] = $this->decodeResponseJSON($raw_response);
            }
        }

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


    //{{{ readCachedResult(string)
    protected function readCachedResult($url)
    {
        $cache_filename = $this->produceCacheFilename($url);
        if(!file_exists($cache_filename)) {
            // Not in cache
            return null;
        }

        $raw_cache = file_get_contents($cache_filename);
        $cached_data = @json_decode($raw_cache, true);
        if($cached_data === false
        || !isset($cached_data['expire_unixtime'])
        || !isset($cached_data['content'])
        || !is_numeric($cached_data['expire_unixtime'])) {
            // Cached JSON is invalid
            return null;
        }

        if(time() >= $cached_data['expire_unixtime']) {
            // Cache is expired
            return null;
        }

        // Cache is valid
        return $cached_data['content'];
    }
    //}}}


    //{{{ writeCachedResult(string, string)
    protected function writeCachedResult($url, $content)
    {
        $cache_filename = $this->produceCacheFilename($url);
        $expire_unixtime = time() + $this->options['cache_expires'];
        $data_for_cache = array(
            'expire_unixtime' => $expire_unixtime,
            'content'         => $content,
        );

        file_put_contents($cache_filename, json_encode($data_for_cache));
    }
    //}}}


    //{{{ produceCacheFilename(string)
    protected function produceCacheFilename($url)
    {
        $unique_name = $this->options['cache_path'];
        if(substr($unique_name, -1) !== '/') {
            $unique_name .= '/';
        }
        $unique_name .= sha1($url) . '.json';
        return $unique_name;
    }
    //}}}
}

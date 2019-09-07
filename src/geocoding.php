<?php

namespace OSM;

class Geocoding {
    // ----- LOCAL VARIABLES -----
        private $api = "https://nominatim.openstreetmap.org/search.php";
        private $agent = 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.119 Safari/537.36';
        private $filename = 'request';
        private $format = NULL;
        private $params = NULL;
        private $search = NULL;
        private $search_type = NULL;
        private $url = NULL;
        private $request = NULL;
        private $coordinates = NULL;

    // ----- PRIVATE FUNCTIONS -----
        private function decode($input, $type) {
            $output = NULL;
            if($type == 'json') {
                $json = json_decode($input, true);
                $output = $json[0];
                return $output;
            }
        }

        private function setSearch($search) {
            if($this->search_type == "string"){
                $search = urlencode($search);
            } else if($this->search_type == "array") {
                foreach($search as $name => $value) {
                    $search[$name] = urlencode($value);
                }
            }
            return $search;
        }

        private function setUrl($search, $params) {
            $url = '';
            $url .= $this->getApi()."?q=";
            if($this->search_type == "string") {
                $url .= $search;
            } else if($this->search_type == "array") {
                foreach($search as $name => $value) {
                    $url .= $value."%2C";
                }
            }
            $url .= "&";
            foreach($params as $name => $value) {
                $url .= $name."=".$value."&";
            }
            return $url;
        }

        private function setRequest($url) {
            $agent = $this->getAgent();
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_USERAGENT, $agent);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_AUTOREFERER, true);
            $request = curl_exec($curl);
            return $request;
        }

        private function setCoordinates($request = NULL) {
            if($request == NULL) {
                $coordinates = NULL;
            } else {
                $input = $this->decode($request, $this->getFormat());
                if($input == NULL) {
                    return NULL;
                } else {
                    $latitude = $input["lat"];
                    $longitude = $input["lon"];
                    $coordinates = [
                        "lat" => $latitude,
                        "lon" => $longitude
                    ];
                    return $coordinates;
                }
            }
        }

    // ----- PUBLIC FUNCTIONS -----
        public function generate($search, $output_format = "json",  $params = NULL) {
            // evaluate inputs
            if($search == NULL) {
                return false;
            } else {
                // set variables
                if(gettype($search) == 'string') {
                    $this->search_type = "string";
                } else {
                    $this->search_type = "array";
                }
                $this->format = $output_format;
                $params['format'] = $this->getFormat();
                $this->params = $params;
                $this->search = $this->setSearch($search);
                $this->url = $this->setUrl($this->getSearch(), $this->getParams());
                $this->request = $this->setRequest($this->getUrl());
                if($this->request == "[]") {
                    $this->coordinates = $this->setCoordinates();
                    return false;
                } else {
                    $this->coordinates = $this->setCoordinates($this->getRequest());
                    return true;
                }
            }
        }

        public function saveRequest($filename = NULL) {
            if($filename == NULL) {
                $filename = $this->filename;
            }
            $this->filename = $filename;
            $format = $this->getFormat();
            $filedir = __DIR__."/".$filename.".".$format;
            $file = fopen($filedir, "w");
            if(flock($file, LOCK_EX) == FALSE) {
                return false;
            }
            fwrite($file, $this->request);
            fclose($file);
            return true;
        }

        public function getApi() {
            return $this->api;
        }

        public function getAgent() {
            return $this->agent;
        }

        public function getFilename() {
            return $this->filename;
        }

        public function getFormat() {
            return $this->format;
        }

        public function getParams($name = NULL) {
            if($name != NULL) {
                return $this->params[$name];
            } else {
                return $this->params;
            }
        }

        public function getSearch($name = NULL) {
            if($name != NULL) {
                return $this->search[$name];
            } else {
                return $this->search;
            }
        }

        public function getUrl() {
            return $this->url;
        }

        public function getRequest() {
            return $this->request;
        }

        public function getCoordinates($name = NULL) {
            if($name != NULL) {
                return $this->coordinates[$name];
            } else {
                return $this->coordinates;
            }
        }
}

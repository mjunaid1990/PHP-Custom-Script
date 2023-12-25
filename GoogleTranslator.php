<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GoogleTranslator
 *
 * @author Muhammad Junaid
 */

require $_BASEPATH . 'lib/custom_lib/vendor/autoload.php';

use Google\Cloud\Translate\V2\TranslateClient;

class GoogleTranslator {

    //put your code here
//    old key
//    private $api_key = 'AIzaSyDh9J_dA42dpyGMXpeQSVYlAGApAWdC7LQ';
//    new key
    private $api_key = 'AIzaSyBbAEUhYLKwBre2Z0Pr4y4ifUTmemu4TJs';
    private $client;

    public function __construct() {
        $this->client = new TranslateClient([
            'key' => $this->api_key
        ]);
    }

    public function translate($text, $target_language) {
        $result = $this->client->translate($text, [
            'target' => $target_language
        ]);
        if($result) {
            return $result['text'];
        }
        
    }

}

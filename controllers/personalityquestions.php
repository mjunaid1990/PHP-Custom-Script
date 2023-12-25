<?php
Class PersonalityQuestions extends Theme {
    public static $page_data = array();
    public static $partial = 'personality-questions';
    public static function init_data() {
        global $config;
        parent::init_data();
        parent::$data['title'] = __('Personality Questions') . ' . ' . $config->site_name;
        parent::$data['name']  = self::$partial;
    }
    public static function show($partial = '') {
        self::init_data();
        parent::show(self::$partial);
    }
}

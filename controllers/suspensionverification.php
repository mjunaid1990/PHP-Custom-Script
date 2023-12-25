<?php
Class SuspensionVerification extends Theme {
    public static $page_data = array('title' => 'Suspension Verification');
    public static $partial = 'suspension-verification';
    public static function init_data() {
        global $config;
        parent::init_data();
        parent::$data['title'] = ucfirst(__('Suspension Verification')) . ' . ' . $config->site_name;
        parent::$data['name'] = self::$partial;
    }
    public static function show($partial = '') {
        self::init_data();
        parent::show(self::$partial);
    }
}
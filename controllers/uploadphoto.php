<?php
Class UploadPhoto extends Theme {
    public static $page_data = array();
    public static $partial = 'upload-photo';
    public static function init_data() {
        global $config;
        parent::init_data();
        parent::$data['title'] = __('Upload Photo') . ' . ' . $config->site_name;
        parent::$data['name']  = self::$partial;
    }
    public static function show($partial = '') {
        self::init_data();
        parent::show(self::$partial);
    }
}

<?php
Class Blogs extends Theme {
    public static $page_data = array('title' => 'Blog');
    public static $partial = 'blogs';
    public static function init_data() {
        global $config;
        parent::init_data();
        if (isset(self::$page_data['title']) && self::$page_data['title'] !== '') {
            parent::$data['title'] = ucfirst(__('Blogs')) . ' . ' . $config->site_name;
        }
        parent::$data['name'] = self::$partial;
        parent::$data['articles'] = self::Art();
    }
    public static function show($partial = '') {
        global $config,$db;
        self::init_data();
        $single_page = false;
        $arr = !empty(route(2))?route(2):'';
        if($arr) {
            $article      = $db->where('slug', Secure(route(2)) )->getOne('blog',array('*'));
            if($article) {

//                if( !isset( $_SESSION['blog_view'][Secure((int)$arr[0])] ) ) {
                    $db->where('id', $article['id'])->update('blog', array('view' => $db->inc()));
//                    $_SESSION['blog_view'][Secure((int)$arr[0])] = true; //modified by Community Devs LLC
//                }
                
                $article['url'] = '';
                $quote = $article['title'];
                if ($quote !== '') {
                    parent::$data['title'] = $quote . ' . ' . $config->site_name;
                    parent::$data['keywords'] = $quote;
                    parent::$data['description'] = $article['description'];
    //                url modified by muhammad junaid
                    $article['url'] = urlencode( $config->uri . '/blogs/' . $article['slug'] );

                    parent::$data['image'] = GetMedia($article['thumbnail']);
                }
                parent::$data['article'] = $article;
                parent::show('article');
            }else {
                parent::show(self::$partial);
            }
        }else {
            parent::show(self::$partial);
        }
        
    }
    public static function Art() {
        global $_AJAX, $_CONTROLLERS;
        $data            = '';
        $ajax_class      = realpath($_CONTROLLERS . 'aj.php');
        $ajax_class_file = realpath($_AJAX . 'loadmore.php');
        if (file_exists($ajax_class_file)) {
            require_once $ajax_class;
            require_once $ajax_class_file;
            $_POST['page'] = 1;
            $loadmore      = new Loadmore();
            $match_users   = $loadmore->articles();
            if (isset($match_users['html'])) {
                $data = $match_users['html'];
            }
        }
        return $data;
    }

}
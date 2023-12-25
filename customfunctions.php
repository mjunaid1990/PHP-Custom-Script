<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * all custom functions are added here
 * By Community Dev LLC.
 * 
 * 
 */

function isMobile() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}

function DatasetGetSelectMultiple($database_value, $dataset_array, $null_value) {
    $result = '';

    $database_value = explode(',', $database_value);
    if (empty($database_value)) {
        $result .= '<option value="" disabled selected>' . __('Select') . '</option>';
    } else {
        $result .= '<option value="" disabled >' . __('Select') . '</option>';
    }
    $data = NewLanguagesArray();
    if (isset($data) && !empty($data)) {
        foreach ($data as $key => $val) {
            $new_val = __($val) ? __($val) : $val;
            $result .= '<option value="' . $key . '" ' . ((in_array($key, $database_value)) ? 'selected' : '') . '>' . $new_val . '</option>';
        }
        return $result;
    } else {
        return $result;
    }
}

function DatasetGetSelectMultipleAll($database_value, $dataset_array, $null_value) {
    $result = '';

    $database_value = explode(',', $database_value);
    if (empty($database_value)) {
        $result .= '<option value="" disabled selected>' . __('Select') . '</option>';
    } else {
        $result .= '<option value="" disabled >' . __('Select') . '</option>';
    }
    $data = Dataset::load($dataset_array);
    if (isset($data) && !empty($data)) {
        foreach ($data as $key => $val) {
            $new_val = __($val) ? __($val) : $val;
            $result .= '<option value="' . $val . '" ' . ((in_array($val, $database_value)) ? 'selected' : '') . '>' . $new_val . '</option>';
        }
        return $result;
    } else {
        return $result;
    }
}

/*
 * get dataset fields as radio inputs
 */

function DatasetGetRadio($database_value, $dataset_array, $input) {
    $result = '';
    $data = Dataset::load($dataset_array);
    if (isset($data) && !empty($data)) {
        foreach ($data as $key => $val) {
            $cls = '';
            $checked = '';
            if ($key == 5) {
                $cls = 'show-to-men';
            }
            if ($key == $database_value) {
                $checked = 'checked';
            }
            $result .= '<p class="' . $cls . '">';

            $result .= '<label>';

            $result .= '<input class="with-gap" name="' . $input . '" type="radio" value="' . $key . '" ' . $checked . ' />';

            $result .= '<span>' . $val . '</span>';

            $result .= '</label>';

            $result .= '</p>';
//            $result .= '<option value="' . $key . '" ' . (($database_value == $key) ? 'selected' : '') . '>' . $val . '</option>';
        }
        return $result;
    } else {
        return $result;
    }
}

/*
 * get dataset fields as checkbox inputs
 */

function DatasetGetCheckbox($database_value, $dataset_array, $input) {
    $result = '';
    $popular_langs = popularLangsArray();
    $data = NewLanguagesArrayReg();
    $new_array = array_chunk($data, 20);

    if ($new_array) {
        foreach ($new_array as $r => $arr) {
            $result .= '<div class="col m4 s6">';

            if (is_array($arr)) {
                foreach ($arr as $key => $val) {
                    if ($key == 0 && $r == 0) {
                        $result .= '<h4 class="header">' . __('Popular Languages') . '</h4>';
                    }
                    if ($key == 7 && $r == 0) {
                        $result .= '<h4 class="header">' . __('Other Languages') . '</h4>';
                    }
                    $result .= '<p>';

                    $result .= '<label>';

                    $result .= '<input  name="' . $input . '" type="checkbox" value="' . $val . '" ' . ((in_array($val, $database_value)) ? 'checked' : '') . ' />';

                    $result .= '<span>' . $val . '</span>';

                    $result .= '</label>';

                    $result .= '</p>';
                }
            }
            $result .= '</div>';
        }
    }
    return $result;
//    if (isset($data) && !empty($data)) {
//        foreach ($data as $key => $val) {
//            $result .= '<div class="col m4 s6"><p>';
// 
//                $result .= '<label>';
//
//                  $result .= '<input  name="'.$input.'" type="checkbox" value="' . $val . '" ' . ((in_array($key, $database_value)) ? 'checked' : '') . ' />';
//
//                  $result .= '<span>' . $val . '</span>';
//
//                $result .= '</label>';
//
//            $result .= '</p></div>';
////            $result .= '<option value="' . $key . '" ' . (($database_value == $key) ? 'selected' : '') . '>' . $val . '</option>';
//        }
//        return $result;
//    } else {
//        return $result;
//    }
}

/*
 * Get profile fields
 * based on sections
 */

function GetProfileFieldsByLocationType($type = 'all', $location = '', $include = null, $exclude = null) {
    global $conn;
    $data = array();
    $where = '';
    $placements = array(
        'profile',
        'general',
        'social'
    );
    if ($type != 'all' && in_array($type, $placements)) {
        $where = "WHERE `placement` = '{$type}' AND `placement` <> 'none' AND `active` = '1'";
    } else if ($type == 'none') {
        $where = "WHERE `profile_page` = '1' AND `active` = '1'";
    } else if ($type != 'admin') {
        $where = "WHERE `active` = '1'";
    }

    if ($location) {
        $where .= " AND `profile_section` = '$location' ";
    }

    if ($include) {
        $where .= " AND `id` IN ( $include )";
    }

    if ($exclude) {
        $where .= " AND `id` NOT IN ( $exclude )";
    }

    $order_by_field = 'id';

    if ($location) {
        $order_by_field = 'order_no';
    }


    $type = Secure($type);
    $query_one = "SELECT * FROM `profilefields` {$where} GROUP BY `id` ORDER BY `$order_by_field` ASC";

    $sql = mysqli_query($conn, $query_one);
    while ($fetched_data = mysqli_fetch_assoc($sql)) {
        $fetched_data['fid'] = 'fid_' . $fetched_data['id'];
        $fetched_data['name'] = preg_replace_callback("/{{LANG (.*?)}}/", function($m) {
            return __($m[1]);
        }, $fetched_data['name']);
        $fetched_data['description'] = preg_replace_callback("/{{LANG (.*?)}}/", function($m) {
            return __($m[1]);
        }, $fetched_data['description']);
        $fetched_data['type'] = preg_replace_callback("/{{LANG (.*?)}}/", function($m) {
            return __($m[1]);
        }, $fetched_data['type']);
        $data[] = $fetched_data;
    }
    return $data;
}

/*
 * Get profile fields 
 * based on sections where custom field id greater then 31
 */

function GetProfileFieldsByLocationTypeDynamic($type = 'all', $location = '', $id = 31) {
    global $conn;
    $data = array();
    $where = '';
    $placements = array(
        'profile',
        'general',
        'social'
    );
    if ($type != 'all' && in_array($type, $placements)) {
        $where = "WHERE `placement` = '{$type}' AND `placement` <> 'none' AND `active` = '1'";
    } else if ($type == 'none') {
        $where = "WHERE `profile_page` = '1' AND `active` = '1'";
    } else if ($type != 'admin') {
        $where = "WHERE `active` = '1'";
    }

    if ($location) {
        $where .= " AND id > 31 AND `profile_section` = '$location' ";
    }

    $order_by_field = 'id';

    if ($location) {
        $order_by_field = 'order_no';
    }


    $type = Secure($type);
    $query_one = "SELECT * FROM `profilefields` {$where} ORDER BY `$order_by_field` ASC";
    $sql = mysqli_query($conn, $query_one);
    while ($fetched_data = mysqli_fetch_assoc($sql)) {
        $fetched_data['fid'] = 'fid_' . $fetched_data['id'];
        $fetched_data['name'] = preg_replace_callback("/{{LANG (.*?)}}/", function($m) {
            return __($m[1]);
        }, $fetched_data['name']);
        $fetched_data['description'] = preg_replace_callback("/{{LANG (.*?)}}/", function($m) {
            return __($m[1]);
        }, $fetched_data['description']);
        $fetched_data['type'] = preg_replace_callback("/{{LANG (.*?)}}/", function($m) {
            return __($m[1]);
        }, $fetched_data['type']);
        $data[] = $fetched_data;
    }
    return $data;
}

/*
 * Get profile fields 
 * based on by ids
 * By Community Dev LLC
 */

function GetProfileFieldsByLocationTypeByIds($type = 'all', $ids = '') {
    global $conn;
    $data = array();
    $where = '';
    $placements = array(
        'profile',
        'general',
        'social'
    );
    if ($type != 'all' && in_array($type, $placements)) {
        $where = "WHERE `placement` = '{$type}' AND `placement` <> 'none' AND `active` = '1'";
    } else if ($type == 'none') {
        $where = "WHERE `profile_page` = '1' AND `active` = '1'";
    } else if ($type != 'admin') {
        $where = "WHERE `active` = '1'";
    }
    if($ids) {
        $where .= " AND `id` IN ( $ids )";
    }

    $type = Secure($type);
    $query_one = "SELECT * FROM `profilefields` {$where} order by `order_no` ASC";
    $sql = mysqli_query($conn, $query_one);
    while ($fetched_data = mysqli_fetch_assoc($sql)) {
        $fetched_data['fid'] = 'fid_' . $fetched_data['id'];
        $fetched_data['name'] = preg_replace_callback("/{{LANG (.*?)}}/", function($m) {
            return __($m[1]);
        }, $fetched_data['name']);
        $fetched_data['description'] = preg_replace_callback("/{{LANG (.*?)}}/", function($m) {
            return __($m[1]);
        }, $fetched_data['description']);
        $fetched_data['type'] = preg_replace_callback("/{{LANG (.*?)}}/", function($m) {
            return __($m[1]);
        }, $fetched_data['type']);
        $data[] = $fetched_data;
    }
    return $data;
}

/*
 * Get user field value by id
 * By Community Dev LLC
 */

function countries_order_by($countr_id) {

    global $conn;
    $query_one = "SELECT GROUP_CONCAT(DISTINCT country_id) as ids FROM `users` where country_id != $countr_id and country_id !=0 ORDER BY country_id ASC;";
    $sql = mysqli_query($conn, $query_one);
    $fetched_data = mysqli_fetch_assoc($sql);
    return $fetched_data['ids'];
}

/*
 * Get user field value by id
 * By Community Dev LLC
 */

function UserFieldsDataByID($user_id, $field_id) {
    global $conn;
    if (empty($user_id) || !is_numeric($user_id) || $user_id < 0) {
        return false;
    }
    if (empty($field_id) || !is_numeric($field_id) || $field_id < 0) {
        return false;
    }
    $data = array();
    $user_id = Secure($user_id);
    $query_one = "SELECT * FROM `userfields` WHERE `user_id` = {$user_id}";
    $sql = mysqli_query($conn, $query_one);
    $fetched_data = mysqli_fetch_assoc($sql);
    if (empty($fetched_data)) {
        return false;
    }
    return $fetched_data['fid_' . $field_id];
}

/*
 * Get profile location based on country, state and city
 * By Community Dev LLC
 */

function GetProfileLocation($profile) {
    $loc = '';
    
    $city = GetCityById($profile->city_id);
    
    $state = GetStateById($profile->state_id);
    $country = GetCountryById($profile->country_id);
    $current_lang = isset($_COOKIE['activeLang']) ? strtolower($_COOKIE['activeLang']) : 'english';
    if ($city) {
        $loc .= $city[$current_lang] . ', ';
    }
    if ($state) {
        $loc .= $state[$current_lang] . ', ';
    }
    if ($country) {
        $loc .= $country[$current_lang];
    }
    if ($loc) {
        return $loc;
    } else {
        return $profile->location;
    }
}

/*
 * Get profile location based on country, state and city
 * By Community Dev LLC
 */

function GetProfileLocationUrl($profile) {
    $loc = '';
    $city = GetCityById($profile->city_id);
    $state = GetStateById($profile->state_id);
    $country = GetCountryById($profile->country_id);
    $current_lang = isset($_COOKIE['activeLang']) ? strtolower($_COOKIE['activeLang']) : 'english';
    if ($city) {
        $loc .= $city[$current_lang];
    }
    if ($state) {
        $loc .= ' ' . $state[$current_lang];
    }
    if ($country) {
        $loc .= ' ' . $country[$current_lang];
    }
    if ($loc) {
        return $loc;
    } else {
        return $profile->location;
    }
}

/*
 * Get profile location based on country, state and city
 * By Community Dev LLC
 */

function GetProfileLocationUrl2($profile) {
    $loc = '';
    $city = GetCityById($profile->city_id);
    $state = GetStateById($profile->state_id);
    $country = GetCountryById($profile->country_id);
    $current_lang = isset($_COOKIE['activeLang']) ? strtolower($_COOKIE['activeLang']) : 'english';
    if ($city) {
        $loc .= $city[$current_lang];
    }
    if (empty($city) && $state) {
        $loc .= ' ' . $state[$current_lang];
    }
    if ($country) {
        $loc .= ' ' . $country[$current_lang];
    }
    if ($loc) {
        return $loc;
    } else {
        return $profile->location;
    }
}

/*
 * Get profile location based on country, state
 * By Community Dev LLC
 */

function GetProfileLocationUrl3($profile) {
    $loc = '';
    $city = GetCityById($profile->city_id);
    $state = GetStateById($profile->state_id);
    $country = GetCountryById($profile->country_id);
    $current_lang = isset($_COOKIE['activeLang']) ? strtolower($_COOKIE['activeLang']) : 'english';
    if ($state) {
        $loc .= ' ' . $state[$current_lang];
    }
    if ($country) {
        $loc .= ' ' . $country[$current_lang];
    }
    if ($loc) {
        return $loc;
    } else {
        return $profile->location;
    }
}

/*
 * Get profile field by id 
 * By Community Dev LLC
 */

function GetProfileFieldsById($id) {
    global $conn;
    
    if(is_numeric($id)) {
        $sql_text = "SELECT * FROM `userfields` where user_id = $id ";
    }else {
        $us_q = mysqli_query($conn, ' select id from users where username = "'.$id.'" ');
        $us = mysqli_fetch_assoc($us_q);
        if($us['id']) {
            $uid = $us['id'];
            $sql_text = "SELECT * FROM `userfields` where id = $uid ";
        }
    }

    $query_one = $sql_text;
    $sql = mysqli_query($conn, $query_one);
    return mysqli_fetch_assoc($sql);
}

/*
 * Get states by country id
 * By Community Dev LLC
 */

function GetStatesByCountryId($id, $lang = 'english') {
    global $conn;
    $data = array();
    $query_one = "SELECT * FROM `states` where country_id = $id ";
    $sql = mysqli_query($conn, $query_one);
    while ($fetched_data = mysqli_fetch_assoc($sql)) {
        $data[] = $fetched_data;
    }
    return $data;
}

/*
 * Get country by id
 * By Community Dev LLC
 */

function GetCountryById($id) {
    global $conn;
    if(is_numeric($id)) {
        $query_one = "SELECT * FROM `langs` where id = $id and ref = 'country' ";
        $sql = mysqli_query($conn, $query_one);
        return mysqli_fetch_assoc($sql);
    }
    return false;
}

/*
 * Get country by id
 * By Community Dev LLC
 */

function GetCountryNameById($id) {
    global $conn;

    $query_one = "SELECT * FROM `langs` where id = $id and ref = 'country' ";
    $sql = mysqli_query($conn, $query_one);
    $res = mysqli_fetch_assoc($sql);
    if ($res) {
        return $res['english'];
    }
    return '';
}

/*
 * Get country by id
 * By Community Dev LLC
 */

function GetCountryByName($name) {
    global $conn;

    $query_one = 'SELECT * FROM `langs` where english = "' . $name . '" and ref = "country" ';
    $sql = mysqli_query($conn, $query_one);
    return mysqli_fetch_assoc($sql);
}

/*
 * Get cities by country id
 * By Community Dev LLC
 */

function GetCitiesByStateId($id) {
    global $conn;

    $query_one = "SELECT * FROM `cities` where state_id = $id ";
    $sql = mysqli_query($conn, $query_one);
    $data = array();
    while ($fetched_data = mysqli_fetch_assoc($sql)) {
        $data[] = $fetched_data;
    }
    return $data;
}

/*
 * get country by name
 */

function GetStateById($id) {
    global $conn;
    if(is_numeric($id)) {
        $query_one = mysqli_query($conn, "SELECT * FROM `states` WHERE id = $id ");
        $fetched_data = mysqli_fetch_assoc($query_one);
        return $fetched_data;
    }
    return false;
}

/*
 * get country by name
 */

function GetStateByName($name) {
    global $conn;
    $query_one = mysqli_query($conn, 'SELECT * FROM `states` WHERE name = "' . $name . '" ');
    $fetched_data = mysqli_fetch_assoc($query_one);
    return $fetched_data;
}

/*
 * get country by name
 */

function GetStateByNameWithCountryId($name, $country_id) {
    global $conn;
    $query_one = mysqli_query($conn, 'SELECT * FROM `states` WHERE country_id = ' . $country_id . ' AND name = "' . $name . '" ');
    $fetched_data = mysqli_fetch_assoc($query_one);
    return $fetched_data;
}

/*
 * get city by id
 */

function GetCityById($id) {
    global $conn;
    if(is_numeric($id)) {
        $query_one = mysqli_query($conn, "SELECT * FROM `cities` WHERE id = $id ");
        $fetched_data = mysqli_fetch_assoc($query_one);
        return $fetched_data;
    }
    return false;
    
}

/*
 * get city by name
 */

function GetCityByName($name) {
    global $conn;
    if($name) {
        $query_one = mysqli_query($conn, 'SELECT * FROM `cities` WHERE name = "' . $name . '" ');
        $fetched_data = mysqli_fetch_assoc($query_one);
        return $fetched_data;
    }
    return false;
}

/*
 * get city by name
 */

function GetCityByNameWithCountryId($name, $country_id) {
    global $conn;
    $query_one = mysqli_query($conn, 'SELECT * FROM `cities` WHERE country_id = ' . $country_id . ' AND name = "' . $name . '" ');
    $fetched_data = mysqli_fetch_assoc($query_one);
    return $fetched_data;
}

/*
 * get city by name
 */

function GetCityByNameWithCountryAndState($name, $state_id, $country_id) {
    global $conn;
    $query_one = mysqli_query($conn, 'SELECT * FROM `cities` WHERE country_id = ' . $country_id . ' AND state_id = ' . $state_id . ' AND name = "' . $name . '" ');
    $fetched_data = mysqli_fetch_assoc($query_one);
    return $fetched_data;
}

/*
 * Get refferal payment
 * By Community Dev LLC
 */

function GetRefferralUserPayment($user_id, $ref_id) {
    global $db;
    $old_ref_payment = $db->where('referrar_id', $ref_id)->where('user_id', $user_id)->getOne('affiliated_system_payments');
    if ($old_ref_payment) {
        return $old_ref_payment;
    }
    return false;
}

/*
 * Get new chat initiate
 * By Community Dev LLC
 */

function get_new_chat_initate_detail($toid) {
    global $db;
    
    $uid = auth()->id;
    $exist = $db->where('toid', $toid)->where('uid', $uid)->getOne('new_message_users_list');
    if($exist) {
        return true;
    }
    return false;
}

/*
 * Popular Langs
 */

function popularLangsArray() {
    return [
        'Arabic',
        'English',
        'French',
        'German',
        'Spanish',
        'Turkish',
        'Urdu'
    ];
}

/*
 * New Languages Array
 */

function NewLanguagesArrayReg() {
    $arr = [
        'Arabic', //popular langs
        'English',
        'French',
        'German',
        'Spanish',
        'Turkish',
        'Urdu',
        'Awadhi', //other langs
        'Azerbaijani, South',
        'Bengali',
        'Bhojpuri',
        'Burmese',
        'Chinese (Mandarin)',
        'Chinese, Yue(Cantonese)',
        'Chinese (Gan)',
        'Chinese (Wu)',
        'Chinese (Min Nan)',
        'Chinese (Jinyu)',
        'Chinese (Xiang)',
        'Chinese (Hakka)',
        'Danish',
        'Dutch',
        'Frisian',
        'Georgian',
        'Greek',
        'Gujarati',
        'Hausa',
        'Hindi',
        'Indonesian',
        'Italian',
        'Japanese',
        'Javanese',
        'Maithili',
        'Malay',
        'Malayalam',
        'Marathi',
        'Norwegian',
        'Kannada',
        'Korean',
        'Oriya',
        'Persian',
        'Panjabi, Eastern',
        'Panjabi, Western',
        'Philippines',
        'Polish',
        'Portuguese',
        'Romanian',
        'Russian',
        'Serbo-Croatian',
        'Sindhi',
        'Sunda',
        'Swedish',
        'Telugu',
        'Tamil',
        'Thai',
        'Ukrainian',
        'Vietnamese',
        'Yoruba',
        'Other'
    ];
    $data = array();
    if ($arr) {
        foreach ($arr as $val) {
            $data[$val] = $val;
        }
    }
    return $data;
}

/*
 * New Languages Array
 */

function NewLanguagesArray() {
    $arr = [
        'Arabic',
        'English',
        'French',
        'Awadhi',
        'Azerbaijani, South',
        'Bengali',
        'Bhojpuri',
        'Burmese',
        'Chinese (Mandarin)',
        'Chinese, Yue(Cantonese)',
        'Chinese (Gan)',
        'Chinese (Wu)',
        'Chinese (Min Nan)',
        'Chinese (Jinyu)',
        'Chinese (Xiang)',
        'Chinese (Hakka)',
        'Danish',
        'Dutch',
        'Frisian',
        'German',
        'Georgian',
        'Greek',
        'Gujarati',
        'Hausa',
        'Hindi',
        'Indonesian',
        'Italian',
        'Japanese',
        'Javanese',
        'Maithili',
        'Malay',
        'Malayalam',
        'Marathi',
        'Norwegian',
        'Kannada',
        'Korean',
        'Oriya',
        'Persian',
        'Panjabi, Eastern',
        'Panjabi, Western',
        'Philippines',
        'Polish',
        'Portuguese',
        'Romanian',
        'Russian',
        'Serbo-Croatian',
        'Sindhi',
        'Spanish',
        'Sunda',
        'Swedish',
        'Turkish',
        'Telugu',
        'Tamil',
        'Thai',
        'Ukrainian',
        'Yoruba',
        'Urdu',
        'Vietnamese',
        'Other'
    ];
    $data = array();
    if ($arr) {
        foreach ($arr as $val) {
            $data[$val] = $val;
        }
    }
    return $data;
}

/*
 * import countries
 */

function import_countries_array_into_db($full = false) {
    global $conn, $wo, $db;
    $countries = countries_list();
    if ($countries) {
        foreach ($countries as $k => $country) {
            $old = get_old_country($country['name']);
            if (!$old) {
                $insert_data = [
                    'ref' => 'country',
                    'options' => $country['code'],
                    'lang_key' => $k,
                    'english' => $country['name'],
                    'arabic' => $country['name'],
                    'dutch' => $country['name'],
                    'french' => $country['name'],
                    'german' => $country['name'],
                    'italian' => $country['name'],
                    'portuguese' => $country['name'],
                    'russian' => $country['name'],
                    'spanish' => $country['name'],
                    'turkish' => $country['name'],
                    'ukrainian' => $country['name'],
                    'malay' => $country['name'],
                ];
//                $db->insert('langs', $insert_data);
            }
        }
    }
}

/*
 * get country by name
 */

function get_old_country($name) {
    global $wo, $conn;
    $query_one = mysqli_query($conn, "SELECT * FROM `langs` WHERE ref='country' and english = '$name' ");
    $fetched_data = mysqli_fetch_assoc($query_one);
    return $fetched_data;
}

/*
 * get user identity single_attachment
 */

function get_identity_unapproved($id) {
    global $conn;
    $query_one = "SELECT * FROM `mediafiles` where user_id = $id and is_identity = 1 and is_identity_approved = 0 ";
    $sql = mysqli_query($conn, $query_one);
    return mysqli_fetch_assoc($sql);
}

/*
 * get user identity attachments
 */

function get_identity_attachments($id) {
    global $conn;
    $query_one = "SELECT * FROM `mediafiles` where user_id = $id and is_identity = 1 ";
    $sql = mysqli_query($conn, $query_one);
    $data = array();
    while ($fetched_data = mysqli_fetch_assoc($sql)) {
        $data[] = $fetched_data;
    }
    return $data;
}

/*
 * countries array
 */

function countries_list() {
    $lists = array(
        'AD' => array('name' => 'ANDORRA', 'code' => '376'),
        'AE' => array('name' => 'UNITED ARAB EMIRATES', 'code' => '971'),
        'AF' => array('name' => 'AFGHANISTAN', 'code' => '93'),
        'AG' => array('name' => 'ANTIGUA AND BARBUDA', 'code' => '1268'),
        'AI' => array('name' => 'ANGUILLA', 'code' => '1264'),
        'AL' => array('name' => 'ALBANIA', 'code' => '355'),
        'AM' => array('name' => 'ARMENIA', 'code' => '374'),
        'AN' => array('name' => 'NETHERLANDS ANTILLES', 'code' => '599'),
        'AO' => array('name' => 'ANGOLA', 'code' => '244'),
        'AQ' => array('name' => 'ANTARCTICA', 'code' => '672'),
        'AR' => array('name' => 'ARGENTINA', 'code' => '54'),
        'AS' => array('name' => 'AMERICAN SAMOA', 'code' => '1684'),
        'AT' => array('name' => 'AUSTRIA', 'code' => '43'),
        'AU' => array('name' => 'AUSTRALIA', 'code' => '61'),
        'AW' => array('name' => 'ARUBA', 'code' => '297'),
        'AZ' => array('name' => 'AZERBAIJAN', 'code' => '994'),
        'BA' => array('name' => 'BOSNIA AND HERZEGOVINA', 'code' => '387'),
        'BB' => array('name' => 'BARBADOS', 'code' => '1246'),
        'BD' => array('name' => 'BANGLADESH', 'code' => '880'),
        'BE' => array('name' => 'BELGIUM', 'code' => '32'),
        'BF' => array('name' => 'BURKINA FASO', 'code' => '226'),
        'BG' => array('name' => 'BULGARIA', 'code' => '359'),
        'BH' => array('name' => 'BAHRAIN', 'code' => '973'),
        'BI' => array('name' => 'BURUNDI', 'code' => '257'),
        'BJ' => array('name' => 'BENIN', 'code' => '229'),
        'BL' => array('name' => 'SAINT BARTHELEMY', 'code' => '590'),
        'BM' => array('name' => 'BERMUDA', 'code' => '1441'),
        'BN' => array('name' => 'BRUNEI DARUSSALAM', 'code' => '673'),
        'BO' => array('name' => 'BOLIVIA', 'code' => '591'),
        'BR' => array('name' => 'BRAZIL', 'code' => '55'),
        'BS' => array('name' => 'BAHAMAS', 'code' => '1242'),
        'BT' => array('name' => 'BHUTAN', 'code' => '975'),
        'BW' => array('name' => 'BOTSWANA', 'code' => '267'),
        'BY' => array('name' => 'BELARUS', 'code' => '375'),
        'BZ' => array('name' => 'BELIZE', 'code' => '501'),
        'CA' => array('name' => 'CANADA', 'code' => '1'),
        'CC' => array('name' => 'COCOS (KEELING) ISLANDS', 'code' => '61'),
        'CD' => array('name' => 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'code' => '243'),
        'CF' => array('name' => 'CENTRAL AFRICAN REPUBLIC', 'code' => '236'),
        'CG' => array('name' => 'CONGO', 'code' => '242'),
        'CH' => array('name' => 'SWITZERLAND', 'code' => '41'),
        'CI' => array('name' => 'COTE D IVOIRE', 'code' => '225'),
        'CK' => array('name' => 'COOK ISLANDS', 'code' => '682'),
        'CL' => array('name' => 'CHILE', 'code' => '56'),
        'CM' => array('name' => 'CAMEROON', 'code' => '237'),
        'CN' => array('name' => 'CHINA', 'code' => '86'),
        'CO' => array('name' => 'COLOMBIA', 'code' => '57'),
        'CR' => array('name' => 'COSTA RICA', 'code' => '506'),
        'CU' => array('name' => 'CUBA', 'code' => '53'),
        'CV' => array('name' => 'CAPE VERDE', 'code' => '238'),
        'CX' => array('name' => 'CHRISTMAS ISLAND', 'code' => '61'),
        'CY' => array('name' => 'CYPRUS', 'code' => '357'),
        'CZ' => array('name' => 'CZECH REPUBLIC', 'code' => '420'),
        'DE' => array('name' => 'GERMANY', 'code' => '49'),
        'DJ' => array('name' => 'DJIBOUTI', 'code' => '253'),
        'DK' => array('name' => 'DENMARK', 'code' => '45'),
        'DM' => array('name' => 'DOMINICA', 'code' => '1767'),
        'DO' => array('name' => 'DOMINICAN REPUBLIC', 'code' => '1809'),
        'DZ' => array('name' => 'ALGERIA', 'code' => '213'),
        'EC' => array('name' => 'ECUADOR', 'code' => '593'),
        'EE' => array('name' => 'ESTONIA', 'code' => '372'),
        'EG' => array('name' => 'EGYPT', 'code' => '20'),
        'ER' => array('name' => 'ERITREA', 'code' => '291'),
        'ES' => array('name' => 'SPAIN', 'code' => '34'),
        'ET' => array('name' => 'ETHIOPIA', 'code' => '251'),
        'FI' => array('name' => 'FINLAND', 'code' => '358'),
        'FJ' => array('name' => 'FIJI', 'code' => '679'),
        'FK' => array('name' => 'FALKLAND ISLANDS (MALVINAS)', 'code' => '500'),
        'FM' => array('name' => 'MICRONESIA, FEDERATED STATES OF', 'code' => '691'),
        'FO' => array('name' => 'FAROE ISLANDS', 'code' => '298'),
        'FR' => array('name' => 'FRANCE', 'code' => '33'),
        'GA' => array('name' => 'GABON', 'code' => '241'),
        'GB' => array('name' => 'UNITED KINGDOM', 'code' => '44'),
        'GD' => array('name' => 'GRENADA', 'code' => '1473'),
        'GE' => array('name' => 'GEORGIA', 'code' => '995'),
        'GH' => array('name' => 'GHANA', 'code' => '233'),
        'GI' => array('name' => 'GIBRALTAR', 'code' => '350'),
        'GL' => array('name' => 'GREENLAND', 'code' => '299'),
        'GM' => array('name' => 'GAMBIA', 'code' => '220'),
        'GN' => array('name' => 'GUINEA', 'code' => '224'),
        'GQ' => array('name' => 'EQUATORIAL GUINEA', 'code' => '240'),
        'GR' => array('name' => 'GREECE', 'code' => '30'),
        'GT' => array('name' => 'GUATEMALA', 'code' => '502'),
        'GU' => array('name' => 'GUAM', 'code' => '1671'),
        'GW' => array('name' => 'GUINEA-BISSAU', 'code' => '245'),
        'GY' => array('name' => 'GUYANA', 'code' => '592'),
        'HK' => array('name' => 'HONG KONG', 'code' => '852'),
        'HN' => array('name' => 'HONDURAS', 'code' => '504'),
        'HR' => array('name' => 'CROATIA', 'code' => '385'),
        'HT' => array('name' => 'HAITI', 'code' => '509'),
        'HU' => array('name' => 'HUNGARY', 'code' => '36'),
        'ID' => array('name' => 'INDONESIA', 'code' => '62'),
        'IE' => array('name' => 'IRELAND', 'code' => '353'),
        'IL' => array('name' => 'ISRAEL', 'code' => '972'),
        'IM' => array('name' => 'ISLE OF MAN', 'code' => '44'),
        'IN' => array('name' => 'INDIA', 'code' => '91'),
        'IQ' => array('name' => 'IRAQ', 'code' => '964'),
        'IR' => array('name' => 'IRAN, ISLAMIC REPUBLIC OF', 'code' => '98'),
        'IS' => array('name' => 'ICELAND', 'code' => '354'),
        'IT' => array('name' => 'ITALY', 'code' => '39'),
        'JM' => array('name' => 'JAMAICA', 'code' => '1876'),
        'JO' => array('name' => 'JORDAN', 'code' => '962'),
        'JP' => array('name' => 'JAPAN', 'code' => '81'),
        'KE' => array('name' => 'KENYA', 'code' => '254'),
        'KG' => array('name' => 'KYRGYZSTAN', 'code' => '996'),
        'KH' => array('name' => 'CAMBODIA', 'code' => '855'),
        'KI' => array('name' => 'KIRIBATI', 'code' => '686'),
        'KM' => array('name' => 'COMOROS', 'code' => '269'),
        'KN' => array('name' => 'SAINT KITTS AND NEVIS', 'code' => '1869'),
        'KP' => array('name' => 'KOREA DEMOCRATIC PEOPLES REPUBLIC OF', 'code' => '850'),
        'KR' => array('name' => 'KOREA REPUBLIC OF', 'code' => '82'),
        'KW' => array('name' => 'KUWAIT', 'code' => '965'),
        'KY' => array('name' => 'CAYMAN ISLANDS', 'code' => '1345'),
        'KZ' => array('name' => 'KAZAKSTAN', 'code' => '7'),
        'LA' => array('name' => 'LAO PEOPLES DEMOCRATIC REPUBLIC', 'code' => '856'),
        'LB' => array('name' => 'LEBANON', 'code' => '961'),
        'LC' => array('name' => 'SAINT LUCIA', 'code' => '1758'),
        'LI' => array('name' => 'LIECHTENSTEIN', 'code' => '423'),
        'LK' => array('name' => 'SRI LANKA', 'code' => '94'),
        'LR' => array('name' => 'LIBERIA', 'code' => '231'),
        'LS' => array('name' => 'LESOTHO', 'code' => '266'),
        'LT' => array('name' => 'LITHUANIA', 'code' => '370'),
        'LU' => array('name' => 'LUXEMBOURG', 'code' => '352'),
        'LV' => array('name' => 'LATVIA', 'code' => '371'),
        'LY' => array('name' => 'LIBYAN ARAB JAMAHIRIYA', 'code' => '218'),
        'MA' => array('name' => 'MOROCCO', 'code' => '212'),
        'MC' => array('name' => 'MONACO', 'code' => '377'),
        'MD' => array('name' => 'MOLDOVA, REPUBLIC OF', 'code' => '373'),
        'ME' => array('name' => 'MONTENEGRO', 'code' => '382'),
        'MF' => array('name' => 'SAINT MARTIN', 'code' => '1599'),
        'MG' => array('name' => 'MADAGASCAR', 'code' => '261'),
        'MH' => array('name' => 'MARSHALL ISLANDS', 'code' => '692'),
        'MK' => array('name' => 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'code' => '389'),
        'ML' => array('name' => 'MALI', 'code' => '223'),
        'MM' => array('name' => 'MYANMAR', 'code' => '95'),
        'MN' => array('name' => 'MONGOLIA', 'code' => '976'),
        'MO' => array('name' => 'MACAU', 'code' => '853'),
        'MP' => array('name' => 'NORTHERN MARIANA ISLANDS', 'code' => '1670'),
        'MR' => array('name' => 'MAURITANIA', 'code' => '222'),
        'MS' => array('name' => 'MONTSERRAT', 'code' => '1664'),
        'MT' => array('name' => 'MALTA', 'code' => '356'),
        'MU' => array('name' => 'MAURITIUS', 'code' => '230'),
        'MV' => array('name' => 'MALDIVES', 'code' => '960'),
        'MW' => array('name' => 'MALAWI', 'code' => '265'),
        'MX' => array('name' => 'MEXICO', 'code' => '52'),
        'MY' => array('name' => 'MALAYSIA', 'code' => '60'),
        'MZ' => array('name' => 'MOZAMBIQUE', 'code' => '258'),
        'NA' => array('name' => 'NAMIBIA', 'code' => '264'),
        'NC' => array('name' => 'NEW CALEDONIA', 'code' => '687'),
        'NE' => array('name' => 'NIGER', 'code' => '227'),
        'NG' => array('name' => 'NIGERIA', 'code' => '234'),
        'NI' => array('name' => 'NICARAGUA', 'code' => '505'),
        'NL' => array('name' => 'NETHERLANDS', 'code' => '31'),
        'NO' => array('name' => 'NORWAY', 'code' => '47'),
        'NP' => array('name' => 'NEPAL', 'code' => '977'),
        'NR' => array('name' => 'NAURU', 'code' => '674'),
        'NU' => array('name' => 'NIUE', 'code' => '683'),
        'NZ' => array('name' => 'NEW ZEALAND', 'code' => '64'),
        'OM' => array('name' => 'OMAN', 'code' => '968'),
        'PA' => array('name' => 'PANAMA', 'code' => '507'),
        'PE' => array('name' => 'PERU', 'code' => '51'),
        'PF' => array('name' => 'FRENCH POLYNESIA', 'code' => '689'),
        'PG' => array('name' => 'PAPUA NEW GUINEA', 'code' => '675'),
        'PH' => array('name' => 'PHILIPPINES', 'code' => '63'),
        'PK' => array('name' => 'PAKISTAN', 'code' => '92'),
        'PL' => array('name' => 'POLAND', 'code' => '48'),
        'PM' => array('name' => 'SAINT PIERRE AND MIQUELON', 'code' => '508'),
        'PN' => array('name' => 'PITCAIRN', 'code' => '870'),
        'PR' => array('name' => 'PUERTO RICO', 'code' => '1'),
        'PT' => array('name' => 'PORTUGAL', 'code' => '351'),
        'PW' => array('name' => 'PALAU', 'code' => '680'),
        'PY' => array('name' => 'PARAGUAY', 'code' => '595'),
        'QA' => array('name' => 'QATAR', 'code' => '974'),
        'RO' => array('name' => 'ROMANIA', 'code' => '40'),
        'RS' => array('name' => 'SERBIA', 'code' => '381'),
        'RU' => array('name' => 'RUSSIAN FEDERATION', 'code' => '7'),
        'RW' => array('name' => 'RWANDA', 'code' => '250'),
        'SA' => array('name' => 'SAUDI ARABIA', 'code' => '966'),
        'SB' => array('name' => 'SOLOMON ISLANDS', 'code' => '677'),
        'SC' => array('name' => 'SEYCHELLES', 'code' => '248'),
        'SD' => array('name' => 'SUDAN', 'code' => '249'),
        'SE' => array('name' => 'SWEDEN', 'code' => '46'),
        'SG' => array('name' => 'SINGAPORE', 'code' => '65'),
        'SH' => array('name' => 'SAINT HELENA', 'code' => '290'),
        'SI' => array('name' => 'SLOVENIA', 'code' => '386'),
        'SK' => array('name' => 'SLOVAKIA', 'code' => '421'),
        'SL' => array('name' => 'SIERRA LEONE', 'code' => '232'),
        'SM' => array('name' => 'SAN MARINO', 'code' => '378'),
        'SN' => array('name' => 'SENEGAL', 'code' => '221'),
        'SO' => array('name' => 'SOMALIA', 'code' => '252'),
        'SR' => array('name' => 'SURINAME', 'code' => '597'),
        'ST' => array('name' => 'SAO TOME AND PRINCIPE', 'code' => '239'),
        'SV' => array('name' => 'EL SALVADOR', 'code' => '503'),
        'SY' => array('name' => 'SYRIAN ARAB REPUBLIC', 'code' => '963'),
        'SZ' => array('name' => 'SWAZILAND', 'code' => '268'),
        'TC' => array('name' => 'TURKS AND CAICOS ISLANDS', 'code' => '1649'),
        'TD' => array('name' => 'CHAD', 'code' => '235'),
        'TG' => array('name' => 'TOGO', 'code' => '228'),
        'TH' => array('name' => 'THAILAND', 'code' => '66'),
        'TJ' => array('name' => 'TAJIKISTAN', 'code' => '992'),
        'TK' => array('name' => 'TOKELAU', 'code' => '690'),
        'TL' => array('name' => 'TIMOR-LESTE', 'code' => '670'),
        'TM' => array('name' => 'TURKMENISTAN', 'code' => '993'),
        'TN' => array('name' => 'TUNISIA', 'code' => '216'),
        'TO' => array('name' => 'TONGA', 'code' => '676'),
        'TR' => array('name' => 'TURKEY', 'code' => '90'),
        'TT' => array('name' => 'TRINIDAD AND TOBAGO', 'code' => '1868'),
        'TV' => array('name' => 'TUVALU', 'code' => '688'),
        'TW' => array('name' => 'TAIWAN, PROVINCE OF CHINA', 'code' => '886'),
        'TZ' => array('name' => 'TANZANIA, UNITED REPUBLIC OF', 'code' => '255'),
        'UA' => array('name' => 'UKRAINE', 'code' => '380'),
        'UG' => array('name' => 'UGANDA', 'code' => '256'),
        'US' => array('name' => 'UNITED STATES', 'code' => '1'),
        'UY' => array('name' => 'URUGUAY', 'code' => '598'),
        'UZ' => array('name' => 'UZBEKISTAN', 'code' => '998'),
        'VA' => array('name' => 'HOLY SEE (VATICAN CITY STATE)', 'code' => '39'),
        'VC' => array('name' => 'SAINT VINCENT AND THE GRENADINES', 'code' => '1784'),
        'VE' => array('name' => 'VENEZUELA', 'code' => '58'),
        'VG' => array('name' => 'VIRGIN ISLANDS, BRITISH', 'code' => '1284'),
        'VI' => array('name' => 'VIRGIN ISLANDS, U.S.', 'code' => '1340'),
        'VN' => array('name' => 'VIET NAM', 'code' => '84'),
        'VU' => array('name' => 'VANUATU', 'code' => '678'),
        'WF' => array('name' => 'WALLIS AND FUTUNA', 'code' => '681'),
        'WS' => array('name' => 'SAMOA', 'code' => '685'),
        'XK' => array('name' => 'KOSOVO', 'code' => '381'),
        'YE' => array('name' => 'YEMEN', 'code' => '967'),
        'YT' => array('name' => 'MAYOTTE', 'code' => '262'),
        'ZA' => array('name' => 'SOUTH AFRICA', 'code' => '27'),
        'ZM' => array('name' => 'ZAMBIA', 'code' => '260'),
        'ZW' => array('name' => 'ZIMBABWE', 'code' => '263')
    );

    $data = [];

    if ($lists) {
        foreach ($lists as $k => $list) {
            $name = strtolower($list['name']);
            $name = ucwords($name);
            $data[$k]['name'] = $name;
            $data[$k]['code'] = $list['code'];
        }
    }

    return $data;
}

//email template section

function Wo_EmailTemplateData($id) {
    global $wo, $conn, $cache;
    if (empty($id) || !is_numeric($id) || $id < 0) {
        return false;
    }
    $data = array();
    $_id = Secure($id);
    $query_one = "SELECT * FROM `email_templates` WHERE `id` = {$_id}";
    $sql = mysqli_query($conn, $query_one);
    $fetched_data = mysqli_fetch_assoc($sql);
    if (empty($fetched_data)) {
        return array();
    }
    return $fetched_data;
}

function Wo_addNewEmailTemplate($data) {
    global $db, $wo;
    if (empty($data)) {
        return false;
    }
    if ($wo['loggedin'] == false) {
        return false;
    }
    $db->insert('email_templates', $data);
    return true;
}

function Wo_updateNewEmailTemplate($id, $data) {
    global $db, $wo;
    if ($wo['loggedin'] == false) {
        return false;
    }
    if (empty($id)) {
        return false;
    }
    $db->where('id', $id)->update('email_templates', $data);
    return true;
}

function Wo_getEmailTemplate($id) {
    global $db, $wo;
    if ($wo['loggedin'] == false) {
        return false;
    }
    if (empty($id)) {
        return false;
    }
    $_id = Secure($id);
    return $db->where('id', $_id)->getOne('email_templates');
}

function Wo_DeleteEmailTemplate($id) {
    global $wo, $conn;
    if ($wo['loggedin'] == false) {
        return false;
    }
    $_id = Secure($id);
    $query = mysqli_query($conn, "DELETE FROM `email_templates` WHERE `id` = {$_id}");
    if ($query) {
        return true;
    }
}

// get list of active admin accounts
function get_admin_accounts() {
    global $conn;
    $data = [];
    $query_one = "SELECT * FROM `users` where admin = '1' and active = '1' ";
    $sql = mysqli_query($conn, $query_one);
    while ($fetched_data = mysqli_fetch_assoc($sql)) {
        $data[] = $fetched_data;
    }
    return $data;
}

// get payment by id
function Wo_GetPaymentById($id) {
    global $db, $wo;
    if (empty($id)) {
        return false;
    }
    $_id = Secure($id);
    return $db->where('id', $_id)->getOne('payments');
}

// get payment by id
function Wo_GetUserLastSubscription($id) {
    global $db;
    if (empty($id)) {
        return false;
    }
    $_id = Secure($id);
    return $db->where('user_id', $_id)->where('type', 'PRO')->orderBy('id', 'desc')->getOne('payments');
}

// get subscription history
function Wo_GetCurrentUserSubscriptions($user_id) {
    global $conn, $wo;

    if (!is_numeric($user_id)) {
        return false;
    }

    $_userid = Secure($user_id);
    $data = array();
    $query_one = 'SELECT * FROM `payments` WHERE `user_id` = ' . $_userid . ' and `type` = "PRO" and session_id != "" ORDER BY `id` DESC';
    $sql_query_one = mysqli_query($conn, $query_one);
    while ($fetched_data = mysqli_fetch_assoc($sql_query_one)) {
        $data[] = Wo_GetPaymentById($fetched_data['id']);
    }
    return $data;
}

// get plan name by id
function Wo_GetPlanById($id) {
    if (!is_numeric($id)) {
        return false;
    }
    if ($id > 0) {
        if ($id == 1) {
            return 'WEEKLY';
        }
        if ($id == 2) {
            return 'MONTHLY';
        }
        if ($id == 3) {
            return '3 MONTHS';
        }
        if ($id == 4) {
            return 'YEARLY';
        }
    }
}

//get customer invoice regarding current month
function Wo_isCustomerPaidCurrentMonth($sesson_id, $user_id) {
    global $config, $db;
    if (empty($sesson_id)) {
        return false;
    }
    $stripe = new \Stripe\StripeClient($config->stripe_secret);
    $last_payment = Wo_GetUserLastSubscription($user_id);
    $last_payment_month = $last_payment ? date('Y-m', strtotime($last_payment['date'])) : false;
    $curr_month = date('Y-m');
    $paid = false;
    try {
        $invoices = Wo_GetInvoicesByCustomer($sesson_id);
    } catch (Exception $e) {
        $paid = false;
    }
    if (isset($invoices) && !empty($invoices->data)) {
        foreach ($invoices->data as $invoice) {
            $m = date('Y-m', $invoice->created);
            if ($m == $curr_month && $last_payment_month != $curr_month) {
                $d = [
                    'user_id' => $user_id,
                    'amount' => $last_payment['amount'],
                    'type' => $last_payment['type'],
                    'date' => date('Y-m-d h:i:s'),
                    'credit_amount' => 0,
                    'via' => $last_payment['via'],
                    'session_id' => $sesson_id
                ];
                $db->insert('payments', $d);
                $paid = true;
            }
        }
    }
    return $paid;
}

//get customer invoices
function Wo_GetInvoicesByCustomer($sesson_id) {
    global $config;
    if (empty($sesson_id)) {
        return false;
    }
    $stripe = new \Stripe\StripeClient($config->stripe_secret);
    $customer = Wo_GetStripeCustomer($sesson_id);
    if ($customer) {
        return $stripe->invoices->all(['customer' => $customer, 'status' => 'paid']);
    }
    return false;
}

//get stripe session
function Wo_RetriveStripeSession($sesson_id) {
    global $config;
    if (empty($sesson_id)) {
        return false;
    }
    $stripe = new \Stripe\StripeClient($config->stripe_secret);
    try {
        $value = $stripe->checkout->sessions->retrieve($sesson_id);
    } catch (Exception $e) {
        
    }
    return isset($value) ? $value : false;
}

//get stripe customer from session
function Wo_GetStripeCustomer($sesson_id) {
    global $config;
    if (empty($sesson_id)) {
        return false;
    }
    $sess = Wo_RetriveStripeSession($sesson_id);
    if ($sess) {
        return $sess->customer;
    }
    return false;
}

// get plan recurring date by id
function Wo_GetPlanRecurringDate($payment) {
    (int) $payment['pro_plan'];
    if ($payment['pro_plan'] > 0) {
        if ($payment['pro_plan'] == 1) {
            return date('Y-m-d', strtotime('+1 week', strtotime($payment['date'])));
        }
        if ($payment['pro_plan'] == 2) {
            return date('Y-m-d', strtotime('+1 month', strtotime($payment['date'])));
        }
        if ($payment['pro_plan'] == 3) {
            return date('Y-m-d', strtotime('+3 month', strtotime($payment['date'])));
        }
        if ($payment['pro_plan'] == 4) {
            return date('Y-m-d', strtotime('+1 year', strtotime($payment['date'])));
        }
    }
    return false;
}

//get usernames list of refferrer

function get_referrer_username_list($user_id) {
    global $conn;

    if (!is_numeric($user_id)) {
        return false;
    }

    $_userid = Secure($user_id);
    $data = array();
    $query_one = 'SELECT GROUP_CONCAT(username) as list FROM `users` where referrer = '.$_userid;
    $sql_query_one = mysqli_query($conn, $query_one);
    while ($fetched_data = mysqli_fetch_assoc($sql_query_one)) {
        $data[] = $fetched_data['list'];
    }
    return $data;
}

//get usernames list of refferrer

function get_referrer_commission($user_id) {
    global $conn;

    if (!is_numeric($user_id)) {
        return false;
    }

    $_userid = Secure($user_id);
    $data = array();
    $query_one = 'SELECT SUM(amount) as total FROM `affiliated_system_payments` WHERE referrar_id = '.$_userid;
    $sql_query_one = mysqli_query($conn, $query_one);
    while ($fetched_data = mysqli_fetch_assoc($sql_query_one)) {
        $data[] = $fetched_data['total'];
    }
    return $data;
}

function Wo_ApproveAllPhotoByIds($id) {
    global $wo, $conn;
    if ($wo['loggedin'] == false) {
        return false;
    }
    $query     = mysqli_query($conn, "UPDATE `mediafiles` SET `is_approved` = '1' where id=$id ");
    if ($query) {
        return true;
    }
}
function Wo_DisApproveAllPhotoByIds($id) {
    global $wo, $conn;
    if ($wo['loggedin'] == false) {
        return false;
    }
    $query     = mysqli_query($conn, "UPDATE `mediafiles` SET `is_approved` = '0' where id=$id ");
    if ($query) {
        return true;
    }
}

//get plans list
//get customer invoices
function Wo_GetStripePlans() {
    global $config;

    $stripe = new \Stripe\StripeClient($config->stripe_secret);
    return $stripe->plans->all();
}

//check if profile complete popup is displayd
function is_profile_complete_popup_display($id) {
    global $db;
    $rec = $db->where('user_id', $id)->getOne('profile_completion');
    if ($rec) {
        if ($rec['is_message_displayed'] == 1) {
            return true;
        }
    }
    return false;
}

//repeated coundown

function RepeatCountDown() {
    global $db;
    $coupon_repeat_date = $db->where('option_name', 'coupon_repeat_date')->getOne('options');
    $countdown_repeat = $db->where('option_name', 'countdown_repeat')->getOne('options');
    if(!empty($coupon_repeat_date['option_value']) && !empty($countdown_repeat['option_value'])) {
        $next_date = $coupon_repeat_date['option_value'];
    }
    $curr_date = date('Y-m-d');
    if(isset($next_date) && $next_date <= $curr_date) {
        $next_date = date('Y-m-d', strtotime('+'.$countdown_repeat['option_value'].' days', strtotime($curr_date)));
        $db->where('option_name', 'coupon_repeat_date')->update('options', array(
            'option_value' => $next_date
        ));
    }
    
}
//get countdown seconds
function countdown_seconds() {
    global $config;
    $hours = 0;
    $curr_date = date('Y-m-d');
    if($config->countdown_hours && IS_LOGGED === true) {
        $current_date = date('Y-m-d H:i:s');
        $active_user = auth();
        if(isset($_COOKIE['countdown-'.$active_user->id])) {
            $date_end = $_COOKIE['countdown-'.$active_user->id];
        }
        if(isset($date_end)) {
            $d2 = strtotime($date_end);
            $d1 = strtotime($current_date);
            
            $hours = $d2 - $d1;
        }
    }
    return $hours;
}
//check if profile pic is approved
function is_profile_pic_approved($id, $file) {
    global $db;
    if($file) {
        $file = str_replace('_avater', '_full', $file);
    }
    $row = $db->where('user_id', $id)->where('file',$file)->where('is_approved',0)->getOne('mediafiles');
    if (!empty($row)) {
        return true;
    }
    return false;
}

/*
 * check if user ID is uploaded
 */

function get_user_uploaded_ID($id) {
    global $db;
    $row = $db->where('user_id', $id)->where('is_id_verification',1)->orWhere('is_id_verification',2)->getOne('mediafiles');
    if (!empty($row)) {
        return true;
    }
    return false;
}


//send message after 5 minutes
function sendmailafter5min() {
    global $db, $config, $conn;
    
    $row = $db->where('is_mail_sent',0)->orderBy('id', 'desc')->getOne('messages');
    if (!empty($row)) {
        $row2 = $db->where('is_mail_sent',1)->where('messages.to', (int) $row['to'])->orderBy('id', 'desc')->getOne('messages');
        $send = false;
        if($row2) {
            $to_date = strtotime($row['created_at']);
            $from_date = $row2['mail_sent_time']?strtotime($row2['mail_sent_time']):strtotime($row2['created_at']);
            $min = round(abs($from_date - $to_date) / 60);
            if($min > 5) {
                $send = true;
            }else {
                $cr = $row2 && $row2['mail_sent_time']?$row2['mail_sent_time']:$row2['created_at'];
                $add5min = strtotime($cr.' + 5 minute');
                $new_time = date('Y-m-d H:i:s', $add5min);
                $query = 'SELECT * FROM `messages` WHERE messages.to = '.$row['to'].' AND created_at < "'.$new_time.'" AND is_mail_sent = 0';
                $sql = mysqli_query($conn, $query);
                while ($fetched_data = mysqli_fetch_assoc($sql)) {
                    $db->where('id', $fetched_data['id'])->update('messages', array(
                        'is_mail_sent' => 1,
                        'mail_sent_time'=>$cr
                    ));
                }
                
            }
        }
        if(empty($row2)) {
            $send = true;
        }
        
        if($send) {

            $from_user = $db->objectBuilder()->where('id', (int) $row['from'])->getOne('users');
            $to_user = $db->objectBuilder()->where('id', (int) $row['to'])->getOne('users');
            if($to_user->email_on_new_message == 1) {
                
                
                
                
                if($from_user && $to_user) {
                    
                    $notifications = $db->objectBuilder()
                        ->where('recipient_id', $to_user->id)
                        ->where('seen', 0)
                        ->where('`notifier_id` NOT IN (SELECT `block_userid` FROM `blocks` WHERE `user_id` = '.$to_user->id . ')')
                        ->getValue('notifications', 'COUNT( (SELECT IF(`notifications`.`type` = \'like\', (SELECT IF((SELECT is_pro from users where users.id = `notifications`.`recipient_id`) = 1, 1, 0)), 1)) )');
                    
                    $body = Emails::parse('messages-email', array(
                        'full_name' => $from_user->first_name.' '.$from_user->last_name,
                        'username' => $from_user->username,
                        'age'=>getAge($from_user->birthday),
                        'avater' => GetMedia($from_user->avater),
                        'profile_pic'=>GetMedia($to_user->avater),
                        'profile_url' => $config->uri.'/@'.$to_user->username,
                        'unsub_url'=>$config->uri.'/settings-email/'.$to_user->username,
                        'message_url' => $config->uri.'/find-matches?open_message_id='.$from_user->id,
                        'notification_url' => $config->uri.'/find-matches?open_notifications=1',
                        'address'=>GetProfileLocationUrl($from_user),
                        'notifications'=> $notifications && $notifications > 9 ? '9+':$notifications
                    ));
                    SendEmail($to_user->email, 'New Message', $body);
                }
                $rows = $db->where('messages.to',$row['to'])->where('is_mail_sent',0)->orderBy('id', 'asc')->get('messages',null, array('*'));
                if($rows) {
                    foreach ($rows as $r) {
                        $db->where('id', $r['id'])->update('messages', array(
                            'is_mail_sent' => 1,
                            'mail_sent_time'=>$row['created_at']
                        ));
                    }
                }
            }
        }
    }
    return false;
}


//approve and disapprove ids

function Wo_ApproveID($photo_id = '') {
    global $wo, $conn;
    if ($wo['loggedin'] == false) {
        return false;
    }
    $photo_id = Secure($photo_id);
    $query     = mysqli_query($conn, "UPDATE `mediafiles` SET `is_approved` = '1', `is_id_verification` = 2 WHERE `id` = {$photo_id}");
    if ($query) {
        return true;
    }
}

function Wo_DisApproveID($photo_id = '') {
    global $wo, $conn;
    if ($wo['loggedin'] == false) {
        return false;
    }
    $photo_id = Secure($photo_id);
    $query     = mysqli_query($conn, "UPDATE `mediafiles` SET `is_approved` = '0', `is_id_verification` = 3 WHERE `id` = {$photo_id}");
    if ($query) {
        return true;
    }
}

function Wo_ApproveAllIDByIds($id) {
    global $wo, $conn;
    if ($wo['loggedin'] == false) {
        return false;
    }
    $query     = mysqli_query($conn, "UPDATE `mediafiles` SET `is_approved` = '1', `is_id_verification` = 2 where id=$id ");
    if ($query) {
        return true;
    }
}
function Wo_DisApproveAllIDByIds($id) {
    global $wo, $conn;
    if ($wo['loggedin'] == false) {
        return false;
    }
    $query     = mysqli_query($conn, "UPDATE `mediafiles` SET `is_approved` = '0', `is_id_verification` = 3 where id=$id ");
    if ($query) {
        return true;
    }
}

//delete ids after 1 year
function delete_disapprove_ids() {
    global $db, $conn;
    $last_year = date("Y-m-d", strtotime("-1 year"));
    $photos = $db->objectBuilder()->where('is_id_verification', 3)->where('DATE(created_at) = "'.$last_year.'"')->get('mediafiles');
    if($photos) {
        foreach ($photos as $photo) {
            $photo_file = Secure($photo->file);
            $avater_file = str_replace('_full.','_avater.', $photo_file);
            $photo_id = Secure($photo->id);
            mysqli_query($conn, "DELETE FROM `mediafiles` WHERE `id` = {$photo_id}");
            $deleted = false;
            if (DeleteFromToS3( $photo_file ) === true) {
                $deleted = true;
            }
            if (DeleteFromToS3( $avater_file ) === true) {
                $deleted = true;
            }
        }
    }
}

//daily credit minutes ago
function daily_credit_time_ago() {
    global $db;
    $old = $db->objectBuilder()->where('user_id', auth()->id)->orderBy('id','desc')->getOne('sessions');
    if($old) {
        return get_time_ago($old->time);
    }
}

function create_slug($string) {
    $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
    return $slug;
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

function SendEmailCustom($to, $id, $is_admin = false, $u = null, $discounted_amount = false) {
    error_reporting(1);
    ini_set('display_startup_errors', true);
    ini_set('display_errors', true);

    global $config, $db, $_LIBS;
    require_once($_LIBS . "PHPMailer/vendor/autoload.php");
    $mail = new PHPMailer;
    if (empty($to)) {
        return false;
    }
    $email_template = $db->where('id', $id)->getOne('email_templates');
    $user = $db->where('email', $to)->getOne('users');
    $user_to = $db->where('email', $to)->getOne('users');
    if ($is_admin) {
        $user = $u;
    }
    
//    changed message variable to message_body variable because hyper links were converted to plain text in email
//    by Community Dev LLC

    $status = false;
    $from_email = $config->siteEmail;
    $from_name = $config->site_name;
    if (!empty($email_template)) {
        if ($email_template['status'] == 1) {
            if (!empty($email_template['from_email'])) {
                $from_email = $email_template['from_email'];
            }
            if (!empty($email_template['from_name'])) {
                $from_name = $email_template['from_name'];
            }
            $status = true;
        }
    }
    if (!$status) {
        return false;
    }
    if ($status) {
        $vars = email_variables($user, $discounted_amount);

        if ($vars) {
            foreach ($vars as $k => $val) {
                $email_template['content'] = str_replace($k, $val, $email_template['content']);
            }
        }
    }
    
    $notifications = LoadEndPointResource('notifications');
    if ($notifications) {
        $notification = (int) $notifications->getUnreadNotifications($user_to['id']);
    }
    
    $content = Emails::parse('custom-design', array(
                'content' => $email_template['content'],
                'profile_url' => $config->uri . '/@' . $user_to['username'],
                'notification_url' => $config->uri.'/find-matches?open_notifications=1',
                'profile_pic'=> GetMedia($user_to['avater'], false),
                'unsub_url'=>$config->uri.'/settings-email/'.$user_to['username'],
                'notifications'=> isset($notification) && $notification > 9 ? '9+':$notification
    )); 
    

    $message_body = str_replace(array("\r\n", "\r", "\n"), "", $content);
    

    if ($config->smtp_or_mail == 'mail') {
        $mail->IsMail();
    } else if ($config->smtp_or_mail == 'smtp') {
        $mail->isSMTP();
        $mail->Host          = $config->smtp_host;
        $mail->SMTPAuth      = true;
        $mail->SMTPKeepAlive = true;
        $mail->Username      = $config->smtp_username;
        $mail->Password      = openssl_decrypt($config->smtp_password, "AES-128-ECB", 'mysecretkey1234');
        $mail->SMTPSecure    = $config->smtp_encryption;
        $mail->Port          = $config->smtp_port;
        $mail->SMTPOptions   = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
    }
    $mail->setFrom($from_email, $from_name);
    $mail->CharSet = 'utf-8';
    $mail->IsHTML(true);
    $mail->Subject = $email_template['name'];
    $mail->Body = $message_body;
    $addresses = array();
    if ($email_template['is_admin'] == 1) {
        $is_array = false;
        if ($email_template['admins']) {
            if (strpos($email_template['admins'], ',') !== false) {
                $is_array = true;
            } else {
                $addresses[] = $email_template['admins'];
            }
        }
        if ($is_array) {
            $admin_emails = explode(',', $email_template['admins']);
            if ($admin_emails) {
                foreach ($admin_emails as $ad) {
                    $addresses[] = $ad;
                }
            }
        }
    }
    if ($email_template['is_member'] == 1) {
        $addresses[] = $to;
    } else {
        $addresses[] = $to;
    }
    if ($addresses) {
        foreach ($addresses as $address) {
            $mail->AddAddress($address);
        }
    }
    $mail->send();
    $mail->ClearAddresses();
}

function email_variables($user, $disc_amount) {
    global $config, $wo, $db;
    if (!$user) {
        return false;
    }
    $payment = $db->where('user_id', $user['id'])->orderBy('id', 'desc')->getOne('payments');
    $amount = '';
    if($payment) {
        $amount = $payment['amount'];
    }
    if($disc_amount) {
        $amount = $disc_amount;
    }
    return [
        '{first_name}' => $user['first_name'],
        '{last_name}' => $user['last_name'],
        '{user_email}' => $user['email'],
        '{suspension_url}' => 'https://www.queenmuslima.com/suspension-verification',
        '{admin_suspension_page}' => 'https://www.queenmuslima.com/admin-cp/manage-user-suspensions',
        '{site_name}' => $config->site_name,
        '{plan}' => $payment ? Wo_GetPlanById((int) $payment['pro_plan']) : '',
        '{plan_fee}' => $amount ? $amount : '',
        '{payment_date}' => $payment ? $payment['date'] : '',
        '{user_profile_url}' => $wo['site_url'] . '/@' . $user['username'],
    ];
}

function admin_email_variables() {
    global $config;
    return [
        '{suspension_url}' => 'https://queenmuslima.com/suspension-verification',
        '{admin_suspension_page}' => 'https://queenmuslima.com/admin-cp/manage-user-suspensions',
        '{site_name}' => $config->site_name,
    ];
}

//get lang by id
function Wo_GetLangDetailsWithID($lang_key = '', $full = false) {
    global $conn, $wo;
    if (empty($lang_key)) {
        return false;
    }
    $lang_key = Secure($lang_key);
    $data = array();
    $query = mysqli_query($conn, "SELECT * FROM `langs` WHERE `id` = '{$lang_key}'");
    while ($fetched_data = mysqli_fetch_assoc($query)) {
        unset($fetched_data['lang_key']);
        unset($fetched_data['id']);
        unset($fetched_data['ref']);
        if ($full === false) {
            unset($fetched_data['options']);
        }
        $data[] = $fetched_data;
    }
    return $data;
}

// conver break to new line for text area
function breaktonewline($input) {
    return preg_replace('/<br\s?\/?>/ius', "\n", str_replace("\n", "", str_replace("\r", "", htmlspecialchars_decode($input))));
}

// characters length of header field
function characters_length() {
    global $config, $db;
    $field = $db->where('id', 48)->getOne('profilefields');
    if ($field) {
        return $field['length'];
    }
}

// get visitor info
function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
    $output = NULL;
    if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
        $ip = $_SERVER["REMOTE_ADDR"];
        if ($deep_detect) {
            if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
    }
    $purpose = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
    $support = array("country", "countrycode", "state", "region", "city", "location", "address");
    $continents = array(
        "AF" => "Africa",
        "AN" => "Antarctica",
        "AS" => "Asia",
        "EU" => "Europe",
        "OC" => "Australia (Oceania)",
        "NA" => "North America",
        "SA" => "South America"
    );
    if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
        $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
        if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
            switch ($purpose) {
                case "location":
                    $output = array(
                        "city" => @$ipdat->geoplugin_city,
                        "state" => @$ipdat->geoplugin_regionName,
                        "country" => @$ipdat->geoplugin_countryName,
                        "country_code" => @$ipdat->geoplugin_countryCode,
                        "continent" => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                        "continent_code" => @$ipdat->geoplugin_continentCode
                    );
                    break;
                case "address":
                    $address = array($ipdat->geoplugin_countryName);
                    if (@strlen($ipdat->geoplugin_regionName) >= 1)
                        $address[] = $ipdat->geoplugin_regionName;
                    if (@strlen($ipdat->geoplugin_city) >= 1)
                        $address[] = $ipdat->geoplugin_city;
                    $output = implode(", ", array_reverse($address));
                    break;
                case "city":
                    $output = @$ipdat->geoplugin_city;
                    break;
                case "state":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "region":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "country":
                    $output = @$ipdat->geoplugin_countryName;
                    break;
                case "countrycode":
                    $output = @$ipdat->geoplugin_countryCode;
                    break;
            }
        }
    }
    return $output;
}

/*
 * Given longitude and latitude in North America, return the address using The Google Geocoding API V3
 *
 */

function Get_Address_From_Google_Maps($lat, $lon) {

    $url = "http://maps.googleapis.com/maps/api/geocode/json?latlng=$lat,$lon&sensor=false";

// Make the HTTP request
    $data = @file_get_contents($url);
// Parse the json response
    $jsondata = json_decode($data, true);

// If the json data is invalid, return empty array
    if (!check_status($jsondata))
        return array();

    $address = array(
        'country' => google_getCountry($jsondata),
        'province' => google_getProvince($jsondata),
        'city' => google_getCity($jsondata)
    );

    return $address;
}

/*
 * Check if the json data from Google Geo is valid 
 */

function check_status($jsondata) {
    if ($jsondata["status"] == "OK")
        return true;
    return false;
}

/*
 * Given Google Geocode json, return the value in the specified element of the array
 */

function google_getCountry($jsondata) {
    return Find_Long_Name_Given_Type("country", $jsondata["results"][0]["address_components"]);
}

function google_getProvince($jsondata) {
    return Find_Long_Name_Given_Type("administrative_area_level_1", $jsondata["results"][0]["address_components"], true);
}

function google_getCity($jsondata) {
    return Find_Long_Name_Given_Type("locality", $jsondata["results"][0]["address_components"]);
}

function google_getStreet($jsondata) {
    return Find_Long_Name_Given_Type("street_number", $jsondata["results"][0]["address_components"]) . ' ' . Find_Long_Name_Given_Type("route", $jsondata["results"][0]["address_components"]);
}

function google_getPostalCode($jsondata) {
    return Find_Long_Name_Given_Type("postal_code", $jsondata["results"][0]["address_components"]);
}

function google_getCountryCode($jsondata) {
    return Find_Long_Name_Given_Type("country", $jsondata["results"][0]["address_components"], true);
}

function google_getAddress($jsondata) {
    return $jsondata["results"][0]["formatted_address"];
}

/*
 * Searching in Google Geo json, return the long name given the type. 
 * (If short_name is true, return short name)
 */

function Find_Long_Name_Given_Type($type, $array, $short_name = false) {
    foreach ($array as $value) {
        if (in_array($type, $value["types"])) {
            if ($short_name)
                return $value["short_name"];
            return $value["long_name"];
        }
    }
}

//send 200 emails
function Send200Emails() {
    for($i=0;$i<=90;$i++) {
        SendEmail('com.mbakry@gmail.com', __('Thank you for your registration.'), 'You account is successfully registered with us. Thanks');
    }
}

//check hour difference from last login
function check_hour_difference_from_last_login() {
    global $db;
    $old = $db->objectBuilder()->where('user_id', auth()->id)->orderBy('id','desc')->getOne('sessions');
    if($time) {
        $time = time();
        $diff = ($time - $time->time) / 3600;
        if($diff >= 24) {
            return true;
        }
        return false;
    }
}

<?php
use Detection\MobileDetect;

/**
 * Created by PhpStorm.
 * User: Nguyen
 * Date: 12/19/2014
 * Time: 1:24 PM
 */
class CommonHelper
{
    public static function url_slug($str, $options = array()) {
        
        // Make sure string is in UTF-8 and strip invalid UTF-8 characters
        $str = mb_convert_encoding((string)$str, 'UTF-8', mb_list_encodings());
        
        $defaults = array('delimiter' => '-', 'limit' => null, 'lowercase' => true, 'replacements' => array(), 'transliterate' => true,);
        
        // Merge options
        $options = array_merge($defaults, $options);
        
        $char_map = array('á' => 'a', 'à' => 'a', 'ả' => 'a', 'ã' => 'a', 'ạ' => 'a', 'ă' => 'a', 'ắ' => 'a', 'ằ' => 'a', 'ẵ' => 'a', 'ặ' => 'a', 'ẳ' => 'a', 'â' => 'a', 'ấ' => 'a', 'ầ' => 'a', 'ẫ' => 'a', 'ẩ' => 'a', 'ậ' => 'a', 'đ' => 'd', 'é' => 'e', 'è' => 'e', 'ẻ' => 'e', 'ẽ' => 'e', 'ẹ' => 'e', 'ê' => 'e', 'ế' => 'e', 'ề' => 'e', 'ể' => 'e', 'ễ' => 'e', 'ệ' => 'e', 'í' => 'i', 'ì' => 'i', 'ỉ' => 'i', 'ĩ' => 'i', 'ị' => 'i', 'ô' => 'o', 'ố' => 'o', 'ồ' => 'o', 'ổ' => 'o', 'ỗ' => 'o', 'ộ' => 'o', 'ơ' => 'o', 'ớ' => 'o', 'ờ' => 'o', 'ở' => 'o', 'ỡ' => 'o', 'ợ' => 'o', 'ù' => 'u', 'ú' => 'u', 'ủ' => 'u', 'ũ' => 'u', 'ụ' => 'u', 'ư' => 'u', 'ứ' => 'u', 'ừ' => 'u', 'ữ' => 'u', 'ử' => 'u', 'ự' => 'u', 'ỳ' => 'y', 'ý' => 'y', 'ỷ' => 'y', 'ỹ' => 'y', 'ỵ' => 'y', 
        'Á' => 'A', 'À' => 'A', 'Ả' => 'A', 'Ã' => 'A', 'Ạ' => 'A', 'Ă' => 'A', 'Ắ' => 'A', 'Ằ' => 'A', 'Ẵ' => 'A', 'Ặ' => 'A', 'Ẳ' => 'A', 'Â' => 'A', 'Ấ' => 'A', 'Ầ' => 'A', 'Ẫ' => 'A', 'Ẩ' => 'A', 'Ậ' => 'A', 'Đ' => 'D', 'É' => 'E', 'È' => 'E', 'Ẻ' => 'E', 'Ẽ' => 'E', 'Ẹ' => 'E', 'Ê' => 'E', 'Ế' => 'E', 'Ề' => 'E', 'Ể' => 'E', 'Ễ' => 'E', 'Ệ' => 'E', 'Í' => 'I', 'Ì' => 'I', 'Ỉ' => 'I', 'Ĩ' => 'I', 'Ị' => 'I', 'Ô' => 'O', 'Ố' => 'O', 'Ồ' => 'O', 'Ổ' => 'O', 'Ỗ' => 'O', 'Ộ' => 'O', 'Ơ' => 'O', 'Ớ' => 'O', 'Ờ' => 'O', 'Ở' => 'O', 'Ỡ' => 'O', 'Ợ' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Ủ' => 'U', 'Ũ' => 'U', 'Ụ' => 'U', 'Ư' => 'U', 'Ứ' => 'U', 'Ừ' => 'U', 'Ữ' => 'U', 'Ử' => 'U', 'Ự' => 'U', 'Ỳ' => 'Y', 'Ý' => 'Y', 'Ỷ' => 'Y', 'Ỹ' => 'Y', 'Ỵ' => 'Y');
        
        // Make custom replacements
        $str = preg_replace(array_keys($options['replacements']), $options['replacements'], $str);
        
        // Transliterate characters to ASCII
        if ($options['transliterate']) {
            $str = str_replace(array_keys($char_map), $char_map, $str);
        }
        
        // Replace non-alphanumeric characters with our delimiter
        $str = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);
        
        // Remove duplicate delimiters
        $str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);
        
        // Truncate slug to max. characters
        $str = mb_substr($str, 0, ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')), 'UTF-8');
        
        // Remove delimiter from ends
        $str = trim($str, $options['delimiter']);
        
        return $options['lowercase'] ? mb_strtolower($str, 'UTF-8') : $str;
    }
    
    public static function format_money($amount, $symbol = 'VNĐ') {
        setlocale(LC_MONETARY, 'en_US');
        
        //        return money_format('%!.0n', $amount) . ' ' . $symbol;
        return number_format($amount, 0) . ' ' . $symbol;
    }
    
    public static function array_selects($array, $name = 'name', $value = 'value') {
        $array_option = array();
        foreach ($array[$value] as $opt) {
            $array_option[$opt['id']] = $opt['name'];
        }
        return $array_option;
    }
    
    public static function get_option($product_id, $option_id) {
        $options = DB::select(DB::raw('SELECT
                        ov.name,
                        ov.id
                    FROM
                        optionvalues ov
                    INNER JOIN productoptions po ON ov.id = po.optionvalue_id
                    WHERE po.product_id = :product_id AND ov.option_id= :option_id'), array('product_id' => $product_id, 'option_id' => $option_id,));
        
        $result = array();
        
        $result = json_decode(json_encode($options), true);
        if (!empty($result)) array_unshift($result, array('id' => 0, 'name' => 'Chọn'));
        
        return $result;
    }
    
    public static function displaySalePrice(&$product) {
        $authentication = \App::make('authenticator');
        if (is_null($authentication->getLoggedUser())) {
            return Lang::get('products.sale_price') . " : " . CommonHelper::format_money($product->sale_price);
        } else {
            return Lang::get('products.sale_price') . " : " . CommonHelper::format_money($product->sale_price) . "<p class=\"special-price\">" . Lang::get('products.special_price') . " : " . CommonHelper::format_money($product->special_price) . "</p>";
        };
    }
    
    public static function displaySalePriceArray(&$product) {
        $authentication = \App::make('authenticator');
        if (is_null($authentication->getLoggedUser())) {
            return Lang::get('products.sale_price') . " : " . CommonHelper::format_money($product['sale_price']);
        } else {
            return Lang::get('products.sale_price') . " : " . CommonHelper::format_money($product['sale_price']) . "<p class=\"special-price\">" . Lang::get('products.special_price') . " : " . CommonHelper::format_money($product['special_price']) . "</p>";
        };
    }
    
    public static function processPrice(&$product) {
        $authentication = \App::make('authenticator');
        if (is_null($authentication->getLoggedUser())) {
            return $product->sale_price;
        } else {
            return $product->special_price;
        };
    }
    
    public static function countCategory($id) {
        $total = DB::select(DB::raw('SELECT count(id) as total from products where products.category_id = :id'), array('id' => $id));
        $result = $total[0];
        return $result->total;
    }
    
    public static function getInfo() {
        $domain = $_SERVER['SERVER_NAME'];
        $store = \admin\Store::with('Shopinfo')->where('domain', '=', $domain)->remember(15)->first();
        if (is_null($store)) $store = \admin\Store::with('Shopinfo')->where('domain', '=', Config::get('configs.default_domain'))->remember(15)->first();
        return $store;
    }
    
    public static function isMobile() {
        $detect = new MobileDetect;
        return $detect->isMobile();
    }
    public static function isTablet() {
        $detect = new MobileDetect;
        return $detect->isTablet();
    }
    public function checkPermissions() {
        $authentication = \App::make('authenticator');
        $permissions = $authentication->getLoggedUser()->permissions;
        return $permissions;
    }
    public function getAdminNavbar(){
        $config_menu = Config::get('laravel-authentication-acl::menu.list');
        return $config_menu;
    }
    public static function format_date($date){
       \Carbon::parse($date)->format('d/m/Y h:i A');
    }

    public static function getUserLogin(){
        $authentication = \App::make('authenticator');
        View::share('authentication', $authentication);
        if($authentication->getLoggedUser() != null){
            $users = User::with('profile')->where('id', '=', $authentication->getLoggedUser()->id)->first();
            return $users;
        }
        return null;
    }

}

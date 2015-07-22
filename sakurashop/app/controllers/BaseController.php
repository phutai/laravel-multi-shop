<?php

use admin\Store;
use Detection\MobileDetect;

class BaseController extends Controller
{

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    public $domain;

    function __construct()
    {
        $this->setupLayout();
    }

    protected function setupLayout()
    {
        if (!is_null($this->layout)) {

            $this->layout = View::make($this->layout);
        }
        $this->domain = $_SERVER['SERVER_NAME'];
        $store = Store::with('Shopinfo')->where('domain', '=', $this->domain)->remember(15)->first();
        if(is_null($store)) $store = Store::with('Shopinfo')->where('domain', '=', Config::get('configs.default_domain'))->remember(15)->first();
        View::share('shopinfo', $store);
        $detect = new MobileDetect;
        if($detect->isTablet()){
            View::share('isTablet', true);
        }
        if($detect->isMobile()){
            View::share('isMobile', true);
        }
        $authentication = \App::make('authenticator');
        View::share('authentication', $authentication);
        if($authentication->getLoggedUser() != null){
            $users = User::with('profile')->where('id', '=', $authentication->getLoggedUser()->id)->first();
            View::share('user_login', $users);
        }
    }

}

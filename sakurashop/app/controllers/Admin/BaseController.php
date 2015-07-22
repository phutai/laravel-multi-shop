<?php
    namespace admin;

    use \View;
    use \Redirect;

    class BaseController extends \Controller
    {


        function __construct()
        {
            $this->setupLayout();
        }

        /**
         * Setup the layout used by the controller.
         *
         * @return void
         */
        protected function setupLayout()
        {
            if (!is_null($this->layout)) {
                $this->layout = View::make($this->layout);
            }
        }
        protected function checkLogin(){
            $authentication = \App::make('authenticator');
            if (is_null($authentication->getLoggedUser())) {
                return Redirect::away('/admin/login');
            }
        }

    }

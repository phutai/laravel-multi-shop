<?php
/**
 * Created by PhpStorm.
 * User: nptai
 * Date: 14/06/03
 * Time: 17:12
 */
class UserController extends BaseController{
    /**
     *
     */

    public function getIndex()
    {
        header('Content-Type: application/json');
        return json_encode(array('view' => 'index'));
    }

    public function postProfile()
    {
        header('Content-Type: application/json');
        return json_encode(array('view' => 'profile'));
    }

    public function anyLogin($id, $pw) {
        header('Content-Type: application/json');
        return json_encode(array('id' => $id, 'pw' => $pw));
    }
    public function getAdminProfile($id, $pw) {
        header('Content-Type: application/json');
        return json_encode(array('id' => $id, 'pw' => $pw));
    }
}
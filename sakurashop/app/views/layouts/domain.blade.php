<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 12/28/14
 * Time: 9:05 PM
 */
$domain = $_SERVER['SERVER_NAME'] ? $_SERVER['SERVER_NAME'] : 'girlshop777.net';
$shopinfo = \admin\Store::with('Shopinfo')->where('domain', '=', $domain)->first();
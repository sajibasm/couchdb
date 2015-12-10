<?php
/**
 * Created by PhpStorm.
 * User: sajib
 * Date: 12/9/2015
 * Time: 9:58 PM
 */

namespace SAJIB\CouchDB;


interface ConnectionInterface
{
    public  static  function  init();

    public function getHost();

    public function host($host);

    public function getPort();

    public function port($port);

    public function getUser();

    public function user($user);

    public function getPassword();

    public function password($password);

    public function getBaseUrl();

    public function baseUrl($url);

    public function ssl($true);

    public function getAbsoluteUrl();

}
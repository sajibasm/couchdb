<?php
/**
 * Created by PhpStorm.
 * User: sajib
 * Date: 12/9/2015
 * Time: 10:12 PM
 */

namespace SAJIB\CouchDB;

use Exception;

class Connection implements ConnectionInterface
{

    /**
     * @var
     */
     private $host;

    /**
     * @var
     */
    private $port;

    /**
     * @var
     */
    private $user;

    /**
     * @var
     */
    private $password;

    /**
     * @var
     */
    private $baseUrl;

    private $ssl;

    private static $connection;

    public static function init()
    {
        if (!is_object(self::$connection)) {
            return  new Connection();
        }else{
            return self::$connection;
        }
    }

    public function getHost()
    {
        return $this->host;
    }

    public function host($host)
    {
        $this->host = $host;
    }

    public function getPort()
    {
        return $this->port;
    }

    public function port($port)
    {
        $this->port = $port;
    }

    public function getUser()
    {
       return $this->user;
    }

    public function user($user)
    {
       $this->user = $user;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function password($password)
    {
        $this->password = $password;
    }

    public function getBaseUrl()
    {
        return $this->baseUrl;
    }

    public function baseUrl($url)
    {
       $this->baseUrl = $url;
    }

    public function ssl($true = true)
    {
        $this->ssl = $true;
    }

    public function getAbsoluteUrl()
    {
        try{

            if($this->ssl){
                return 'https://'.$this->getHost().':'.$this->getPort().'/'.$this->getBaseUrl();
            }else{
                return 'http://'.$this->getHost().':'.$this->getPort().'/'.$this->getBaseUrl();
            }

        } catch(Exception $e){
            echo $e->getMessage();
        }


    }


}
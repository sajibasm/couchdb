<?php
/**
 * Created by PhpStorm.
 * User: sajib
 * Date: 12/9/2015
 * Time: 5:11 AM
 */

namespace SAJIB\CouchDB;
use Exception;

class Query extends ArrayHelper implements QueryInterface
{
    protected $offset = 0;
    protected $limit = 'All';
    protected $key ;
    protected $keys;

    protected $documents;

    protected $db;
    protected $view;
    protected $design;

    private static $curl;
    protected static $connection;

    private $response;

    public function __construct($config)
    {
        self::$connection = Connection::init();

        try{

            if(!isset($config['server']) && empty($config['server'])){
                throw new Exception('Server IP is empty.');
            }elseif(!isset($config['port']) && empty($config['port'])){
                throw new Exception('Server Port is empty.');
            }

            if(isset($config['user']) && isset($config['pass'])){
                self::$connection->user($config['user']);
                self::$connection->password($config['pass']);
            }

            self::$connection->host($config['server']);
            self::$connection->port($config['port']);

        }catch (Exception $e){
            echo $e->getMessage();
        }

        self::$curl = new Curl();
    }

    public function execute()
    {
        try{
            self::$curl->setHeader('Content-type', 'application/json');
            self::$curl->post(self::$connection->getAbsoluteUrl(), array('docs'=>$this->documents));
            return $this->getResponse();
        }catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function query()
    {
        try{
            self::$curl->get(self::$connection->getAbsoluteUrl());
            return $this->getResponse();
        }catch (Exception $e){
            echo $e->getMessage();
        }
    }

    public function create()
    {
        try{
            self::$curl->put(self::$connection->getAbsoluteUrl());
            return $this->getResponse();
        }catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function remove()
    {
        try{
            self::$curl->delete(self::$connection->getAbsoluteUrl());
            return $this->getResponse();
        }catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getResponse()
    {
        return $this->response = self::$curl->response;
//        if(self::$curl->errorCode==0){
//            return $this->response = self::$curl->response;
//        }else{
//            return $this->response = self::$curl->response;
//        }
    }

    public function getRequestHeader()
    {
        return self::$curl->requestHeaders;
    }

    public function getResponseHeader()
    {
        return self::$curl->responseHeaders;
    }

    public function getBaseUrl()
    {
        return self::$connection->getAbsoluteUrl();
    }

    public function getDesign()
    {
       return $this->design;
    }

    public function setDesign($design)
    {
        $this->design = $design;
    }

    public function getView()
    {
        return $this->view;
    }

    public function setView($view)
    {
        $this->view = $view;
    }

    public function getDB()
    {
        return $this->db;
    }

    public function setDB($db)
    {
        $this->db = $db;
    }


}
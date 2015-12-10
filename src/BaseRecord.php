<?php
/**
 * Created by PhpStorm.
 * User: sajib
 * Date: 12/9/2015
 * Time: 11:53 PM
 */

namespace SAJIB\CouchDB;
use Exception;

class BaseRecord extends Query implements BaseRecordInterface
{
    public function __construct($config)
    {
        parent::__construct($config);
    }

    public function createDb($db)
    {
        $this->db = $db;

        try{
            if(empty($this->db)){
                throw new Exception('DB name can not be empty.');
            }

            self::$connection->baseUrl($this->db);
            parent::create();

        }catch (Exception $e) {
            echo $e->getMessage();
        }

    }

    /**
     * @param $key
     */
    public function findOne($key)
    {
        $this->key = $key;

        try{
            if(empty($this->db)){
                throw new Exception('DB can not be empty.');
            }

            if(empty($this->key)){
                throw new Exception('Key can not be empty');
            }
            self::$connection->baseUrl($this->db.'/'.$this->key);
            parent::query();

        }catch (Exception $e){
            echo $e->getMessage();
        }
    }

    /**
     * @param array $QueryParameters
     */
    public function findAll($QueryParameters = ['key'=>null, 'limit'=>0, 'skip'=>0])
    {
        try{
            if(empty($this->db)){
                throw new Exception('DB can not be empty.');
            }

            self::$connection->baseUrl($this->db.'/_all_docs?'.$this->getArrayToUrl($QueryParameters));
            parent::query();

        }catch (Exception $e){
            echo $e->getMessage();
        }

    }


    public function findAllViewDocuments($QueryParameters = ['key'=>null, 'limit'=>0, 'skip'=>0])
    {
        try{
            if(empty($this->db)){
                throw new Exception('DB can not be empty.');
            }elseif(empty($this->design)){
                throw new Exception('Design is empty.');
            }elseif(empty($this->view)){
                throw new Exception('View is empty.');
            }

            self::$connection->baseUrl($this->db.'/_design/'.$this->getDesign().'/_view/'.$this->getView().'?'.$this->getArrayToUrl($QueryParameters));
            parent::query();

        }catch (Exception $e){
            echo $e->getMessage();
        }
    }

    public function load($documents)
    {
        $this->documents = $documents;
    }

    public function setAttributes($documents)
    {
        $this->documents = $documents;
    }

    public function insert()
    {
        try{

            if(empty($this->documents)){
                throw new Exception('Document is empty (Please load document).');
            }

            if(empty($this->db)){
                throw new Exception('DB can not be empty.');
            }

            self::$connection->baseUrl($this->db.'/'.'_bulk_docs');
            parent::execute();

        }catch (Exception $e){
            echo $e->getMessage();
        }
    }

    public function update()
    {
        try{

            if(empty($this->documents)){
                throw new Exception('Document is empty (Please load document).');
            }

            if(empty($this->db)){
                throw new Exception('DB can not be empty.');
            }

            self::$connection->baseUrl($this->db.'/'.'_bulk_docs');
            parent::execute();

        }catch (Exception $e){
            echo $e->getMessage();
        }
    }

    public function deleteOne($_id, $_rev)
    {
        if(empty($this->db)){
            throw new Exception('DB can not be empty.');
        }elseif(empty($this->db)){
            throw new Exception('Key is empty.');
        }elseif(empty($_id)){
            throw new Exception('ID is empty.');
        }elseif(empty($_id)){
            throw new Exception('Rev is empty.');
        }
        self::$connection->baseUrl($this->db.'/'.$_id.'?rev='.$_rev);
        parent::remove();
    }

    public function deleteAll()
    {

    }

    public function getUUID()
    {
        self::$connection->baseUrl('_uuids');
        parent::query();
    }

    public function getStatus()
    {
        self::$connection->baseUrl('');
        parent::query();
    }

}
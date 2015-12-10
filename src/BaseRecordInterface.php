<?php
/**
 * Created by PhpStorm.
 * User: sajib
 * Date: 12/9/2015
 * Time: 11:55 PM
 */

namespace SAJIB\CouchDB;


interface BaseRecordInterface
{
    public function createDb($db);

    public function findOne($key);

    public function findAll($QueryParameters = []);

    public function getUUID();

    public function getStatus();

    public function load($documents);

    public function setAttributes($documents);

    public function insert();

    public function update();

    public function deleteOne($_id, $_rev);

    public function deleteAll();

    public function getDesign();

    public function setDesign($design);

    public function getView();

    public function setView($view);

    public function getDB();

    public function setDB($db);

    public function findAllViewDocuments($QueryParameters = []);

}
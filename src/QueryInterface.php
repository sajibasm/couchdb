<?php
/**
 * Created by PhpStorm.
 * User: sajib
 * Date: 12/9/2015
 * Time: 5:12 AM
 */

namespace SAJIB\CouchDB;

interface QueryInterface
{
    public function execute();

    public function query();

    public function create();

    public function remove();

    public function getRequestHeader();

    public function getResponseHeader();

    public function getBaseUrl();

    public function getResponse();
}
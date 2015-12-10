<?php
/**
 * Created by PhpStorm.
 * User: sajib
 * Date: 12/9/2015
 * Time: 9:56 PM
 */




require_once 'couchDB/vendor/autoload.php';
echo "<pre>";

$config= [
    'server'=>'127.0.0.1',
    'port'=>5984,
    'user'=>'root',
    'pass'=>'root'
];

$client = new CouchDB($config);
//$client->createDb('musa');
$client->setDB('travelbooking');
//$client->getUUID();
//$client->getStatus();

//$data[] =['id'=>1001, 'name'=>'asm'] ;
//$data[] =['id'=>1002, 'name'=>'saquib'];
//$data[] =['id'=>1003, 'name'=>'lenin'];
//$data[] =['id'=>1005, 'name'=>'amit'];
//$client->load($data);
//$client->insert();

//$data[] =['_id'=>'57a011246d2c7a432d6baaa114032929', '_rev'=>'1-3ead843f34098064cd3f6473f9f7c042', 'id'=>1002, 'name'=>'asm2'] ;
//$data[] =['_id'=>'57a011246d2c7a432d6baaa1140338f0', '_rev'=>'1-8fc7e8d6ea858f460a7847b4ff95788e', 'id'=>1003, 'name'=>'saquib2'] ;
//$client->load($data);
//$client->update();


//$client->findOne('57a011246d2c7a432d6baaa114033df6');

//$client->findAll(['limit'=>3,'include_docs'=>true, 'skip'=>0]);

//$client->deleteOne('57a011246d2c7a432d6baaa1140338f0', '2-dc3810ef03e70d672b117f5ac7f30ffe');
$client->setDesign('tbbd');
$client->setView('code');
$client->findAllViewDocuments(['keys'=>['14Squ031878fbe', '14Squ80652']]);

echo $client->getBaseUrl();
print_r(json_decode($client->getResponse()));
//print_r($client->getRequestHeader());

// $client->getBaseUrl();

<?php
/**
 * Created by PhpStorm.
 * User: sajib
 * Date: 12/10/15
 * Time: 4:41 PM
 */

namespace SAJIB\CouchDB;

class ArrayHelper
{

    public function getArrayToUrl($options = [])
    {
       $url = '';

        foreach($options as $key=>$val){

            if(is_bool($val)){
                $val?$url.=$key.'=true&':$url.=$key.'=false&';
            }elseif(is_string($val)){
                $url.=$key.'="'.$val.'"&';
            }elseif(is_array($val)){
                $str = '[';
                foreach($val as $value){
                    $str.='"'.$value.'",';
                }
                $url.=$key.'='.rtrim($str, ',').']&';
            }
            else{
                $url.=$key.'='.$val.'&';
            }

        }

        return rtrim($url, '&');
    }

} 
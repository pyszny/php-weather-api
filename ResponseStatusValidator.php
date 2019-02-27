<?php

require 'CityIdNotFound.php';

class ResponseStatusValidator
{
    public static function decodeAndValidate($response, $param)
    {

        $decodedResponse = json_decode($response, true);

            try {
                if ($decodedResponse['cod'] == 200) {
                    return $decodedResponse;
                } else {
                    //var_dump($decodedResponse);
                    throw CityIdNotFound::showMessage($param);
                }
            } catch (CityIdNotFound $exception) {
                echo $exception;
            }
    }
}
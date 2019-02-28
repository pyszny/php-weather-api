<?php

require 'CityIdNotFound.php';

class ResponseStatusValidator
{
    public static function decodeAndValidate(string $response,int $param)
    {

        $decodedResponse = json_decode($response, true);

            try {
                if ($decodedResponse['cod'] == 200) {
                    return $decodedResponse;
                } else {
                    throw CityIdNotFound::showMessage($param);
                }
            } catch (CityIdNotFound $exception) {
                echo $exception;
            }
    }
}
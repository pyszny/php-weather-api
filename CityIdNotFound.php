<?php

class CityIdNotFound extends Exception
{
    public static function showMessage($cityid)
    {
        $message = "City with ID {$cityid} was not found.";

        return new static($message);
    }
}
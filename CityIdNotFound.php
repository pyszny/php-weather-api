<?php

class CityIdNotFound extends Exception
{
    public static function showMessage($cityid): CityIdNotFound
    {
        $message = "City with ID {$cityid} was not found.";

        return new static($message);
    }
}
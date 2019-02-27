<?php

require 'ArgumentValidatorExceptionInterface.php';

class ArgumentException extends Exception
    implements ArgumentValidatorExceptionInterface
{
    public static function validate(array $arguments)
    {

    }
}
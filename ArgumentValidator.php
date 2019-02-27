<?php

require 'ArgumentIsNotNumeric.php';

class ArgumentValidator
{
    public static function validate(array $arguments)
    {
        $validArguments = [];

        foreach ($arguments as $argument){

            try {
                if (is_numeric($argument)) {
                    array_push($validArguments, $argument);
                } else {
                    throw ArgumentIsNotNumeric::showMessage($argument);
                }

            } catch (ArgumentIsNotNumeric $exception) {
                echo $exception;
            }
        }

        return $validArguments;
    }
}
<?php

class ArgumentValidator
{
    public static function validate(array $arguments)
    {
        $validArguments = [];

        foreach ($arguments as $argument){
            if (is_numeric($argument)) {
                array_push($validArguments, $argument);
            } else {
                echo "Argument '{$argument}' is invalid and will not be used to fetch data from API.\n";
            }
        }

        return $validArguments;
    }
}
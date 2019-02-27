<?php

require 'InvalidArgumentExceptionInterface.php';

class ArgumentIsNotNumeric extends InvalidArgumentException
    implements InvalidArgumentExceptionInterface
{
    public static function showMessage($argument)
    {
        $message = "Argument $argument is not numeric";

        return new static($message);
    }
}
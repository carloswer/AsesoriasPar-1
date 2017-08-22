<?php namespace Excepciones;


use Throwable;

class PersistenciaException extends \Exception {

    public function __construct($message = "", $extra, $code = 0, Throwable $previous = null)
    {
        parent::__construct($message.": ".$extra, $code, $previous);
    }



}
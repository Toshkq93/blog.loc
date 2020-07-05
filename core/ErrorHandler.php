<?php


namespace core;


class ErrorHandler
{
    public function __construct()
    {
        if (DEBUG){
            error_reporting(-1);
        }else{
            error_reporting(0);
        }
        set_exception_handler([$this, 'exceptionHandler']);
    }

    public function exceptionHandler($error){
            $this->logError($error->getMessage(), $error->getFile(), $error->getLine());
            $this->displayError('Exception', $error->getMessage(), $error->getFile(), $error->getLine(), $error->getCode());

    }

    public function logError($message = '', $file = '', $line = ''){
        error_log("[" . date('Y-m-d H:i:s') . "] Text error: {$message} | File: {$file} | Line: {$line}\n =======================\n",3, ROOT . '/tmp/error.log');
    }

    public function displayError($errNo, $errStr, $errFile, $errLine, $response = 404){
        http_response_code($response);
        if ($response == 404 AND !DEBUG){
            require_once WWW . '/errors/404.php';
            die();
        }
        if (DEBUG){
            require_once WWW . '/errors/dev.php';
        }else{
            require_once WWW . '/errors/prod.php';
        }
        die();
    }

}
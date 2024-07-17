<?php
namespace RsLogger;

use RsLogger\exception\ClassDoesNotExistException;

class Configuration{
    public function __construct(public string $driverClassName, 
            public string $messageFormatterClassName,
            public array $messageLevels,
            public string $logFilePath='') {
        if(!class_exists($this->driverClassName)){
            throw new ClassDoesNotExistException('Class '.$this->driverClassName.' given as $driverClassName does not exist. RsLoggerConfiguration can\'t be created.');
        }
        if(!class_exists($this->messageFormatterClassName)){
            throw new ClassDoesNotExistException('Class '.$this->messageFormatterClassName.' given as $messageFormatterClassName does not exist. RsLoggerConfiguration can\'t be created.');
        }
        
    }
    
    public static function createConfigurationFromFile(string $configurationFilePath): Configuration{
        $env = parse_ini_file($configurationFilePath);
        return new Configuration($env['driverClassName'], $env['messageFormatterClassName'], $env['messageLevels'], $env['logFilePath']);
    }
}
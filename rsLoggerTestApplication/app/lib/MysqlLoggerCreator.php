<?php
namespace RsApp\lib;

use RsLogger\Configuration;
use RsLogger\Logger;

class MysqlLoggerCreator{
    public MysqlLoggerConfiguration$configuration;
    public function setConfiguration(Configuration $configuration):void{
        $this->configuration = $configuration;
    }
    
    public function createLogger(){
        $formatter = new $this->configuration->messageFormatterClassName();
        $driver = new $this->configuration->driverClassName($formatter, $this->configuration->mysqlConfiguration);
        return new Logger($driver, $this->configuration->messageLevels);
    }
   
}

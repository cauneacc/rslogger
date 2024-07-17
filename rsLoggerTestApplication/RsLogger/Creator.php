<?php

namespace RsLogger;



class Creator{
    public Configuration $configuration;
    public function setConfiguration(Configuration $configuration):void{
        $this->configuration = $configuration;
    }
    
    public function createLogger(){
        $formatter = new $this->configuration->messageFormatterClassName();
        if($this->configuration->driverClassName=== \RsLogger\driver\File::class){
            $driver = new $this->configuration->driverClassName($formatter, $this->configuration->logFilePath);
        } else {
            $driver = new $this->configuration->driverClassName($formatter);
        }
        return new Logger($driver, $this->configuration->messageLevels);
    }
   
}

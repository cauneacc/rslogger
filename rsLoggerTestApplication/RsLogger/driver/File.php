<?php
namespace RsLogger\driver;
use RsLogger\formatter\StringFormatterInterface;
use RsLogger\MessageInterface;

class File implements DriverInterface{
    public function __construct(protected StringFormatterInterface $formatter, protected string $logFilePath) {
    }

    protected function checkIfLogFileIsWritable(){
        if(!empty($this->logFilePath)){
            if(is_file($this->logFilePath)){
                if(is_writable($this->logFilePath)){
                    return true;
                } else {
                    chmod($this->logFilePath, 0600);
                    return true;
                }
            } else {
                $directoryName = dirname($this->logFilePath);
                if(is_writable($directoryName )){
                    return true;
                }
            }
        }
        throw new \Exception("Log file '".var_export($this->logFilePath,true)."' is not writable");
    }
    
    protected function writeToFile($formattedMessage){
        $this->checkIfLogFileIsWritable($this->logFilePath);
        $fp = fopen($this->logFilePath, 'a');
        if($fp){
            if (flock($fp, LOCK_EX | LOCK_NB)) {
                fwrite($fp, $formattedMessage);
                flock($fp, LOCK_UN);
            }
            fclose($fp);
        }
    }
        
    
    
    function log(MessageInterface $message):void{
        $formattedMessage = $this->formatter->format($message);
        $this->writeToFile($formattedMessage.PHP_EOL);
    }
}


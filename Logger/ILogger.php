<?php
ini_set('display_errors', 'On'); 

class Context
{
    private $ilogger;

    public function __constructor(ILogger $ilogger)
    {
        $this->ilogger = $ilogger;
    }

    public function setILogger(ILogger $ilogger)
    {
       $this->ilogger = $ilogger;
    }

    public function writeSmth(): void
    {
        echo "Context: \n";
        $result = $this->ilogger->Write("something txt");
          echo "\n" . $result. "\n";
    }
}


interface ILogger
{
    public function Write($text);
    
}

class EchoLogger implements ILogger
{
    public function Write($text)
    {
        return "You see this \n '$text' \n on your screen";
    }
}

class FileLogger implements ILogger
{
    public function Write($text)
    {
    $fp = fopen('file.txt', 'a+');
    fwrite($fp,$text . "\n");
    fclose($fp);
    return "'$text' \nis written into file.txt";
    }
}

class TimeFileLogger implements ILogger
{
    public function Write($text)
    {
    $time = date("d/m/Y H:i\n"); 
    $fp = fopen('file.txt', 'a+');
    fwrite($fp,$text . " $time \n");
    fclose($fp);
    return "'$text' \nis written into file.txt $time";
    }
}


$context = new Context();

$context->setILogger(new EchoLogger());
$context->writeSmth();


$context->setILogger(new FileLogger);
$context->writeSmth();

$context->setILogger(new TimeFileLogger());
$context->writeSmth();

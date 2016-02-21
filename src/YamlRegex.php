<?php

namespace Hasantayyar;
use Symfony\Component\Yaml\Parser;

class YamlRegex
{
    public $messages;
    private $yaml;
    protected $config_file = __DIR__.'/config.yml';

    public function __construct()
    {
      $this->yaml = new Parser();
      $this->messages = [];
    }

    /**
    * main check function
    * @param String $value
    * @return bool
    */
    public function check($value){
      try{
        $file = fopen($this->config_file, "r");
      }catch(\Exception $e){
        throw new \Exception("Can not read config file.", 1);
      }
      $content = fread($file,filesize($this->config_file));
      fclose($file); // with open(config_file)

      if(strlen($content) <= 1)
        throw new \Exception("Wrong config format", 2);

      $rules_data = $this->yaml->parse($content);
      if(!$rules_data["rules"] || !is_array($rules_data["rules"]))
        throw new \Exception("Wrong config format.", 2);

      // fire all rules
      foreach ($rules_data["rules"] as $rule)
        if(!preg_match($rule["regex"], $value))
          $this->messages[] = $rule["error_message"];

      return !boolval(sizeof($this->messages));
    }

}

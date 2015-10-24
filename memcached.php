<?php
class Mem
{
    private $type = 'Memcached';
    private $m;
    private $time;
    private $error;
    public function __construct()
    {
        if (!class_exists($this->type)) {
            $this->error = 'No' . $this->type;
            return false;
        } else {
            $this->m = new $this->type;
        }
    }
    
    
    public function addServer($arr)
    {
        $this->m->addServers();
    }
    
    
    public function s($key, $value = '', $time = NULL)
    {
        $number = func_num_args();
        if ($number == 1) {
            $this->get(key);
        } else if ($number >= 2) {
            if ($value === NULL) {
                $this->delete($key);
            } else {
                
                $this->set($key, $value, $time);
            }
        }
    }
    
    
    public function set($key, $value, $time = NULL)
    {
        if ($time === NULL) {
            $time = $this->time;
        }
        $this->m->set($key, $value);
    }
    public function getError()
    {
        
        if ($this->error) {
            return $this->error;
        } else {
            return $this->m->getResultMessage();
        }
    }
    
    
}
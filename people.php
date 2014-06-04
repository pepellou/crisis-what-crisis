<?php

class Person {

    public function __construct(&$data) {
        list($this->name, $this->location) = explode('(', str_replace(')', '(', array_shift($data)));
        $this->name = trim($this->name);
        $line = trim(array_shift($data));
        $this->why = substr($line, 1, strlen($line) - 2);
        $line = trim(array_shift($data));
        $this->what = substr($line, 0, strlen($line) - 1);
        $this->how = "";
        $line = array_shift($data);
        while (substr($line, 0, 4) == '    ') {
            $this->how .= trim($line).' ';
            $line = array_shift($data);
        }
        $this->web = trim($line);
        $this->links = array();
        $line = array_shift($data);
        while (substr($line, 0, 4) == '    ') {
            $this->links []= trim($line);
            $line = array_shift($data);
        }
        $this->mail = trim($line);
        list($this->gps->lat, $this->gps->lng) = explode(',', trim(array_shift($data)));
        array_shift($data);

        $this->id = $this->computeId();
    }

    private function computeId() {
        $id = strtolower($this->name);
        foreach (array(
            'á' => 'a',
            'é' => 'e',
            'í' => 'i',
            'ó' => 'o',
            'ú' => 'u',
            'ñ' => 'n',
            ' ' => '_'
        ) as $search => $replace) {
            $id = str_replace($search, $replace, $id);
        }
        return $id;
    }

}

class People {

    private static $all = array();

    public static function read() {
        $data = file(dirname(__FILE__).'/data/people.txt');
        while (count($data) > 0) {
            self::$all []= new Person($data);
        }
    }

    public static function all() {
        return self::$all;
    }

}

People::read();

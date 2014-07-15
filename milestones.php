<?php

class Milestone {

    public function __construct(&$data) {
        list($this->start, $this->date, $this->id) = explode(' ', trim(array_shift($data)));
        $this->link = trim(array_shift($data));
        $this->text = trim(array_shift($data));
        array_shift($data);
    }

}

class Milestones {

    private static $all = array();

    public static function read() {
        $data = file(dirname(__FILE__).'/data/roadmap.txt');
        while (count($data) > 0) {
            self::$all []= new Milestone($data);
        }
    }

    public static function all() {
        return self::$all;
    }

}

Milestones::read();

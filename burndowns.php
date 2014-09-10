<?php

define (HOT,  1);
define (COLD, 2);

class BurnDown {

    public function __construct($max, $data, $color_scheme) {
        $this->money = array();
        $this->money []= $this->roundData($max);
        foreach($data as $value) {
            $this->money []= $this->roundData($max - $value);
        }
        $this->color_scheme = $color_scheme;
    }

    private function roundData($data) {
        return ($data - $data % 10) / 10;
    }

    public function url() {
        return 'http://apps.vanpuffelen.net/charts/burndown.jsp'
            . '?days=9%20sep,.,.,.,.,.,.,.,.,.,.,20%20sep,.,.,.,.,.,.,.,.,.,.'
            . ',1%20oct,.,.,.,.,.,.,.,.,.,.,.,.,.,.,.,17%20oct'
            . '&work='.implode(',', $this->money)
            . '&colors='.$this->color_scheme;
    }

}

$data = file(__DIR__."/data/money.txt");

$bd_min = new Burndown(6907, $data, COLD);
$bd_opt = new Burndown(9707, $data, HOT);

?>
<center>
    <h2>To raise minimum</h2>
    <img src="<? echo $bd_min->url(); ?>"></img>
    <h2>To raise optimum</h2>
    <img src="<? echo $bd_opt->url(); ?>"></img>
</center>

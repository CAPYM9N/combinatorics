<?php

class comb{

    public $str;
    public $m;
    public $arr = [];
    public $n;

    public function __construct($str, $m)
    {
        $this->str = $str;
        $this->m = $m;
        $this->n = strlen($str);
        $this->arr = array_fill(0,$this->m, 0);

        if ($this->n < $this->m)
            throw new \Exception('Строка должна быть больше вводимой длинны');

        if ($this->m <= 0 || $this->n <= 0)
             throw new \Exception('строка и длинна строки должны быть больше 0');

    }

    function factorial($number){
        $a = $number;

        for($a--; $a > 0;$a--)
            $number*=$a;

        return  $number;
    }

    public function numberOfCombinations(){

        return $this->factorial($this->n) / $this->factorial($this->n - $this->m);
    }

    public function combination(){

        for($i=0; $i < $this->numberOfCombinations(); $i++){

            $str = $this->str;

            foreach ($this->arr as $item){

                $rezult.= $str[$item];

                $str = substr_replace($str, '', $item, 1);

            }
            echo $rezult."<br>";

            $rezult="";

            $this->nextIndex();

        }

    }

    public function nextIndex(){

        for ($j = $this->m - 1; $j >= 0; $j--) {

            $c = $j;

            if ($this->n - 1 !== $this->arr[$j] + $c) break;
        }

        $this->arr[$j]++;

        for ($a=$j+1; $a < $this->m; $a++)
            $this->arr[$a] = 0;

    }


}
try {

    $obj = new comb('1234', 3);
    $obj->combination();

}
catch (Exception $e) {
    exit($e->getMessage());
}




























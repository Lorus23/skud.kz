<?php

class SiteController
{
    /**
     * Action для главной страницы
     */
    public function actionIndex()
    {
        $bigdata = Timer::getTime();

        for ($i = 1; $i <= count($bigdata); $i++) {
            $a[$i] = explode(':', $bigdata[$i][4]);
        }
        $h = 0;
        $m = 0;
        for ($i = 1; $i <= count($bigdata); $i++) {
            $h = $h + $a[$i][0];
            $m = $m + $a[$i][1];
        }

        $time = $h * 60 * 60 + $m * 60;

        $sec = $time % 60;
        $time = floor($time / 60);
        $min = $time % 60;
        $time = floor($time / 60);

        // Подключаем вид
        require_once(ROOT . '/views/index.php');
        return true;
    }

    /**
     * Action для страницы со списком персонала
     */
    public function actionSpisok()
    {

        $count = Timer::getCount();

        for ($i = 1; $i <= count($count); $i++) {
            $a[$i] = explode(':', $count[$i][4]);
            $h = $a[$i][0];
            $m = $a[$i][1];
            $count[$i][4] = $h * 60 * 60 + $m * 60;
        }
//        echo '<pre>';
//        print_r($count);
//        exit;

        $sum = 0;
        $stack = [];
        foreach ($count as $key => $value)
        {
            if (!isset($stack[$value[4]])) {
                $stack[$value[4]] = 1;
            } else {
               $sum += $stack[$value[4]] ;
            }
        }
        var_dump(array_search(max($stack), $stack));



        $k = 0;
        $sum = 0;
        for ($i = 1; $i <= count($count); $i++) {
            for ($j = 1; $j <= 2; $j++) {
                if (($count[$i][0]) == ($count[$j][0])) {
                    echo '*';
                    print_r($count[$j][4]);
                }
            }
        }

        // Подключаем вид
        require_once(ROOT . '/views/spisok.php');
        return true;
    }
}

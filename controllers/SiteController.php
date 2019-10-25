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

}

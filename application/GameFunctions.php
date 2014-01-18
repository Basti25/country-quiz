<?php
/**
 * Created by PhpStorm.
 * User: Basti
 * Date: 18.01.14
 * Time: 14:57
 */

class Game {
    function score($answerX, $answerY, $solutionX, $solutionY, $distanceScore) {
        $X = $solutionX - $answerX;
        $Y = $solutionY - $answerY;

        if($answerX == 0 && $answerY == 0) {
            $distanceScore = 0;
        }

        $distance = pow($X, 2) + pow($Y, 2);
        $distance = sqrt($distance);
        $result = $distanceScore - $distance;

        if($result < 0) {
            $result = 0;
        }

        return $result;
    }
} 
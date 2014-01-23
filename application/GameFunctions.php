<?php
/**
 * Created by PhpStorm.
 * User: Basti
 * Date: 18.01.14
 * Time: 14:57
 */

class Game {
    function score($answerX, $answerY, $solutionX, $solutionY, $distanceScore, $factor) {
        $X = $solutionX - $answerX;
        $Y = $solutionY - $answerY;

        if($answerX == 0 && $answerY == 0) {
            $distanceScore = 0;
        }
        if($solutionX == 0 && $solutionY == 0) {
            $distanceScore = 0;
        }

        $distance = pow($X, 2) + pow($Y, 2);
        $distance = sqrt($distance);
        $result = ($distanceScore * (0.5 * $factor)) - $distance;

        if($result < 0) {
            $result = 0;
        }
        return $result;
    }
} 
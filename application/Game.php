<?php
/**
 * Created by PhpStorm.
 * User: Basti
 * Date: 18.01.14
 * Time: 14:57
 */

class Game {

    // Errechnet die Entfernung zweier Punkte anhand des Satz des Pythagoras.
    function score($answerX, $answerY, $solutionX, $solutionY, $distanceScore, $factor) {
        $X = $solutionX - $answerX;
        $Y = $solutionY - $answerY;

        // Ist keine Antwort oder keine Lösung gegeben, gibt es keine Punkte.
        if($answerX == 0 && $answerY == 0) {
            $distanceScore = 0;
        }
        if($solutionX == 0 && $solutionY == 0) {
            $distanceScore = 0;
        }

        // Satz des Pythagoras und Errechnung des Endergebnisses
        $distance = pow($X, 2) + pow($Y, 2);
        $distance = sqrt($distance);
        $result = ($distanceScore  - $distance) * (0.5 * $factor);

        // Ist das Ergebnis negativ wird der Punktewert auf 0 gesetzt.
        if($result < 0) {
            $result = 0;
        }

        return $result;
    }
} 
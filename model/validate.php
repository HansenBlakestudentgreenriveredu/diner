<?php

/* Validate data for the diner app
*/

// return true if food is valid
function validFood($food){
    return strlen(trim($food)) >= 3;
}

// return true if meal is valid
function validMeal($meal){
    return in_array($meal, getMeals());
}
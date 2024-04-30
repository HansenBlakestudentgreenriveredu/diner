<?php

/* This is my data layer.
 * It belongs to the model.
 */

// Get the meals for the diner app
function getMeals() {
    return array('breakfast', 'brunch', 'lunch', 'dinner', 'dessert');
}

// Get the condiments for the diner app
function getCondiments() {
    return array('ketchup', 'mustard', 'Sirracha');
}
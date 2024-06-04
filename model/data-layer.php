<?php

/* This is my data layer.
 * It belongs to the model.
 *
 * CREATE TABLE orders (
    order_id int(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    food VARCHAR(50),
    meal VARCHAR(20),
    condiments VARCHAR(50),
    date_time DATETIME DEFAULT NOW()
    );
 */

class DataLayer
{
    // Ad a field to store the db connection object
    private $_dbh;

    /**
     * DataLayer constructor connects to PDO Database
     */
    function__construct()
    {
        // Require database conection credentials
        require $_SERVER['DOCUMENT_ROOT'].'/../config.php';

        try {
            // Instantiate our PDO Database Object
            $this->_dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            // echo 'connected to database!!';
        }
        catch (PDOException $e) {
            die( $e->getMessage() );
            //die("<p>Something ent wrong!</p>");
        }
    }

    /**
     * Save a restaurant order to database
     * @param Order an Order object
     * @return int the Order ID
     */
    function saveOrder($order)
    {
        // Define query
        $sql = 'INSERT INTO orders (food, meal, condiments)
        VALUES (:food, :meal, :condiments)';

        // Prepare statement
        $statement = $this->_dbh->prepare($sql);

        // Bind parameters
        $food = $order->getFood();
        $meal = $order->getMeal();
        $condiments = $order->getCondiments();
        $statement->bindParam(':food', $food);
        $statement->bindParam(':meal', $meal);
        $statement->bindParam(':condiments', $condiments);

        // Execute the query
        $statement->execute();

        // Process results
        $id = $dbh->lastInsertId();
        return $id;


    // UPDATE Query
    // Define
            $sql = "UPDATE pets SET name = 'Jojo'
            WHERE name = 'Mathilda'";

    // Prepare statement
            $statement = $dbh->prepare($sql);

    // Bind parameters
            $newName = "Jojo";
            $id = 5;
            $statement->bindParam(':newName', $newName);
            $statement->bindParam(':id', $id);

    // Execute the query
            $statement->execute();
        }

    // Get the meals for the diner app
        static function getMeals()
        {
            return array('breakfast', 'brunch', 'lunch', 'dinner', 'dessert');
        }

    // Get the condiments for the diner app
        static function getCondiments()
        {
            return array('ketchup', 'mustard', 'sriracha');
        }
    }
<!-- 
FIBONACCI ALGORITHM

FUNCTION fibonacci(n):
    // Step 1: Check if input is within the valid range
    IF n < 1 OR n > 20 THEN
        RETURN "Please enter a number between 1 and 20."

    // Step 2: Initialize the Fibonacci sequence array
    DECLARE fibonacciNumbers AS ARRAY
    IF n >= 1 THEN
        APPEND 0 TO fibonacciNumbers
    IF n >= 2 THEN
        APPEND 1 TO fibonacciNumbers

    // Step 3: Generate Fibonacci numbers
    FOR i FROM 2 TO n - 1 DO
        // Calculate the next Fibonacci number
        nextNumber = fibonacciNumbers[i - 1] + fibonacciNumbers[i - 2]
        // Add the next Fibonacci number to the array
        APPEND nextNumber TO fibonacciNumbers

    // Step 4: Output the Fibonacci sequence
    RETURN fibonacciNumbers
END FUNCTION

// Example usage
SET input = 5
SET output = fibonacci(input)
PRINT "Input: ", input, ", Output: ", output 

-->

<?php

function fibonacci($n)
{

    // Initialize the Fibonacci sequence array
    $fibonacciNumbers = [0, 1];

    // Generate Fibonacci numbers up to n
    for ($i = 2; $i < $n; $i++) {
        // Calculate the next Fibonacci number
        $nextNumber = $fibonacciNumbers[$i - 1] + $fibonacciNumbers[$i - 2];
        // Add the next Fibonacci number to the array
        $fibonacciNumbers[] = $nextNumber;
    }

    // Return only the first n Fibonacci numbers
    return array_slice($fibonacciNumbers, 0, $n);
}

// Example usage
$input = 5; // can change this input to test other values

// Check if the input is within the valid range
if ($input < 1 || $input > 20) {
    echo "Please enter a number between 1 and 20.";
} else {
    $output = fibonacci($input);
    echo "Input: $input, Output: " . implode(", ", $output) . "\n";
}


?>
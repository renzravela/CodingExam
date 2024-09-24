<?php
class Processes {
    private $numbers; // Property to hold the array of integers

    // Constructor accepting an array of integers
    public function __construct($numbers) {
        $this->numbers = $numbers; // Initialize the property
        $this->bubbleSort();  // Sort the array using bubble sort
    }

    // Bubble Sort function
    private function bubbleSort() {
        $n = count($this->numbers); // Get the count of numbers
        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $n - $i - 1; $j++) {
                // If the current element is greater than the next element, swap them
                if ($this->numbers[$j] > $this->numbers[$j + 1]) {
                    $temp = $this->numbers[$j]; // Store the current element
                    $this->numbers[$j] = $this->numbers[$j + 1]; // Swap
                    $this->numbers[$j + 1] = $temp; // Swap
                }
            }
        }
    }

    // Function to get the largest value in the sorted array
    public function getLargest() {
        return $this->numbers[count($this->numbers) - 1]; // Return the last element (largest)
    }

    // Function to get the median value in the sorted array
    public function getMedian() {
        $n = count($this->numbers); // Get the count of numbers
        $mid = floor($n / 2); // Find the middle index
        if ($n % 2 == 0) {
            // If even, return the average of the two middle elements
            return ($this->numbers[$mid - 1] + $this->numbers[$mid]) / 2;
        } else {
            // If odd, return the middle element
            return $this->numbers[$mid];
        }
    }
}

// Class to use Processes
class Handler {
    public function processArray($array) {
        // Create an instance of Processes class
        $processor = new Processes($array);
        
        // Get the largest and median values
        $largest = $processor->getLargest();
        $median = $processor->getMedian();

        // Output the results
        echo "Largest Value: " . $largest . "\n"; // Display the largest value
        echo "Median Value: " . $median . "\n";   // Display the median value
    }
}

// Example
$array = [11, 23, 56, 99, 202, 187]; // Input array
$handler = new Handler(); // Create an instance of Handler
$handler->processArray($array); // Process the array


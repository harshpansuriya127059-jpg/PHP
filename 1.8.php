<?php
// Read array values from the user
echo "Enter array elements separated by space: ";
$input = trim(fgets(STDIN));

// Convert input string into an array
$array = explode(" ", $input);

// Reverse the array
$reversedArray = array_reverse($array);

// Display the original array
echo "Original Array: ";
print_r($array);

// Display the reversed array
echo "Reversed Array: ";
print_r($reversedArray);
?>
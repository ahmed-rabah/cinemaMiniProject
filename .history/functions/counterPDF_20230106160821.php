<?php

// Open the file in read mode
$handle = fopen("counter.txt", "r");

// Read the current count
$count = (int)fread($handle, 20);

// Increment the count by 1
$count = $count + 1;

// Close the file
fclose($handle);

// Open the file in write mode
$handle = fopen("counter.txt", "w");

// Write the new count to the file
fwrite($handle, $count);

// Close the file
fclose($handle);

// echo "This page has been visited $count times.";

?>

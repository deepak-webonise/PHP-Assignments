<?php
// We'll be outputting a text
header('Content-type: application/text');

// It will be called downloaded.txt
header('Content-Disposition: attachment; filename="downloaded.txt"');

// The text source is in file.txt
readfile('file.txt');
?>


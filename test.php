<?php
$multiLineString = "This is a\nmulti-line\nstring.";
$singleLineString = str_replace("\n", " ", $multiLineString);
echo $singleLineString;  // Outputs: This is a multi-line string.
?>
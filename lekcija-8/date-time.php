<?php
date_default_timezone_set("Europe/Helsinki");
// https://www.php.net/manual/en/datetime.format.php
echo date('Y/m/d H:i:s', time() + 3600);

echo "<br />";

// https://www.php.net/manual/en/function.strtotime.php
$date = strtotime('+3 months');

echo date('Y-m-d H:i:s', $date);
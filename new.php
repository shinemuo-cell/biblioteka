<?php
if (function_exists('mysqli_connect')) {
    echo "mysqli exists!";
} else {
    echo "mysqli NOT loaded!";
}

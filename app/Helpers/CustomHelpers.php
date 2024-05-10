<?php
namespace App\Helper;

if (! function_exists('formatDate')) {
    function formatDate($date, $format = 'Y-m-d') {
        return date($format, strtotime($date));
    }
}
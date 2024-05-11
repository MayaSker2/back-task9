<?php

namespace App\Helpers;
use DateTime;

function formateDate($dateString, $format = 'Y-m-d')
{
    $get_date = new DateTime($dateString);
    return $get_date->format($format);
}
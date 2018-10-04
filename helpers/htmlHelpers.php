<?php
/**
 * Created by PhpStorm.
 * User: cippio
 * Date: 10/1/18
 * Time: 4:17 PM
 */

function htmlSafe($value) {
    return trim(strip_tags(htmlspecialchars($value)));
}
<?php
/**
 * Created by PhpStorm.
 * User: BerkeK
 * Date: 13/02/2018
 * Time: 21:05
 */


/**
 * Escapes HTML for output
 *
 */

function escape($html)
{
    return htmlspecialchars($html, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
}
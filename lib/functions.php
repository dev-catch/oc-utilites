<?php

/*******  Global Helper Functions  *******/

/**
 * Convert a variable to boolean
 *
 * @param $var mixed
 * @return bool
 */
function toBool($var) {
    if (!is_string($var)) return (bool) $var;

    switch (strtolower($var)) {
        case '1':
        case 'true':
            return true;
        default:
            return false;
    }
}

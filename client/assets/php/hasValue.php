<?php
function hasValue($value) {
    if (
        isset($value) ||
        trim($value) != '' ||
        $value != null
    ) {
        return true;
    } else {
        return false;
    }
}
?>
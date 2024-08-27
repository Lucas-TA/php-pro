<?php
function redirect($to)
{
    return header("Location: " . $to);
}

function setMessageAndRefirect($index, $message, $redirectTo)
{
    setFlash($index, $message);
    return redirect($redirectTo);
}
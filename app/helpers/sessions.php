<?php
function isUserLogged()
{
    if (isset($_SESSION[LOGGED]))
    {
        return $_SESSION[LOGGED];
    }
}

function logged()
{
    return isset($_SESSION[LOGGED]);
}
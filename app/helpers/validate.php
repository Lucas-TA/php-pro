<?php

function validate(array $validations)
{
    $result = [];
    foreach ($validations as $field => $validate)
    {
        if (!str_contains($validate, '|'))
        {
            $result[$field] = $validate($field);

        } else {
            $explodedPipeValidate = explode('|', $validate);
            foreach ($explodedPipeValidate as $validateExploded)
            {
                $result[$field] = $validateExploded[$field];
            }
        }
    }
    if (in_array(false, $result))
    {
        return false;
    }
    return $result;
}
function required($field)
{
    if (!isset($_POST[$field]))
    {
        setFlash($field, 'This field is required.');
        return false;
    }
    return filter_var($_POST[$field], FILTER_UNSAFE_RAW, FILTER_FLAG_NO_ENCODE_QUOTES);
}
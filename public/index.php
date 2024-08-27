<?php

require __DIR__ . '/bootstrap.php';

try {
    $data = router();

    if (!isset($data['data']))
    {
        throw new Exception('Data is missing');
    }

    if (!isset($data['data']['title']))
    {
        throw new Exception('Title is missing');
    }

    extract($data ['data']);

    if (!isset($data['view']))
    {
        throw new Exception('View is missing');
    }

    if (!file_exists(VIEWS.$data['view']))
    {
        throw new Exception("View {$data['view']} does not exist");
    }

    $view = $data['view'];

    require VIEWS . 'default.php';

} catch (Exception $e)
{
    var_dump($e->getMessage());
}


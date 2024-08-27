<?php

/**
 * Checks if the URI matches an exact route.
 *
 * @param string $uri The request URI.
 * @param array $routes Defined routes.
 * @return array Matched route or empty array if no match.
 */
function searchUriInArrayRoutes(string $uri, array $routes): array
{
    return (array_key_exists($uri, $routes)) ? [$uri => $routes[$uri]] : [];
}

/**
 * Matches the URI against routes using regex patterns.
 *
 * @param string $uri The request URI.
 * @param array $routes Defined routes.
 * @return array Matched routes or empty array if no match.
 */
function regExpressionMatchArrayRoutes(string $uri, array $routes): array
{
    return array_filter(
        $routes,
        function ($pattern) use ($uri) {
            $regex = str_replace("/", "\/", ltrim($pattern, '/'));
            return preg_match("/^$regex$/", ltrim($uri, '/'));
        },
        ARRAY_FILTER_USE_KEY
    );
}

/**
 * Extracts parameters from the URI based on matched routes.
 *
 * @param array $uri The request URI.
 * @param array $searchedUri
 * @return array List of parameters.
 */
function extractParamsFromUri(array $uri, array $searchedUri): array
{
    if (!empty($searchedUri)) {
        $route = array_keys($searchedUri)[0];
        return array_diff(
            $uri,
            explode("/", ltrim($route, '/'))
        );
    }
    return [];
}

function formatParamsExtracted(array $uri, $params): array
{
    $paramsData = [];
    foreach ($params as $index => $param) {
        $paramsData[$uri[$index - 1]] = $param;
    }
    return $paramsData;
}

/**
 * Routes the request to the appropriate controller method.
 *
 * Parses the URI, matches it to routes, and invokes the appropriate handler.
 *
 * @return mixed This function does not return; it outputs directly.
 * @throws Exception
 */
function router(): mixed
{
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    $routes = require __DIR__ . "/../router/routes.php";
    $requestMethod = $_SERVER['REQUEST_METHOD'];

    $searchedUri = searchUriInArrayRoutes($uri, $routes[$requestMethod]);

    $params = [];
    if (empty($searchedUri)) {
        $searchedUri = regExpressionMatchArrayRoutes($uri, $routes[$requestMethod]);
        $uri = explode('/', ltrim($uri, '/'));
        $params = extractParamsFromUri($uri, $searchedUri);
        $params = formatParamsExtracted($uri, $params);
    }
    if (!empty($searchedUri))
    {
        return controller($searchedUri, $params);
    }
    throw new Exception('Something went wrong');
}

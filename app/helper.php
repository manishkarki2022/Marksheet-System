<?php

if (!function_exists('is_active_route')) {
    function is_active_route($route)
    {
        return Route::currentRouteName() === $route;
    }
}

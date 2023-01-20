<?php

function active($path = '', $class = 'active')
{
    if(str_contains($path, '.')) {
        return request()->routeIs($path) ? $class : '';
    }
    return str_contains(request()->url(), $path) ? $class : '';
}

function current_page($path = '', $class = 'current')
{
    if(str_contains($path, '.')) {
        return request()->routeIs($path) ? $class : '';
    }
    return str_contains(request()->url(), $path) ? $class : '';
}

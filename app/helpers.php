<?php
if (!function_exists('user')) {
    function user()
    {
        return \Auth::user();
    }
}

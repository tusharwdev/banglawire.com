<?php

if (!function_exists('setting')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function setting($name,$default = null)
    {
        return \App\Models\Setting::getByname($name,$default);
    }
}

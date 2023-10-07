<?php

namespace App\Services;

use Illuminate\Http\Request;

interface FilterServiceContract
{
    function getJikanAnimeSearchFilter(Request $request);
}

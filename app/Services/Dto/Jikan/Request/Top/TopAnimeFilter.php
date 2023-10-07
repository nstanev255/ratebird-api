<?php

namespace App\Services\Dto\Jikan\Request\Top;

enum TopAnimeFilter : string
{
    case AIRING = 'airing';
    case UPCOMING = 'upcoming';
    case BYPOPULARITY = 'bypopularity';
    case FAVORITE = 'favorite';
    case NONE = '';
}

<?php

namespace App\Services\Dto\Jikan\Request;

enum EntryType : string
{
    case TV = 'tv';
    case MOVIE = 'movie';
    case OVA = 'ova';
    case SPECIAL = 'special';
    case ONA = 'ona';
    case MUSIC = 'music';
    case NONE = '';
}

<?php

namespace App\Services\Anime\Dto\Jikan\Request\Top;

enum Rating: string
{
    case G = 'g';
    case PG = 'pg';
    case PG13 = 'pg13';
    case R17 = 'r17';
    case R = 'r';
    case RX = 'rx';

    case NONE = '';
}

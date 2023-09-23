<?php

namespace App\Services\Anime\Dto;

enum EntryType
{
    case TV;
    case MOVIE;
    case OVA;
    case SPECIAL;
    case ONA;
    case MUSIC;

    public function entry_type(){
        return match($this){
            EntryType::ONA => 'ona',
            EntryType::OVA => 'ova',
            EntryType::TV => 'tv',
            EntryType::MOVIE => 'movie',
            EntryType::SPECIAL => 'special',
            EntryType::MUSIC => 'music',
        };
    }

}

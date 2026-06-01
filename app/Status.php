<?php

namespace App;

enum Status: string
{   

    case ARCHIVE = 'archive';
    case PUBLISHED = 'published';


    public function label(): string{
        return match($this){
            self::ARCHIVE => 'Archive',
            self::PUBLISHED => 'Published',
        };
    }

    public static function values(): array{
        return array_map(fn (Status $status) => $status->value, self::cases());
    }

    //color
}

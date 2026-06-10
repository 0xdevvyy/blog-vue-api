<?php

namespace App\Policies;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TagPolicy
{
    //wait i don't actually need this because only i am the user this is not a multi-user system
    // public function canWork(User $user, Tag $tag): bool{
    //     return $tag->user->is($user);
    // }
}

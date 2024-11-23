<?php

namespace App\Policies;

use App\Models\Bookmark;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BookmarkPolicy
{

    /**
     * Determine whether the user can view the model.
     */
    public function editBookmark(User $user, Bookmark $bookmark): bool
    {
        return $bookmark->user->is($user);
    }

}

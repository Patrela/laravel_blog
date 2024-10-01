<?php


namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
class CategoryPolicy
{
    use HandlesAuthorization;
    // /**
    //  * Create a new policy instance.
    //  */
    // public function __construct()
    // {
    //     //
    // }

    public function published(?User $user, Category $category): bool
    {
        return ($category->status == 1)?true:false;
    }

}

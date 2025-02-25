<?php

declare(strict_types=1);

namespace App\Core\Dojo\Infrastructure\Policies;

use App\Core\Dojo\Infrastructure\Model\Dojo;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DojoPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->tokenCan('dojo:viewAny');
    }

    public function view(User $user, Dojo $dojo): bool
    {
        return $user->tokenCan('dojo:view') || $user->tokenCan('dojo:viewAny');
    }

    public function create(User $user): bool
    {
        return $user->tokenCan('dojo:create');
    }

    public function update(User $user, Dojo $dojo): bool
    {
        return $user->tokenCan('dojo:update');
    }

    public function delete(User $user, Dojo $dojo): bool
    {
        return $user->tokenCan('dojo:delete');
    }

    public function restore(User $user, Dojo $dojo): bool
    {
        return $user->tokenCan('dojo:restore');
    }

    public function forceDelete(User $user, Dojo $dojo): bool
    {
        return $user->tokenCan('dojo:forceDelete');
    }
}

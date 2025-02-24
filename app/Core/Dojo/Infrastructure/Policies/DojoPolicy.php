<?php

declare(strict_types=1);

namespace App\Core\Dojo\Infrastructure\Policies;

use App\Core\Dojo\Infrastructure\Model\Dojo;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DojoPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool {}

    public function view(User $user, Dojo $dojo): bool {}

    public function create(User $user): bool {}

    public function update(User $user, Dojo $dojo): bool {}

    public function delete(User $user, Dojo $dojo): bool {}

    public function restore(User $user, Dojo $dojo): bool {}

    public function forceDelete(User $user, Dojo $dojo): bool {}
}

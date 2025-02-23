<?php

declare(strict_types=1);

namespace App\Modules\Dojo\Infrastructure\Policies;

use App\Infrastructure\Models\User;
use App\Modules\Dojo\Infrastructure\Model\Dojo;
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

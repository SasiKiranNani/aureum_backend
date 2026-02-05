<?php

namespace App\Policies;

use App\Models\User;
use App\Models\JudgeApplication;
use Illuminate\Auth\Access\HandlesAuthorization;

class JudgeApplicationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_judge::application');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, JudgeApplication $judgeApplication): bool
    {
        return $user->can('view_judge::application');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_judge::application');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, JudgeApplication $judgeApplication): bool
    {
        return $user->can('update_judge::application');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, JudgeApplication $judgeApplication): bool
    {
        return $user->can('delete_judge::application');
    }

    /**
     * Determine whether the user can bulk delete.
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_judge::application');
    }

    /**
     * Determine whether the user can permanently delete.
     */
    public function forceDelete(User $user, JudgeApplication $judgeApplication): bool
    {
        return $user->can('force_delete_judge::application');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_judge::application');
    }

    /**
     * Determine whether the user can restore.
     */
    public function restore(User $user, JudgeApplication $judgeApplication): bool
    {
        return $user->can('restore_judge::application');
    }

    /**
     * Determine whether the user can bulk restore.
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_judge::application');
    }

    /**
     * Determine whether the user can replicate.
     */
    public function replicate(User $user, JudgeApplication $judgeApplication): bool
    {
        return $user->can('replicate_judge::application');
    }

    /**
     * Determine whether the user can reorder.
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_judge::application');
    }
}

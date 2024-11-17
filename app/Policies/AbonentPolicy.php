<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Abonent;

class AbonentPolicy
{
    /**
     * Перевірити, чи користувач може переглядати абонента.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Abonent  $abonent
     * @return bool
     */
    public function view(User $user, Abonent $abonent)
    {
        return $user->id === $abonent->creator_user_id;
    }

    /**
     * Перевірити, чи користувач може створювати абонентів.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function create(User $user)
    {
        return $user->isAuthenticated();
    }

    /**
     * Перевірити, чи користувач може редагувати абонента.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Abonent  $abonent
     * @return bool
     */
    public function update(User $user, Abonent $abonent)
    {
        return $user->role === 'editor' || $user->id === $abonent->creator_user_id;
    }

    /**
     * Перевірити, чи користувач може видаляти абонента.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Abonent  $abonent
     * @return bool
     */
    public function delete(User $user, Abonent $abonent)
    {
        return $user->role === 'superadmin' || $user->id === $abonent->creator_user_id;
    }
}

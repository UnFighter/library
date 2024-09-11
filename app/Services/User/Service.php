<?php

namespace App\Services\User;

use App\Models\User;

class Service
{
    public function store(array $data): void
    {
        User::query()->create($data);
    }

    public function update(User $user, array $data): void
    {
        $user->update($data);
    }
}

<?php

namespace App\Http\Repositories;

use App\Models\Company;
use App\Models\User;

class UserRepository
{
    public function findAll()
    {
        return User::all();
    }

    public function findById($userId)
    {
        return User::find($userId);
    }

    public function getAllUsersWithOutWorkspace()
    {
        return User::doesntHave('userWorkspace')->get();
    }

    public function create($params)
    {
        User::create($params);
    }

    public function update($user, $params)
    {
        $user->update($params);
    }

    public function addWorkCompanyToUser(User $user, Company $company)
    {
        $user->userWorkspace()->create([
            'company_id' => $company->id,
        ]);
    }
}

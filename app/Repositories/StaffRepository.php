<?php
namespace App\Repositories;

use App\Models\Staff;

class StaffRepository implements StaffRepositoryInterface
{
    public function getAllStaff()
    {
        return Staff::all();
    }

    public function findStaffById($id)
    {
        return Staff::findOrFail($id);
    }

    public function createStaff(array $data)
    {
        return Staff::create($data);
    }
}

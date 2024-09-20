<?php
namespace App\Repositories;

interface StaffRepositoryInterface
{
    public function getAllStaff();
    public function findStaffById($id);
    public function createStaff(array $data);
}

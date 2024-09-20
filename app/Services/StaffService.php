<?php

namespace App\Services;

use App\Repositories\StaffRepositoryInterface;

class StaffService
{
    protected $staffRepository;

    public function __construct(StaffRepositoryInterface $staffRepository)
    {
        $this->staffRepository = $staffRepository;
    }

    public function getAllStaff()
    {
        return $this->staffRepository->getAllStaff();
    }

    public function createStaff($name, $jobTitle)
    {
        $data = [
            'name' => $name,
            'job_title' => $jobTitle,
        ];
        return $this->staffRepository->createStaff($data);
    }
}

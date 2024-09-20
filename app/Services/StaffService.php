<?php

namespace App\Services;

use App\Repositories\StaffRepositoryInterface;
use App\Jobs\SendStaffAddedNotification;

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

        $staff = $this->staffRepository->createStaff($data);

        // SendStaffAddedNotification::dispatch($staff);
        dispatch(new SendStaffAddedNotification($staff));

        return $staff;
    }
}

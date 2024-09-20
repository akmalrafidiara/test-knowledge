<?php

namespace App\Http\Controllers;

use App\Services\StaffService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\StaffRequest;

class StaffController extends Controller
{
    protected $staffService;

    public function __construct(StaffService $staffService)
    {
        $this->staffService = $staffService;
    }

    public function index(): JsonResponse
    {
        $staff = $this->staffService->getAllStaff();
        return response()->json($staff);
    }

    public function store(StaffRequest $request): JsonResponse
    {
        $staff = $this->staffService->createStaff($request->name, $request->job_title);
        return response()->json($staff);
    }
}

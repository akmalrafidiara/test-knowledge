<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Staff;
use Illuminate\Support\Facades\Mail;

class SendStaffAddedNotification implements ShouldQueue
{
    use Queueable, Dispatchable, InteractsWithQueue, SerializesModels;

    protected $staff;

    /**
     * Create a new job instance.
     */
    public function __construct(Staff $staff)
    {
        $this->staff = $staff;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to('admin@example.com')->send(new \App\Mail\StaffAdded($this->staff));
    }
}

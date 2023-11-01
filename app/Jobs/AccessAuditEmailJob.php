<?php

namespace App\Jobs;

use App\Models\AccessAudit;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\AccessAuditEmail;
use Illuminate\Support\Facades\Mail;

class AccessAuditEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $userId;
    
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($userId)
    {
        $this->userId = $userId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $user = User::find($this->userId);
        $unauthorizedAccessCount = AccessAudit::where('nombre_usuario', $user->name)
            ->where('permitido', 0)
            ->count();

        if ($unauthorizedAccessCount >= 5) {
            // Envía un correo electrónico
            Mail::to('thekamitorres@gmail.com')->send(new AccessAuditEmail($unauthorizedAccessCount));
        }
    }
}

<?php

namespace App\Console\Commands;
use App\Models\cycleA;
use App\Models\cycleB;
use App\Models\cycleC;
use Illuminate\Console\Command;
use App\Http\Controllers\CycleAController;
use App\Http\Controllers\CycleBController;
use App\Http\Controllers\CycleCController;
use App\Http\Controllers\NotificationsController;
use App\Models\Notification;

class CheckCycles extends Command
{

    protected $signature = 'check:cycles';
    protected $description = 'Check cycles and create notifications if needed';

    protected $notificationController;

    public function __construct(NotificationsController $notificationController)
    {
        parent::__construct();
        $this->NotificationsController = $notificationController;
    }   

    public function handle()
    {
        $this->NotificationsController->checkCycles();
        $this->info('Cycles checked successfully.');
    }

}

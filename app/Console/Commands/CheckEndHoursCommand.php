<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\NotificationsController;
use App\Models\Notification;
use App\Models\Hour;
use App\Models\hourB;
use App\Models\hourc;
use App\Http\Controllers\HourController;
use App\Http\Controllers\HourBController;
use App\Http\Controllers\HourcController;

class CheckEndHoursCommand extends Command
{

    protected $signature = 'check:end_hours';
    protected $description = 'Check end hours in hour tables and create notifications if necessary';

    protected $notificationsController;

      // Initialize the NotificationsController in the constructor
      public function __construct(NotificationsController $notificationsController)
      {
          parent::__construct();
          $this->notificationsController = $notificationsController;
      }

    public function handle()
    {
        $this->notificationsController->checkEndHours();
        $this->info('End hours checked and notifications created if necessary.');
    }
}

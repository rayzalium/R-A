<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\NotificationsController;
use App\Models\Notification;
use App\Http\Controllers\DateAController;
use App\Http\Controllers\DatBAController;
use App\Http\Controllers\DateCController;
use App\Models\DateA;
use App\Models\DateB;
use App\Models\DateC;

class CheckEndDatesCommand extends Command
{
    protected $signature = 'check:end_dates';
    protected $description = 'Check end dates in date tables and create notifications if necessary';

    protected $notificationsController;

      // Initialize the NotificationsController in the constructor
      public function __construct(NotificationsController $notificationsController)
      {
          parent::__construct();
          $this->notificationsController = $notificationsController;
      }

    public function handle()
    {
        $this->notificationsController->checkEndDates();
        $this->info('End dates checked and notifications created if necessary.');
    }
}

<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('sikaflow:process-echeances', function () {
    $this->call(\App\Console\Commands\ProcessEcheances::class);
});

Schedule::command('sikaflow:process-echeances')->dailyAt('06:00');
Schedule::command('sikaflow:send-reminders')->dailyAt('08:00');

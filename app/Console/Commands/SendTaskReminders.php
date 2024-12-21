<?php

namespace App\Console\Commands;

use App\Mail\TaskReminderMail;
use App\Models\Task;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendTaskReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-task-reminders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send task reminders for upcoming deadlines.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $tasks = Task::where('due_date', now()->addDay()->toDateString())->get();

        foreach ($tasks as $task) {
            Mail::to($task->user->email)->queue(new TaskReminderMail($task));
        }

        $this->info('Task reminders sent successfully!');
    }
}

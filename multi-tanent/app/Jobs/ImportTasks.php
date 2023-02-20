<?php

namespace App\Jobs;

use App\Models\Task;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ImportTasks implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public array $tasks)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->tasks = array_map(function ($task) {
            return [
                'title' => $task['title'],
                'description' => $task['description'],
            ];
        }, $this->tasks);
        Task::insert($this->tasks);
    }
}

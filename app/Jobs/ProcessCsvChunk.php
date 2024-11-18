<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;

use Illuminate\Support\Facades\DB;

class ProcessCsvChunk implements ShouldQueue
{
    use Queueable, InteractsWithQueue;

    public $chunk;

    /**
     * Create a new job instance.
     */
    public function __construct($chunk)
    {
        $this->chunk = $chunk;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        DB::table('chunk_uploads')->insert($this->chunk);
    }
}

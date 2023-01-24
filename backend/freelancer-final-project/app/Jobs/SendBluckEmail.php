<?php

namespace App\Jobs;

use App\Mail\ProjectsFreelancersMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendBluckEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $freelancers;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($freelancers)
    {
        $this->freelancers = $freelancers;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        foreach ($this->freelancers as $freelancer) {
            if ($freelancer->profile->projects_skills->count() > 0){
                Mail::to($freelancer->email)->queue(new ProjectsFreelancersMail($freelancer));
            }
        }

    }
}

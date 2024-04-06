<?php

namespace App\Console\Commands;

use App\Mail\AlertMail;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class AlertMailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:alert-mail-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::with('donnee_professionnelle')->whereHas('donnee_professionnelle', function ($query) {
        $query->whereHas('contrat', function ($query) {
            $query->where('date_fin', '<=', now()->addMonth());
        });
    })->get();
    
        if ($users->count() >0) {
            foreach ($users as $value) {
                Mail::to($value->email)->send(new AlertMail($value));
            }
        }

        return 0;
    }
}

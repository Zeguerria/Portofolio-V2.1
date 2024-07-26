<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Task;
use Illuminate\Console\Command;

class UpdateTaskStatuses extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // protected $signature = 'app:update-task-statuses';

    /**
     * The console command description.
     *
     * @var string
     */
    // protected $description = 'Command description';
    protected $signature = 'tasks:update-status';
    protected $description = 'Mise a jour du statut on end_date';
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $now = Carbon::now('Africa/Libreville'); // Fuseau horaire du Gabon

        // Récupère les tâches dont end_date est antérieure à la date actuelle et dont le statut n'est pas "terminé" ou "reporté"
        $tasks = Task::where('end_date', '<', $now)
            ->whereIn('status', ['attente', 'cours'])
            ->update(['status' => 'reporte']);
        toast(" Les statuts des taches ont été mis à jour", 'success');

        $this->info("Les statuts des tâches ont été mis à jour.");
    }

    /**
     * Execute the console command.
     */
    // public function handle()
    // {
    //     //
    // }
}

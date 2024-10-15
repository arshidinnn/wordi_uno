<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Mode;
use App\Enums\ModeTypes;
use App\Enums\SubjectTypes;

class CreateModes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:modes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate and save modes to the database';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $subjects = SubjectTypes::getSubjects();

        foreach ($subjects as $subject) {
            $modes = ModeTypes::getModes($subject);

            $this->createModes($modes, $subject);
        }

        $this->info('Modes successfully created and saved.');
    }

    /**
     * @param array $modes
     * @param string $subject
     */
    private function createModes(array $modes, string $subject): void
    {
        foreach ($modes as $mode) {
            Mode::query()->updateOrCreate(
                ['name' => $mode],
                ['subject' => $subject]
            );
        }
    }
}

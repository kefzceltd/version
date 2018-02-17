<?php

namespace PragmaRX\Version\Package\Console\Commands;

class Absorb extends Base
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'version:absorb';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Absorb git version and/or build';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if (!$this->isInAbsorbMode()) {
            $this->error('Not in absorb mode, please edit your config file.');

            return;
        }

        app('pragmarx.version')->absorb();

        $this->info('Version was absorbed.');

        $this->displayAppVersion();
    }

    /**
     * @return bool
     */
    protected function isInAbsorbMode(): bool
    {
        return app('pragmarx.version')->isInAbsorbMode('current') ||
            app('pragmarx.version')->isInAbsorbMode('build');
    }
}

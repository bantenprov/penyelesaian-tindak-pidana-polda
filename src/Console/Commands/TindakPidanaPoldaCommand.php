<?php

namespace Bantenprov\TindakPidanaPolda\Console\Commands;

use Illuminate\Console\Command;

/**
 * The TindakPidanaPoldaCommand class.
 *
 * @package Bantenprov\TindakPidanaPolda
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class TindakPidanaPoldaCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bantenprov:tindak-pidana-polda';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Demo command for Bantenprov\TindakPidanaPolda package';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Welcome to command for Bantenprov\TindakPidanaPolda package');
    }
}

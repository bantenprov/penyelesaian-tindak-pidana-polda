<?php

/* Require */
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

/* Models */
use Bantenprov\TindakPidanaPolda\Models\Bantenprov\TindakPidanaPolda\TindakPidanaPolda;

class BantenprovTindakPidanaPoldaSeederTindakPidanaPolda extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
	public function run()
	{
        Model::unguard();

        $tindak_pidana_poldas = (object) [
            (object) [
                'label' => 'G2G',
                'description' => 'Goverment to Goverment',
            ],
            (object) [
                'label' => 'G2E',
                'description' => 'Goverment to Employee',
            ],
            (object) [
                'label' => 'G2C',
                'description' => 'Goverment to Citizen',
            ],
            (object) [
                'label' => 'G2B',
                'description' => 'Goverment to Business',
            ],
        ];

        foreach ($tindak_pidana_poldas as $tindak_pidana_polda) {
            $model = TindakPidanaPolda::updateOrCreate(
                [
                    'label' => $tindak_pidana_polda->label,
                ],
                [
                    'description' => $tindak_pidana_polda->description,
                ]
            );
            $model->save();
        }
	}
}

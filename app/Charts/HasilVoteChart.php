<?php

namespace App\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use App\Models\Kandidat;
use App\Models\Voting;

class HasilVoteChart extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        
        $kandidats = Kandidat::all();
        $labels = [];
        $votes = [];

        foreach ($kandidats as $kandidat) {
            $labels[] = $kandidat->nama;
            $votes[] = Voting::where('kandidat_id', $kandidat->id)->count();
        }

        // Set data ke chart
        $this->labels($labels);
        $this->dataset('Jumlah Suara', 'pie', $votes);
    }
}

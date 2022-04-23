<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class GenderChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        return $this->chart->pieChart()
            ->setTitle('Jenis Kelamin')
            ->addData([40, 50, 30])
            ->setLabels(['Laki-laki', 'Perempuan', 'Tidak diketahui']);
    }
}

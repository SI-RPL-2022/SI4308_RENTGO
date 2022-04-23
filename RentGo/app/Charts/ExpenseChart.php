<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class ExpenseChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        return $this->chart->pieChart()
            ->setTitle('Pengeluaran')
            ->addData([40, 50, 30])
            ->setLabels(['Iklan Instagram', 'Iklan Facebook', 'Iklan Marketplace']);
    }
}

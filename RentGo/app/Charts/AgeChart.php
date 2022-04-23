<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class AgeChart
{
    protected $chartProduct;

    public function __construct(LarapexChart $chart)
    {
        $this->chartProduct = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        return $this->chartProduct->barChart()
            ->setTitle('Usia')
            ->addData('San Francisco', [6, 9, 3, 4, 10, 8])
            ->addData('Boston', [7, 3, 8, 2, 6, 4])
            ->setXAxis(['13-17', '18-22', '23-27', '28-32']);
    }
}

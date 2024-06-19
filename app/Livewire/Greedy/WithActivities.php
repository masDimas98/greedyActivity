<?php

namespace App\Livewire\Greedy;

class WithActivities
{
    public function sortByAnggotaJumlahPenugasan(&$array)
    {
        usort($array, function ($a, $b) {
            return $a['JUMLAH'] <=> $b['JUMLAH'];
        });
    }

    public function sortBySecondElement(&$array)
    {
        usort($array, function ($a, $b) {
            return $a['tgl_selesai_for_activity'] <=> $b['tgl_selesai_for_activity'];
        });
    }

    public function Activity($arr, $n)
    {
        $selected = [];

        $this->sortBySecondElement($arr);

        $i = 0;
        array_push($selected, $arr[$i]);

        for ($j = 1; $j < $n; $j++) {
            if ($arr[$j]['tgl_mulai_for_activity'] >= $arr[$i]['tgl_selesai_for_activity']) {
                array_push($selected, $arr[$j]);
                $i = $j;
            }
        }
        return $selected;
    }
}

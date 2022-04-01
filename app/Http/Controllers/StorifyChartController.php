<?php

namespace App\Http\Controllers;

use App\Models\Story;
use App\Models\User;
use Chartisan\PHP\Chartisan;

class StorifyChartController extends Controller
{
    public function userchart()
    {
        $chartdata = Chartisan::build()

            ->labels(
                User::all()->pluck('created_at') //'pluck()' to get the desired index
                    ->map(function ($item) {
                        return date('Y-m', strtotime($item)); // 'map()' to change the date format
                    })
                    ->groupBy(function ($item) {
                        return $item; //'groupBy()' to group keys based on values i.e. group all arrays having the value of A or B or C, etc 
                    })
                    ->sortBy(function ($key) {
                        return $key;
                    }, SORT_NATURAL) //'sortBy()' to sort the keys from A to Z
                    ->keys() //'keys()' to view object according to keys
                    ->toArray() //'toArray()' to convert object to array, so that chartjs can consume the object
            )

            ->dataset(
                'User Count',
                User::all()->pluck('created_at') //'pluck()' to get the desired index
                    ->map(function ($item) {
                        return date('y-m', strtotime($item)); // 'map()' to change the date format
                    })
                    ->countBy()
                    ->values()
                    ->toArray()
            )

            ->toJSON();

        return $chartdata;
    }

    public function storychart()
    {
        $chartdata = Chartisan::build()

            ->labels(
                Story::all()->pluck('created_at') //'pluck()' to get the desired index
                    ->map(function ($item) {
                        return date('Y-m', strtotime($item)); // 'map()' to change the date format
                    })
                    ->groupBy(function ($item) {
                        return $item; //'groupBy()' to group keys based on values i.e. group all arrays having the value of A or B or C, etc 
                    })
                    ->sortBy(function ($key) {
                        return $key;
                    }, SORT_NATURAL) //'sortBy()' to sort the keys from A to Z
                    ->keys() //'keys()' to view object according to keys
                    ->toArray() //'toArray()' to convert object to array, so that chartjs can consume the object
            )

            ->dataset(
                'Story Count',
                Story::all()->pluck('created_at') //'pluck()' to get the desired index
                    ->map(function ($item) {
                        return date('y-m', strtotime($item)); // 'map()' to change the date format
                    })
                    ->countBy()
                    ->values()
                    ->toArray()
            )

            ->toJSON();

        return $chartdata;
    }
}

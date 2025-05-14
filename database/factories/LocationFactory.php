<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use App\Models\location;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Location>
 */
class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $seatCounter = 1; // Static counter for seat number
        static $levelCounter = 1; // Static counter for level

        if ($levelCounter==1 && $seatCounter > 103) {
            $seatCounter = 1;
            $levelCounter++;
        }
        elseif($levelCounter==2 && $seatCounter>189){
            $seatCounter = 1;
            $levelCounter++;
        }
        elseif($levelCounter==3 && $seatCounter>150){
            $seatCounter = 1;
            $levelCounter++;
        }
        elseif($levelCounter==4 && $seatCounter>148){
            $seatCounter = 1;
            $levelCounter++;
        }
        elseif($levelCounter==5 && $seatCounter>167){
            $seatCounter = 1;
            $levelCounter++;
        }
        elseif($levelCounter==6 && $seatCounter>89){
            $seatCounter = 1;
            $levelCounter=7.1;
        }
        elseif($levelCounter==7.1 && $seatCounter>48){
            $seatCounter = 1;
            $levelCounter=7.2;
        }
        elseif($levelCounter==7.2 && $seatCounter>64){
            $seatCounter = 1;
            $levelCounter=9;
        }
        elseif($levelCounter==9 && $seatCounter>106){
            $seatCounter = 1;
            $levelCounter=12;
        }
        elseif($levelCounter==12 && $seatCounter>107){
            $seatCounter = 1;
            $levelCounter=13;
        }
        elseif($levelCounter==13 && $seatCounter>149){
            $seatCounter = 1;
        }


        // Reset seatCounter when it exceeds 100 and increment level

        return [
            'seatid' => "{$levelCounter}-{$seatCounter}", // Format as 'level-seat'
            'level' => $levelCounter,                  // Current level
            'seat' => $seatCounter++,                  // Current seat number
        ];
    }
}

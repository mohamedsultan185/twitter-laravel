<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Str;

class tweet extends Component
{
    // public $tweet;



    // /**
    //  * Create a new component instance.
    //  *
    //  * @return void
    //  */
    // public function __construct($tweet)
    // {
    //     $this->tweet=$tweet;
    // }

    // public function excerpt($tweet,$limit = 6){
    //     return Str::limit($tweet,$limit);
    // }
    // /**
    //  * Get the view / contents that represent the component.
    //  *
    //  * @return \Illuminate\Contracts\View\View|\Closure|string
    //  */
    public function render()
    {
        return view('components.tweet');
    }
}

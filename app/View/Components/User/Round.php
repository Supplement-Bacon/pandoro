<?php

namespace App\View\Components\User;

use Illuminate\View\Component;

use App\Models\User\User;

class Round extends Component
{

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public User $user,
        public string $size,
        public bool $link = true
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.user.round');
    }
}

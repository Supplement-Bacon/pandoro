<?php

namespace App\View\Components\User;

use Illuminate\View\Component;

use App\Models\User\User;

class Editor extends Component
{

    public $action;
    public $method;
    public $isCreate;
    public $user;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        string $type,
        $user = null
    ) {
        $this->user = $user;
        switch ( $type ) {
            case 'update':
                $this->action = route('users.update', ['user' => $this->user]);
                $this->method = 'PUT';
                $this->isCreate = false;
                break;
            
            default:
                break;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.user.editor');
    }
}

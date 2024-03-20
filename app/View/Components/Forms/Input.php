<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public $id;
    public $label;
    public $type;
    public $name;
    public $value;
    public $required;
    public $placeholder;
    public $errors;

    public function __construct($id, $label, $type ,$name, $value, $required, $placeholder = null)
    {
        $this->id = $id;
        $this->label = $label;
        $this->type = $type;
        $this->name = $name;
        $this->value = $value;
        $this->required = $required;
        $this->placeholder = $placeholder;
    }

    public function render()
    {
        return view('components.forms.input');
    }
}

<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ImageUploadModal extends Component
{
    public $open;
    public $action;
    public $title;
    public $label;
    public $buttonText;

    // Constructor accepts configurable properties
    public function __construct($open = false, $action = '', $title = 'Upload Image', $label = 'Image', $buttonText = 'Upload')
    {
        $this->open = $open;
        $this->action = $action;
        $this->title = $title;
        $this->label = $label;
        $this->buttonText = $buttonText;
    }

    // Render the component
    public function render()
    {
        return view('components.image-upload-modal');
    }
}

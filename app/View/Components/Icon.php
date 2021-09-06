<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Icon extends Component
{

    public $name; //Имя файла без расширения
    public $svg; //Контент SVG файла
    public $style; //style attribute
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name = '', $style = '', $width = '', $height = '')
    {
        $this->name = $name;
        $this->svg = '';
        $this->style = $style;
        $this->width = $width;
        $this->height = $height;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $name = $this->name;
        $style = $this->style;
        $width = $this->width;
        $height = $this->height;
        if (file_exists("../resources/icons/$name.svg")) {
            $this->svg = file_get_contents("../resources/icons/$name.svg");
        } else {
            $this->svg = file_get_contents("../resources/icons/fallback.svg");
        }
        if ($style) {
            if (preg_match('/style=/', $this->svg)) {
                $this->svg = preg_replace('/style=".*?"/', 'style="' . $style . '"', $this->svg);
            } else {
                $this->svg = preg_replace('/\<svg/', '<svg style="' . $style . '"', $this->svg);
            }
        }
        if ($width) {
            if (preg_match('/ width=/', $this->svg)) {
                $this->svg = preg_replace('/ width=".*?"/', ' width="' . $width . '"', $this->svg);
            } else {
                $this->svg = preg_replace('/\<svg/', '<svg width="' . $width . '"', $this->svg);
            }
        }

        if ($height) {
            if (preg_match('/height=/', $this->svg)) {
                $this->svg = preg_replace('/height=".*?"/', 'height="' . $height . '"', $this->svg);
            } else {
                $this->svg = preg_replace('/\<svg/', '<svg height="' . $height . '"', $this->svg);
            }
        }
        return view('components.icon');
    }
}

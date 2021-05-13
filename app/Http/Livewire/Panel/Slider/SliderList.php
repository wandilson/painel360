<?php

namespace App\Http\Livewire\Panel\Slider;

use App\Models\Slider;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class SliderList extends Component
{

    public $pageTitle = "Gerenciar Sliders";
    public $pageInfo = "Nessa página você terá total acesso para editar seus sliders";


    public function delete($id)
    {
        $item = Slider::find($id);
        Storage::delete($item->filename);
        $item->delete();
        
        session()->flash('message', 'Slider deletado com sucesso!');
    }


    public function render()
    {
        $slider = Slider::paginate();
        return view('livewire.panel.slider.slider-list', compact('slider'));
    }
}

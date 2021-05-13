<?php

namespace App\Http\Livewire\Panel\Slider;

use App\Models\Slider;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class SliderCreate extends Component
{
    use WithFileUploads;
    public $title, $filename;


    public $pageTitle = "Novo Slider";
    public $pageInfo = "Nessa página você terá total acesso para cadastrar seus sliders";


    protected $rules = [
        'title'         =>  'required|min:5|unique:sliders'
    ];


    public function create()
    {
        $this->validate();

       

        $slider = Slider::create([
            'title' =>  $this->title
        ]);

        if(!is_null($this->filename)){
            
            $filename = Str::slug($this->title).'_'.rand().'.'.$this->filename->getClientOriginalExtension();
            $path = $this->filename->storeAs('slider', $filename);

            $slider->update([
                'filename' =>  $path
            ]);
        }
        
        $this->title = $this->filename = '';
        session()->flash('message', 'Slider cadastrado com sucesso!');
    }


    public function render()
    {
        return view('livewire.panel.slider.slider-create');
    }
}

<?php

namespace App\Http\Livewire\Panel\Slider;

use App\Models\Slider;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class SliderEdit extends Component
{
    use WithFileUploads;
    public $title, $filename, $filenameNew, $sliderModel;


    public $pageTitle = "Editar Slider";
    public $pageInfo = "Nessa página você terá total acesso para editar o slider";


    protected $rules = [
        'title'         =>  'required|min:5|unique:sliders'
    ];


    public function mount($id)
    {
        $this->sliderModel = Slider::find($id);
        
        $this->title        = $this->sliderModel->title;
        $this->filename     = $this->sliderModel->filename;
    }


    public function update()
    {
        if(!is_null($this->filenameNew)){
            Storage::delete($this->filename);
            $nameImage = Str::slug($this->title).'_'.rand().'.'.$this->filenameNew->getClientOriginalExtension();
            $path = $this->filenameNew->storeAs('slider', $nameImage);
           
            $this->sliderModel->update([
                'filename' =>  $path ? $path : $this->filename
            ]);
        }


        $this->sliderModel->update([
            'title' =>  $this->title
        ]);

        session()->flash('message', 'Slider atualizado com sucesso!');
    }
    
    
    public function render()
    {
        return view('livewire.panel.slider.slider-edit');
    }
}

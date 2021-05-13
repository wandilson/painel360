<?php

namespace App\Http\Livewire\Panel\Institutional;

use App\Models\Institutional;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class InstitutionalEdit extends Component
{

    use WithFileUploads;
    public $title, $filenameNew, $filename, $link_video, $description, $model;


    public $pageTitle = "Editar Institucional";
    public $pageInfo = "Nessa página você terá total acesso para atualizar o Institucional";

    
    protected $rules = [
        'title'         =>  'required|min:5|unique:institutionals'
    ];


    public function mount($id)
    {
        $this->model = Institutional::find($id);
        
        $this->title            = $this->model->title;
        $this->description      = $this->model->description;
        $this->link_video     = $this->model->link_video;
        $this->filename         = $this->model->filename;
    }


    public function update()
    {
        if(!is_null($this->filenameNew)){
            Storage::delete($this->filename);
            $nameImage = Str::slug($this->title).'_'.rand().'.'.$this->filenameNew->getClientOriginalExtension();
            $path = $this->filenameNew->storeAs('institucional', $nameImage);
           
            $this->model->update([
                'filename' =>  $path ? $path : $this->filename
            ]);
        }


        $this->model->update([
            'title' =>  $this->title,
            'link_video' =>  $this->link_video,
            'description' =>  $this->description
        ]);

        session()->flash('message', 'Institucional atualizado com sucesso!');

    }


    public function render()
    {
        return view('livewire.panel.institutional.institutional-edit');
    }
}

<?php

namespace App\Http\Livewire\Panel\Institutional;

use App\Models\Institutional;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class InstitutionalCreate extends Component
{
    use WithFileUploads;
    public $title, $filename, $link_video, $description;


    public $pageTitle = "Novo Institucional";
    public $pageInfo = "Nessa página você terá total acesso para criar o Institucional";


    protected $rules = [
        'title'         =>  'required|min:5|unique:institutionals',
        'description'   =>  'required|min:5'
    ];

    public function create()
    {
        $this->validate();
       
        $inst = Institutional::create([
            'title' =>  $this->title,
            'link_video' =>  $this->link_video,
            'description' =>  $this->description
        ]);

        if(!is_null($this->filename)){
            
            $filename = Str::slug($this->title).'_'.rand().'.'.$this->filename->getClientOriginalExtension();
            $path = $this->filename->storeAs('institucional', $filename);

            $inst->update([
                'filename' =>  $path
            ]);
        }
        
        $this->title = $this->filename = '';
        session()->flash('message', 'Institucional cadastrado com sucesso!');
    }

    public function render()
    {
        return view('livewire.panel.institutional.institutional-create');
    }
}

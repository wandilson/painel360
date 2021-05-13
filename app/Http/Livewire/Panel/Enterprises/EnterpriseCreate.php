<?php

namespace App\Http\Livewire\Panel\Enterprises;

use App\Models\Enterprises;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class EnterpriseCreate extends Component
{
    use WithFileUploads;
    public $filename, $filelogo, $title_project, $link_video, $iframe_googlemaps, $description;

    public $pageTitle = "Novo Empreendimento";
    public $pageInfo = "Nessa página você terá total acesso para cadastrar seu Empreendimento";

    protected $rules = [
        'title_project' =>  'required|min:5|unique:enterprises',
        'description'   =>  'required|min:5'
    ];

    public function create()
    {
        $this->validate();
       
        $inst = Enterprises::create([
            'title_project' =>  $this->title_project,
            'slug'  =>  Str::slug($this->title_project),
            'link_video' =>  $this->link_video,
            'googlemaps' =>  $this->iframe_googlemaps,            
            'description' =>  $this->description
        ]);

        if(!is_null($this->filename)){
            
            $filename = Str::slug($this->title_project).'_imgCapa_'.rand().'.'.$this->filename->getClientOriginalExtension();
            $path = $this->filename->storeAs('enterprises', $filename);

            $inst->update([
                'filename' =>  $path
            ]);
        }

        if(!is_null($this->filelogo)){
            
            $filelogo = Str::slug($this->title_project).'_logo_'.rand().'.'.$this->filelogo->getClientOriginalExtension();
            $pathLogo = $this->filelogo->storeAs('enterprises', $filelogo);

            $inst->update([
                'logo' =>  $pathLogo
            ]);
        }
        
        $this->filename = $this->filelogo = $this->title_project = $this->link_video = $this->iframe_googlemaps = $this->description = '';
        session()->flash('message' , 'Institucional cadastrado com sucesso!');
    }

    public function render()
    {
        return view('livewire.panel.enterprises.enterprise-create');
    }
}

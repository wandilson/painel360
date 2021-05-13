<?php

namespace App\Http\Livewire\Panel\Enterprises;

use App\Models\Enterprises;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class EnterpriseEdit extends Component
{

    use WithFileUploads;
    public $filename, $filenameNew, $filelogo, $filelogoNew, $title_project, $link_video, $iframe_googlemaps, $description, $slugcheckbox, $slug, $model;


    public $pageTitle = "Editar Empreendimento";
    public $pageInfo = "Nessa página você terá total acesso para atualizar o Empreendimento";

    
    protected $rules = [
        'title'         =>  'required|min:5',
        'description'   =>  'required|min:5'
    ];


    public function mount($id)
    {
        $this->model = Enterprises::find($id);
        
        $this->title_project            = $this->model->title_project;
        $this->slug                     = $this->model->slug;
        $this->description              = $this->model->description;
        $this->link_video               = $this->model->link_video;
        $this->iframe_googlemaps        = $this->model->googlemaps;
        $this->filename                 = $this->model->filename;
        $this->filelogo                 = $this->model->logo;
    }


    public function update()
    {
        if(!is_null($this->filenameNew)){
            Storage::delete($this->filename);
            $nameImage = Str::slug($this->title_project).'_imgCapa_'.rand().'.'.$this->filenameNew->getClientOriginalExtension();
            $path = $this->filenameNew->storeAs('enterprises', $nameImage);
           
            $this->model->update([
                'filename' =>  $path ? $path : $this->filename
            ]);
        }

        if(!is_null($this->filelogoNew)){
            Storage::delete($this->filelogo);
            $nameImage = Str::slug($this->title_project).'_logo_'.rand().'.'.$this->filelogoNew->getClientOriginalExtension();
            $path = $this->filelogoNew->storeAs('enterprises', $nameImage);
           
            $this->model->update([
                'logo' =>  $path ? $path : $this->filelogo
            ]);
        }


        if($this->slugcheckbox == true) {
            $this->model->update([
                'slug'  =>  Str::slug($this->title_project, '-')
            ]);
        }



        $this->model->update([
            'title_project'           => $this->title_project,
            'description'             => $this->description,
            'link_video'              => $this->link_video,
            'googlemaps'              => $this->iframe_googlemaps
        ]);

        $this->mount($this->model->id);
        session()->flash('message', 'Empreendimento atualizado com sucesso!');

    }


    public function render()
    {
        return view('livewire.panel.enterprises.enterprise-edit');
    }
}

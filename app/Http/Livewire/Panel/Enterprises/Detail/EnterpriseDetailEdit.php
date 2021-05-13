<?php

namespace App\Http\Livewire\Panel\Enterprises\Detail;

use App\Models\EnterpriseDetail;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class EnterpriseDetailEdit extends Component
{
    use WithFileUploads;
    public $id_empreendimento, $filename, $filenameNew, $title_project, $description, $model;


    public $pageTitle = "Editar Detalhe do Empreendimento";
    public $pageInfo = "Nessa página você terá total acesso para atualizar o Empreendimento";

    
    protected $rules = [
        'title'         =>  'required|min:5',
        'description'   =>  'required|min:5'
    ];


    public function mount($id_empreendimento, $id_detail)
    {
        $this->model = EnterpriseDetail::find($id_detail);
        $this->id_empreendimento = $id_empreendimento;
        
        $this->title_project            = $this->model->title;
        $this->description              = $this->model->description;
        $this->filename                 = $this->model->filename;
    }


    public function update()
    {
        if(!is_null($this->filenameNew)){
            Storage::delete($this->filename);
            $nameImage = Str::slug($this->title_project).'_imgDetail_'.rand().'.'.$this->filenameNew->getClientOriginalExtension();
            $path = $this->filenameNew->storeAs('enterprises_detail', $nameImage);
           
            $this->model->update([
                'filename' =>  $path ? $path : $this->filename
            ]);
        }


        $this->model->update([
            'title'           => $this->title_project,
            'description'             => $this->description,
        ]);

        $this->mount($this->model->enterprise_id, $this->model->id);
        session()->flash('message', 'Empreendimento atualizado com sucesso!');

    }

    public function render()
    {
        return view('livewire.panel.enterprises.detail.enterprise-detail-edit');
    }
}

<?php

namespace App\Http\Livewire\Panel\Enterprises\Detail;

use App\Models\EnterpriseDetail;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class EnterpriseDetailCreate extends Component
{
    use WithFileUploads;
    public $filename, $title_project, $description, $id_empreendimento;

    
    public $pageTitle = "Gerenciar Empreendimentos";
    public $pageInfo = "Nessa página você terá total acesso para editar seus Empreendimentos";


    public function mount($id_empreendimento)
    {
        $this->id_empreendimento = $id_empreendimento;
    }


    protected $rules = [
        'title_project' =>  'required|min:5',
        'description'   =>  'required|min:5'
    ];

    public function create()
    {
        $this->validate();
       
        $inst = EnterpriseDetail::create([
            'enterprise_id' => $this->id_empreendimento,
            'title' =>  $this->title_project,           
            'description' =>  $this->description
        ]);

        if(!is_null($this->filename)){
            
            $filename = Str::slug($this->title_project).'_imgDetail_'.rand().'.'.$this->filename->getClientOriginalExtension();
            $path = $this->filename->storeAs('enterprises_detail', $filename);

            $inst->update([
                'filename' =>  $path
            ]);
        }
        
        $this->filename = $this->title_project = $this->description = '';
        session()->flash('message' , 'Detalhe cadastrado com sucesso!');
    }


    public function render()
    {
        return view('livewire.panel.enterprises.detail.enterprise-detail-create');
    }
}

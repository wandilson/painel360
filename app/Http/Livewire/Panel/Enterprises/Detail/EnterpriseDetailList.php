<?php

namespace App\Http\Livewire\Panel\Enterprises\Detail;

use App\Models\EnterpriseDetail;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class EnterpriseDetailList extends Component
{
    public $id_empreendimento;

    public $pageTitle = "Gerenciar Detalhes do Empreendimento";
    public $pageInfo = "Nessa página você terá total acesso para gerenciar detalhes";


    public function mount($id_empreendimento)
    {
        $this->id_empreendimento = $id_empreendimento;
    }


    public function delete($id)
    {
        $item = EnterpriseDetail::find($id);
        Storage::delete($item->filename);
        $item->delete();
        
        session()->flash('message', 'Detalhe do empreendimento deletado com sucesso!');
    }

    public function render()
    {
        $EnterpriseDetail = EnterpriseDetail::all();
        return view('livewire.panel.enterprises.detail.enterprise-detail', compact('EnterpriseDetail'));
    }
}

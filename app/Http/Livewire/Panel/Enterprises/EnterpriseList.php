<?php

namespace App\Http\Livewire\Panel\Enterprises;

use App\Models\Enterprises;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class EnterpriseList extends Component
{
    public $pageTitle = "Gerenciar Empreendimentos";
    public $pageInfo = "Nessa página você terá total acesso para editar seus Empreendimentos";

    public function delete($id)
    {
        $item = Enterprises::find($id);
        Storage::delete($item->filename);
        Storage::delete($item->logo);
        $item->delete();
        
        session()->flash('message', 'Empreendimento deletado com sucesso!');
    }

    public function render()
    {
        $enterprises = Enterprises::all();
        return view('livewire.panel.enterprises.enterprise-list', compact('enterprises'));
    }
}

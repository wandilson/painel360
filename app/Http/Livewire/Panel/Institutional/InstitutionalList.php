<?php

namespace App\Http\Livewire\Panel\Institutional;

use App\Models\Institutional;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class InstitutionalList extends Component
{
    public $pageTitle = "Gerenciar Institucional";
    public $pageInfo = "Nessa página você terá total acesso para editar seu conteúdo Institucional";


    public function delete($id)
    {
        $item = Institutional::find($id);
        Storage::delete($item->filename);
        $item->delete();
        
        session()->flash('message', 'Institucional deletado com sucesso!');
    }


    public function render()
    {
        $institutional = Institutional::get();
        return view('livewire.panel.institutional.institutional-list', compact('institutional'));
    }
}

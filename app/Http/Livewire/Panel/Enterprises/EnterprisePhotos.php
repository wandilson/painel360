<?php

namespace App\Http\Livewire\Panel\Enterprises;

use App\Models\EnterprisePhoto;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EnterprisePhotos extends Component
{
    use WithFileUploads;
    public $photos = [];
    public $idEnterprise;

    public $pageTitle = "Gerenciar Imagens do Empreendimento";
    public $pageInfo = "Nessa página você terá total acesso para editar Imagens";


    public function mount($id)
    {
        $this->idEnterprise = $id;
    }
    

    public function removeImg($index)
    {
        //dd($this->photos, $index);
        array_splice($this->photos, $index, 1);
    }


    public function save()
    {
         $this->validate([
            'photos.*' => 'image|max:3072', // 2MB Max
        ]);

        foreach ($this->photos as $photo) {
            //$photo->store('images');
            $path = $photo->store('enterprise_images');

            EnterprisePhoto::create([
                'filename' =>  $path,
                'enterprise_id'  =>  $this->idEnterprise
            ]);

        }

        $this->photos = [];
        session()->flash('messagem', 'Imagens adicionadas com sucesso!');
    }


    public function deleteImagem($id)
    {
        $item = EnterprisePhoto::find($id);
        Storage::delete($item->filename);
        $item->delete();
        
        session()->flash('messagemDel', 'Imagem Removida com sucesso!');
    }


    public function render()
    {
        $enterprise_imagens = EnterprisePhoto::where('enterprise_id', $this->idEnterprise)->get();
        return view('livewire.panel.enterprises.enterprise-photos', compact('enterprise_imagens'));
    }
}

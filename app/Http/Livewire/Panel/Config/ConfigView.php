<?php

namespace App\Http\Livewire\Panel\Config;

use App\Models\Config;
use Livewire\Component;

class ConfigView extends Component
{
    public $pageTitle = "Gerenciar de Configurações Comuns";
    public $pageInfo = "Nessa página você terá total acesso para editar as config";


    public $title_project, $link_facebook, $link_instagram, $link_youtube, $link_linkedin, $link_whatsapp, $iframe_googlemaps, $phone_fixo, $phone_cell, $address, $config;

    public function mount()
    {
        $this->config = Config::get()->first();

        $this->title_project = $this->config->title_project;
        $this->link_facebook = $this->config->link_facebook;
        $this->link_instagram = $this->config->link_instagram;
        $this->link_youtube = $this->config->link_youtube;
        $this->link_linkedin = $this->config->link_linkedin;
        $this->link_whatsapp = $this->config->link_whatsapp;
        $this->iframe_googlemaps = $this->config->iframe_googlemaps;
        $this->phone_fixo = $this->config->phone_fixo;
        $this->phone_cell = $this->config->phone_cell;
        $this->address = $this->config->address;
    }


    public function update()
    {
        $this->config->update([
            'title_project' => $this->title_project,
            'link_facebook' => $this->link_facebook,
            'link_instagram' => $this->link_instagram,
            'link_youtube' => $this->link_youtube,
            'link_linkedin' => $this->link_linkedin,
            'link_whatsapp' => $this->link_whatsapp,
            'iframe_googlemaps' => $this->iframe_googlemaps,
            'phone_fixo' => $this->phone_fixo,
            'phone_cell' => $this->phone_cell,
            'address' => $this->address,
        ]);

        session()->flash('message', 'Configurações atualizadas com sucesso!');
    }

    public function render()
    {
        return view('livewire.panel.config.config-view');
    }
}

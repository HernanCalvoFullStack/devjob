<?php

namespace App\Livewire;

use App\Models\Vacante;
use App\Notifications\NuevoCandidato;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{

    use WithFileUploads;

    public $cv;
    public $vacante;

    protected $rules = [
        "cv" => "required|mimes:pdf"
    ];

    public function mount(Vacante $vacante)
    {
        $this->vacante = $vacante;
    }

    public function postularme()
    {
        $datos = $this->validate();

        // Almacenar el CV en la BBDD
        $cv = $this->cv->store("public/cv");
        $datos["cv"] = str_replace("public/cv/", "", $cv);

        // Crear el candidato a la Vacante
        $this->vacante->candidatos()->create([
            "user_id" => Auth::user()->id,
            "cv" => $datos["cv"],
        ]);

        // Crear una Notificación y enviar el Email
        $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id, $this->vacante->titulo, Auth::user()->id));

        // Mostrar al usuario un mensaje de que todo se envió correctamente
        session()->flash("mensaje", "CV enviado correctamente, nos contactaremos luego de analizar tu CV");

        return redirect()->back();


    }

    public function render()
    {
        return view('livewire.postular-vacante');
    }
}

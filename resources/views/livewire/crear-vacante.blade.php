<form wire:submit.prevent='crearVacante' class="md:w-1/2 space-y-5">
    <div>
        <x-input-label for="titulo" :value="__('Título Vacante')" />
        
        <x-text-input 
            id="titulo" 
            class="block mt-1 w-full" 
            type="text" 
            wire:model.live="titulo" 
            :value="old('titulo')"
            placeholder="Título Vacante"
        />
        
        <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="salario" :value="__('Salario Mensual')" />
        
        <select 
            wire:model.live="salario" 
            id="salario" 
            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full"
        >
            <option value="">-- Seleccione --</option>
            @foreach ($salarios as $salario)
                <option value="{{ $salario->id }}">{{$salario->salario}}</option>
            @endforeach
        </select>
        
        <x-input-error :messages="$errors->get('salario')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="categoria" :value="__('Categoría')" />
        
        <select 
            wire:model.live="categoria" 
            id="categoria" 
            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full"
        >
            <option value="">-- Seleccione --</option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{$categoria->categoria}}</option>
            @endforeach
        </select>
        
        <x-input-error :messages="$errors->get('categoria')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="empresa" :value="__('Empresa')" />
        
        <x-text-input 
            id="empresa" 
            class="block mt-1 w-full" 
            type="text" 
            wire:model.live="empresa" 
            :value="old('empresa')"
            placeholder="Empresa: ej. Uber, Netflix, Shopify"
        />
        
        <x-input-error :messages="$errors->get('empresa')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="ultimo_dia" :value="__('Último día para Postularse')" />
        
        <x-text-input 
            id="ultimo_dia" 
            class="block mt-1 w-full" 
            type="date" 
            wire:model.live="ultimo_dia" 
            :value="old('ultimo_dia')"
        />
        
        <x-input-error :messages="$errors->get('ultimo_dia')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="descripcion" :value="__('Descripción del Puesto')" />
        
        <textarea 
            wire:model.live="descripcion" 
            id="descripcion" 
            placeholder="Descripción General del Puesto, Experiencia..."
            class="block mt-1 w-full h-72" 
        ></textarea>
        
        <x-input-error :messages="$errors->get('ultimo_dia')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="imagen" :value="__('Imagen')" />
        
        <x-text-input 
            id="imagen" 
            class="block mt-1 w-full" 
            type="file" 
            wire:model.live="imagen" 
            accept="image/*"
        />

        <div class="my-5 w-80">
            @if($imagen)
                Imagen:
                <img src="{{ $imagen->temporaryUrl() }}" alt="Imagen Puesto">
            @endif
        </div>
        
        <x-input-error :messages="$errors->get('imagen')" class="mt-2" />
    </div>

    <x-primary-button>Crear Vacante</x-primary-button>
</form>
<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            wire:model="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-jet-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-jet-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Username') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- Nombre -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="nombres" value="{{ __('Nombre') }}" />
            <x-jet-input id="nombres" type="text" class="mt-1 block w-full" wire:model.defer="state.nombres" />
            <x-jet-input-error for="nombres" class="mt-2" />
        </div>
        <!-- Apellidos -->
        <div class="col-span-6 sm:col-span-4">
          <x-jet-label for="apellidos" value="{{ __('Apellidos') }}" />
          <x-jet-input id="apellidos" type="text" class="mt-1 block w-full" wire:model.defer="state.apellidos" />
          <x-jet-input-error for="apellidos" class="mt-2" />
      </div>
      <!-- Tipo de identificación -->
      <div class="col-span-6 sm:col-span-4">
        <x-jet-label for="tipo_identificacion_id" value="{{ __('Tipo de identificación') }}" />
        @php
            $tipos = App\Models\TipoIdentificacion::all()
        @endphp
        <select id="gender"  class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" wire:model.defer="state.tipo_identificacion_id" >
        <option >Seleccionar...</option>
        @foreach ($tipos as $item)
        <option value="{{$item->id}}" >
          {{ $item->nombre }}
        </option>
        @endforeach

      </select>
        <x-jet-input-error for="tipo_identificacion_id" class="mt-2" />
    </div>
      <!-- Identificación -->
      <div class="col-span-6 sm:col-span-4">
        <x-jet-label for="identificacion" value="{{ __('Identificación') }}" />
        <x-jet-input id="identificacion" type="text" class="mt-1 block w-full" wire:model.defer="state.identificacion" />
        <x-jet-input-error for="identificacion" class="mt-2" />
    </div>
        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
          <x-jet-label for="email" value="{{ __('Email') }}" />
          <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
          <x-jet-input-error for="email" class="mt-2" />
      </div>
      <!-- Telefono -->
      <div class="col-span-6 sm:col-span-4">
        <x-jet-label for="telefono" value="{{ __('Telefono') }}" />
        <x-jet-input id="telefono" type="text" class="mt-1 block w-full" wire:model.defer="state.telefono" />
        <x-jet-input-error for="telefono" class="mt-2" />
    </div>
    <!-- Dirección -->
    <div class="col-span-6 sm:col-span-4">
      <x-jet-label for="direccion" value="{{ __('Dirección') }}" />
      <x-jet-input id="direccion" type="text" class="mt-1 block w-full" wire:model.defer="state.direccion" />
      <x-jet-input-error for="direccion" class="mt-2" />
  </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>

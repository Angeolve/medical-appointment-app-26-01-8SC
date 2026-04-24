<x-admin-layout title="Pacientes" :breadcrumbs="[
  [
    'name' => 'Dashboard',
    'href' => route('admin.dashboard'),
  ],
  [
    'name' => 'Pacientes',
    'href' => route('admin.patients.index'),
  ],
  [
    'name' => 'Editar',
  ],
]">

<form action="{{ route('admin.patients.update', $patient) }}" method="POST">
  @csrf
  @method('PUT')

  {{-- Encabezado --}}
  <x-wire-card class="mb-8">
    <div class="flex items-center w-full">
      <div class="flex items-center">
        <img src="{{ $patient->user->profile_photo_url }}" alt="{{ $patient->user->name }}"
             class="h-20 w-20 rounded-full object-cover object-center">
        <div>
          <p class="text-2xl font-bold text-gray-900 ml-4">
            {{ $patient->user->name }}
          </p>
        </div>
      </div>

      <div class="flex space-x-3 ml-auto">
        <x-wire-button outline gray href="{{ route('admin.patients.index') }}">
          Volver
        </x-wire-button>

        <x-wire-button type="submit">
          <i class="fa-solid fa-check"></i>
          Guardar cambios
        </x-wire-button>
      </div>
    </div>
  </x-wire-card>

  {{-- Tabs --}}
  <x-wire-card>
    <div x-data="{ tab: 'datos-personales' }">

      {{-- Menú --}}
      <div class="border-b border-gray-200">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500">

          <li class="me-2">
            <a href="#" x-on:click="tab = 'datos-personales'"
               :class="{
                 'text-blue-600 border-blue-600 active': tab == 'datos-personales',
                 'border-transparent hover:text-blue-600 hover:border-gray-300': tab !== 'datos-personales'
               }"
               class="inline-flex items-center justify-center p-4 border-b-2 rounded-t-lg group">
              <i class="fa-solid fa-user me-2"></i>
              Datos personales
            </a>
          </li>

          <li class="me-2">
            <a href="#" x-on:click="tab = 'antecedentes'"
               :class="{
                 'text-blue-600 border-blue-600 active': tab == 'antecedentes',
                 'border-transparent hover:text-blue-600 hover:border-gray-300': tab !== 'antecedentes'
               }"
               class="inline-flex items-center justify-center p-4 border-b-2 rounded-t-lg group">
              <i class="fa-solid fa-file-lines me-2"></i>
              Antecedentes
            </a>
          </li>

          <li class="me-2">
            <a href="#" x-on:click="tab = 'informacion-general'"
               :class="{
                 'text-blue-600 border-blue-600 active': tab == 'informacion-general',
                 'border-transparent hover:text-blue-600 hover:border-gray-300': tab !== 'informacion-general'
               }"
               class="inline-flex items-center justify-center p-4 border-b-2 rounded-t-lg group">
              <i class="fa-solid fa-info me-2"></i>
              Información general
            </a>
          </li>

          <li class="me-2">
            <a href="#" x-on:click="tab = 'contacto-emergencia'"
               :class="{
                 'text-blue-600 border-blue-600 active': tab == 'contacto-emergencia',
                 'border-transparent hover:text-blue-600 hover:border-gray-300': tab !== 'contacto-emergencia'
               }"
               class="inline-flex items-center justify-center p-4 border-b-2 rounded-t-lg group">
              <i class="fa-solid fa-heart me-2"></i>
              Contacto de emergencia
            </a>
          </li>

        </ul>
      </div>

      {{-- CONTENIDO --}}
      <div class="px-4 mt-4">

        {{-- TAB: Datos personales --}}
        <div x-show="tab === 'datos-personales'" style="display: none;">

  <div class="bg-blue-50 border-l-4 border-blue-500 p-4 mb-6 rounded-r-lg shadow-sm">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

      <div class="flex items-start">
        <i class="fa-solid fa-user-gear text-blue-500 text-xl mt-1"></i>

        <div class="ml-3">
          <h3 class="text-sm font-bold text-blue-800">
            Edición cuenta de usuario
          </h3>

          <p class="text-sm text-blue-600">
            La <strong>información de acceso</strong> (Nombre, Email y contraseña) debe gestionarse desde la cuenta de usuario asociada.
          </p>
        </div>
      </div>

      <x-wire-button primary sm
        href="{{ route('admin.users.edit', $patient->user) }}"
        target="_blank">

        Editar usuario
        <i class="fa-solid fa-arrow-up-right-from-square ms-2"></i>
      </x-wire-button>

    </div>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div>
      <span class="text-gray-500 font-semibold">Teléfono: </span>
      <span class="text-gray-500 text-sm ml-1">{{ $patient->user->phone }}</span>
    </div>

    <div>
      <span class="text-gray-500 font-semibold">Email: </span>
      <span class="text-gray-500 text-sm ml-1">{{ $patient->user->email }}</span>
    </div>

    <div>
      <span class="text-gray-500 font-semibold">Dirección: </span>
      <span class="text-gray-500 text-sm ml-1">{{ $patient->user->address }}</span>
    </div>
  </div>

</div>

        {{-- TAB: Antecedentes --}}
        <div x-show="tab === 'antecedentes'" style="display: none;">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <x-wire-textarea label="Alergias conocidas" name="allergies">
              {{ old('allergies', $patient->allergies) }}
            </x-wire-textarea>

            <x-wire-textarea label="Enfermedades crónicas" name="chronic_conditions">
              {{ old('chronic_conditions', $patient->chronic_conditions) }}
            </x-wire-textarea>

            <x-wire-textarea label="Antecedentes quirúrgicos" name="surgical_history">
              {{ old('surgical_history', $patient->surgical_history) }}
            </x-wire-textarea>

            <x-wire-textarea label="Antecedentes familiares" name="family_history">
              {{ old('family_history', $patient->family_history) }}
            </x-wire-textarea>

          </div>
        </div>

        {{-- TAB: Información general --}}
        <div x-show="tab === 'informacion-general'" style="display: none;">
          <div class="grid lg:grid-cols gap-4">

            <x-wire-native-select label="Tipo de Sangre" class="mb-4" name="blood_type">
              <option value="">Selecciona tipo de sangre</option>
              @foreach ($bloodTypes as $bloodType)
                <option value="{{ $bloodType->id }}" @selected(old('blood_type', $patient->blood_type_id) == $bloodType->id)>
                  {{ $bloodType->name }}
                </option>
              @endforeach
            </x-wire-native-select>

            <x-wire-textarea label="Observaciones" name="observations">
              {{ old('observations', $patient->observations) }}
            </x-wire-textarea>

          </div>
        </div>

        {{-- TAB: Contacto de emergencia --}}
        <div x-show="tab === 'contacto-emergencia'" style="display: none;">
          <div class="space-y-4">

            <x-wire-input 
              label="Nombre de contacto de emergencia" 
              name="emergency_contact_name" 
              value="{{ old('emergency_contact_name', $patient->emergency_contact_name) }}">
            </x-wire-input>

           <x-wire-phone 
              label="Teléfono de contacto de emergencia" 
              name="emergency_contact_phone"
              mask="(###) ###-####"
              placeholder="(123) 456-7890"
              value="{{ old('emergency_contact_phone', $patient->emergency_contact_phone) }}">
            </x-wire-phone>

            <x-wire-input 
              label="Relación con contacto de emergencia" 
              name="emergency_contact_relationship"  placeholder="Familiar, Amigo , etc."
              value="{{ old('emergency_contact_relationship', $patient->emergency_contact_relationship) }}">
            </x-wire-input>

          </div>
        </div>

      </div> 

    </div>
  </x-wire-card>

</form>

</x-admin-layout>
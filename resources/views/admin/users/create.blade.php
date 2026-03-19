<x-admin-layout title="Usuarios" :breadcrumbs="[
  [
    'name' => 'Dashboard',
    'href' => route('admin.dashboard'),
  ],
  [
    'name' => 'Usuarios',
    'href' => route('admin.users.index'),
  ],
  [
    'name' => 'Crear',
  ],
    
]">


<x-wire-card>
  <x-validation-errors class="mb-4"/>
  <form action="{{ route('admin.users.store') }}" method="POST">
    @csrf
  <div class="space-y-4"> 
    <div class="grid md:grid-cols-2 gap-4">
   <x-wire-input label="Nombre" name="name" placeholder="Nombre completo"  riquired:value=" old('name')"> </x-wire-input>

   <x-wire-input label="Correo electrónico" name="email" type="email" placeholder="ejemplo@gmail.com" riquired autocomplete="email" :value=" old('name')"> </x-wire-input>

   <x-wire-input label="Contraseña" type="password" name="password" placeholder="Mínimo 8 caracteres" required autocomplete="new-password"> </x-wire-input>

   <x-wire-input label="Confirmar Contraseña" type="password" name="password_confirmation" placeholder="Repita la contraseña"  required autocomplete="new-password"> </x-wire-input>

   <x-wire-input label="Número de ID" name="id_number" placeholder="Ej. 123456789"  riquired inputmode="off" :value=" old('phone')" autocomplete="numeric"> </x-wire-input>

    <x-wire-input label="Télefono" name="phone" placeholder="Ej. 999-999-9999"  riquired inputmode="tel" :value=" old('phone')" autocomplete="tel"> </x-wire-input>


    </div>
  
    <x-wire-input name="address" label="Dirección" required :value="old('address')" placeholder="Ej. Clalle 90 232" autocomplete="street-address"></x-wire-input>

    <div class="space-y-1">
      <x-wire-native-select name="role_id" label="Rol" required >
        <option value="">
          Seleccione un rol
        </option>
     
      @foreach ($roles as $role)
      <option value="{{ $role->id}}" @selected(old('role_id') ==$role ->id)>{{ $role->name }}</option> ></option>
          
      @endforeach
      </x-wire-native-select>
      <p class="text-sm text-grey-500">
        Define lospermiso y acceso del usuario.
      </p>
    </div>

    <div class="flex justify-end">
      <x-wire-button type="submit" blue>
         <i class="fa-solid fa-floppy-disk"></i>
           Guardar
    </x-wire-button>
    </div>
  </div>

  </form>
</x-wire-card>

</x-admin-layout>
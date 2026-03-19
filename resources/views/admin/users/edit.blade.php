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
  <form action="{{ route('admin.users.update', $user) }}" method="POST">
    @csrf
    @method('PUT')
  <div class="space-y-4"> 
    <div class="grid md:grid-cols-2 gap-4">
   <x-wire-input label="Nombre" name="name" placeholder="Nombre completo"  riquired:value=" old('name', $user->name)"> </x-wire-input>

   <x-wire-input label="Correo electrónico" name="email" type="email" placeholder="ejemplo@gmail.com" 
    autocomplete="email" :value=" old('email',$user->email)"> </x-wire-input>

   <x-wire-input label="Contraseña" type="password" name="password" placeholder="Mínimo 8 caracteres" autocomplete="new-password"> </x-wire-input>

   <x-wire-input label="Confirmar Contraseña" type="password" name="password_confirmation" placeholder="Repita la contraseña" autocomplete="new-password"> </x-wire-input>

   <x-wire-input label="Número de ID" name="id_number" placeholder="Ej. 123456789"  riquired inputmode="off" :value=" old('id_number', $user->id_number)" autocomplete="numeric"> </x-wire-input>

    <x-wire-input label="Télefono" name="phone" placeholder="Ej. 999-999-9999"  riquired inputmode="tel" :value=" old('phone', $user->phone)" autocomplete="tel"> </x-wire-input>


    </div>
  
    <x-wire-input name="address" label="Dirección" required :value="old('address')" placeholder="Ej. Clalle 90 232" autocomplete="street-address"></x-wire-input>

    <div class="space-y-1">
      <x-wire-native-select name="role_id" label="Rol" required >
        <option value="">
          Seleccione un rol
        </option>
     
      @foreach ($roles as $role)
      <option value="{{ $role->id}}" @selected(old('role_id', $user->roles->first()->id) ==$role ->id)>{{ $role->name }}</option> ></option>
          
      @endforeach
      </x-wire-native-select>
      <p class="text-sm text-grey-500">
        Define lospermiso y acceso del usuario.
      </p>
    </div>

    <div class="flex justify-end">
      <x-wire-button type="submit" blue>
         <i class="fa-solid fa-floppy-disk"></i>
           Actualizar
    </x-wire-button>
    </div>
  </div>

  </form>
</x-wire-card>

</x-admin-layout>
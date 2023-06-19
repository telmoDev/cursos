<x-guest-layout>
  <div x-data="{open: true}" class="flex ">
    <x-admin-menu/>
    <div class="h-screen w-full p-14">
      {{ $slot }}
    </div>
  </div>


</x-guest-layout>

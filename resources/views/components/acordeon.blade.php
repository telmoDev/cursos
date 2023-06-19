
<div class="shadow p-2 mt-5 hover:border-2 hover:border-[#6b2b83]" x-data="{ open: false }">
  <label class="flex justify-center items-center text-white py-3 text-sm font-bold bg-[#6b2b83] rounded-lg text-center " @click="open = ! open">{{ $tipo }} #{{ $numero }} <span x-show="open" class="ml-4">@include('livewire.cursos._icons.arrow_up')</span><span x-show="!open" class="ml-4">@include('livewire.cursos._icons.arrow_down')</span></label>
  <div x-show="open">
    {{ $slot }}
  </div>
</div>

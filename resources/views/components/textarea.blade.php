@props([
    'label' => '',
    'error' => '',
])

<div class="box-entrada px-2 w-full mt-2">
    <label class="block text-gray-700 text-sm font-bold mt-2" >
        {{ $label }}
    </label>
    <textarea type="text"
        class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 w-full block  rounded-md sm:text-sm border-gray-300"
        {!! $attributes !!}></textarea>
    @error($error)
        <div class="text-red-600 text-sm">{{ $message }}</div>
    @enderror
</div>

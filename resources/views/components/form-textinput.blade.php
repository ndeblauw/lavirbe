@props([
    'label',
    'name',
    'placeholder' => '',
    'value' => ''
])

<div>
    <label for="{{$name}}" class="block mb-1">{{$label}}</label>
    <input class="w-full border-2 border-black p-3 bg-white" type="text" name="{{$name}}" placeholder="{{$placeholder}}" value="{{old($name,$value)}}">
    @error($name) <div class="text-red-600 text-base mt-1"> {{ $message }} </div> @enderror
</div>

@props([
    'label',
    'name',
    'placeholder' => '',
    'value' => '',
    'rows' => 10,
    'cols' => 30,
])

<div>
    <label for="{{$name}}" class="block mb-1">{{$label}}</label>
    <textarea class="w-full border-2 border-black p-3 bg-white" name="{{$name}}" id="{{$name}}" placeholder="{{$placeholder}}" rows="{{$rows}}" cols="{{$cols}}">{{old($name,$value)}}</textarea>
    @error($name) <div class="text-red-600 text-base mt-1"> {{ $message }} </div> @enderror
</div>

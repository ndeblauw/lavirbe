@props([
    'label',
    'name',
    'options' => [],
    'value' => ''
])

<div>
    <label for="{{$name}}" class="block mb-1">{{$label}}</label>
    <select name="{{$name}}" id="{{$name}}" class="w-full border-2 border-black p-3 bg-white">
        @foreach($options as $key => $title)
            <option @selected(old($name, $value)==$key) value="{{$key}}">{{$title}}</option>
        @endforeach
    </select>
    @error($name) <div class="text-red-600 text-base mt-1"> {{ $message }} </div> @enderror
</div>

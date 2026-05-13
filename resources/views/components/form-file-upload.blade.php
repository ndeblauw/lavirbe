@props([
    'label',
    'name',
])

<div>
    <label for="{{$name}}">{{$label}}</label>
    <input type="file" id="{{$name}}" name="{{$name}}" />
    @error($name) <div style="color: red"> {{ $message }} </div> @enderror
</div>

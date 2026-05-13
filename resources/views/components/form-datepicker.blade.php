@props([
    'label',
    'name',
    'value' => ''
])

<div>
    <label for="{{$name}}">{{$label}}</label>
    <input class="border border-black" type="date" name="{{$name}}" id="{{$name}}" value="{{old($name,$value)}}">
    @error($name) <div style="color: red"> {{ $message }} </div> @enderror
</div>

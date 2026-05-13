@props([
    'label',
    'name',
    'placeholder' => '',
    'value' => ''
])

<div>
    <label for="{{$name}}">{{$label}}</label>
    <input class="border border-black" type="text" name="{{$name}}" placeholder="{{$placeholder}}" value="{{old($name,$value)}}">
    @error($name) <div style="color: red"> {{ $message }} </div> @enderror
</div>

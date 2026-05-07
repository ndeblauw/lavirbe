@props([
    'label',
    'name',
    'placeholder',
    'value' => ''
])

<label for="{{$name}}">{{$label}}</label>
<input type="text" name="{{$name}}" placeholder="{{$placeholder}}" value="{{old($name,$value)}}">
@error($name) <div style="color: red"> {{ $message }} </div> @enderror

@props([
    'label',
    'name',
    'placeholder' => '',
    'value' => '',
    'rows' => 10,
    'cols' => 30,
])

<div>
    <label for="{{$name}}">{{$label}}</label>
    <textarea class="border border-black" name="{{$name}}" id="{{$name}}" placeholder="{{$placeholder}}" rows="{{$rows}}" cols="{{$cols}}">{{old($name,$value)}}</textarea>
    @error($name) <div style="color: red"> {{ $message }} </div> @enderror
</div>

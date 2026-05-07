@props([
    'label',
    'name',
    'options' => [],
    'value' => ''
])

<div>
    <label for="{{$name}}">{{$label}}</label>
    <select name="{{$name}}" id="{{$name}}">
        @foreach($options as $key => $title)
            <option @selected(old($name, $value)==$key) value="{{$key}}">{{$title}}</option>
        @endforeach
    </select>
    @error($name) <div style="color: red"> {{ $message }} </div> @enderror
</div>

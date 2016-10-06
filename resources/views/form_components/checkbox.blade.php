<div class="form-group {{ $errors->has($name) ? ' has-error' : '' }}">
    {{ Form::label($name, $label_name, ['class' => 'control-label']) }}

    @foreach($elemanlar as $eleman)
        <label class="checkbox-inline"><input type="checkbox" name="{{$name}}[]" value="{{$eleman["value"]}}"  {{$eleman["is_checked"] ? "checked" : null}}>{{$eleman["text"]}}</label>
    @endforeach

    @if ($errors->has($name))
        <span class="help-block">
            <strong>{{ $errors->first($name) }}</strong>
        </span>
    @endif
</div>
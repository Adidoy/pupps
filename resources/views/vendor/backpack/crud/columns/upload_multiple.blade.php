<span>
    @if ($entry->{$column['name']} && count($entry->{$column['name']}))
        @foreach ($entry->{$column['name']} as $file_path)
            - <a target="_blank" href="{{ isset($field['disk'])?asset(\Storage::disk($field['disk'])->url($file_path)):asset($file_path) }}">{{ $file_path }}</a><br>
        @endforeach
    @else
        -
    @endif
</span>
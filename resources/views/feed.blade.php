<?xml version="1.0" encoding="UTF-8"?>
<objects>
    @foreach ($items as $item)
    @component('components.feedobject', ['item'=>$item])
    @endcomponent
    @endforeach
</objects>

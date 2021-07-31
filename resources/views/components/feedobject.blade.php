@php
    extract($item->toArray());
@endphp
<object updated="{{$updated_at}}" internal-id="{{$id}}" link="https://{{$slug}}" category-path="{{$item->categories->last()->name}}" mainpage_slider="false" mainpage_special="false" mainpage_hot="false" invest_hidden="false" invest_construction="false" invest_rental="false">
    <title>{{$name}}</title>
    <region> </region>
    <city>{{$item->area->city->name}}</city>
    <city_area>{{$item->area->name}}</city_area>
    <street>{{$item->address}}</street>
    <house_num>1</house_num>
    <ned_type>{{$item->type->name}}</ned_type>
    <latitude>{{$latitude}}</latitude>
    <longitude>{{$longitude}}</longitude>
    <agent>
        <phone>{{$item->user->phone}}</phone>
        <name>{{$item->user->name}}</name>
        <email>{{$item->user->email}}</email>
        <internal_id>{{$item->user->id}}</internal_id>
        <description>
            <![CDATA[
            {!!$item->user->additional->opit!!}
            ]]>
        </description>
        <position>{{$item->user->position}}</position>
    </agent>
    <order_type>{{$item->type_order}}</order_type>
    <price currency="RUR">{{$item->price}}</price>
    <images>
        @foreach($item->imagesActive as $image)
        <image url="{{ url('storage/items/' . $item->id . '/' . $image->file) }}" />
        @endforeach
    </images>
    <youtube_video_link>{{$item->video_url}}</youtube_video_link>
    <description>
        <![CDATA[
        {!!$item->description!!}
        ]]>
    </description>
    <options>
    @foreach ($item->getOptionsAttribute() as $option_name=>$option)
        <option title="{{$option->option_title}}" name="{{$option_name}}">{{$option->value_title}}</option>
    @endforeach
    </options>
</object>

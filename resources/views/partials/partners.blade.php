@foreach (Storage::allFiles('/public/users/image/partners') as $file)
    <img class="partners__image" src="{{ substr($file, strlen('public')) }}">
@endforeach

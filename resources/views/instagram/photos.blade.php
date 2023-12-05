@foreach($photos as $photo)
    <img src="{{ $photo['images']['standard_resolution']['url'] }}" alt="{{ $photo['caption']['text'] }}">
@endforeach
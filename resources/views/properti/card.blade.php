<div class="card">
    <div class="card-body">
        <h5 class="card-title">

        <a href="{{ route('properti.show', ['slug' => $property->getSlug(), 'property' => $property->id]) }}">{{ $property->title }}</a>
        </h5>
        <p class="card-text">
            {{$property->surface}}m2 - {{$property->city}} ({{$property->postal_code}})
        </p>
        <div class="text-primary fw-bold" style="font-size: 1.4rem;">
            {{ number_format($property->price, 0, ',', ' ') }} Fbu
        </div>
    </div>
</div>
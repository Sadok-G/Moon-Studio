@extends('base') {{-- ou ton layout principal --}}

@section('content')
<div class="search-results">
    <h2>Résultats de la recherche</h2>

    @if($ads->count())
        <ul>
            @foreach($ads as $ad)
                <li>
                    <h3>{{ $ad->title }}</h3>
                    <p>Location: {{ $ad->location ?? 'N/A' }}</p>
                    <p>Category: {{ $ad->adCategory->name ?? 'N/A' }}</p>
                    <p>Condition: {{ $ad->condition }}</p>
                    <p>Price: ${{ $ad->price }}</p>
                </li>
            @endforeach
        </ul>
    @else
        <p>Aucune annonce trouvée.</p>
    @endif
</div>
@endsection

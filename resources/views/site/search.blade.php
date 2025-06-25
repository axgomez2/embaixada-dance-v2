<x-app-layout>
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <h1 class="text-3xl font-bold mb-6">Resultados da busca para: "{{ $query }}"</h1>

    @if($results->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-6">
            @foreach($results as $result)
                @if($result instanceof App\Models\VinylMaster)
                    @include('components.site.vinyl-card', ['vinyl' => $result])
                @elseif($result instanceof App\Models\Equipment)
                    @include('components.site.equipment-card', ['equipment' => $result])
                @endif
            @endforeach
        </div>
    @else
        <p class="text-xl">Nenhum resultado encontrado para sua busca.</p>
    @endif
</div>
</x-app-layout>

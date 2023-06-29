<div class="d-flex justify-content-center align-items-center h-10">
    <button wire:click="prepareForNewImage(true)" class="btn btn-secondary mr-5" @click="show = false; showModal = false">
        Cerrar galería
    </button>
    <button wire:click="editImage(0)" class="btn btn-primary mr-5" @click="showModal = true">
        Nueva imagen
    </button>
    <button wire:click="empty" class="btn btn-danger">
        Vaciar
    </button>
</div>

<div class="d-flex flex-row flex-wrap justify-content-around overflow-auto @if ($showPagination) h-80 @else h-90 @endif">
    @foreach ($images as $image)
    <div class="col-3 mb-3">
        <div class="card">
            <div class="card-img-header">
                <img class="card-img-top" src="{{ $image->path }}" alt="{{ $image->title }}" title="{{ $image->title }}">
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $image->title }}</h5>
                <div class="d-flex justify-content-around align-items-center">
                    <i class="fa fa-heart"
                        :class="{'heart-big': {{ $image->main }}, 'heart-medium': !{{ $image->main }}}"
                        aria-hidden="true" wire:click="toggleMain({{ $image->id }})"></i>
                    <a wire:click="editImage({{ $image->id }})" class="btn btn-primary" @click="showModal = true">Editar</a>
                    <a wire:click="delete({{ $image->id }})" class="btn btn-danger">Borrar</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

@if ($showPagination)
<div class="d-flex flex-row flex-wrap justify-content-around align-items-center h-10">
    {{ $images->links('livewire.gallery-pagination-links-view') }}
</div>
@endif
<div class="d-inline" x-data="{ show: false, showModal: false }">
    <button class="btn btn-primary" @click="show = true">Fotos</button>
    
    <div class="fixed-top w-100 h-100 bg-white" x-show="show">
        @include('livewire.gallery')
        
        <div class="fixed-top modal-dialog modal-dialog-scrollable" x-show="showModal">
            <form wire:submit.prevent="save">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="card-header">Nueva imagen</div>
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div><br />
                            @endif
                            
                            @csrf
                            <div class="form-group">
                                <label for="title">T&iacute;tulo:</label>
                                <input type="text" wire:model.defer="image.title" class="form-control col-3 col-md-2" id="title" name="title" value="" required/>
                            </div>
                            <div class="form-group">
                                @if ($photo && $photo->exists())
                                    <img src="{{ $photo->temporaryUrl() }}">
                                @elseif ($idEdit > 0)
                                    <img src="{{ $image->path }}">
                                @endif
                                <input type="file" wire:model="photo">
                            </div>
                            
                            <div x-data="{ main: @entangle('image.main').defer }" class="form-check">
                                <label class="form-check-label" for="main">Favorita</label>
                                <input class="d-none" type="checkbox" wire:model.defer="image.main" id="main" name="main">
                                <i class="fa fa-heart"
                                    :class="{'text-primary': main, 'text-secondary': !main}"
                                    aria-hidden="true" @click="main = !main"></i>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button wire:click.prevent="prepareForNewImage(false)" class="btn btn-secondary" @click="showModal = false">Cerrar</button>
                        <button type="submit" class="btn btn-primary" @click="showModal = false">Guardar</button>
                    </div>
                </div>
            </form>
        </div>        
    </div>
    
</div>
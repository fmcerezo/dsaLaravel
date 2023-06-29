<?php

namespace App\Http\Livewire;

use App\Models\AbstractImagen;
use App\Models\ImageModel;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ImageGallery extends Component
{
    use WithFileUploads,
        WithPagination;

    public string $folder;
    public string $fullClassName;
    public int $idEdit;
    public int $idMainToToggle;
    public ImageModel $model;
    public AbstractImagen $image;
    public $photo;

    protected $rules = [
        'image.title' => 'required|string|max:250',
        'image.main' => 'bool',
        'photo' => 'image|max:1024', // 1MB Max
    ];


    public static function emptyGallery(ImageModel $instance)
    {
        $gallery = new self;
        $gallery->mount($instance);
        $gallery->empty();
    }


    public function delete(int $idImage)
    {
        $tempImg = $this->fullClassName::find($idImage);
        $this->remove($tempImg);
    }

    public function editImage(int $idImage)
    {
        $this->idEdit = $idImage;
        if (0 < $this->idEdit) {
            $this->idEdit = $idImage;
            $this->image = $this->fullClassName::find($this->idEdit);
            $this->image->path = Storage::url($this->image->path);
        }
    }

    public function empty()
    {
        $objects = $this->fullClassName::where($this->model->getKeyName(), $this->model->getKey())->get();
        foreach ($objects as $o) {
            $this->remove($o);
        }
    }

    public function mount(ImageModel $instance)
    {
        $this->fullClassName = get_class($instance) . 'Imagen';

        $splitClass = explode('\\', $this->fullClassName);
        $this->folder = 'public/images/' . array_pop($splitClass);
        
        $this->model = $instance;
        $this->prepareForNewImage(true);
    }

    public function prepareForNewImage(bool $fullHide)
    {
        $this->resetErrorBag();
        $this->image = new $this->fullClassName;
        $this->image->main = false;

        if (null !== $this->photo && $this->photo->exists()) {
            $this->photo->delete();
        }
        
        if ($fullHide) {
            $this->resetPage();
        }
    }

    public function render()
    {
        $pageSize = 8;
        $imagesCollection = $this->fullClassName::where($this->model->getKeyName(), $this->model->getKey());
        $imagesTotal = $imagesCollection->count();

        $showPagination = $imagesTotal > $pageSize;
        $images = $imagesCollection->orderByDesc('main')->orderBy('title');

        if ($showPagination) {
            $images = $images->paginate($pageSize);
        } else {
            $images = $images->get();
        }

        foreach ($images as &$image) {
            $image->path = Storage::url($image->path);
        }

        return view('livewire.image-gallery', compact('images', 'showPagination'));
    }

    public function save()
    {
        if (0 < $this->idEdit) {
            $tempImg = $this->fullClassName::find($this->idEdit);

            if (null === $this->photo || !$this->photo->exists()) {
                $this->image->path = $tempImg->path;
                $this->validate(array_slice($this->rules, 0, 2));
            } else {
                Storage::delete($tempImg->path);
                $this->image->path = $this->photo->store($this->folder);
            }
        } else {
            $this->validate($this->rules);
            $this->image->path = $this->photo->store($this->folder);
        }
        
        $this->image->{$this->model->getKeyName()} = $this->model->getKey();
        $this->image->save();
        
        $this->prepareForNewImage(false);
    }

    public function toggleMain(int $idImage)
    {
        $image = $this->fullClassName::find($idImage);
        $image->main = !$this->image->main;
        $image->save();
    }


    protected function remove(AbstractImagen $object)
    {
        Storage::delete($object->path);
        $object->delete();
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Item;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use Livewire\WithPagination;

class Search extends Component
{
    use WithPagination;
    public $search = 'a';
    public $itemsComponen = [];
    public $perPage = 10;

    public function render()
    {
        $search =  '%' . $this->search . '%';
        $this->itemsComponen =  Item::itemA()->where('Caption', 'like', $search)->get();
        return view('livewire.search');
    }
}

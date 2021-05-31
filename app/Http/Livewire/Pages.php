<?php

namespace App\Http\Livewire;
use App\Models\page;

use Livewire\Component;
use Illuminate\Validation\Rules;
use Livewire\WithPagination;

class Pages extends Component

     
{
    use WithPagination;
    public $modalFormvisible =false;
    public $modalConfirmDeleteVisible = false;
    public $modelId;
    public $user;
     public $title;
     public $content;



     public function rules()
     {
        return [
            'title' => 'required',
            'user' => 'required',
            'content' => 'required',
        ];
    }


     public function create()
     {

        $this->validate();
        page:: create($this->modelData());
        $this->modalFormvisible = false;
        $this->resetVars();
     }
     public function read()
     {
         return Page::paginate(5);
     }

     public function update()
     {
         $this->validate();
        //  $this->unassignDefaultHomePage();
        //  $this->unassignDefaultNotFoundPage();
         Page::find($this->modelId)->update($this->modelData());
         $this->modalFormvisible = false;
     }


     public function delete()
     {
         Page::destroy($this->modelId);
         $this->modalConfirmDeleteVisible = false;
         $this->resetPage();
     }


     public function createShowModal()
     {
         $this->resetValidation();
         $this->resetVars();
       $this->modalFormvisible = true;
     }


     public function updateShowModal($id){
    // / { dump($this->modalFormvisible);
        $this->resetValidation();
        $this->reset();
        $this->modelId = $id;
        $this->modalFormvisible = true;
        $this->loadModel();
        // dd($this->modalFormvisible);
    }

    public function deleteShowModal($id)
    {
        //  dump($this->modalConfirmDeleteVisible);
        
        $this->modelId = $id;
        $this->modalConfirmDeleteVisible = true;
        // dd($this->modalConfirmDeleteVisible);
        
    }

    public function loadModel()
    {
        $data = Page::find($this->modelId);
        $this->title = $data->title;
        $this->user = $data->user;
        $this->content = $data->content;
        $this->isSetToDefaultHomePage = !$data->is_default_home ? null : true;
        $this->isSetToDefaultNotFoundPage = !$data->is_default_not_found ? null : true;
    }
 


     public function modelData()
     {
         return[
             'title'=> $this->title,
             'user'=> $this->user,
             'content'=> $this->content,
         ];
     }

     public function resetVars()
     {
         $this->modelId = null;
         $this->title = null;
         $this->user = null;
         $this->content = null;
     }






    public function render()
    {
        return view('livewire.pages' ,[
            'data'=>$this->read(),
        ]);

    }
}

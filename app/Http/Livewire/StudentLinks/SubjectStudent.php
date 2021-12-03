<?php

namespace App\Http\Livewire\StudentLinks;

use Livewire\Component;
use App\Models\User;
use App\Models\ClassStudent;
use App\Models\Classes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SubjectStudent extends Component
{
    protected $listeners = ['deleteConfirmed' => 'deleteSubject'];
    public $show = false; 
    public $showList = false;
    public $subjectIdBeingRemoved;

    public $code;

    public function render()
    {
        $id = Auth::id();

        $student = User::find($id)->classstudent;
        return view('livewire.student-links.subject-student', ['students' => $student]);
    }

    public function doShow()
    {
        $this->show = true;
    }

    public function doClose()
    {
        $this->show = false; 
        $this->reset();
    }

    public function join()
    {
        $subject = new ClassStudent;
        $user = Auth::id();
    
        $code = Classes::where('code' , $this->code)->first();


        // 'email' => Rule::unique('users')->where(function ($query) {
        //     return $query->where('account_id', 1);
        // })
            $this->validate([
                'code' => 'required|exists:classes,code' 
            ]);


            $id = $code->id;
            
            $subjectCode = $code->code;
           
            $subject->code = $subjectCode;
            $subject->classes()->associate($id);
            $subject->user()->associate($user);
            $subject->save();
            $this->doClose();
    }

    public function doShowList()
    {
        $this->showList = true;
    }
    public function doCloseList()
    {
        $this->showList = false;
    }

    public function delete($id)
    {
        $this->subjectIdBeingRemoved = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function deleteSubject()
    {
       $file = ClassStudent::findOrFail($this->subjectIdBeingRemoved);
       $file->delete();
       $this->dispatchBrowserEvent('deleted', [ 'message' => 'File deleted successfully!']);
    }
}

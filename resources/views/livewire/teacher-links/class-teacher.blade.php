<div>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Subject 
    </h2>
    <header class="mt-8 mb-4 flex gap-2 justify-end pr-5 item-center">  
        
        <div class="flex gap-2 justify-between pr-5 ">
        @if($showList === false)
        <button wire:click.defer="doShowList" class="flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-800">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 0.8);transform: ;msFilter:;"><path d="M4 6h2v2H4zm0 5h2v2H4zm0 5h2v2H4zm16-8V6H8.023v2H18.8zM8 11h12v2H8zm0 5h12v2H8z"></path></svg> 
        </button>  
        @else
        <button wire:click.defer="doCloseList" class="flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-800">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 0.8);transform: ;msFilter:;"><path d="M4 6h2v2H4zm0 5h2v2H4zm0 5h2v2H4zm16-8V6H8.023v2H18.8zM8 11h12v2H8zm0 5h12v2H8z"></path></svg> 
        </button>  
        @endif

        <button wire:click.defer="doShow" class="flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-800">
              Create 
        </button>  
        </div>

    </header>

    @if($showList === false)
    {{-- cards --}}
    <div class="flex flex-wrap gap-4 items-center">
                   
               
    @forelse ( $teacher_subjects ->shown_subjects as $subject)

        {{-- card --}}
            <div class="p-4 w-full card rounded-lg md:w-1/2">
                <a href="{{ route('subjects-content' , ['subject' => $subject])}}" >
                   
                    <div class="w-10 h-10 inline-flex items-center justify-center rounded-full mb-4 overflow-hide">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M2 8v11.529S6.621 19.357 12 22c5.379-2.643 10-2.471 10-2.471V8s-5.454 0-10 2.471C7.454 8 2 8 2 8z"></path><circle cx="12" cy="5" r="3"></circle></svg>
                    </div>
                    
                    <h2 class="text-lg font-semibold title-font mb-2 text-3xl leading-relaxed">{{ $subject->subject }}</h2>
                    
                    <p class="leading-relaxed font-semibold">
                        {{ $subject->description }}
                    </p> 
                </a>  

            </div>
         @empty

                <div class="px-6 py-4  text-lg font-medium text-gray-900 ">
                  No data
                </div>

         @endforelse
           
    </div>
    {{-- end of cards --}}
    @endif
    {{-- show list of subjects--}}

    @if($showList === true)
    <div class="flex flex-col">

    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">

        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">

        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

            <table class="min-w-full divide-y divide-gray-200 table-auto">

            <thead class="bg-gray-50">

            
                <tr>

                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Name
                </th>

                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" >
                    Description
                </th>
                
                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    <span>Action</span>
                </th>

                </tr>

            </thead>

                <tbody class="bg-white divide-y divide-gray-200">

                @forelse ($teacher_subjects ->all_subjects as $subject)
                <tr>

                    <td class="px-6 py-4 text-sm">
                    <div class="text-sm text-gray-900"> {{ $subject->subject }} </div>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                     {{ $subject->description }}
                    </td>
                
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-red-800">

                        <a href="{{ route('subjects-content' , ['subject' => $subject])}}" class=" text-gray-500 rounded px-2 py-1 mx-1  ">Open</a>
                        <button  wire:click="delete({{ $subject->id }} )" class=" text-gray-500 rounded px-2 py-1 mx-1  ">Delete</button>
                       
                       
                        @if($subject->shown === 0)
                        <button  wire:click="hideShow(1 , {{ $subject->id }} )" class=" text-gray-500 rounded px-2 py-1 mx-1  "> <span> Show </span>  </button>
                        @else
                        <button  wire:click="hideShow(0, {{ $subject->id }} )" class=" text-gray-500 rounded px-2 py-1 mx-1  "> <span> Hide </span>  </button>
                        @endif    
                       
                    </td>

                    @empty
                    <td class="px-6 py-4   text-md font-medium text-gray-700 ">
                    No data
                    </td>

                </tr>
               
                @endforelse
                </tbody>

            </table>

        </div>

        </div>

        </div>

    </div>

    </div>
    @endif
    {{--end show list of subjects--}}
{{-- modal --}}

<div class="bg-black bg-opacity-50 absolute inset-0 @if($show === false ) hidden  @endif justify-center items-center" id="subjectModal">
    
    <div class="my-14 flex flex-col w-11/12 sm:w-5/6 lg:w-1/2 max-w-2xl mx-auto rounded-lg border border-gray-300 shadow-xl">
        
        <div class="flex flex-row justify-between p-6 bg-white border-b border-gray-200 rounded-tl-lg rounded-tr-lg">
          
            <p class="font-semibold text-gray-800">Subject</p>
        
            <svg
                wire:click.prevent="doClose()"
                class="w-6 h-6"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
            >
            <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M6 18L18 6M6 6l12 12"
            >
            </path>
            </svg>

        </div>
    {{-- Update Form --}}
    <form action="" wire:submit.prevent="create">

        <div class="flex flex-col px-6 py-5 bg-gray-50">
              
            <div class="col-span-6 sm:col-span-3">

                <label  class="block text-sm font-medium text-gray-700">Subject</label>
                <input  wire:model.defer="subject"  type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    
            </div>

            <div class="col-span-6 sm:col-span-3 pt-2">

                    <label  class="block text-sm font-medium text-gray-700">Description</label>
                    <input  wire:model.defer="description"  type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            
            </div>

    {{-- Create Account Form End --}}
        <hr />

        <div class="flex flex-row items-center justify-end pt-4 gap-4 bg-white border-t border-gray-200 rounded-bl-lg rounded-br-lg">

            <button type="submit"class=" cursor-pointer px-4 py-2 text-white font-semibold bg-blue-500 rounded">
                Save
            </button>

        </div>
    </form>
</div>

{{-- end of modal--}}
    
        <style>
                .card {
                    --tw-shadow: 3px 5px 8px 1px rgba(14, 26, 187, 0.5), 0 10px 10px -5px rgba(25, 69, 212, 0.04);
                     box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
                    position: relative;
                    }

                    @media (min-width: 1280px) {
                        .card {
                            width: 31.333333%;
                        }
                    }

                .card::before{
                    position: absolute;
                    content: "";
                    height: 8rem;
                    width: 2rem;
                    background: #5F5EF8;
                    top: 50%;
                    right: 0;
                    transform: translateY(-50%);
                    border-top-left-radius: 3rem;
                    border-bottom-left-radius: 3rem;
                }
                .card:nth-child(2):before{
                    position: absolute;
                    content: "";
                    height: 8rem;
                    width: 2rem;
                    background: #7158D8;
                    top: 50%;
                    right: 0;
                    transform: translateY(-50%);
                    border-top-left-radius: 3rem;
                    border-bottom-left-radius: 3rem;
                }
                .card:nth-child(3):before{
                    position: absolute;
                    content: "";
                    height: 8rem;
                    width: 2rem;
                    background: #29C890;
                    top: 50%;
                    right: 0;
                    transform: translateY(-50%);
                    border-top-left-radius: 3rem;
                    border-bottom-left-radius: 3rem;
                }
        </style>
</div>

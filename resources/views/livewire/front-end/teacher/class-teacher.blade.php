<div>
<div class="relative bg-blueGray-50">
        
        <!-- Header -->
        
        <div class="relative bg-blue-900 md:pt-32 pb-32 pt-12">
          <div class="px-4 md:px-10 mx-auto w-full">
            <div>
             
             
            </div>
          </div>
        </div>
        
        <div class="px-4 md:px-6 mx-auto w-full " style="margin-top: -160px">
          <div class="flex flex-wrap">
            <div class="w-full  px-4">
              <div
                class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0"
              >
                <div class="rounded-t bg-white mb-0 px-6 py-6">
                  <div class="text-center flex justify-between">
                    <h6 class="text-blueGray-700 text-xl font-bold">
                      Subjects
                    </h6>

                    <div class="text-center flex justify-between">
                    @if($showList === false)
                    <button
                      wire:click="doShowList"
                      class="bg-blue-900 text-white active:bg-blue-900 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                      type="button"
                    >                        
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 0.8);transform: ;msFilter:;"><path d="M4 6h2v2H4zm0 5h2v2H4zm0 5h2v2H4zm16-8V6H8.023v2H18.8zM8 11h12v2H8zm0 5h12v2H8z"></path></svg> 
                    </button>  
                    @else
                    <button
                      wire:click="doCloseList"
                      class="bg-blue-900 text-white active:bg-blue-900 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                      type="button"
                    >                        
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 0.8);transform: ;msFilter:;"><path d="M4 6h2v2H4zm0 5h2v2H4zm0 5h2v2H4zm16-8V6H8.023v2H18.8zM8 11h12v2H8zm0 5h12v2H8z"></path></svg> 
                    </button>   
                    @endif

                    <button
                      wire:click="showForm"
                      class="bg-blue-900 text-white active:bg-blue-900 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                      type="button"
                    >
                      Create
                    </button>
                    </div>

                  </div>
                </div>
                <div class="flex-auto px-4 lg:px-10 py-8 pt-0">
                @if($showList === false)
                    <div class="flex flex-wrap gap-4 items-center">
                    @forelse ( $teacher_subjects ->shown_subjects as $subject)
                        <div class="text-center pt-8 mt-10 h-40 w-full card rounded-lg md:w-1/2 overflow-hidden">
                        <a href="{{ route('subjects-content' , ['subject' => $subject])}}" >
                            
                            <h2 class="text-lg font-semibold title-font mb-2 text-3xl leading-relaxed">{{ $subject->subject }}</h2>
                            
                            <p class="leading-relaxed font-semibold">
                            {{ $subject->description }}
                            </p> 
                        </a>  
                        </div>
                    @empty
                    <div class="lg:flex items-center justify-center w-full pt-4">

                    <div tabindex="0" aria-label="card 1" class="focus:outline-none lg:w-12/12 lg:mr-7 lg:mb-0 mb-7 bg-white p-6 shadow-md border-t-1  rounded">
                        <div class="flex items-center text-center border-gray-200 pb-6">
                            <div class="flex items-start justify-between w-full">
                                <div class="pl-3 w-full">
                                    <p tabindex="0" class="focus:outline-none text-xl font-medium leading-5 text-gray-800 pt-4">No data found</p>
                                  
                                </div>
                          </div>
                    </div>
                        

                    </div>
                    @endforelse
                    </div>
                @else
                <div class="block w-full overflow-x-auto pt-4">
                  <!-- Projects table -->
                  <table
                    class="items-center w-full bg-transparent border-collapse"
                  >
                    <thead>

                      <tr>
                        <th
                          class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
                        >
                          Name
                        </th>
                        <th
                          class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
                        >
                          Desciption
                        </th>
                    
                       
                        <th
                          class=" align-end border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-right bg-blueGray-50 text-blueGray-500 border-blueGray-100"
                        >
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                    @forelse ($teacher_subjects ->all_subjects as $subject)
                      <tr>
                        <th
                          class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left flex items-center"
                        >
                         
                          <span class=" font-bold text-blueGray-600">
                          {{ $subject->subject }}
                          </span>
                        </th>
                        <td
                          class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                        {{ $subject->description }}
                        </td>

                        <td
                        class="border-t-0 gap-2 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-right"
                        >
                        @if($subject->shown === 0)
                          <button  wire:click="hideShow(1 , {{ $subject->id }} )"  class="text-white rounded px-4 py-1 mx-1  bg-blue-600 hover:bg-blue-700 " >Show</button>
                        @else
                          <button  wire:click="hideShow(0, {{ $subject->id }} )"  class="text-white rounded px-4 py-1 mx-1  bg-blue-600 hover:bg-blue-700 " >Hide</button>
                        @endif
                          <button wire:click="delete({{ $subject->id }} )" class="text-white rounded px-4 py-1 mx-1  bg-red-600 hover:bg-red-700 " >Remove</button>
                          
                    
                        </td>
                      </tr>
                      @empty
                      <td
                          class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                          No data found
                      </td>
                      @endforelse
                     
                    </tbody>
                  </table>
                 
                </div>
                <!-- end -->

                @endif
         
                </div>
              </div>
            </div>

            
          </div>
          
        </div>
      </div>

      <!-- modal -->
    
 
      <div id="popup" class="hidden z-50 fixed w-full flex justify-center inset-0" wire:ignore.self>
            <div onclick="popuphandler(false)" class="w-full h-full bg-gray-200 z-0 absolute inset-0"></div>
            <div class="mx-auto container">
                <div class="flex items-center justify-center h-full w-full">
                    <div class="bg-white rounded-md shadow fixed overflow-y-auto sm:h-auto w-10/12 md:w-8/12 lg:w-1/2 2xl:w-2/5">
                        <div class="bg-gray-100 rounded-tl-md rounded-tr-md px-4 md:px-8 md:py-4 py-7 flex items-center justify-between">
                           
                            <p class="text-base font-semibold">Create</p>
                           
                           
                            <button role="button" aria-label="close label" wire:click="hideForm" class="focus:ring-2 focus:ring-offset-2 focus:ring-gray-600 focus:outline-none">
                                <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/add_user-svg1.svg" alt="icon"/>
                               
                            </button>
                        </div>
                        <div class="px-4 md:px-10 pt-2 md:pt-12 md:pb-4 pb-7">
                            
                            <form class="" action=""  wire:submit.prevent="create">
                              <div class="grid grid-cols-1 mx-7">
                              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Subject </label>
                              <input wire:model.defer="subject" class="py-2 px-3 rounded-lg border-2 border-gray-300  mt-1 focus:outline-none focus:ring-2 focus:ring-gray-600  focus:border-transparent @error('subject') border-red-500 @enderror"  type="text"/>
                              @error('subject')
                              <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                {{ $message }}
                              </span>
                              @enderror
                              </div>
                            
                              <div class="grid grid-cols-1 mx-7 pt-4">
                              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Description</label>
                              <input wire:model.defer="description" class="py-2 px-3 rounded-lg border-2 border-gray-300  mt-1 focus:outline-none focus:ring-2 focus:ring-gray-600  focus:border-transparent @error('description') border-red-500 @enderror"  type="text"/>
                              @error('description')
                              <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                {{ $message }}
                              </span>
                              @enderror
                              </div>
                           
                            
                            <div class="flex items-center justify-between mt-9">
                                <button wire:click="hideForm" role="button" aria-label="close button" class="focus:ring-2 focus:ring-offset-2 focus:bg-gray-600 focus:ring-gray-600 focus:outline-none px-6 py-3 bg-gray-600 hover:bg-gray-500 shadow rounded text-sm text-white">Cancel</button>
                                <button aria-label="add user" role="button" class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-800 focus:outline-none px-6 py-3 bg-indigo-700 hover:bg-opacity-80 shadow rounded text-sm text-white">Create</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /modal -->
</div>

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
                    height: 9rem;
                    width: 1.5rem;
                    /* background: #5F5EF8; */
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
                    /* background: #7158D8; */
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
                    /* background: #29C890; */
                    top: 50%;
                    right: 0;
                    transform: translateY(-50%);
                    border-top-left-radius: 3rem;
                    border-bottom-left-radius: 3rem;
                }
        </style>

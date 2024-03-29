 <!-- Main Navigation -->
 <nav
        class="h-full md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden shadow-xl bg-white flex flex-wrap items-center justify-between relative md:w-64 z-10 py-4 px-6"
      >
        <div
          class="md:flex-col md:items-stretch md:min-h-full md:flex-nowrap px-0 flex flex-wrap items-center justify-between w-full mx-auto"
        >
          <button
            class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
            type="button"
            onclick="toggleNavbar('example-collapse-sidebar')"
          >
            <i class="fas fa-bars"></i>
          </button>
          <div class="content-center text-center flex gap-2">
           <img src="{{ asset('images/dash-logo.gif') }}" class="h-12 w-12 flex" alt="">
          <a
            class="flex md:block text-left md:pb-2 text-blueGray-600 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0"
            href="/"
          >
            
            LMS | GPC
          </a>
          </div>
          
          <div
            class="md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none shadow absolute top-0 left-0 right-0 z-40 overflow-y-auto overflow-x-hidden h-auto items-center flex-1 rounded hidden"
            id="example-collapse-sidebar"
          >
            <div
              class="md:min-w-full md:hidden block pb-4 mb-4 border-b border-solid border-blueGray-200"
            >
              <div class="flex flex-wrap">
                <div class="w-6/12">
                  <a
                    class="md:block text-left md:pb-2 text-blueGray-600 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0"
                    href="#"
                  >
                    <!-- <img src="{{ asset('images/dash-logo.gif') }}" class="h-8 w-8 flex" alt=""> -->
                    <span > LMS | GPC </span> 
                  </a>
                </div>
                <div class="w-6/12 flex justify-end">
                  <button
                    type="button"
                    class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
                    onclick="toggleNavbar('example-collapse-sidebar')"
                  >
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </div>
          
            <!-- Divider -->
          
            <hr class="my-2 md:min-w-full" />
            <!-- Heading -->
            <h6
              class="md:min-w-full text-blueGray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline"
            >
              Links
            </h6>
            <!-- Navigation -->

            <ul class="md:flex-col md:min-w-full flex flex-col list-none">
              <li class="items-center">
                <a
                    href="{{ route('dashboard') }}"
                  class="{{ request()->routeIs('dashboard') ? 'text-xs  text-blue-500 hover:text-blue-600 ' : '' }}text-xs uppercase py-3 font-bold block text-blueGray-700 hover:text-blueGray-500"
                >
                  <i class="fas fa-tv mr-2 text-sm text-blueGray-800"></i>
                  Dashboard
                </a>
              </li>
              @if(Auth::user()->hasRole('teacher'))
              <li class="items-center">
                <a
                  href="{{ route('subjects-teacher' )}}"
                  class="{{ request()->routeIs('subjects-teacher') ? 'text-xs  text-blue-500 hover:text-blue-600 ' : '' }} text-xs uppercase py-3 font-bold block"
                >
                  <i class="fas fa-book mr-3 text-sm text-blueGray-800"></i>
                  Subject
                </a>
              </li>
              @endif

              @if(Auth::user()->hasRole('student'))
              <li class="items-center">
                <a
                  href="{{ route('subjects-student') }}"
                  class="{{ request()->routeIs('subjects-student') ? 'text-xs  text-blue-500 hover:text-blue-600 ' : '' }} text-xs uppercase py-3 font-bold block text-blueGray-700 hover:text-blueGray-500"
                >
                <i class="fas fa-book mr-2 text-sm text-blueGray-800"></i>
                  Subject
                </a>
              </li>
              <li class="items-center">
                <a
                  href="{{ route('scores') }}"
                  class="{{ request()->routeIs('scores') ? 'text-xs  text-blue-500 hover:text-blue-600 ' : '' }} text-xs uppercase py-3 font-bold block text-blueGray-700 hover:text-blueGray-500"
                >
                  <i class="fas fa-star mr-2 text-sm text-blueGray-800"></i>
                  
                  Scores
                </a>
              </li>
              <li class="items-center">
                <a
                  href="{{ route('grade') }}"
                  class="{{ request()->routeIs('grade') ? 'text-xs  text-blue-500 hover:text-blue-600 ' : '' }} text-xs uppercase py-3 font-bold block text-blueGray-700 hover:text-blueGray-500"
                >
                  <i class="fas fa-clipboard mr-2 text-sm text-blueGray-800"></i>
                  Grade
                </a>
              </li>

              <li class="items-center">
                <a
                  href="{{ route('student-progress') }}"
                  class="{{ request()->routeIs('student-progress') ? 'text-xs  text-blue-500 hover:text-blue-600 ' : '' }} text-xs uppercase py-3 font-bold block text-blueGray-700 hover:text-blueGray-500"
                >
                  <i class="fas fa-spinner mr-2 text-sm text-blueGray-800"></i>
                  Progress
                </a>
              </li>
              @endif
              @if(Auth::user()->hasRole('teacher|admin'))
              <li class="items-center">
                <a
                  href="{{ route('accounts') }}"
                  class="{{ request()->routeIs('accounts') ? 'text-xs  text-blue-500 hover:text-blue-600 ' : '' }} text-xs uppercase py-3 font-bold block text-blueGray-700 hover:text-blueGray-500"
                >
                  <i
                    class="fas fa-map-marked mr-2 text-sm text-blueGray-800"
                  ></i>
                  Accounts
                </a>
              </li>
              @endif
              
            </ul>

            <!-- Divider -->
            <hr class="my-4 md:min-w-full" />
            <!-- Heading -->
            <h6
              class="md:min-w-full text-blueGray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline"
            >
            User
            </h6>
            <!-- Navigation -->

            <ul
              class="md:flex-col md:min-w-full flex flex-col list-none md:mb-4"
            >
              <li class="items-center">
                <a
                  href="{{ route('profile') }}"
                  class="{{ request()->routeIs('profile') ? 'text-xs  text-blue-500 hover:text-blue-600 ' : '' }} text-blueGray-700 hover:text-blueGray-500 text-xs uppercase py-3 font-bold block"
                >
                  <i
                    class="fas fa-user-circle text-blueGray-800 mr-2 text-sm"
                  ></i>
                 
                  Profile
                </a>
              </li>

              <li class="items-center">
                <a
                  href="{{ route('notification') }}"
                  class="{{ request()->routeIs('notification') ? 'text-xs  text-blue-500 hover:text-blue-600 ' : '' }} text-xs uppercase py-3 font-bold block text-blueGray-700 hover:text-blueGray-500"
                >
                  <i
                    class="fas fa-bell mr-2 text-sm text-blueGray-800"
                  ></i>
                  
                  Notifications
                </a>
              </li>

              <li class="items-center">
                <a
                  href="{{ route('change-password') }}"
                  class="{{ request()->routeIs('change-password') ? 'text-xs  text-blue-500 hover:text-blue-600 ' : '' }} text-blueGray-700 hover:text-blueGray-500 text-xs uppercase py-3 font-bold block"
                >
                  <i
                    class="fas fa-lock text-blueGray-800 mr-2 text-sm"
                  ></i>

                  Change Password
                </a>
              </li>

              <li class="items-center">
                <a
                  href="{{ route('logout') }}"
                  class="text-red-700 hover:text-red-500 text-xs uppercase py-3 font-bold block"
                >
                  <i
                    class="fas fa-sign-out-alt text-red-300 mr-2 text-sm"
                  ></i>
                  
                  Logout
                </a>
              </li>

            </ul>
        </div>
      </nav>
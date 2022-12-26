<h1>admin</h1>
<x-app-layout>
    <x-slot name="header">
        <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
            <!-- Primary Navigation Menu -->
          <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
              <div class="flex justify-between h-16">
                  <div class="flex">
                      <!-- Logo -->
                      <div class="flex-shrink-0 flex items-center">
                          <a href="{{ route('dashboard') }}">
                              <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                          </a>
                      </div>

                      <!-- Navigation Links -->
                      <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                          <x-nav-link :href="route('departments')" :active="request()->routeIs('departments')">
                              {{ __('departments') }}
                          </x-nav-link>
                      </div>

                      <!-- Navigation Links -->
                      <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link :href="route('admin_positions')" :active="request()->routeIs('admin_positions')">
                            {{ __('positions') }}
                        </x-nav-link>
                    </div>

                      <!-- Navigation Links -->
                      <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                          <x-nav-link :href="route('nominees')" :active="request()->routeIs('nominees')">
                              {{ __('nominees') }}
                          </x-nav-link>
                      </div>
                  </div>

                  <!-- Settings Dropdown -->
                  <div class="hidden sm:flex sm:items-center sm:ml-6">
                      <x-dropdown align="right" width="48">
                          <x-slot name="trigger">
                              <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                  <div>{{ Auth::user()->name }}</div>

                                  <div class="ml-1">
                                      <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                          <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                      </svg>
                                  </div>
                              </button>
                          </x-slot>

                          <x-slot name="content">
                              <!-- Authentication -->
                              <form method="POST" action="{{ route('logout') }}">
                                  @csrf

                                  <x-dropdown-link :href="route('logout')"
                                          onclick="event.preventDefault();
                                                      this.closest('form').submit();">
                                      {{ __('Log Out') }}
                                  </x-dropdown-link>
                              </form>
                          </x-slot>
                      </x-dropdown>
                  </div>

                  <!-- Hamburger -->
                  <div class="-mr-2 flex items-center sm:hidden">
                      <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                          <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                              <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                              <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                          </svg>
                      </button>
                  </div>
              </div>
          </div>

          <!-- Responsive Navigation Menu -->
          <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
              <div class="pt-2 pb-3 space-y-1">
                  <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                      {{ __('Dashboard') }}
                  </x-responsive-nav-link>
              </div>

              <!-- Responsive Settings Options -->
              <div class="pt-4 pb-1 border-t border-gray-200">
                  <div class="px-4">
                      <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                      <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                  </div>

                  <div class="mt-3 space-y-1">
                      <!-- Authentication -->
                      <form method="POST" action="{{ route('logout') }}">
                          @csrf

                          <x-responsive-nav-link :href="route('logout')"
                                  onclick="event.preventDefault();
                                              this.closest('form').submit();">
                              {{ __('Log Out') }}
                          </x-responsive-nav-link>
                      </form>
                  </div>
              </div>
          </div>
      </nav>
    </x-slot>
 <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <div class="inline-block relative w-64">



                                @if (\Session::has('error'))
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                    <strong class="font-bold">Caution !</strong>
                                    <span class="block sm:inline">{!! \Session::get('error') !!}</span>
                                    @endif
                                    @if (\Session::has('success'))
                                <div class="bg-green-100 border border-green-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                    <strong class="font-bold">Hurray !</strong>
                                    <span class="block sm:inline">{!! \Session::get('success') !!}</span>
                                    @endif

                                    {{-- create a position for selected department --}}
                                <form class="w-full max-w-sm" method="POST" action="{{ route('admin_positions.store') }}" accept-charset="UTF-8">

                                    <select name="department_selected" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                                        <option value="none">Select Dept First</option>
                                        @foreach ($departments as $department)
                                        <option value="{{$department->id}}">{{$department->name}} {{$department->id}}</option>
                                        @endforeach
                                      </select>
                                    {{ csrf_field() }}
                                    <div class="flex items-center border-b border-teal-500 py-2">
                                      <input name="position_name" class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="add position" aria-label="Full name">
                                      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        CREATE
                                      </button>
                                    </div>
                                  </form>

                              </div>
                              {{-- positions announced so far --}}


                              <h3> All depts </h3>
                              @foreach ($departments as $department)
                              <br>
                               <h1>{{$department->name}}</h1>
                                @foreach ($allposts as $position)
                                  @if ($department->id == $position->department_id)
                                    <li>{{$position->name}}</li>

                                    <form class="mr-2" method="POST" action="{{ route('admin_positions.destroy', ['admin_position' => $position->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                        Delete
                                        </button>
                                      </form>

                                  @endif
                                 @endforeach
                              @endforeach

                              {{-- positions announced so far end --}}
                        </div>
                    </div>
                </div>
            </div>


</x-app-layout>

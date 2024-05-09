<nav x-data="{ open: false }" class="navbar navbar-expand-lg navbar-light bg-light" style="height: 3cm;">
    <!-- Primary Navigation Menu -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between h-16">
        <div class="flex">
                <!-- Navigation Links -->
            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex bg-red-500">
            @if(Auth::user() && Auth::user()->usertype)
                @php
                    $usertype = Auth()->user()->usertype;
                @endphp

                @if($usertype == 'admin')
                        <x-nav-link :href="route('admin.dashboardadmin')" :active="request()->routeIs('admin.dashboardadmin')" class="text-gray-500 hover:text-gray-700">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.universites.index')" :active="request()->routeIs('admin.universites.index')" class="text-gray-500 hover:text-gray-700">
                            {{ __('Universites') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.criteres.index')" :active="request()->routeIs('admin.criteres.index')" class="text-gray-500 hover:text-gray-700">
                            {{ __('Criteres') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.comments.index')" :active="request()->routeIs('admin.comments.index')" class="text-gray-500 hover:text-gray-700">
                            {{ __('Commentaires') }}
                        </x-nav-link>
                    @else
                        <x-nav-link :href="route('utilisateur.dashboarduser')" :active="request()->routeIs('utilisateur.dashboarduser')" class="text-gray-500 hover:text-gray-700">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                        <x-nav-link :href="route('utilisateur.universites.indexu')" :active="request()->routeIs('utilisateur.universites.indexu')" class="text-gray-500 hover:text-gray-700">
                            {{ __('Universites') }}
                        </x-nav-link>
                        <x-nav-link :href="route('utilisateur.criteres.indexu')" :active="request()->routeIs('utilisateur.criteres.indexu')" class="text-gray-500 hover:text-gray-700">
                            {{ __('Criteres') }}
                        </x-nav-link>
                        <x-nav-link :href="route('utilisateur.comments.indexu')" :active="request()->routeIs('utilisateur.comments.indexu')" class="text-gray-500 hover:text-gray-700">
                            {{ __('Commentaires') }}
                        </x-nav-link>
                        <x-nav-link :href="route('utilisateur.classement.index')" :active="request()->routeIs('utilisateur.classement.index')" class="text-gray-500 hover:text-gray-700">
                            {{ __('Classement') }}
                        </x-nav-link>
                    @endif
            @endif
                </div>
            </div>
        </div>
    </div>



        <!-- Responsive Settings Options -->
        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="text-gray-700">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" class="text-gray-700"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>

<nav x-data="{ open: false }" >
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
            

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                
                @if(request()->routeIs('profile.game.homepage'))
                    <x-nav-link :href="route( 'profile.game.new' )" :active="request()->routeIs('profile.game.new')">
                        {{ __('New game') }}
                    </x-nav-link>
                 @elseif(request()->routeIs('game.sequel.homepage'))
                 <x-nav-link :href="route( 'game.sequel.new',$game )" :active="request()->routeIs('game.sequel.new')">
                        {{ __('New sequel') }}
                    </x-nav-link>
                       
                 @elseif(request()->routeIs('game.sequel.new') || request()->routeIs('game.sequel.edit')) 
                    <x-nav-link :href="route( 'game.sequel.homepage',$game )" :active="request()->routeIs('game.sequel.homepage')">
                        {{ __('Return to game sequal homepage') }}
                    </x-nav-link>
                 @elseif(request()->routeIs('sequel.statistics.seqCreate') || request()->routeIs('sequel.statistics.seqEdit'))
                        <x-nav-link :href="route( 'sequel.statistics.seqHomepage',$sequel )" :active="request()->routeIs('sequel.statistics.seqHomepage')">
                        {{ __('Return to sequal statistic homepage') }}
                    </x-nav-link>  
                @elseif(request()->routeIs('sequel.statistics.seqHomepage'))
                        <x-nav-link :href="route( 'sequel.statistics.seqCreate',$sequel )" :active="request()->routeIs('sequel.statistics.seqCreate')">
                        {{ __('New sequel statistic') }}
                    </x-nav-link>  
                 @elseif(request()->routeIs('game.statistics.gamStIndex'))
                    <x-nav-link :href="route( 'game.statistics.gamStNew',$game )" :active="request()->routeIs('game.statistics.gamStIndex')">
                        {{ __('New game statistic') }}
                    </x-nav-link>  
                 @elseif(request()->routeIs('game.statistics.gamStNew') || request()->routeIs('game.statistics.gamEdit'))
                    <x-nav-link :href="route( 'game.statistics.gamStIndex',$game )" :active="request()->routeIs('game.statistics.gamStNew')">
                        {{ __('Back to gaming statistic homepage') }}
                    </x-nav-link> 
                 @elseif(request()->routeIs('game.genre.genGmIndex'))
                     
                 @else  
                       <x-nav-link :href="route( 'profile.game.homepage' )" :active="request()->routeIs('profile.game.homepage')">
                        {{ __('Back to gaming homepage') }}
                    </x-nav-link>
                 @endif

             
                </div>
            </div>

       

        
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
               
            </div>

            <div class="mt-3 space-y-1">
          

           
            </div>
        </div>
    </div>
</nav>

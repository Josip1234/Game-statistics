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
                      <x-nav-link :href="route( 'profile.game.homepage' )" :active="request()->routeIs('profile.game.homepage')">
                        {{ __('Back to gaming homepage') }}
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
                     <x-nav-link :href="route( 'game.sequel.homepage',$sequel->game_id )" :active="request()->routeIs('game.sequel.homepage')">
                        {{ __('Return to game sequal homepage') }}
                    </x-nav-link>
                 @elseif(request()->routeIs('game.statistics.gamStIndex'))
                    <x-nav-link :href="route( 'game.statistics.gamStNew',$game )" :active="request()->routeIs('game.statistics.gamStIndex')">
                        {{ __('New game statistic') }}
                    </x-nav-link>  
                        <x-nav-link :href="route( 'profile.game.homepage' )" :active="request()->routeIs('profile.game.homepage')">
                        {{ __('Back to gaming homepage') }}
                    </x-nav-link>
                 @elseif(request()->routeIs('game.statistics.gamStNew') || request()->routeIs('game.statistics.gamEdit'))
                    <x-nav-link :href="route( 'game.statistics.gamStIndex',$game )" :active="request()->routeIs('game.statistics.gamStNew')">
                        {{ __('Back to gaming statistic homepage') }}
                    </x-nav-link> 
                 @elseif(request()->routeIs('game.genre.genGmIndex'))
                     <x-nav-link :href="route( 'game.genre.genNew' )">
                        {{ __('Add new genre') }}
                    </x-nav-link> 
                 @elseif(request()->routeIs('game.genre.genNew') || request()->routeIs('game.genre.genEdit')) 
                    <x-nav-link :href="route( 'game.genre.genGmIndex' )">
                        {{ __('Back to the genre homepage') }}
                    </x-nav-link>
                 @elseif(request()->routeIs('game.platform.index'))
                     <x-nav-link :href="route( 'game.platform.create' )">
                        {{ __('New platform') }}
                    </x-nav-link>
                 @elseif(request()->routeIs('game.platform.create') || request()->routeIs('game.platform.edit'))
                    <x-nav-link :href="route( 'game.platform.index' )">
                        {{ __('Back to platform homepage') }}
                    </x-nav-link>
                 @elseif(request()->routeIs('game.profile.index')) 
                 <x-nav-link :href="route( 'profile.game.homepage' )" :active="request()->routeIs('profile.game.homepage')">
                        {{ __('Back to gaming homepage') }}
                    </x-nav-link>  
                       <x-nav-link :href="route( 'game.profile.create',$game )">
                        {{ __('New game profile') }}
                    </x-nav-link> 
                 @elseif(request()->routeIs('game.profile.edit') || request()->routeIs('game.profile.create'))  
                   <x-nav-link :href="route( 'game.profile.index',$game )">
                        {{ __('Back to game profile index') }}
                    </x-nav-link>   
                 @elseif(request()->routeIs('sequel.profile.index')) 

                  <x-nav-link :href="route( 'game.sequel.homepage',$sequel )" :active="request()->routeIs('game.sequel.homepage')">
                        {{ __('Back to sequel homepage') }}
                    </x-nav-link> 


                  <x-nav-link :href="route( 'sequel.profile.create',[$game,$sequel] )">
                        {{ __('New sequel profile') }}
                    </x-nav-link> 
                 @elseif(request()->routeIs('sequel.profile.edit') || request()->routeIs('sequel.profile.create'))  
                   <x-nav-link :href="route( 'sequel.profile.index',[$game,$sequel] )">
                        {{ __('Back to sequel profile index') }}
                    </x-nav-link>
                 @elseif(request()->routeIs('game.sequel.modifications.seqIndex'))
                 <x-nav-link :href="route( 'game.sequel.modifications.seqCreate',[$game,$sequel] )">
                        {{ __('Create new sequel modification') }}
                    </x-nav-link>
                     <x-nav-link :href="route( 'game.sequel.homepage',$game )">
                        {{ __('Return to sequel homepage') }}
                    </x-nav-link>
                 @elseif(request()->routeIs('game.sequel.modifications.index')) 
                  <x-nav-link :href="route( 'game.sequel.modifications.create',$game )">
                        {{ __('Create new game modification') }}
                    </x-nav-link>
                     <x-nav-link :href="route( 'profile.game.homepage' )" :active="request()->routeIs('profile.game.homepage')">
                        {{ __('Back to gaming homepage') }}
                    </x-nav-link>
                 @elseif(request()->routeIs('game.sequel.modifications.seqCreate'))
                   <x-nav-link :href="route( 'game.sequel.modifications.seqIndex',[$game,$sequel] )">
                        {{ __('Return to modification sequel index') }}
                    </x-nav-link>
                   @elseif(request()->routeIs('game.sequel.modifications.create'))
                   <x-nav-link :href="route( 'game.sequel.modifications.index',$game )">
                        {{ __('Return to game modification index') }}
                    </x-nav-link>
                @elseif(request()->routeIs('modification.details.index')) 
                      {{-- if route in session is equal to games with no sequel return url  else return button for history --}}
                     
                         @if(session(0)==='game.sequel.modifications.index')
                                 <x-nav-link :href="route(  session(0),$modification->game_id )">
                                {{ __('Return to game modification index') }}
                            </x-nav-link>
                         @elseif(session(0)==='game.sequel.modifications.seqIndex')
                         <x-nav-link :href="route(  session(0),[$modification->game_id,$modification->sequel_id] )">
                                {{ __('Return to sequel modification index') }}
                            </x-nav-link>
                         @elseif(isset($modification->game_id) && !isset($modification->sequel_id)) 
                          <x-nav-link :href="route( 'game.sequel.modifications.index',$modification->game_id )">
                                {{ __('Return to game modification index') }}
                            </x-nav-link>
                        @elseif(isset($modification->game_id) && isset($modification->sequel_id))
                               <x-nav-link :href="route(  'game.sequel.modifications.seqIndex',[$modification->game_id,$modification->sequel_id] )">
                                {{ __('Return to sequel modification index') }}
                            </x-nav-link>
                         @endif

                         <x-nav-link :href="route(  'modification.details.create',$modification )">
                                {{ __('Create new modification details') }}
                            </x-nav-link>

                 @elseif(request()->routeIs('modification.details.create') || request()->routeIs('modification.details.edit'))
                     <x-nav-link :href="route(  'modification.details.index',$modification )">
                          {{ __('Return to  modification detail index') }}
                     </x-nav-link>  
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

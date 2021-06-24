<nav class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
		<div class="flex items-center w-full h-16">
			<!-- Logo -->
			<div>
				<a href="{{ route('dashboard') }}">
					<x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
				</a>
			</div>
			
			<div class="ml-auto justify-self-end flex items-center">
				<a href="{{ route('profile') }}" class="inline-flex items-center text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700 transition duration-150 ease-in-out">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
					</svg>
					<span class="ml-2 hidden sm:inline">Profile</span>
				</a>
			</div>

			<div class="ml-4">
				<form class="flex items-center" method="POST" action="{{ route('logout') }}">
					@csrf
					<a href="{{ route('logout') }}" class="inline-flex items-center text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700 transition duration-150 ease-in-out"
					onclick="event.preventDefault(); this.closest('form').submit();">
						<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
						</svg>
						<span class="ml-2 hidden sm:inline">Logout</span>
					</a>
				</form>
			</div>
		</div>
    </div>
</nav>

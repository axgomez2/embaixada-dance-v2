<nav class="bg-white border-b border-gray-900">
    <!-- Top Navigation Bar -->
    <div class="max-w-screen-xl mx-auto px-4 py-2.5">
      <div class="flex items-center justify-between">
        <!-- Logo -->
        <div class="flex items-center">
          <a href="{{ route('site.home') }}" class="flex items-center">
            <img
                src="{{ asset('assets/images/logo2.png') }}"
                alt="Logo"
                class="h-6 sm:h-10 md:h-10 lg:h-14 mt-2 mb-2"
            >
          </a>
        </div>

        <!-- Search Bar -->
        <div class="flex-1 max-w-3xl mx-4 hidden md:block">
          <form class="flex" action="{{ route('site.search') }}" method="GET">
            <div class="relative w-full">
              <input
                  type="search"
                  name="q"
                  class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-sky-500 focus:border-sky-500"
                  placeholder="O que você está procurando?"
              >
              <button
                  type="submit"
                  class="absolute top-0 right-0 h-full p-2.5 text-sm font-medium text-black bg-sky-600 rounded-r-lg border border-sky-900 hover:bg-sky-800 focus:ring-4 focus:outline-none focus:ring-yellow-300"
              >
                <i class="fa-solid fa-magnifying-glass"></i>
              </button>
            </div>
          </form>
        </div>

        <!-- Right Icons -->
        <div class="flex items-center space-x-4">

             <!-- Botão do Menu Mobile -->
            <button
            data-drawer-target="drawer-navigation"
            data-drawer-toggle="drawer-navigation"
            aria-controls="drawer-navigation"
            type="button"
            class="lg:hidden inline-flex items-center p-2   text-sm text-sky-600 rounded-lg hover:text-sky-800 focus:outline-none focus:ring-2 focus:ring-sky-9

            00"
        >
        <span class="sr-only">Open main menu</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
            <path
                fill-rule="evenodd"
                d="M3 5a1 1 0
                011-1h12a1 1
                0 110 2H4a1 1
                0 01-1-1zM3
                10a1 1 0
                011-1h12a1
                1 0 110
                2H4a1 1
                0 01-1-1zM3
                15a1 1 0
                011-1h12a1
                1 0 110
                2H4a1 1
                0 01-1-1z"
                clip-rule="evenodd"
            ></path>
        </svg>
        </button>
          <!-- Favorites -->
          @auth
          <a
              href="{{ route('site.wishlist.index') }}"
              class="relative inline-flex items-center p-2  text-sky-700 hover:text-sky-900 focus:outline-none focus:ring-2 focus:ring-yellow-400"
          >
              <i class="fa-regular fa-heart text-xl"></i>
              @if($wishlistCount > 0)
                  <span
                      data-wishlist-badge
                      class="absolute inline-flex items-center justify-center w-5 h-5 text-xs font-bold text-black bg-white border-2 border-yellow-400 rounded-full -top-2 -right-2"
                  >
                      {{ $wishlistCount }}
                  </span>
              @endif
          </a>
          @else
          <button
              type="button"
              class="relative inline-flex items-center p-2 text-sky-700 hover:text-sky-900"
              onclick="showLoginToast()"
          >
              <i class="fa-regular fa-heart text-xl"></i>
          </button>
          @endauth

          <!-- Wantlist -->
          <!-- @auth
          <a
              href="{{ route('site.wantlist.index') }}"
              class="relative inline-flex items-center p-2  text-sky-700 hover:text-sky-900 focus:outline-none focus:ring-2 focus:ring-yellow-400"
          >
              <i class="fa-regular fa-bell text-xl"></i>
              @php
                  $wantlistCount = \App\Models\Wantlist::where('user_id', auth()->id())->count();
              @endphp
              @if($wantlistCount > 0)
                  <span
                      data-wantlist-badge
                      class="absolute inline-flex items-center justify-center w-5 h-5 text-xs font-bold text-black bg-white border-2 border-sky-400 rounded-full -top-2 -right-2"
                  >
                      {{ $wantlistCount }}
                  </span>
              @endif
          </a>
          @else
          <button
              type="button"
              class="relative inline-flex items-center p-2 text-sky-700 hover:text-sky-900"
              onclick="showLoginToast()"
          >
              <i class="fa-regular fa-bell text-xl"></i>
          </button>
          @endauth -->

          <!-- Cart -->
          @auth
          <button
              type="button"
              data-dropdown-toggle="cart-dropdown"
              class="relative inline-flex items-center p-2 text-sky-700 hover:text-sky-900"
          >
              <i class="fa-solid fa-cart-shopping text-xl"></i>
              @if($cartCount > 0)
                  <span
                      data-cart-count
                      class="absolute inline-flex items-center justify-center w-5 h-5 text-xs font-bold text-black bg-white border-2 border-yellow-400 rounded-full -top-2 -right-2"
                  >
                      {{ $cartCount }}
                  </span>
              @endif
          </button>
          @else
          <a
              href="{{ route('site.cart.index') }}"
              class="relative inline-flex items-center p-2 text-sky-700 hover:text-sky-900"
          >
              <i class="fa-solid fa-cart-shopping text-xl"></i>
              <span
                  data-cart-count
                  class="absolute inline-flex items-center justify-center w-5 h-5 text-xs font-bold text-black bg-white border-2 border-yellow-400 rounded-full -top-2 -right-2 {{ isset($cartCount) && $cartCount > 0 ? '' : 'hidden' }}"
              >
                  {{ $cartCount ?? 0 }}
              </span>
          </a>
          @endauth

          <!-- Notificações -->
          @auth
          <div class="relative" x-data="{ notificationsOpen: false }">
              <button
                  type="button"
                  @click="notificationsOpen = !notificationsOpen"
                  @keydown.escape.window="notificationsOpen = false"
                  @click.away="notificationsOpen = false"
                  class="relative inline-flex items-center p-2 text-sky-700 hover:text-sky-900 focus:outline-none focus:ring-2 focus:ring-yellow-400"
              >
                  <i class="fa-regular fa-bell text-xl"></i>
                  <span
                      data-notifications-count
                      class="absolute inline-flex items-center justify-center w-5 h-5 text-xs font-bold text-black bg-white border-2 border-yellow-400 rounded-full -top-2 -right-2 {{ auth()->user()->unreadNotifications->count() > 0 ? '' : 'hidden' }}"
                  >
                      {{ auth()->user()->unreadNotifications->count() }}
                  </span>
              </button>

              <!-- Dropdown de notificações -->
              <div
                  x-show="notificationsOpen"
                  x-transition:enter="transition ease-out duration-100"
                  x-transition:enter-start="transform opacity-0 scale-95"
                  x-transition:enter-end="transform opacity-100 scale-100"
                  x-transition:leave="transition ease-in duration-75"
                  x-transition:leave-start="transform opacity-100 scale-100"
                  x-transition:leave-end="transform opacity-0 scale-95"
                  class="absolute right-0 z-50 w-80 mt-2 origin-top-right bg-slate-100 rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
              >
                  <div class="px-4 py-3 border-b border-gray-100 flex justify-between items-center">
                      <p class="text-sm font-semibold text-slate-800">Notificações</p>
                      @if(auth()->user()->unreadNotifications->count() > 0)
                          <a href="{{ route('site.notifications.mark-all-read') }}" class="text-xs text-sky-600 hover:text-sky-800">Marcar todas como lidas</a>
                      @endif
                  </div>

                  <div class="py-2 max-h-60 overflow-y-auto" data-notifications-container>
                      @forelse(auth()->user()->notifications()->take(5)->get() as $notification)
                          <div class="px-4 py-2 border-b border-gray-100 {{ $notification->read_at ? 'bg-white' : 'bg-yellow-50' }}">
                              <div class="flex items-center">
                                  @if($notification->type == 'App\\Notifications\\WantlistItemAvailableNotification')
                                      <div class="flex-shrink-0 mr-3">
                                          <img src="{{ asset('storage/' . $notification->data['cover_image']) }}" alt="Capa do disco" class="w-10 h-10 object-cover rounded">
                                      </div>
                                  @endif
                                  <div class="flex-1">
                                      <p class="text-sm text-slate-700">{{ $notification->data['message'] }}</p>
                                      <p class="text-xs text-slate-500 mt-1">{{ $notification->created_at->diffForHumans() }}</p>
                                  </div>
                                  @unless($notification->read_at)
                                      <a href="{{ route('site.notifications.mark-as-read', $notification->id) }}" class="ml-2 text-xs text-sky-600 hover:text-sky-800">
                                          <i class="fa-regular fa-circle-check"></i>
                                      </a>
                                  @endunless
                              </div>
                              <div class="mt-2">
                                  <a href="{{ $notification->data['url'] }}" class="text-xs text-sky-600 hover:text-sky-800">Ver detalhes</a>
                              </div>
                          </div>
                      @empty
                          <div class="px-4 py-3 text-sm text-slate-600">
                              <p>Você não tem notificações.</p>
                          </div>
                      @endforelse
                  </div>

                  @if(auth()->user()->notifications()->count() > 5)
                      <div class="px-4 py-2 border-t border-gray-100">
                          <a href="{{ route('site.notifications.index') }}" class="text-sm text-sky-600 hover:text-sky-800">Ver todas as notificações</a>
                      </div>
                  @endif
              </div>
          </div>
          @endauth

          @auth
          <!-- Dropdown do Usuário Autenticado -->
          <div class="relative" x-data="{ open: false }">
              <button
                  type="button"
                  @click="open = !open"
                  @keydown.escape.window="open = false"
                  @click.away="open = false"
                  class="flex items-center text-sky-700 hover:text-sky-900"
              >
                  <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="w-6 h-6"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                  >
                      <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M16 7a4 4 0
                             11-8 0 4 4 0
                             018 0zM12 14a7 7 0
                             00-7 7h14a7 7 0
                             00-7-7z"
                      />
                  </svg>
              </button>

              <!-- Dropdown menu -->
              <div
                  x-show="open"
                  x-transition:enter="transition ease-out duration-100"
                  x-transition:enter-start="transform opacity-0 scale-95"
                  x-transition:enter-end="transform opacity-100 scale-100"
                  x-transition:leave="transition ease-in duration-75"
                  x-transition:leave-start="transform opacity-100 scale-100"
                  x-transition:leave-end="transform opacity-0 scale-95"
                  class="absolute right-0 z-50 w-60 mt-2 origin-top-right bg-slate-100 rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
              >
                  <!-- User Info -->
                  <div class="px-4 py-3 border-b border-gray-100">
                      <p class="text-sm font-semibold text-slate-800">
                          {{ Auth::user()->name }}
                      </p>
                      <p class="text-sm text-slate-700 truncate">
                          {{ Auth::user()->email }}
                      </p>
                  </div>

                  <!-- Main Menu Items -->
                  <div class="py-2">
                      <a
                          href="{{ route('site.orders.index') }}"
                          class="flex items-center px-4 py-2 text-sm text-slate-700 hover:text-slate-900"
                      >
                          <svg
                              xmlns="http://www.w3.org/2000/svg"
                              class="w-4 h-4 mr-3"
                              fill="none"
                              viewBox="0 0 24 24"
                              stroke="currentColor"
                          >
                              <path
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M16 11V7a4 4 0
                                     00-8 0v4M5 9h14l1
                                     12H4L5 9z"
                              />
                          </svg>
                          MEUS PEDIDOS
                      </a>

                      <a
                          href="{{ route('site.wishlist.index') }}"
                          class="flex items-center px-4 py-2 text-sm text-slate-700 hover:text-slate-900"
                      >
                          <svg
                              xmlns="http://www.w3.org/2000/svg"
                              class="w-4 h-4 mr-3"
                              fill="none"
                              viewBox="0 0 24 24"
                              stroke="currentColor"
                          >
                              <path
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M4.318 6.318a4.5
                                     4.5 0 000 6.364L12
                                     20.364l7.682-7.682a4.5
                                     4.5 0 00-6.364-6.364L12
                                     7.636l-1.318-1.318a4.5
                                     4.5 0 00-6.364 0z"
                              />
                          </svg>
                          FAVORITOS
                      </a>

                      <a
                          href="{{ route('site.wantlist.index') }}"
                          class="flex items-center px-4 py-2 text-sm text-slate-700 hover:text-slate-900"
                      >
                          <svg
                              xmlns="http://www.w3.org/2000/svg"
                              class="w-4 h-4 mr-3"
                              fill="none"
                              viewBox="0 0 24 24"
                              stroke="currentColor"
                          >
                              <path
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M16 15v-1a4 4 0
                                     00-4-4H8m0 0l3 3m-3-3l3-3m9
                                     14V5a2 2 0 00-2-2H6a2 2 0
                                     00-2 2v16l4-2 4 2 4-2 4
                                     2z"
                              />
                          </svg>
                          WANTLIST
                      </a>
                  </div>

                  <!-- Settings Section -->
                  <div class="py-2 border-t border-gray-100">
                      <a
                          href="{{ route('profile.edit') }}"
                          class="flex items-center px-4 py-2 text-sm text-slate-700 hover:text-slate-900"
                      >
                          <svg
                              xmlns="http://www.w3.org/2000/svg"
                              class="w-4 h-4 mr-3"
                              fill="none"
                              viewBox="0 0 24 24"
                              stroke="currentColor"
                          >
                              <path
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M10.325 4.317c.426-1.756
                                     2.924-1.756 3.35 0a1.724
                                     1.724 0 002.573
                                     1.066c1.543-.94 3.31.826
                                     2.37 2.37a1.724
                                     1.724 0 001.065 2.572
                                     c1.756.426 1.756 2.924
                                     0 3.35a1.724 1.724 0
                                     00-1.066 2.573c.94 1.543
                                     -.826 3.31-2.37 2.37a1.724
                                     1.724 0 00-2.572 1.065c-
                                     .426 1.756-2.924 1.756
                                     -3.35 0a1.724 1.724 0 00-
                                     2.573-1.066c-1.543.94
                                     -3.31-.826-2.37-2.37a1.724
                                     1.724 0 00-1.065-2.572
                                     c-1.756-.426-1.756-2.924
                                     0-3.35a1.724 1.724 0 001.066
                                     -2.573c-.94-1.543.826-3.31
                                     2.37-2.37.996.608 2.296.07
                                     2.572-1.065z"
                              />
                              <path
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M15 12a3 3 0
                                     11-6 0 3 3 0
                                     016 0z"
                              />
                          </svg>
                          MEU PERFIL
                      </a>
                  </div>



                  <!-- Logout Section -->
                  <div class="py-2 border-t border-gray-100">
                      <form method="POST" action="{{ route('logout') }}">
                          @csrf
                          <button
                              type="submit"
                              class="flex w-full items-center px-4 py-2 text-sm text-slate-700 hover:text-slate-900"
                          >
                              <svg
                                  xmlns="http://www.w3.org/2000/svg"
                                  class="w-4 h-4 mr-3"
                                  fill="none"
                                  viewBox="0 0 24 24"
                                  stroke="currentColor"
                              >
                                  <path
                                      stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0
                                         01-3 3H6a3 3 0
                                         01-3-3V7a3 3 0
                                         013-3h4a3 3 0
                                         013 3v1"
                                  />
                              </svg>
                              SAIR
                          </button>
                      </form>
                  </div>
              </div>
          </div>
          @else
          <!-- Dropdown do Usuário Deslogado -->
          <div class="relative " x-data="{ open: false }">
              <button
                  type="button"
                  @click="open = !open"
                  @keydown.escape.window="open = false"
                  @click.away="open = false"
                  class="flex items-center text-sky-700 hover:text-sky-900"
              >
                  <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="w-6 h-6"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                  >
                      <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M16 7a4 4 0
                             11-8 0 4 4 0
                             018 0zM12 14a7 7 0
                             00-7 7h14a7 7 0
                             00-7-7z"
                      />
                  </svg>
              </button>

              <!-- Guest Dropdown menu -->
              <div
                  x-show="open"
                  x-transition:enter="transition ease-out duration-100"
                  x-transition:enter-start="transform opacity-0 scale-95"
                  x-transition:enter-end="transform opacity-100 scale-100"
                  x-transition:leave="transition ease-in duration-75"
                  x-transition:leave-start="transform opacity-100 scale-100"
                  x-transition:leave-end="transform opacity-0 scale-95"
                  class="absolute right-0 z-50 w-48 mt-2 origin-top-right bg-slate-100 rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
              >
                  <div class="py-1">
                      <button
                          @click="$dispatch('open-login-modal'); open = false"
                          class="flex w-full items-center px-4 py-2 text-sm text-slate-700 hover:text-slate-900"
                      >
                          <svg
                              xmlns="http://www.w3.org/2000/svg"
                              class="w-4 h-4 mr-3"
                              fill="none"
                              viewBox="0 0 24 24"
                              stroke="currentColor"
                          >
                              <path
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0
                                     01-3 3H6a3 3 0
                                     01-3-3V7a3 3 0
                                     013-3h4a3 3 0
                                     013 3v1"
                              />
                          </svg>
                          LOGIN
                      </button>
                      <button
                          @click="$dispatch('open-register-modal'); open = false"
                          class="flex w-full items-center px-4 py-2 text-md text-slate-700 hover:text-slate-900"
                      >
                          <svg
                              xmlns="http://www.w3.org/2000/svg"
                              class="w-4 h-4 mr-3"
                              fill="none"
                              viewBox="0 0 24 24"
                              stroke="currentColor"
                          >
                              <path
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0
                                     11-8 0 4 4 0
                                     018 0zM3 20a6 6 0
                                     0112 0v1H3v-1z"
                              />
                          </svg>
                          CADASTRO
                      </button>
                  </div>
              </div>
          </div>
          @endauth
        </div>
      </div>
    </div>

{{-- menu pc --}}
    <div class="border-t border-gray-200 hidden lg:block">
        <div class="max-w-screen-xl mx-auto px-2">
            <div class="flex items-center justify-center relative">
                <ul class="flex flex-wrap items-center py-3 text-base font-medium text-sky-700  space-x-8">
                    <li><a href="{{ route('site.home') }}" class="hover:text-sky-900">Início</a></li>

                    <!-- Dropdown Dinâmico para Discos -->
                    <li class="relative" x-data="{ open: false }">
                        <button
                            @click="open = !open; if(open) document.body.classList.add('mega-menu-open'); else document.body.classList.remove('mega-menu-open')"
                            @keydown.escape.window="open = false; document.body.classList.remove('mega-menu-open')"
                            class="flex items-center text-base font-medium text-sky-700 hover:text-sky-900"
                        >
                            <span>Discos</span>
                            <svg
                                class="w-4 h-4 ml-1 transition-transform duration-200"
                                :class="{ 'rotate-180': open }"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                        </button>

                        <!-- Overlay Background -->
                        <div
                            x-show="open"
                            x-cloak
                            class="fixed inset-0 bg-black bg-opacity-50 z-40"
                            @click="open = false; document.body.classList.remove('mega-menu-open')"
                        ></div>

                        <!-- Mega Menu -->
                        <div
                            x-show="open"
                            x-cloak
                            @click.away="open = false; document.body.classList.remove('mega-menu-open')"
                            x-transition:enter="transition ease-out duration-150"
                            x-transition:enter-start="opacity-0 scale-95"
                            x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-10"
                            x-transition:leave-start="opacity-100 scale-100"
                            x-transition:leave-end="opacity-0 scale-95"
                            class="mt-20 fixed left-1/2 transform -translate-x-1/2 top-[calc(theme('spacing.16')+theme('spacing.3'))] w-screen max-w-screen-xl z-50 bg-slate-100 border border-slate-700 shadow-lg rounded-lg"
                        >
                            <div class="p-6">
                                <div class="grid gap-6 lg:grid-cols-5 text-center">
                                    <a href="{{ route('site.vinyls.index') }}" class="text-sky-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5">
                                        VER TODOS
                                    </a>
                                    @if(isset($categories) && $categories->count())
                                        @foreach($categories as $category)
                                            <a href="{{ route('vinyls.byCategory', ['slug' => $category->slug]) }}" class="text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5">
                                                {{ $category->nome }}
                                            </a>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </li>

                    <!-- Outros links -->
                    <li><a href="#" class="text-base font-medium text-sky-600 hover:text-sky-900">Equipamentos</a></li>
                    <li><a href="#" class="text-base font-medium text-sky-600 hover:text-sky-900">Sobre</a></li>
                    <li><a href="#" class="text-base font-medium text-sky-600 hover:text-sky-900">Contato</a></li>
                    <li><a href="{{ route('site.vinyls.offers') }}" class="text-base font-medium text-sky-600 hover:text-sky-900">Ofertas</a></li>
                </ul>
            </div>
        </div>
    </div>

    <style>
        [x-cloak] { display: none !important; }

        body.mega-menu-open {
            overflow: hidden;
        }
    </style>








    <!-- Drawer Sidebar -->
    <div
        id="drawer-navigation"
        class="fixed top-0 left-0 z-40 w-64 h-screen p-4 overflow-y-auto
               transition-transform -translate-x-full bg-white"
        tabindex="-1"
        aria-labelledby="drawer-navigation-label"
    >
      <h5 id="drawer-navigation-label" class="text-base font-semibold text-gray-800 uppercase">
        Menu
      </h5>
      <button
          type="button"
          data-drawer-hide="drawer-navigation"
          aria-controls="drawer-navigation"
          class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900
                 rounded-lg text-sm w-8 h-8 absolute top-2.5 right-2.5 inline-flex
                 items-center justify-center"
      >
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
          <path
              stroke="currentColor"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"
          />
        </svg>
        <span class="sr-only">Close menu</span>
      </button>
      <div class="py-4 overflow-y-auto">
        <ul class="space-y-2 font-medium">
          <li>
            <a
                href="{{ route('site.home') }}"
                class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100"
            >
              <span class="ml-3">Inicio</span>
            </a>
          </li>

          <!-- Menu de Categorias de Discos - Agora similar ao mega menu desktop -->
          <li x-data="{ open: false }">
            <button
              type="button"
              class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100"
              @click="open = !open"
              aria-controls="dropdown-discos"
            >
              <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
              </svg>
              <span class="flex-1 ml-3 text-left whitespace-nowrap">Discos</span>
              <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
              </svg>
            </button>

            <!-- Grade de categorias de discos (similar ao mega menu) -->
            <div
              id="dropdown-discos"
              x-show="open"
              x-transition:enter="transition ease-out duration-100"
              x-transition:enter-start="transform opacity-0 scale-95"
              x-transition:enter-end="transform opacity-100 scale-100"
              x-transition:leave="transition ease-in duration-75"
              x-transition:leave-start="transform opacity-100 scale-100"
              x-transition:leave-end="transform opacity-0 scale-95"
              class="p-3 space-y-3 bg-gray-50 rounded-lg m-2"
            >
              <!-- Link para ver todos os discos -->
              <a href="{{ route('site.vinyls.index') }}"
                 class="flex items-center justify-center w-full p-2 text-sky-900 hover:text-white border border-gray-800 hover:bg-gray-900 text-sm font-medium rounded-lg">
                VER TODOS OS DISCOS
              </a>

              <!-- Grade de categorias -->
              <div class="grid grid-cols-1 gap-2 mt-3">
                @if(isset($categories) && $categories->count())
                  @foreach($categories as $category)
                    <a href="{{ route('vinyls.byCategory', ['slug' => $category->slug]) }}"
                       class="flex items-center justify-center p-2 text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 text-sm font-medium rounded-lg">
                      {{ $category->nome }}
                    </a>
                  @endforeach
                @else
                  <span class="text-sm text-gray-500 text-center p-2">
                    Nenhuma categoria encontrada
                  </span>
                @endif
              </div>
            </div>
          </li>

          <!-- Outros itens do menu -->
          <li>
            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
              <span class="ml-3">Equipamentos</span>
            </a>
          </li>
          <li>
            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
              <span class="ml-3">Sobre</span>
            </a>
          </li>
          <li>
            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
              <span class="ml-3">Contato</span>
            </a>
          </li>
          <li>
            <a href="{{ route('site.vinyls.offers') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
              <span class="ml-3">Ofertas</span>
            </a>
          </li>
          @auth
          <li>
            <a href="{{ route('site.orders.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
              <span class="ml-3">Meus Pedidos</span>
            </a>
          </li>
          @endauth
        </ul>
      </div>
    </div>

    <!-- Mobile Search - Only visible on mobile -->
    <div class="md:hidden px-4 py-3 border-t border-gray-200">
      <form class="flex" action="{{ route('site.search') }}" method="GET">
        <div class="relative w-full">
          <input
              type="search"
              name="q"
              class="block w-full p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-yellow-500 focus:border-yellow-500"
              placeholder="digite sua busca..."
          >
          <button
              type="submit"
              class="absolute top-0 right-0 h-full p-2.5 text-sm font-medium  text-black bg-yellow-400 rounded-r-lg border border-yellow-400 hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-yellow-300"
          >
            <i class="fa-solid fa-magnifying-glass"></i>
          </button>
        </div>
      </form>
    </div>
</nav>





<!-- Cart Dropdown -->
@auth
<div
    id="cart-dropdown"
    class="hidden z-50 my-4 w-80 bg-white divide-y divide-gray-100 rounded-lg shadow"
>
  <div class="p-4">
    <div class="flex justify-between items-center mb-4">
      <h6 class="text-sm font-medium text-gray-900">
        Carrinho ({{ $cartCount }})
      </h6>
      <a href="{{ route('site.cart.index') }}" class="text-sm font-medium text-blue-600">
        Ver Carrinho
      </a>
    </div>
    <div class="flow-root">
      <ul class="divide-y divide-gray-100">
        @if($cartCount > 0 && $cart)
          @foreach($cart->items->take(4) as $item)
            <li class="flex py-3 items-center">
              <img
                  src="{{ $item->product->productable->cover_image ?? ($item->product->productable->vinylMaster->cover_image ?? asset('images/placeholder.jpg')) }}"
                  class="w-12 h-12 object-cover rounded"
                  alt="{{ $item->product->name }}"
              >
              <div class="ml-3">
                <p class="text-sm font-medium text-gray-900">
                  {{ $item->product->name }}
                </p>
                <p class="text-sm text-gray-500">
                  R$ {{ number_format($item->product->price, 2, ',', '.') }}
                </p>
              </div>
            </li>
          @endforeach
        @else
          <li class="py-3">
            <p class="text-sm text-gray-500">Seu carrinho está vazio</p>
          </li>
        @endif
      </ul>
    </div>
    @if($cartCount > 0)
      <div class="mt-4">
        <a
            href="{{ route('site.checkout.index') }}"
            class="w-full text-white bg-blue-600 hover:bg-blue-700
                   font-medium rounded-lg text-sm px-5 py-2.5 text-center block"
        >
          Finalizar Compra
        </a>
      </div>
    @endif
  </div>
</div>
@endauth






  @push('scripts')
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Dropdown Toggle Script
      document.querySelectorAll('[data-dropdown-toggle]').forEach(trigger => {
        trigger.addEventListener('click', function(e) {
          e.stopPropagation();
          const dropdownId = this.getAttribute('data-dropdown-toggle');
          const dropdown = document.getElementById(dropdownId);
          if (dropdown) {
            dropdown.classList.toggle('hidden');
          }
        });
      });
      // Fecha dropdowns ao clicar fora
      document.addEventListener('click', function() {
        document.querySelectorAll('[id$="-dropdown"]').forEach(dropdown => {
          if (!dropdown.classList.contains('hidden')) {
            dropdown.classList.add('hidden');
          }
        });
      });
    });
  </script>
  <script>
    function showLoginToast() {
      window.showToast("Você precisa estar logado para realizar esta ação", "warning");
    }
  </script>

  <!-- Script para evitar que o mega menu abra antes da página carregar -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Inicialização adequada do Alpine para garantir que menus não abram automaticamente
      if (typeof Alpine !== 'undefined') {
        Alpine.start();
      }
    });
  </script>
  @endpush

<header class="fixed top-0 left-0 w-full z-30 bg-white/70 shadow-md" x-data="{ open: false }">
  <div class="container mx-auto flex justify-between items-center py-3 px-4">
    <a href="{{ route('utama') }}" class="flex items-center">
<img src="{{ asset('images/logo.svg') }}" alt="Logo" class="h-10 object-contain"/>
    </a>

    {{-- desktop nav --}}
    <nav class="hidden md:flex space-x-4 items-center font-semibold">
      <a href="{{ route('utama') }}" class="nav-link">Homepage</a>
      <a href="{{ route('utama') }}#blood_stock" class="nav-link">Stock</a>
      <a href="{{ route('utama') }}#education" class="nav-link">Education</a>

      @auth
        <form method="POST" action="{{ route('logout') }}" class="inline">
          @csrf
          <button type="submit" class="nav-link">Logout</button>
        </form>
      @else
        <a href="{{ route('login') }}" class="nav-link">Login</a>
        <a href="{{ route('register') }}" class="nav-link">Register</a>
      @endauth
    </nav>

    {{-- tombol mobile --}}
    <button class="md:hidden" @click="open = !open">
      <i class="fas fa-bars text-gray-700"></i>
    </button>
  </div>

  {{-- mobile menu --}}
  <div
    x-show="open"
    x-transition
    class="md:hidden fixed inset-0 bg-black bg-opacity-50 z-40"
    @click.away="open = false"
  >
    <div class="absolute right-0 top-0 w-64 h-full bg-white p-6 space-y-4">
      <button @click="open = false" class="text-gray-600">
        <i class="fas fa-times"></i>
      </button>

      <a href="{{ route('utama') }}" @click="open = false" class="flex items-center gap-2">
        <i class="fas fa-home"></i> Homepage
      </a>
      <a href="{{ route('utama') }}#blood_stock" @click="open = false" class="flex items-center gap-2">
        <i class="fas fa-tint"></i> Stock
      </a>
      <a href="{{ route('utama') }}#education" @click="open = false" class="flex items-center gap-2">
        <i class="fas fa-book"></i> Education
      </a>

      @auth
        <form method="POST" action="{{ route('logout') }}" @click="open = false">
          @csrf
          <button type="submit" class="flex items-center gap-2">
            <i class="fas fa-sign-out-alt"></i> Logout
          </button>
        </form>
      @else
        <a href="{{ route('login') }}" @click="open = false" class="flex items-center gap-2">
          <i class="fas fa-sign-in-alt"></i> Login
        </a>
        <a href="{{ route('register') }}" @click="open = false" class="flex items-center gap-2">
          <i class="fas fa-user-plus"></i> Register
        </a>
      @endauth
    </div>
  </div>
</header>

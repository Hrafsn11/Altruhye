
<a {{ $attributes }}class="rounded-md text-bold px-3 py-2 text-sm font-medium {{ $active ? ' text-white' : 'text-black hover:text-white' }} " aria-current="{{ $active ? 'page' : false }} ">{{ $slot }}  </a>

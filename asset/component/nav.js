document.write('<nav\n\
  class="flex-no-wrap relative flex w-full items-center justify-between bg-[#FBFBFB] py-2 shadow-md shadow-black/5 dark:bg-neutral-600 dark:shadow-black/10 lg:flex-wrap lg:justify-start lg:py-4">\n\
  <div class="flex w-full flex-wrap items-center justify-between px-3">\n\
    <!-- Hamburger button for mobile view -->\n\
    <button\n\
      class="block border-0 bg-transparent px-2 text-neutral-500 hover:no-underline hover:shadow-none focus:no-underline focus:shadow-none focus:outline-none focus:ring-0 dark:text-neutral-200 lg:hidden"\n\
      type="button"\n\
      data-te-collapse-init\n\
      data-te-target="#navbarSupportedContent1"\n\
      aria-controls="navbarSupportedContent1"\n\
      aria-expanded="false"\n\
      aria-label="Toggle navigation">\n\
      <!-- Hamburger icon -->\n\
      <span class="[&>svg]:w-7">\n\
        <svg\n\
          xmlns="http://www.w3.org/2000/svg"\n\
          viewBox="0 0 24 24"\n\
          fill="currentColor"\n\
          class="h-7 w-7">\n\
          <path\n\
            fill-rule="evenodd"\n\
            d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z"\n\
            clip-rule="evenodd" />\n\
        </svg>\n\
      </span>\n\
    </button>\n\
\n\
    <!-- Collapsible navigation container -->\n\
    <div\n\
      class="!visible hidden flex-grow basis-[100%] items-center lg:!flex lg:basis-auto"\n\
      id="navbarSupportedContent1"\n\
      data-te-collapse-item>\n\
      <!-- Logo -->\n\
      <a\n\
        class="mb-4 ml-2 mr-5 mt-3 flex items-center text-neutral-900 hover:text-neutral-900 focus:text-neutral-900 dark:text-neutral-200 dark:hover:text-neutral-400 dark:focus:text-neutral-400 lg:mb-0 lg:mt-0"\n\
        href="#">\n\
        <img\n\
          src="https://tecdn.b-cdn.net/img/logo/te-transparent-noshadows.webp"\n\
          style="height: 15px"\n\
          alt="TE Logo"\n\
          loading="lazy" />\n\
      </a>\n\
      <!-- Left navigation links -->\n\
      <ul\n\
        class="list-style-none mr-auto flex flex-col pl-0 lg:flex-row"\n\
        data-te-navbar-nav-ref>\n\
        <li class="mb-4 lg:mb-0 lg:pr-2" data-te-nav-item-ref>\n\
          <!-- Dashboard link -->\n\
          <a class="text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-zinc-400"\n\
            href="#"\n\
            data-te-nav-link-ref\n\
            >Home</a\n\
          >\n\
        </li>\n\
        <!-- Team link -->\n\
        <li class="mb-4 lg:mb-0 lg:pr-2" data-te-nav-item-ref>\n\
          <a class="text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400"\n\
            href="#"\n\
            data-te-nav-link-ref\n\
            >Coupon Shop</a\n\
          >\n\
        </li>\n\
        <!-- Projects link -->\n\
        <li class="mb-4 lg:mb-0 lg:pr-2" data-te-nav-item-ref>\n\
          <a class="text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400"\n\
            href="#"\n\
            data-te-nav-link-ref\n\
            >Gachapon</a\n\
          >\n\
        </li>\n\
      </ul>\n\
    </div>\n\
\n\
      <!-- Second dropdown container -->\n\
      <div\n\
        class="relative"\n\
        data-te-dropdown-ref\n\
        data-te-dropdown-alignment="end">\n\
        <!-- Second dropdown trigger -->\n\
        <a\n\
        class="text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400"\n\
          href="#"\n\
          id="dropdownMenuButton2"\n\
          role="button"\n\
          data-te-dropdown-toggle-ref\n\
          aria-expanded="false">\n\
          <!-- User avatar -->\n\
          Profile\n\
        </a>\n\
        <!-- Second dropdown menu -->\n\
        <ul\n\
          class="absolute z-[1000] float-left m-0 hidden min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg dark:bg-neutral-700 [&[data-te-dropdown-show]]:block"\n\
          aria-labelledby="dropdownMenuButton2"\n\
          data-te-dropdown-menu-ref>\n\
          <!-- Second dropdown menu items -->\n\
          <li>\n\
            <a\n\
              class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-white/30"\n\
              href="#"\n\
              data-te-dropdown-item-ref\n\
              >Profile Settings</a\n\
            >\n\
          </li>\n\
          <li>\n\
            <a\n\
              class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-white/30"\n\
              href="#"\n\
              data-te-dropdown-item-ref\n\
              >Points</a\n\
            >\n\
          </li>\n\
          <li>\n\
            <a\n\
              class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-white/30"\n\
              href="#"\n\
              data-te-dropdown-item-ref\n\
              >Logout</a\n\
            >\n\
          </li>\n\
        </ul>\n\
      </div>\n\
    </div>\n\
  </div>\n\
</nav>');


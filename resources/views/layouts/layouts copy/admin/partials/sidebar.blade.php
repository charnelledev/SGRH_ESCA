<aside
  :class="sidebarToggle ? 'translate-x-0 lg:w-[90px]' : '-translate-x-full'"
  class="sidebar fixed left-0 top-0 z-9999 flex h-screen w-[290px] flex-col overflow-y-hidden border-r border-gray-200 bg-white px-5 dark:border-gray-800 dark:bg-black lg:static lg:translate-x-0"
>
  <!-- SIDEBAR HEADER -->
  <div
    :class="sidebarToggle ? 'justify-center' : 'justify-between'"
    class="flex items-center gap-2 pt-8 sidebar-header pb-7"
  >
    <a href="{{url('/admin')}}">
      <span class="logo" :class="sidebarToggle ? 'hidden' : ''">
        <img class="dark:hidden" src="./images/logo/logo.svg" alt="Logo" />
        <img
          class="hidden dark:block"
          src="./images/logo/logo-dark.svg"
          alt="Logo"
        />
      </span>

      <img
        class="logo-icon"
        :class="sidebarToggle ? 'lg:block' : 'hidden'"
        src="./images/logo/logo-icon.svg"
        alt="Logo"
      />
    </a>
  </div>
  <!-- SIDEBAR HEADER -->

  <div
    class="flex flex-col overflow-y-auto duration-300 ease-linear no-scrollbar"
  >
    <!-- Sidebar Menu -->
    <nav x-data="{selected: $persist('Dashboard')}">
      <!-- Menu Group -->
      <div>
        <h3 class="mb-4 text-xs uppercase leading-[20px] text-gray-400">
          <span
            class="menu-group-title"
            :class="sidebarToggle ? 'lg:hidden' : ''"
          >
            MENU
          </span>

          <svg
            :class="sidebarToggle ? 'lg:block hidden' : 'hidden'"
            class="mx-auto fill-current menu-group-icon"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M5.99915 10.2451C6.96564 10.2451 7.74915 11.0286 7.74915 11.9951V12.0051C7.74915 12.9716 6.96564 13.7551 5.99915 13.7551C5.03265 13.7551 4.24915 12.9716 4.24915 12.0051V11.9951C4.24915 11.0286 5.03265 10.2451 5.99915 10.2451ZM17.9991 10.2451C18.9656 10.2451 19.7491 11.0286 19.7491 11.9951V12.0051C19.7491 12.9716 18.9656 13.7551 17.9991 13.7551C17.0326 13.7551 16.2491 12.9716 16.2491 12.0051V11.9951C16.2491 11.0286 17.0326 10.2451 17.9991 10.2451ZM13.7491 11.9951C13.7491 11.0286 12.9656 10.2451 11.9991 10.2451C11.0326 10.2451 10.2491 11.0286 10.2491 11.9951V12.0051C10.2491 12.9716 11.0326 13.7551 11.9991 13.7551C12.9656 13.7551 13.7491 12.9716 13.7491 12.0051V11.9951Z"
              fill=""
            />
          </svg>
        </h3>

        <ul class="flex flex-col gap-4 mb-6">
            <!-- Menu Item Dashboard -->
          <li>
            <a
              href="{{ url('/admin') }}"
              @click="selected = 'Dashboard'"
              class="menu-item group"
              :class="(selected === 'Dashboard') ? 'menu-item-active' : 'menu-item-inactive'"
            >
              <svg
                  :class="(selected === 'Dashboard') ? 'menu-item-icon-active' : 'menu-item-icon-inactive'"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M12 2C8.13401 2 5 5.13401 5 9V12C5 12.5523 5.44772 13 6 13H7V15C7 16.1046 7.89543 17 9 17H15C16.1046 17 17 16.1046 17 15V13H18C18.5523 13 19 12.5523 19 12V9C19 5.13401 15.866 2 12 2ZM12 4C14.7614 4 17 6.23858 17 9V12H15V15H9V12H7V9C7 6.23858 9.23858 4 12 4ZM12 6C10.3431 6 9 7.34315 9 9V11H15V9C15 7.34315 13.6569 6 12 6ZM12 8C12.5523 8 13 8.44772 13 9C13 9.55228 12.5523 10 12 10C11.4477 10 11 9.55228 11 9C11 8.44772 11.4477 8 12 8Z"
                    fill="currentColor"
                  />
                </svg>

              <span
                class="menu-item-text"
                :class="sidebarToggle ? 'lg:hidden' : ''"
              >
                 Dashboard
              </span>
            </a>
          </li>
          <!-- Menu Item Dashboard -->

          <!-- Menu Item Profile -->
          <li>
            <a
              href="#"
              @click="selected = 'Profile'"
              class="menu-item group"
              :class="(selected === 'Profile') ? 'menu-item-active' : 'menu-item-inactive'"
            >
              <svg
                  :class="(selected === 'Profile') ? 'menu-item-icon-active' : 'menu-item-icon-inactive'"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M12 2C8.13401 2 5 5.13401 5 9V12C5 12.5523 5.44772 13 6 13H7V15C7 16.1046 7.89543 17 9 17H15C16.1046 17 17 16.1046 17 15V13H18C18.5523 13 19 12.5523 19 12V9C19 5.13401 15.866 2 12 2ZM12 4C14.7614 4 17 6.23858 17 9V12H15V15H9V12H7V9C7 6.23858 9.23858 4 12 4ZM12 6C10.3431 6 9 7.34315 9 9V11H15V9C15 7.34315 13.6569 6 12 6ZM12 8C12.5523 8 13 8.44772 13 9C13 9.55228 12.5523 10 12 10C11.4477 10 11 9.55228 11 9C11 8.44772 11.4477 8 12 8Z"
                    fill="currentColor"
                  />
                </svg>

              <span
                class="menu-item-text"
                :class="sidebarToggle ? 'lg:hidden' : ''"
              >
                User Profile
              </span>
            </a>
          </li>
          <!-- Menu Item Profile -->


          <ul x-data="{ selected: '' }" class="flex flex-col gap-4 mb-6">
            <!-- Menu Item Emplois -->
            <li>
              <a
                href="#"
                @click.prevent="selected = (selected === 'Emplois' ? '' : 'Emplois')"
                class="menu-item group"
                :class="(selected === 'Emplois') ? 'menu-item-active' : 'menu-item-inactive'"
              >
                <!-- Icône SVG (Clé) -->
                <svg
                  :class="(selected === 'Emplois') ? 'menu-item-icon-active' : 'menu-item-icon-inactive'"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M12 2C8.13401 2 5 5.13401 5 9V12C5 12.5523 5.44772 13 6 13H7V15C7 16.1046 7.89543 17 9 17H15C16.1046 17 17 16.1046 17 15V13H18C18.5523 13 19 12.5523 19 12V9C19 5.13401 15.866 2 12 2ZM12 4C14.7614 4 17 6.23858 17 9V12H15V15H9V12H7V9C7 6.23858 9.23858 4 12 4ZM12 6C10.3431 6 9 7.34315 9 9V11H15V9C15 7.34315 13.6569 6 12 6ZM12 8C12.5523 8 13 8.44772 13 9C13 9.55228 12.5523 10 12 10C11.4477 10 11 9.55228 11 9C11 8.44772 11.4477 8 12 8Z"
                    fill="currentColor"
                  />
                </svg>

                <!-- Texte du Menu -->
                <span class="menu-item-text">Emplois</span>

                <!-- Flèche Dynamique -->
                <svg
                  class="menu-item-arrow absolute right-2.5 top-1/2 -translate-y-1/2 stroke-current"
                  :class="[(selected === 'Emplois') ? 'menu-item-arrow-active' : 'menu-item-arrow-inactive']"
                  width="20"
                  height="20"
                  viewBox="0 0 20 20"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M4.79175 7.39584L10.0001 12.6042L15.2084 7.39585"
                    stroke="currentColor"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </svg>
              </a>

              <!-- Dropdown Menu (Masqué par Défaut) -->
              <div :class="(selected === 'Emplois') ? 'block' : 'hidden'">
                <ul class="flex flex-col gap-1 mt-2 menu-dropdown pl-9">
                  <li>
                    <a href="#" 
                       class="menu-dropdown-item group"
                       :class="(selected === 'Emplois') ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive'">
                      Items 1
                    </a>
                  </li>
                  <li>
                    <a href="#" 
                       class="menu-dropdown-item group"
                       :class="(selected === 'Emplois') ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive'">
                      Items 2
                    </a>
                  </li>
                </ul>
              </div>
            </li>
          </ul>

         
          <!-- Menu Item Pages -->
        </ul>
      </div>

      <!-- Others Group -->
      <div>
        <h3 class="mb-4 text-xs uppercase leading-[20px] text-gray-400">
          <span
            class="menu-group-title"
            :class="sidebarToggle ? 'lg:hidden' : ''"
          >
            others
          </span>

          <svg
            :class="sidebarToggle ? 'lg:block hidden' : 'hidden'"
            class="mx-auto fill-current menu-group-icon"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M5.99915 10.2451C6.96564 10.2451 7.74915 11.0286 7.74915 11.9951V12.0051C7.74915 12.9716 6.96564 13.7551 5.99915 13.7551C5.03265 13.7551 4.24915 12.9716 4.24915 12.0051V11.9951C4.24915 11.0286 5.03265 10.2451 5.99915 10.2451ZM17.9991 10.2451C18.9656 10.2451 19.7491 11.0286 19.7491 11.9951V12.0051C19.7491 12.9716 18.9656 13.7551 17.9991 13.7551C17.0326 13.7551 16.2491 12.9716 16.2491 12.0051V11.9951C16.2491 11.0286 17.0326 10.2451 17.9991 10.2451ZM13.7491 11.9951C13.7491 11.0286 12.9656 10.2451 11.9991 10.2451C11.0326 10.2451 10.2491 11.0286 10.2491 11.9951V12.0051C10.2491 12.9716 11.0326 13.7551 11.9991 13.7551C12.9656 13.7551 13.7491 12.9716 13.7491 12.0051V11.9951Z"
              fill=""
            />
          </svg>
        </h3>

          <ul x-data="{ selected: '' }" class="flex flex-col gap-4 mb-6">
            <!-- Menu Item Authentication -->
            <li>
              <a
                href="#"
                @click.prevent="selected = (selected === 'Authentication' ? '' : 'Authentication')"
                class="menu-item group"
                :class="(selected === 'Authentication') ? 'menu-item-active' : 'menu-item-inactive'"
              >
                <!-- Icône SVG (Clé) -->
                <svg
                  :class="(selected === 'Authentication') ? 'menu-item-icon-active' : 'menu-item-icon-inactive'"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M12 2C8.13401 2 5 5.13401 5 9V12C5 12.5523 5.44772 13 6 13H7V15C7 16.1046 7.89543 17 9 17H15C16.1046 17 17 16.1046 17 15V13H18C18.5523 13 19 12.5523 19 12V9C19 5.13401 15.866 2 12 2ZM12 4C14.7614 4 17 6.23858 17 9V12H15V15H9V12H7V9C7 6.23858 9.23858 4 12 4ZM12 6C10.3431 6 9 7.34315 9 9V11H15V9C15 7.34315 13.6569 6 12 6ZM12 8C12.5523 8 13 8.44772 13 9C13 9.55228 12.5523 10 12 10C11.4477 10 11 9.55228 11 9C11 8.44772 11.4477 8 12 8Z"
                    fill="currentColor"
                  />
                </svg>

                <!-- Texte du Menu -->
                <span class="menu-item-text">Authentication</span>

                <!-- Flèche Dynamique -->
                <svg
                  class="menu-item-arrow absolute right-2.5 top-1/2 -translate-y-1/2 stroke-current"
                  :class="[(selected === 'Authentication') ? 'menu-item-arrow-active' : 'menu-item-arrow-inactive']"
                  width="20"
                  height="20"
                  viewBox="0 0 20 20"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M4.79175 7.39584L10.0001 12.6042L15.2084 7.39585"
                    stroke="currentColor"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </svg>
              </a>

              <!-- Dropdown Menu (Masqué par Défaut) -->
              <div :class="(selected === 'Authentication') ? 'block' : 'hidden'">
                <ul class="flex flex-col gap-1 mt-2 menu-dropdown pl-9">
                  <li>
                    <a href="signin.html" 
                       class="menu-dropdown-item group"
                       :class="(selected === 'Authentication') ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive'">
                      Sign In
                    </a>
                  </li>
                  <li>
                    <a href="signup.html" 
                       class="menu-dropdown-item group"
                       :class="(selected === 'Authentication') ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive'">
                      Sign Up
                    </a>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
      </div>
    </nav>
    <!-- Sidebar Menu -->
  </div>
</aside>

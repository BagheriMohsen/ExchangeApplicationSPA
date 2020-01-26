<template>
    <base-nav class="navbar-top navbar-dark"
              id="navbar-main"
              :show-toggle-button="false"
              expand>
       <ul class="navbar-nav align-items-center d-none d-md-flex mr-auto">
            <li class="nav-item">
              <a href="http://localhost:8000/admin-logout" class="text-light">
                  <i class="ni ni-user-run"></i>
                  <span>خروج</span>
              </a>
            </li>
            <!-- <li class="nav-item ml-3">
              <base-dropdown class="nav-item" position="right">
                  <a slot="title" class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false">
                      <i class="ni ni-email-83"></i>
                  </a>

                  <a class="dropdown-item" href="#">پیام های جدید</a>
                  <a class="dropdown-item" href="#">همه ی پیام ها</a>
              </base-dropdown>
            </li> -->
            <!-- <li class="nav-item dropdown">
              <div class="media align-items-center" slot="title">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="img/theme/user-avatar.png">
                  </span>
                  <div class="media-body mr-2 d-none d-lg-block">
                      <span class="mb-0 text-sm  font-weight-bold">Admin</span>
                  </div>
              </div>
            </li> -->
        </ul>
    </base-nav>
</template>
<script>
  export default {
    data() {
      return {
        activeNotifications: false,
        showMenu: false,
        searchQuery: ''
      };
    },
    methods: {
      toggleSidebar() {
        this.$sidebar.displaySidebar(!this.$sidebar.showSidebar);
      },
      hideSidebar() {
        this.$sidebar.displaySidebar(false);
      },
      toggleMenu() {
        this.showMenu = !this.showMenu;
      }
    }
  };
</script>

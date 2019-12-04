<template>
    <base-nav class="navbar-top navbar-dark"
              id="navbar-main"
              :show-toggle-button="false"
              expand>
        <!-- <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
            <div class="form-group mb-0">
                <base-input placeholder="Search"
                            class="input-group-alternative"
                            alternative=""
                            addon-right-icon="fas fa-search">
                </base-input>
            </div>
        </form> -->
        <!-- <ul class="navbar-nav align-items-center d-none d-md-flex mr-auto">
            <li class="nav-item">
              <base-dropdown class="nav-item" position="right">
                  <a slot="title" class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false">
                      <i class="ni ni-bell-55"></i>
                  </a>

                  <a class="dropdown-item" href="#">اطلاعیه جدید</a>
                  <a class="dropdown-item" href="#">همه ی اطلاعیه ها</a>
              </base-dropdown>
            </li>
            <li class="nav-item ml-3">
              <base-dropdown class="nav-item" position="right">
                  <a slot="title" class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false">
                      <i class="ni ni-email-83"></i>
                  </a>

                  <a class="dropdown-item" href="#">پیام های جدید</a>
                  <a class="dropdown-item" href="#">همه ی پیام ها</a>
              </base-dropdown>
            </li>
            <li class="nav-item dropdown">
                <base-dropdown class="nav-link pr-0">
                    <div class="media align-items-center" slot="title">
                        <span class="avatar avatar-sm rounded-circle">
                          <img alt="Image placeholder" src="img/theme/user-avatar.png">
                        </span>
                        <div class="media-body mr-2 d-none d-lg-block">
                            <span class="mb-0 text-sm  font-weight-bold">احمد ملایی</span>
                        </div>
                    </div>

                    <template>
                        <div class=" dropdown-header noti-title">
                            <h6 class="text-overflow m-0">خوش آمدید!</h6>
                        </div>
                        <router-link to="/profile" class="dropdown-item">
                            <i class="ni ni-single-02"></i>
                            <span>پروفایل من</span>
                        </router-link>
                        <router-link to="/profile" class="dropdown-item">
                            <i class="ni ni-settings-gear-65"></i>
                            <span>تنظیمات</span>
                        </router-link>
                        <router-link to="/profile" class="dropdown-item">
                            <i class="ni ni-calendar-grid-58"></i>
                            <span>فعالیت ها</span>
                        </router-link>
                        <router-link to="/profile" class="dropdown-item">
                            <i class="ni ni-support-16"></i>
                            <span>پشتیبانی</span>
                        </router-link>
                        <div class="dropdown-divider"></div>
                        <router-link to="/profile" class="dropdown-item">
                            <i class="ni ni-user-run"></i>
                            <span>خروج</span>
                        </router-link>
                    </template>
                </base-dropdown>
            </li>
        </ul> -->
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

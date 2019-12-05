<template>
    <nav>
        <v-app-bar fixed app transparent>
            <v-app-bar-nav-icon class="white--text" @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
            <v-spacer></v-spacer>
            <v-img left
                class="mx-2"
                src="/img/logo-for-splash-screen.png"
                max-height="40"
                max-width="40"
                contain
            ></v-img>
            <v-spacer></v-spacer>
            <a @click="$router.go(-1)">
                <v-icon color="white">keyboard_backspace
                </v-icon>
            </a>
            
            

            <!-- <v-toolbar-title class="white--text">
                <span class="font-weight-bold">Unique App</span>
            </v-toolbar-title> -->
        </v-app-bar>
        <v-navigation-drawer app :width="'65%'" v-model="drawer"
            absolute
            dark
            right
            src="https://cdn.vuetifyjs.com/images/backgrounds/bg-2.jpg"
            temporary>
            <v-img
                class="my-4 mx-auto"
                src="/img/logo-for-splash-screen.png"
                max-height="100"
                max-width="100"
                contain
            ></v-img>
            <v-divider></v-divider>
            <v-list>
                <v-list-item v-for="item in items" :key="item.title" link router :to='item.route'
                >
                    <v-list-item-icon class="ml-1">
                        <v-icon>{{ item.icon }}</v-icon>
                    </v-list-item-icon>
                     <v-list-item-content >
                        <v-list-item-title class="caption">{{ item.title }}</v-list-item-title>
                    </v-list-item-content>

                </v-list-item>
            </v-list>

      <template v-slot:append>
        <div class="pa-2">
            <v-btn block flat light class="grey--text text--darken-2">
                <v-icon>exit_to_app</v-icon>
                <span left class="caption">خروج از حساب</span>
            </v-btn>
        </div>
      </template>

        </v-navigation-drawer>
    </nav>
</template>
<script>
export default {
    data(){
        return{
            items: [
                { title: 'درباره ی ما', icon: 'info',route:'/about' },
                { title: 'تماس با ما', icon: 'contacts', route:'contact' },
                { title: 'عضویت ', icon: 'assignment_turned_in', route:'/register'}
            ],
            drawer: false
        }
    }
}
</script>

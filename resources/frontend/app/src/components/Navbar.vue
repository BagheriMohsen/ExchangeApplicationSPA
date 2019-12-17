<template>
    <nav>
        <v-app-bar fixed app transparent height="45px">
           
            <v-app-bar-nav-icon class="white--text" @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
            <v-spacer></v-spacer>
            <div class="white--text" style="font-size:13px">
                {{$route.name}}
            </div>
            
            <v-spacer></v-spacer>
            <a  @click="$router.go(-1)">
                <v-icon color="white">keyboard_backspace
                </v-icon>
            </a>
            
        </v-app-bar>
        <v-navigation-drawer app :width="'65%'" v-model="drawer"
            absolute
            dark
            right
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
                <v-list-item>
                    <v-list-item-content >
                        <v-list-item-title class="caption"> {{user.fullName}}</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item  v-for="item in items" :key="item.title" link router :to='item.route'
                >
                    <v-list-item-icon class="ml-1">
                        <v-icon>{{ item.icon }}</v-icon>
                    </v-list-item-icon>
                     <v-list-item-content>
                        <v-list-item-title class="caption">{{ item.title }}</v-list-item-title>
                    </v-list-item-content>

                </v-list-item>
            </v-list>

            <template v-slot:append>
                <div class="pa-2">
                    <v-btn block  light class="grey--text text--darken-2" @click="logout">
                        <v-icon>exit_to_app</v-icon>
                        <span left class="caption">{{exit}}</span>
                    </v-btn>
                </div>
            </template>
        </v-navigation-drawer>
    </nav>
</template>
<script>
export default {
    props:{
        user:Object
    },
    data(){
        return{
            persianItems: [
                { title: 'درباره ی ما', icon: 'info',route:'/about' },
                { title: 'تماس با ما', icon: 'contacts', route:'/contact' },
                { title: 'عضویت ', icon: 'assignment_turned_in', route:'/register'},
                { title: 'اشتراک ', icon: 'payment', route:'/subscription'}
            ],
            englishItems: [
                { title: 'About Us', icon: 'info',route:'/about' },
                { title: 'Contact Us', icon: 'contacts', route:'/contact' },
                { title: 'Register', icon: 'assignment_turned_in', route:'/register'},
                { title: 'Subscription ', icon: 'payment', route:'/subscription'}
            ],
            arabicItems: [
                { title: 'About Us', icon: 'info',route:'/about' },
                { title: 'Contact Us', icon: 'contacts', route:'/contact' },
                { title: 'Register', icon: 'assignment_turned_in', route:'/register'},
                { title: 'Subscription ', icon: 'payment', route:'/subscription'}
            ],
            items:'',
            persianExit:'خروج',
            englishExit:'Exit',
            arabicExit:'اخرج',
            exit:'',
            drawer: false,

        }
    },
    methods:{
        logout(){
            localStorage.removeItem('token');
            this.$router.push('/login');
        },
        checkLanguage(){
            if(this.user.language == 'ar'){
                this.items = this.arabicItems;
                this.exit = this.arabicItems;
            }else if(this.user.language == 'en'){
                this.items = this.englishItems;
                 this.exit = this.englishExit;
            }else{
                this.items = this.persianItems;
                 this.exit = this.persianExit;
            }
        }
    },
    computed:{
        
    },
    watch:{
        user:{
            handler(){
                this.checkLanguage();
            }
        }
    },
    mounted(){
        this.checkLanguage();
    }
}
</script>
<style  scoped>
.v-list-item__icon{
    margin: 13px 0;
}
.v-list-item{
    min-height: 30px;
}
</style>

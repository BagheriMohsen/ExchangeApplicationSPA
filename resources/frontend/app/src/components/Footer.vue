<template>
    <footer>
       <v-bottom-navigation
        v-model="bottomNav"
        height="50px"
        dark
        grow
        fixed
        color="white"
        >
            <v-btn  v-for="item in items" v-bind:key="item.value"
            :value="item.value"
            router :to='item.route'>
                <span>{{item.title}}</span>
                <v-icon>{{item.icon}}</v-icon>
            </v-btn>
        </v-bottom-navigation>
    </footer>
    
</template>
<script>
  export default {
    props:{
      user:Object
    },
    data () {
      return {
        bottomNav: 'tutorial',
        items:'',
        arabicItems: [
                { title: 'آموزش', icon: 'account_balance', route:"/",value:'tutorial'},
                { title: 'فارکس', icon: 'bar_chart', route:"/farx",value:'farx'},
                { title: 'باینری', icon: 'multiline_chart', route:"/binary",value:'binary'},
                { title: 'بایگانی', icon: 'move_to_inbox', route:"/archive",value:'archive'},
        ],
        englishItems: [
                { title: 'Tutorial', icon: 'account_balance', route:"/",value:'tutorial'},
                { title: 'Farx', icon: 'bar_chart', route:"/farx",value:'farx'},
                { title: 'Binary', icon: 'multiline_chart', route:"/binary",value:'binary'},
                { title: 'Archive', icon: 'move_to_inbox', route:"/archive",value:'archive'},
        ],
        persianItems: [
                { title: 'آموزش', icon: 'account_balance', route:"/",value:'tutorial'},
                { title: 'فارکس', icon: 'bar_chart', route:"/farx",value:'farx'},
                { title: 'باینری', icon: 'multiline_chart', route:"/binary",value:'binary'},
                { title: 'بایگانی', icon: 'move_to_inbox', route:"/archive",value:'archive'},
        ],
      }
    },
    methods:{
      checkLanguage(){
          if(this.user.language == 'ar'){
              this.items = this.arabicItems;
          }else if(this.user.language == 'en'){
              this.items = this.englishItems;
          }else{
              this.items = this.persianItems;
          }
      }
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
<style scoped>
 .v-item-group.v-bottom-navigation .v-btn{
   min-width: 40px;
 }
 .v-item-group.v-bottom-navigation .v-btn .v-btn__content .v-icon{
   font-size: 20px;
 }
</style>
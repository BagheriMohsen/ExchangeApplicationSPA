<template>
    <section>
      <v-container fluid>
        <v-row>
          <v-col cols="6" v-for="item in items" v-bind:key="item.title">
            <v-card  router :to="item.route"
            dark
            class="mx-auto pa-3"
            width="40vw"
            height="40vw"
            style="background:rgba(133, 177, 202, 0.5)"
            >
              <v-img
                class="align-end mx-auto"
                height="25vw"
                width="25vw"
                :src="item.img"
              >
                </v-img>
                <v-card-text class="text-center pa-0">
                    {{item.title}}
                </v-card-text>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
     
    </section>
    
</template>
<script>
  export default {
    props:{
      user:Object
    },
    data () {
      return {
        items:'',
        arabicItems: [
                {title: 'فارکس',route: '/tutorial/farx',img: '/img/money-growth.png'},
                {title: 'باینری',route: '/tutorial/binary',img: '/img/graph.png'}
        ],
        englishItems: [
                {title: 'Forex',route: '/tutorial/farx',img: '/img/money-growth.png'},
                {title: 'Binary',route: '/tutorial/binary',img: '/img/graph.png'}     
        ],
        persianItems: [
                {title: 'فارکس',route: '/tutorial/farx',img: '/img/money-growth.png'},
                {title: 'باینری',route: '/tutorial/binary',img: '/img/graph.png'}
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
      },
      
    },
    watch:{
        user:{
          handler(){
            this.checkLanguage();
            this.checkUserGuide();
          }
        }
    },
    mounted(){
      this.checkLanguage();
      this.checkUserGuide();
    }
  }
</script>
<style scoped>
  .v-card__text{
    font-size: 16px;
  }
</style>
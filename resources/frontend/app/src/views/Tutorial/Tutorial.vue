<template>
    <section>
      <v-container fluid>
        {{tutorialDialog}}
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
      <v-dialog
          v-model="tutorialDialog"
          max-width="290"
          
        >
          <v-card class="mx-auto pt-2">
            <v-card-text class="pb-0">
              لطفاابتدا به لینک زیر رفته و آموزش استفاده از اپلیکیشن را مطالعه فرمایید
            </v-card-text>
            <v-checkbox class="py-0 pr-4"
                v-model="checkbox"
                label="دیگر این پیام را نشان نده"
              >
            </v-checkbox>
            <v-card-actions center style="justify-content: center;">
              <v-btn color="success" v-on:click="handleRead">بریم بخونیم</v-btn>
              <v-btn color="info" v-on:click="handleLater">بعدا میخونم</v-btn>
            </v-card-actions>
          </v-card>
        </v-dialog>
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
        tutorialDialog: false,
        checkbox:false
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
      handleLater(){
        this.tutorialDialog = false;
        if(this.checkbox == true){
          this.$http.get('user-guide-check/' + this.user.id)
            .then(res => console.log(res))
            .catch(err => console.log(err));
        }
      },
      handleRead(){
        this.tutorialDialog = false;
        if(this.checkbox == true){
          this.$http.get('user-guide-check/' + this.user.id)
            .then(res => console.log(res))
            .catch(err => console.log(err));
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
      if(this.user.guide_check_date){
        this.tutorialDialog = false
      }else{
        this.tutorialDialog = true
      }
    }
  }
</script>
<style scoped>
  .v-card__text{
    font-size: 16px;
  }
</style>
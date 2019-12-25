<template>
    <section>
       <div class="container">
           <div class="row">
               <div class="col-12">
                   <v-img left
                        class="mx-auto"
                        src="/img/logo-for-splash-screen.png"
                        
                        max-width="30vw"
                        contain
                    ></v-img>
               </div>
               <div class="col-12 light-color text-justify">
                   <p>{{items}}</p>
               </div>
           </div>
       </div>
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
        arabicItems: 'در صرافی آنلاین یونیک بدون نیاز به استفاده از سیستم های بانکی داخلی می توانید به صورت خودکار اقدام به مبادله پول های الکترونیک و ارزهای دیجیتال خود با کمترین میزان کارمزد نمائید. هدف ما در این مجموعه بستر سازی درآمد ارزی برای شما عزیزان است.',
        englishItems: 'English About',
        persianItems: 'در صرافی آنلاین یونیک بدون نیاز به استفاده از سیستم های بانکی داخلی می توانید به صورت خودکار اقدام به مبادله پول های الکترونیک و ارزهای دیجیتال خود با کمترین میزان کارمزد نمائید. هدف ما در این مجموعه بستر سازی درآمد ارزی برای شما عزیزان است.',
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
    p{
        font-size: 12px
    };
</style>
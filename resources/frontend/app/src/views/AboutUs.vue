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
        arabicItems: 'باستخدام Unic لتبادل العملات عبر الإنترنت ، يمكنك استبدال أموالك الإلكترونية والعملات الرقمية تلقائيًا بأقل مبلغ من الرسوم دون الحاجة إلى استخدام الأنظمة المصرفية الداخلية. هدفنا في هذه المجموعة هو توفير دخل العملات الأجنبية لأحبائك.',
        englishItems: 'With the unique online currency exchange system, you can automatically exchange your electronic money and digital currencies with the lowest fees, without having to use internal banking systems. Our goal in this set is to provide foreign exchange income for your loved ones',
        persianItems: 'با استفاده از سیستم ارز منحصر به فرد ارز آنلاین ، می توانید بطور خودکار پول الکترونیکی و ارزهای دیجیتال خود را با کمترین هزینه ، بدون نیاز به استفاده از سیستم های بانکی داخلی ، با کمترین هزینه مبادله کنید. هدف ما در این مجموعه تأمین درآمد ارزی برای شما عزیزان است',
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
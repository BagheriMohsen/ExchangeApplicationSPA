<template>
    <section>
       <div class="container">
           <div class="row">
               <div class="col-12 light-color text-justify">
                   <v-icon class="white--text ml-1">web</v-icon>
                   <span>آدرس سایت:</span>
                   <p class="text-center"><a class="" href="http://www.sarafi.com">www.sarafi.com</a> </p>
               </div>
               <div class="col-12 light-color text-justify">
                   <v-icon class="white--text ml-1">phone</v-icon>
                   <span>تماس با ما:</span>
                   <p class="text-center"><a class="" href="tel:555-555-5555">555-555-5555</a> </p>
               </div>
               <div class="col-12 light-color text-justify">
                   <v-icon class="white--text ml-1">home</v-icon>
                   <span>  آدرس شرکت:</span>
                   <p class="text-center"><a href="http://maps.google.com/maps?q=210+Louise+Ave,+Nashville,+TN+37203">
قم،خیابان مصدق،...</a></p>
               </div>
           </div>
       </div>
    </section>
</template>
<script>
  export default {
    data () {
      return {
       
      }
    },
    methods:{
    }
  }
</script>
<style scoped>
    p{
        font-size: 13px;
        margin-top: 5px;
        padding-bottom: 4px;
        border-bottom: 1px solid #f3f3f3;
    }
    .col-12{
        padding-top: 0px;
        padding-bottom: 0px;
    }
    span{
        font-size: 14px;
    }
    .v-application a {
        color: #f3f3f3!important;
        text-decoration: none;
    }   
</style>
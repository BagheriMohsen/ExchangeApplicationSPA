<template>
    <section>
      <div class="article-card">
        <div class="article-title py-2">
          <h5 class="text-center">{{article.title}}</h5>
        </div>
        <div class="article-desc d-flex justify-space-between px-2 my-1">
          <span class="date">{{article.created_at}}</span>
          <span class="tag">{{article.sub_category.name}}</span>
        </div>
        <v-divider></v-divider>
        <div class="article-body text-justify mt-1 px-2 pb-2">
          <div v-html="article.body"> </div>
        </div>
      </div>
              
    </section>
</template>
<script>
  var moment = require('jalali-moment');
  moment.locale('fa', { useGregorianParser: true });  
  export default {
    data () {
      return {
        id : this.$route.params.id,
        article:'1323'
      }
    },
    methods:{
      fetchArticle(){

            this.$http.get('http://localhost:8000/categories/ArticleSingle/' + this.id)
                .then((response) => {this.article = response.data;this.convertJalali()});
      },
      convertJalali(){
        this.article.created_at = moment(this.article.created_at).format('YY/M/D');
       
      },
    },
    created() {
        this.fetchArticle();
        // this.convertJalali();
    }
  }
</script>
 <style scoped>
 .article-title{
  background: #0099CC;
  color: #f3f3f3;
  border-radius: 5px 5px 0px 0px;
 }
 .article-card{
  background-color: #f3f3f3;
  border-radius: 5px;
 }
.article-body {
  font-size: 14px;
}
.article-desc{
  font-size: 11px;
}
 </style>
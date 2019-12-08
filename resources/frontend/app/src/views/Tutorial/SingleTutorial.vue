<template>
    <section>
        <v-container fluid class="">
          <v-row dense class="white">
            <v-col cols="12" class="">
                <h4 class="text-center">{{article.title}}</h4>
            </v-col>
             <v-col cols="12" class="text-justify">
                    {{article.body}}
            </v-col>
          </v-row>
        </v-container>
    </section>
</template>
<script>
  export default {
    data () {
      return {
        id : this.$route.params.id,
        article:''
      }
    },
    methods:{
      fetchArticle(){
            this.$http.get('http://localhost:8000/categories/ArticleSingle/' + this.id)
                .then((response) => this.article = response.data)
      }
    },
    created () {
        this.fetchArticle();
    
    }
  }
</script>
 <style scoped>
 /* .v-card__title{
    font-size: 5vw;
    line-height: inherit;
    letter-spacing: inherit;
    color:#fafafa;
 }
 .row--dense > .col, .row--dense > [class*=col-] {
    padding: 2px;
} */
 </style>
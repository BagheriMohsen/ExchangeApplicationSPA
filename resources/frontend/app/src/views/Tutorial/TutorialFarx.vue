<template>
    <section>
      <v-tabs 
        show-arrows 
        dark 
        v-model="tab"
        background-color="transparent"
        grow
      >
      <v-tabs-slider></v-tabs-slider>
        <v-tab class="pa-0 ma-0 caption"
          v-for="articleTag in articleTags"
          :key="articleTag"
        >
       
          {{ articleTag }}
        </v-tab>
      </v-tabs>

      <v-tabs-items class="mt-1"  v-model="tab" style="background:none">
        <v-tab-item
          v-for="articleTag in articleTags"
          :key="articleTag"
        >
        <v-container fluid class="pa-0">
          <v-row dense>
            <v-col
              v-for=" article in articles"
              :key="article.title"
              cols="12"
            >
              <v-card v-if="article.name == articleTag" class="mx-1 bg-unique" router :to="'/tutorial/single/' +article.article_id"
              >
                <div class="d-flex flex-no-wrap">
                     <v-avatar
                    class="ma-2"
                    size="10%"
                    tile
                  >
                    <v-img :src="'/img/' + 'graph.png'"></v-img>
                  </v-avatar>
                    <v-card-title style="color:white"
                      class="ma-0 pa-0 px-1"
                      v-text="article.title"
                    > </v-card-title>
                </div>
              </v-card>
            </v-col>
          </v-row>
        </v-container>
        </v-tab-item>
      </v-tabs-items>
    </section>
    
</template>
<script>
  export default {
    props:{
      user:Object
    },
    data () {
      return {
        tab: null,
        articleTags:[],
        articles:[],
        id:'6'
      }
    },
    methods:{
      fetchArticles(){
        this.$http
          .get('https://exchange.tipsy.ir/categories/2/AllSubCategoriesList/' + this.user.id)
          .then((response) =>{
            console.log('article',response.data);
            this.articles = response.data;
          }).catch(err => console.log(err));
      },
      fetchTags(){
        this.$http
          .get('https://exchange.tipsy.ir/categories/2/subCategories/' + this.user.id)
          .then( response =>{
            if(this.user.language == 'ar'){
              this.articleTags = response.data.map((item) => {
                return item.ar_name;
              })
            }else if(this.user.language == 'en'){
              this.articleTags = response.data.map((item) => {
                return item.en_name;
              })
            }else if(this.user.language == 'fa'){
              this.articleTags = response.data.map((item) => {
                return item.name;
              })
            }
            this.fetchArticles();
          }).catch(err => console.log(err));
      }
    },
    created () {
      this.fetchTags();
    }
  }
</script>
 <style scoped>
 .v-card__title{
    font-size: 5vw;
    line-height: inherit;
    letter-spacing: inherit;
    color:#fafafa;
 }
 .row--dense > .col, .row--dense > [class*=col-] {
    padding: 2px;
}
 </style>
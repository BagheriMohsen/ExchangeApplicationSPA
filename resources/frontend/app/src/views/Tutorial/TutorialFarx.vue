<template>
    <section>
      <!-- {{articles}} -->
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
          :key="articleTag.id"
        >
          {{ articleTag.name }}
        </v-tab>
      </v-tabs>

      <v-tabs-items class="mt-1"  v-model="tab" style="background:none">
        <v-tab-item
          v-for="articleTag in articleTags"
          :key="articleTag.id"
        >
        <v-container fluid class="pa-0">
          <v-row dense>
            <v-col
              v-for=" article in articleTag.articles"
              :key="article.title"
              cols="12"
            >
              <v-card class="mx-1 bg-unique" router :to="'/tutorial/single/' + article.id"
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
                    ></v-card-title>
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
    data () {
      return {
        tab: null,
        articleTags:[],
        id:'6'
      }
    },
    methods:{
      fetchArticleTags(){
        this.$http
          .get('http://localhost:8000/categories/2/AllSubCategoriesList')
          .then((response) =>{ this.articleTags = response.data;console.log(response.data)})
      }
    },
    created () {
      this.fetchArticleTags();
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
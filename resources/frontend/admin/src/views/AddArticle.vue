<template>
  <div>
    <base-header type="gradient-success" class="pb-6 pb-8 pt-5 pt-md-8 bg-gradient-exchange">
        <!-- Articles -->
    </base-header>
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-12 mb-5 mb-xl-0">
          <card shadow type="secondary">
            <div slot="header" class="bg-white row align-items-center">
              <div class="col">
                <h3 class="mb-0">افزودن مقاله</h3>
              </div>
            </div>
            <form @submit.prevent="saveArticle">
              <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
              <div class="row">
                <div class="col-md-4 form-group">
                  <div class="form-group">
                    <label for="exampleInputEmail1">نام مقاله</label>
                    <input v-model="article.title" type="text" class="form-control" id="aritcleName">
                  </div>
                </div>
                <div class="col-md-4 form-group">
                  <div class="form-group">
                    <label for="exampleInputEmail1">دسته مقاله</label>
                    <select v-model="article.category" class="form-control" id="category">
                      <option value="farx">فارکس</option>
                      <option value="binary">باینری</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4 form-group">
                  <div class="form-group">
                    <label for="tag">زیردسته مقاله</label>
                    <select v-model="article.subCategory_id" class="form-control" id="tag">
                      <option value="1">اصطلاحات</option>
                    </select>
                  </div>
                </div>
                <div class="col-12 form-group">
                  <div class="form-group">
                    <label for="body">متن مقاله</label>
                    <textarea v-model="article.body" class="form-control" rows="5" id="body"></textarea>
                  </div>
                </div>
              </div>
              <div class="col-12">
                 <button type="submit" class="btn btn-primary mb-2">ارسال مقاله</button>
              </div>
            </form>
          </card>
          <card shadow type="secondary">
            <div slot="header" class="bg-white row align-items-center">
              <div class="col">
                <h3 class="mb-0">لیست مقالات</h3>
              </div>
            </div>
            <div class="col-12">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">نام مقاله</th>
                    <th scope="col">دسته</th>
                    <th scope="col">زیردسته</th>
                    <th scope="col">عملیات</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="article in articles" v-bind:key="article.id">
                    <th scope="row">{{article.title}}</th>
                    <td>{{article.category}}</td>
                    <td>{{article.tag}}</td>
                    <td>
                      <a @click.prevent="updateArticle(article)">
                        <i class="ni ni-settings-gear-65"></i>
                      </a>
                      <a @click.prevent="deleteArticle(article.id)">
                        <i class="ni ni-fat-remove"></i>
                      </a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </card>
        </div>
      </div>
    </div>
  </div>
</template>
<script>

  export default {
    components: {
    },
    data() {
      return {
        articles:'',
        article:{
          id:'',
          title:'',
          category:'',
          subCategory_id:'',
          body:''
        },
        edit:false
      };
    },
    created() {
      this.fetchArticles();
    },
    methods: {
      fetchArticles(){
        // let vm = this;
        // page_url = page_url || 'articles';
        this.$http.get('http://localhost:8000/categories/1/AllSubCategoriesList')
            .then(res=>res.json())
            .then(res=>{
                this.articles = res.data;
            })
            .catch(err =>console.log(err));

      },
      deleteArticle(id){
          let article_id = 'articles/'+id;
          // console.log(article_id);
          fetch(article_id,{
              method:'delete',
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          }).then(res =>res.json())
          .then(data =>{
              alert('Article deleted!');
              this.fetchArticles();
          }).catch((err)=>console.error(err));
          
      },
      saveArticle(){
          if(this.edit === false){
              this.$http.post('http://localhost:8000/admin/articles/ArticleStore',{
                title : this.article.title,
                body : this.article.body,
                sub_category : this.article.subCategory_id
                  // body: JSON.stringify(this.article),
                  // headers: {
                  // // 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                  // 'content-type':'application/json'
              }).then(res => res.json())
              .then(data => {
                  this.article.title = '',
                  this.article.category = '',
                  this.article.tag = '',
                  this.article.body = ''
                  alert('Article saved');
                  // this.fetchArticles();
              });
          }else{
              let article_id = 'http://localhost:8000/admin/articles/' + this.article.id + '/ArticleUpdate/';
              this.$http.post(article_id,{
                  method:'put',
                  title : this.article.title,
                  body : this.article.body,
                  subCategory_id : this.article.subCategory_id
                  // headers: {
                  // 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                  // 'content-type':'application/json'
              }).then(res => res.json())
              .then(data => {
                  this.article.title = '';
                  this.article.description = '';
                  alert('Article updated!');
                  // this.fetchArticles();
              });
          }
      },
      updateArticle(article){
          this.edit = true;
          this.article.title = article.title;
          this.article.description = article.description;
          this.article.id = article.id;
      }
    }
  };
</script>
<style scoped>
 i{
   font-size: 1.3rem;
 }
</style>
 
<template>
  <div>
    <base-header type="gradient-success" class="pb-6 pb-8 pt-5 pt-md-8 bg-gradient-exchange">
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
            <form @submit.prevent="saveArticle" id="form">
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
                    <label for="category">دسته مقاله</label>
                    <select @change="fetchSubCategories" v-model="article.category_id" class="form-control" id="category">
                      <option value=""> انتخاب دسته</option>
                      <option v-for="category in categories" v-bind:key="category.id" v-bind:value="category.id">{{category.name}}</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4 form-group">
                  <div class="form-group">
                    <label for="tag">زیردسته مقاله</label>
                    <select  v-model="article.subCategory_id" class="form-control" ref="subCategory">
                      <option value=""> انتخاب زیردسته</option>
                      <option v-for="subCategory in subCategories" v-bind:key="subCategory.id" v-bind:value="subCategory.id">{{subCategory.name}}</option>
                    </select>
                  </div>
                </div>
                <div class="col-12 form-group">
                  <div class="form-group">
                    <label for="body">متن مقاله</label>
                    <textarea v-model="article.body" class="form-control" rows="10" id="body"></textarea>
                  </div>
                </div>
              </div>
              <div class="col-12">
                 <button type="submit" class="btn btn-primary mb-2 mx-1">ارسال مقاله</button>
                 <button type="button" v-show="edit" @click="cancelEdit" class="btn btn-danger mb-2 mx-1">لغو</button>
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
                    <th scope="col">عنوان</th>
                    <th scope="col">دسته</th>
                    <th scope="col">زیردسته</th>
                    <th scope="col">عملیات</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="article in articles" v-bind:key="article.id">
                    <th scope="row">{{article.title}}</th>
                    <td>{{article.sub_category.category.name}}</td>
                    <td>{{article.sub_category.name}}</td>
                    <td>
                      <a href="javascript:void(0)" @click.prevent="updateArticle(article)" class="m-1">
                        <i class="fas fa-pen-square text-info"></i>
                      </a>
                      <a href="javascript:void(0)" @click.prevent="deleteArticle(article.id)" class="m-1">
                        <i class="fas fa-trash text-danger"></i>
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
        subCategories:[],
        categories:[],
        articles:'',
        article:{
          id:'',
          title:'',
          category_id:'',
          subCategory_id:'',
          body:''
        },
        edit:false
      };
    },
    created() {
      this.fetchArticles();
      this.fetchCategories();
     
    },
    methods: {
      fetchSubCategories(){
        this.$http.get('http://localhost:8000/categories/' + this.article.category_id + '/AllSubCategoriesList')
          .then(res => {
            this.subCategories = res.data;
          })
          .catch(err => console.log(err));
      },
      fetchCategories(){
        this.$http.get('http://localhost:8000/categories')
          .then(res => {
            this.categories = res.data;
            console.log(this.categories);
          })
          .catch(err => console.log(err));
      },
      fetchArticles(){
        this.$http.get('http://localhost:8000//admin/articles')
            .then(res=>{
                this.articles = res.data;
                console.log(this.articles);
            })
            .catch(err =>console.log(err));
      },
      deleteArticle(id){
          if(confirm('آیا از حذف این آیتم اطمینان دارید؟')){
            this.$http.get('http://localhost:8000/admin/articles/ArticleDelete/' + id)
            .then(data =>{
              alert('مقاله حذف شد');
              this.fetchArticles();
              }).catch((err)=>console.error(err));
          }
      },
      saveArticle(){
          if(this.edit === false){
              this.$http.post('http://localhost:8000/admin/articles/ArticleStore',{
                title : this.article.title,
                body : this.article.body,
                sub_category : this.article.subCategory_id
              }).then(data => {
                  this.article.title = '',
                  this.article.category = '',
                  this.article.body = '',
                  this.article.subCategory_id = ''
                  alert('مقاله اضافه شد');
                  this.fetchArticles();
              });
          }else{
              this.edit = true;
              let actionUrl = 'http://localhost:8000/admin/articles/' + this.article.id + '/ArticleUpdate';
              this.$http.post(actionUrl,{
                  title : this.article.title,
                  body : this.article.body,
                  sub_category : this.article.subCategory_id
              }).then(data => {
                  this.article.title = '',
                  this.article.category = '',
                  this.article.body = '',
                  this.article.subCategory_id = ''
                  alert('مقاله آپدیت شد');
                  this.fetchArticles();
              });
          }
      },
      updateArticle(article){
        window.scrollTo(0,0);
        this.edit = true;
        this.article.title = article.title;
        this.article.body = article.body;
        this.article.id = article.id;
        this.article.category_id = article.sub_category.category.id;
        this.article.subCategory_id = article.subCategory_id;
      },
      cancelEdit(){
        this.edit = !this.edit;
        this.article.title = '';
        this.article.body = '';
        this.article.id = '';
        this.article.category_id = '';
        this.article.subCategory_id = '';
      }
    }
  };
</script>
<style scoped>
 i{
   font-size: 1.3rem;
 }
 .form-control{
   padding: .4rem .75rem;
 }
</style>
 
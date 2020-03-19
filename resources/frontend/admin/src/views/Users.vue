<template>
    <div>
        <base-header type="gradient-success" class="pb-6 pb-8 pt-3 pt-md-5 bg-gradient-exchange">
           
        </base-header>

        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col-xl-12 mb-5 mb-xl-0">
                    <card shadow type="secondary">
                        <div slot="header" class="bg-white row align-items-center">
                            <div class="col d-flex">
                                <h3 class="mb-0">لیست کاربران</h3>
                                <select class="selectUser" v-model="usersType">
                                    <option checked  value="all">همه ی کاربران</option>
                                    <option  value="subscribed">کاربران ویژه</option>
                                </select>
                            </div>
                        </div>
                        <div v-if="usersType === 'all'" class="col-12">
                            <v-client-table :data="allUsers.tableData" :columns="allUsers.columns" :options="allUsers.options"/>
                        </div>
                        <div class="col-12" v-if="usersType === 'subscribed'">
                            <v-client-table :data="subscribed.tableData" :columns="subscribed.columns" :options="subscribed.options"/>
                        </div>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                              <li class="page-item" 
                                :class="{'disabled':!pagination.prev_page_url}">
                                
                                <a @click.prevent="prevPage"  class="page-link" href="#"><i class="ni ni-curved-next"></i></a>
                              </li>
                              <li v-for="page in pages"
                                v-bind:key="page" 
                                class="page-item" 
                                :class="{'active': pagination.current_page == page,'disabled':pagination.current_page == page}">
                                <a @click.prevent="goToPage(page)" class="page-link" href="#">{{page}}</a>
                              </li>
                              <li class="page-item" 
                                :class="{'disabled':!pagination.next_page_url}">
                                <a @click.prevent="nextPage"  class="page-link" href="#"><i class="ni ni-curved-next" style="transform: scaleX(-1);"></i></a>
                              </li>
                            </ul>
                        </nav>
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
            usersType: "all",
            allUsers:{
                columns: ["id","fullName","phoneNumber","language","freeTime","login_status"],
                tableData: [],
                options: {
                    filterable:false,
                },
            },
            subscribed:{
                columns: ["id","fullName","phoneNumber","plan"],
                tableData: [],
                options: {
                    filterable:false,
                },
            },
            pagination:'',
        }
    },
    methods: {
        sortSubscribedUsers(users){
            this.subscribed.tableData = [];
            users.forEach((user)=>{
                let object = [];
                object.id = user.user.id;
                object.phoneNumber = user.user.phoneNumber;
                object.fullName = user.user.fullName;
                object.plan = user.plan.title;
                this.subscribed.tableData.push(object);
            });
        },
        prevPage(){
        this.$http.get(this.pagination.prev_page_url)
          .then(res =>{
                if(this.usersType === 'all'){
                     this.allUsers.tableData = res.data.data;
                }else{
                    this.sortSubscribedUsers(res.data.data);
                }
            this.pagination = res.data;
          }).catch(err =>console.log(err));
        },
        nextPage(){
            this.$http.get(this.pagination.next_page_url)
            .then(res =>{
                if(this.usersType === 'all'){
                    this.allUsers.tableData = res.data.data;
                }else{
                    this.sortSubscribedUsers(res.data.data);
                }
                this.pagination = res.data;
            }).catch(err =>console.log(err));
        },
        goToPage(page){
            this.$http.get(this.pagination.path + '?page='+page)
            .then(res =>{
                if(this.usersType === 'all'){
                     this.allUsers.tableData = res.data.data;
                }else{
                    this.sortSubscribedUsers(res.data.data);
                }
                this.pagination = res.data;
            }).catch(err =>console.log(err));
        },
        getProUsers(){
             this.$http.get('users/users-who-buied')
            .then(res=>{
                console.log('pro users',res);
                this.sortSubscribedUsers(res.data.data);
                this.pagination = res.data;
            }).catch(err=>console.log(err));
        },
        getAllUsers(){
            this.$http.get('users')
            .then(res=>{
                console.log('allusers',res);
                this.allUsers.tableData = res.data.data;
                this.pagination = res.data;
            }).catch(err=>console.log(err));
        }
    },
    mounted(){
        this.$http.get('users')
            .then(res=>{
                console.log('allusers',res);
                this.allUsers.tableData = res.data.data;
                this.pagination = res.data;
            }).catch(err=>console.log(err));
       
    },
    computed:{
      pages: function(){
        let pages = [];
        for(let i=1;this.pagination.last_page>=i;i++){
          pages.push(i);
        }
        return pages;
      }
    },
    watch:{
        usersType: function(val){
            if(val === 'all'){
                this.getAllUsers();
            }else{
                this.getProUsers();
            }
        }
    }
};
</script>
<style>
    .VueTables__heading{
        text-transform: none!important;
    }
    .VueTables__search-field label{
        display: none;
    }
    .selectUser{
        font-size: 12px;
        margin-right: 14px;
    }
    .active a {
        background: #2a2a2a!important;
        color: white!important;
        font-weight: normal!important;
    }
    .VuePagination,.VueTables__limit {
        display: none;
    }

    
</style>
 

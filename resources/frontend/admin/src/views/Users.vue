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
                    // see the options API
                },
            },
            subscribed:{
                columns: ["id","fullName","phoneNumber","plan"],
                tableData: [],
                options: {
                    // see the options API
                },
            }
            
        }
    },
    methods: {
        sortSubscribedUsers(users){
            users.forEach((user)=>{
                let object = [];
                object.id = user.user.id;
                object.phoneNumber = user.user.phoneNumber;
                object.fullName = user.user.fullName;
                object.plan = user.plan.title;
                this.subscribed.tableData.push(object);
            });
            
        }
    },
    mounted(){
        this.$http.get('users')
            .then(res=>{
                console.log(res.data.data);
                this.allUsers.tableData = res.data.data;}
            ).catch(err=>console.log(err));
        this.$http.get('users/users-who-buied')
            .then(res=>{
                console.log(res);
                this.sortSubscribedUsers(res.data);
            }).catch(err=>console.log(err));
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
    
</style>
 

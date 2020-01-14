<template>
    <div>
        <base-header type="gradient-success" class="pb-6 pb-8 pt-3 pt-md-5 bg-gradient-exchange">
           
        </base-header>

         <loading :active.sync="isLoading" 
        :is-full-page="true"></loading>

        <div class="container-fluid mt--7">
            <div class="row">
                 <div class="col-xl-12 mb-5 mb-xl-0">
                    <card shadow type="secondary">
                        <div slot="header" class="bg-white row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">ویرایش پلن</h3>
                            </div>
                        </div>
                        <form @submit.prevent="updatePlan">
                            <div class="row">
                                <div class="col-md-4 form-group d-none">
                                    <div class="form-group">
                                        <label> بخش:</label>
                                        <select v-model="plan.type" class="form-control">
                                            <option value="binary">بانری آپشن</option>
                                            <option value="forex">فارکس</option>
                                            <option value="both">هردو</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 form-group d-none">
                                    <div class="form-group">
                                        <label>نام پلن:</label>
                                        <input v-model="plan.title" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 form-group">
                                    <div class="form-group">
                                        <label>هزینه پلن (تومان):</label>
                                        <input v-model="plan.price" type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 form-group d-none">
                                    <div class="form-group">
                                        <label>زمان پلن (روز):</label>
                                        <input v-model="plan.expireDay" type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 form-group">
                                    <div class="form-group">
                                        <label>توضیحات پلن:</label>
                                        <textarea v-model="plan.desc" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary mb-2 mx-1">ویرایش پلن</button>
                                    <button v-show="plan.id" @click.prevent="cancelEdit" class="btn btn-danger mb-2 mx-1">لغو ویرایش</button>
                                </div>
                            </div>
                        </form>
                    </card>
                </div>
                <hr>
                <div class="col-xl-12 mb-5 mb-xl-0">
                    <card shadow type="secondary">
                        <div slot="header" class="bg-white row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">لیست پلن ها</h3>
                            </div>
                        </div>
                        <table class="table table-responsive text-center">
                            <thead>
                                <tr>
                                    <th scope="col">بخش</th>
                                    <th scope="col">نام پلن</th>
                                    <th scope="col">هزینه (تومان)</th>
                                    <th scope="col">زمان (روز)</th>
                                    <th scope="col">توضیحات</th>
                                    <th scope="col">عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="plan in plans" v-bind:key="plan.id">
                                    <th scope="row">{{plan.type}}</th>
                                    <td>{{plan.title}}</td>
                                    <td>{{plan.price}}</td>
                                    <td>{{plan.expireDay}}</td>
                                    <td>{{plan.desc}}</td>
                                    <td>
                                        <a href="javascript:void(0)" @click.prevent="editHandler(plan)" class="m-1">
                                            <i class="fas fa-edit text-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </card>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
  import Loading from 'vue-loading-overlay';
  import 'vue-loading-overlay/dist/vue-loading.css';
  export default {
    components: {
        Loading
    },
    data() {
        return {
            plan:{
                title:'',
                type:'',
                price:'',
                expireDay:'',
                desc:'',
                id:''

            },
            plans:[],
            isLoading:false
        
        }
     
    },
    methods: {
        updatePlan(){
            if(this.plan.id){
                this.isLoading = true;
                this.$http.get('plans/PlanUpdate/'+this.plan.id,{
                    params:{
                        type:this.plan.type,
                        title:this.plan.title,
                        price:this.plan.price,
                        expireDay:this.plan.expireDay,
                        desc:this.plan.desc
                    }
                }).then(response => {   
                    this.$toastr.s(response.data);
                    this.getPlan();
                    this.isLoading = false;
                }).catch(err => console.log(err));
                this.plan.title = '';
                this.plan.type = '';
                this.plan.price = '';
                this.plan.expireDay = '';
                this.plan.desc = '';
                this.plan.id = '';
            }else{
                alert('لطفا پلن مورد نظر را انتخاب کنید')
            }
            
        },
        editHandler(value){
            window.scrollTo(0,0);
            this.plan.id = value.id;
            this.plan.title = value.title;
            this.plan.type = value.type;
            this.plan.price = value.price;
            this.plan.expireDay = value.expireDay;
            this.plan.desc = value.desc;
        },
        getPlan(){
            this.$http.get('plans/')
                .then(response => {
                    console.log(response);
                    this.plans = response.data;
                }).catch(err => console.log(err));
        },
        cancelEdit(){
            this.plan.title = '';
            this.plan.type = '';
            this.plan.price = '';
            this.plan.expireDay = '';
            this.plan.desc = '';
            this.plan.id = '';
        }
        // deletePlan(id){
        //     this.isLoading = true;
        //     if(confirm('آیا از حذف این آیتم اطمینان دارید؟')){
        //         this.$http.get('http://app.utsignal.com/plans/PlanDelete/'+id)
        //             .then(response => {
        //                 this.getPlan();
        //                 this.isLoading = false;
        //             }).catch(err => console.log(err));
        //     }else{
        //         this.isLoading = false;
        //     }
            
        // },
        
    },
    created(){
        this.getPlan();
    }
  };
</script>
<style scoped>

</style>
 

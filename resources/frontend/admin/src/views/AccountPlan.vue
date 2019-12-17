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
                                <h3 class="mb-0">افزودن پلن</h3>
                            </div>
                        </div>
                        <form @submit.prevent="addPlan">
                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <div class="form-group">
                                        <label> بخش:</label>
                                        <select v-model="plan.currency_type_id" class="form-control">
                                            <option value="1">بانری آپشن</option>
                                            <option value="2">فارکس</option>
                                            <option value="3">فارکس</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 form-group">
                                    <div class="form-group">
                                        <label>نام پلن:</label>
                                        <input v-model="plan.title" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 form-group">
                                    <div class="form-group">
                                        <label>هزینه پلن:</label>
                                        <input v-model="plan.price" type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 form-group">
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
                                    <button type="submit" class="btn btn-primary mb-2 mx-1">ثبت پلن</button>
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
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">بخش</th>
                                    <th scope="col">نام پلن</th>
                                    <th scope="col">هزینه</th>
                                    <th scope="col">زمان</th>
                                    <th scope="col">توضیحات</th>
                                    <th scope="col">عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="plan in plans" v-bind:key="plan.id">
                                    <th scope="row">{{plan.currency_type_id}}</th>
                                    <td>{{plan.title}}</td>
                                    <td>{{plan.price}}</td>
                                    <td>{{plan.expireDay}}</td>
                                    <td>{{plan.desc}}</td>
                                    <td>
                                        <a href="javascript:void(0)" @click.prevent="deletePlan(plan.id)" class="m-1">
                                            <i class="fas fa-trash text-danger"></i>
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
  export default {
    components: {
    },
    data() {
        return {
            plan:{
            },
            plans:[]
        
        }
     
    },
    methods: {
        addPlan(){
            this.$http.get('http://localhost:8000/plans/PlanStore',{
                params:{
                    currency_type_id:this.plan.currency_type_id,
                    title:this.plan.title,
                    price:this.plan.price,
                    expireDay:this.plan.expireDay,
                    desc:this.plan.desc
                }
                   
            }).then(response => console.log(response))
            .catch(err => console.log(err));
        },
        getPlan(){
            this.$http.get('http://localhost:8000/plans/')
                .then(response => console.log(response))
                .catch(err => console.log(err));
        },
        deletePlan(id){
             this.$http.get('http://localhost:8000/plans/PlanDelete/'+id)
                .then(response => {console.log(response);this.plans = response.data})
                .catch(err => console.log(err));
        },
        // updatePlan(value){
        //      this.$http.get('http://localhost:8000/plans/PlanUpdate/'+value.id,{
        //          params:{
        //             currency_type_id:value.currency_type_id,
        //             title:value.title,
        //             price:value.price,
        //             expireDay:value.expireDay,
        //             desc:value.desc
        //          }
        //      })
        //         .then(response => console.log(response))
        //         .catch(err => console.log(err));
        // }
    },
    created(){
        this.getPlan();
    }
  };
</script>
<style scoped>

</style>
 

<template>
    <section>
      <v-tabs 
        dark 
        hide-slider
        v-model="tab"
        background-color="transparent"
        grow
      >
        <v-tab class="pa-0 ma-0 caption"
        >
          باینری آپشن
        </v-tab>
        <v-tab class="pa-0 ma-0 caption"
        >
           فارکس
        </v-tab>
        <v-tab class="pa-0 ma-0 caption"
        >
           هر دو
        </v-tab>
      </v-tabs>

      <v-tabs-items class="mt-1"  v-model="tab" style="background:none">
        <v-tab-item>
            <div class="container-fluid">
                <div class="row">
                    <account-box v-for="plan in binaryPlans" v-bind:key="plan.id" :plan="plan" @buyAccount="buyAccount"></account-box>
                </div>
            </div>
        </v-tab-item>
        <v-tab-item>
            <div class="container-fluid">
                <div class="row">
                    
                    <account-box v-for="plan in farxPlans" v-bind:key="plan.id" :plan="plan" @buyAccount="buyAccount"></account-box>
                </div>
            </div>
        </v-tab-item>
        <v-tab-item>
            <div class="container-fluid">
                <div class="row">
                    
                    <account-box v-for="plan in bothPlans" v-bind:key="plan.id" :plan="plan" @buyAccount="buyAccount"></account-box>
                </div>
            </div>
        </v-tab-item>
      </v-tabs-items>
    </section>
    
</template>
<script>

import AccountBox from '@/components/AccountBox.vue';

export default {
    props:{
        user:Object
    },
    components:{
        AccountBox
    },
    data () {
        return {
            tab: null,
            plans:'',
            farxPlans:'',
            binaryPlans:'',
            bothPlans:'',
            errorBuy:{
                text: "این دوره قبلا خریداری شده است",
                type: "error",
                timer: 2000,
                showConfirmButton: false,
            }
        }
    },
    methods:{
        getPlans(){
            this.$http.get('https://exchange.tipsy.ir/plans/')
                .then(resp => {
                    this.plans = resp.data;
                    this.setFarx();
                    this.setBinary();
                    this.setBoth();
                });
        },
        buyAccount(plan){
            let planList =[]
            this.user.plans.forEach(function(item){
               planList.push(item.plan.type);
            });
            if(planList.includes('both')){
               this.$fire(this.errorBuy)
            }else if(planList.includes(plan.type)){
               this.$fire(this.errorBuy)
            }else if(plan.type == 'both' && planList.includes('binary')){
              this.$fire(this.errorBuy)
            }else if(plan.type == 'both' && planList.includes('forex')){
               this.$fire(this.errorBuy)
            }else{
                this.$http.get('https://exchange.tipsy.ir/plans/StorePlanForUser/'+plan.id, {
                    params:{
                        user_id:this.user.id,
                    }
                })
                .then(response => {
                    console.log(response);
                })
                .catch(e => {
                this.errors.push(e)
                });
                this.$emit('checkToken');
            }
        },
        setFarx(){
            var typeArray = [];
            this.plans.forEach(function(item){
                
                if(item.type == 'forex'){
                    typeArray.push(item);
                }
               
            })
            this.farxPlans = typeArray;
        },
        setBinary(){
            var typeArray = [];
            this.plans.forEach(function(item){
                
                if(item.type == 'binary'){
                    typeArray.push(item);
                    
                }
               
            })
            this.binaryPlans = typeArray;
        },
        setBoth(){
            var typeArray = [];
            this.plans.forEach(function(item){
                
                if(item.type == 'both'){
                    typeArray.push(item);
                    
                }
               
            })
            this.bothPlans = typeArray;
        },
    },
    created () {
        this.getPlans();
    },
}
</script>
<style scoped>
.col-12{
    padding-top: 3px;
    padding-bottom: 3px;
}
</style>
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
                    <!-- <account-box v-for="plan in binaryPlans" v-bind:key="plan.id" :plan="plan" @buyAccount="buyAccount"></account-box> -->
                    <div class="col-12 mb-2">
                        <v-card class="mx-1 bg-unique" dark>
                            <div class="d-flex flex-no-wrap">
                                <v-avatar
                                class="align-self-center"
                                size="100%"
                                tile
                                >
                                    <v-img :src="'/img/' + '1-month.jpg'"></v-img>
                                </v-avatar>

                                <!-- <div>
                                    <v-card-title class=""><span class="plan_title">{{plan.title}}</span></v-card-title>

                                    <v-card-subtitle class="text-center mt-0">{{plan.desc}}</v-card-subtitle>
                                    <v-card-subtitle class="white--text mt-0 pr-2">{{plan.expireDay}} روزه</v-card-subtitle>
                                    <v-card-subtitle class="white--text mt-0 pr-2"><span>{{plan.price}} تومان</span></v-card-subtitle>
                                </div> -->
                            </div>
                            <div>
                                <v-card-actions>
                                    <v-btn href="https://idpay.ir/uniquetrade/shop/153618" style="background-color:rgba(137, 152, 165, 0.54)" block text>خرید <v-icon class="pr-2">shopping_cart</v-icon></v-btn>
                                </v-card-actions>
                            </div>
                        </v-card>
                    </div>
                    <div class="col-12 mb-2">
                        <v-card class="mx-1 bg-unique" dark>
                            <div class="d-flex flex-no-wrap">
                                <v-avatar
                                class="align-self-center"
                                size="100%"
                                tile
                                >
                                    <v-img :src="'/img/' + '6-months.jpg'"></v-img>
                                </v-avatar>

                                <!-- <div>
                                    <v-card-title class=""><span class="plan_title">{{plan.title}}</span></v-card-title>

                                    <v-card-subtitle class="text-center mt-0">{{plan.desc}}</v-card-subtitle>
                                    <v-card-subtitle class="white--text mt-0 pr-2">{{plan.expireDay}} روزه</v-card-subtitle>
                                    <v-card-subtitle class="white--text mt-0 pr-2"><span>{{plan.price}} تومان</span></v-card-subtitle>
                                </div> -->
                            </div>
                            <div>
                                <v-card-actions>
                                    <v-btn href="https://idpay.ir/uniquetrade/shop/153624" style="background-color:rgba(137, 152, 165, 0.54)" block text>خرید <v-icon class="pr-2">shopping_cart</v-icon></v-btn>
                                </v-card-actions>
                            </div>
                        </v-card>
                    </div>
                     <div class="col-12 mb-2">
                        <v-card class="mx-1 bg-unique" dark>
                            <div class="d-flex flex-no-wrap">
                                <v-avatar
                                class="align-self-center"
                                size="100%"
                                tile
                                >
                                    <v-img :src="'/img/' + '12-months.jpg'"></v-img>
                                </v-avatar>

                                <!-- <div>
                                    <v-card-title class=""><span class="plan_title">{{plan.title}}</span></v-card-title>

                                    <v-card-subtitle class="text-center mt-0">{{plan.desc}}</v-card-subtitle>
                                    <v-card-subtitle class="white--text mt-0 pr-2">{{plan.expireDay}} روزه</v-card-subtitle>
                                    <v-card-subtitle class="white--text mt-0 pr-2"><span>{{plan.price}} تومان</span></v-card-subtitle>
                                </div> -->
                            </div>
                            <div>
                                <v-card-actions>
                                    <v-btn href="https://idpay.ir/uniquetrade/shop/153627" style="background-color:rgba(137, 152, 165, 0.54)" block text>خرید <v-icon class="pr-2">shopping_cart</v-icon></v-btn>
                                </v-card-actions>
                            </div>
                        </v-card>
                    </div>
                </div>
            </div>
        </v-tab-item>
        <v-tab-item>
            <div class="container-fluid">
                <div class="row">
                    <!-- <account-box v-for="plan in farxPlans" v-bind:key="plan.id" :plan="plan" @buyAccount="buyAccount"></account-box> -->
                    
                </div>
            </div>
        </v-tab-item>
        <v-tab-item>
            <div class="container-fluid">
                <div class="row">
                    <!-- <account-box v-for="plan in bothPlans" v-bind:key="plan.id" :plan="plan" @buyAccount="buyAccount"></account-box> -->
                   
                </div>
            </div>
        </v-tab-item>
      </v-tabs-items>
    </section>
    
</template>
<script>

// import AccountBox from '@/components/AccountBox.vue';
export default {
    props:{
        user:Object
    },
    components:{
        // AccountBox,
    },
    data () {
        return {
            tab: null,
            // plans:'',
            // farxPlans:'',
            // binaryPlans:'',
            // bothPlans:'',
            // errorBuy:{
            //     text: "این دوره قبلا خریداری شده است",
            //     type: "error",
            //     timer: 2000,
            //     showConfirmButton: false,
            // },
            // successBuy:{
            //     text: "این دوره با موفقیت خریداری شد",
            //     type: "success",
            //     timer: 2000,
            //     showConfirmButton: false,
            // }
        }
    },
    methods:{
        // getPlans(){
        //     this.$http.get('plans/')
        //         .then(resp => {
        //             this.plans = resp.data;
        //             this.setFarx();
        //             this.setBinary();
        //             this.setBoth();
        //         });
        // },
        // buyAccount(plan){
        //     let planList =[]
        //     this.user.plans.forEach(function(item){
        //        planList.push(item.plan.type);
        //     });
        //     if(planList.includes('both')){
        //        this.$fire(this.errorBuy)
        //     }else if(planList.includes(plan.type)){
        //        this.$fire(this.errorBuy)
        //     }else if(plan.type == 'both' && planList.includes('binary')){
        //       this.$fire(this.errorBuy)
        //     }else if(plan.type == 'both' && planList.includes('forex')){
        //        this.$fire(this.errorBuy)
        //     }else{
        //         this.$http.get('plans/StorePlanForUser/'+plan.id, {
        //             params:{
        //                 user_id:this.user.id,
        //             }
        //         })
        //         .then(response => {
        //             console.log(response);
        //             this.$fire(this.successBuy)
        //             this.$emit('checkToken');
        //         })
        //         .catch(e => {
        //             this.errors.push(e)
        //         });
        //     }
        // },
        // setFarx(){
        //     var typeArray = [];
        //     this.plans.forEach(function(item){
        //         if(item.type == 'forex'){
        //             typeArray.push(item);
        //         }
               
        //     })
        //     this.farxPlans = typeArray;
        // },
        // setBinary(){
        //     var typeArray = [];
        //     this.plans.forEach(function(item){
                
        //         if(item.type == 'binary'){
        //             typeArray.push(item);
                    
        //         }
               
        //     })
        //     this.binaryPlans = typeArray;
        // },
        // setBoth(){
        //     var typeArray = [];
        //     this.plans.forEach(function(item){
                
        //         if(item.type == 'both'){
        //             typeArray.push(item);
                    
        //         }
               
        //     })
        //     this.bothPlans = typeArray;
        // },
    },
    created () {
        // this.getPlans();
    },
}
</script>
<style scoped>
.col-12{
    padding-top: 3px;
    padding-bottom: 3px;
}
</style>
<template>
    <div class="col-12">
        <v-card class="mx-1 bg-unique" dark
        >
            <div class="d-flex flex-no-wrap">
                <v-avatar
                class="align-self-center ma-2"
                size="25%"
                tile
                >
                    <v-img :src="'/img/' + 'graph.png'"></v-img>
                </v-avatar>

                <div>
                    <v-card-title class=""><span class="plan_title">{{plan.title}}</span></v-card-title>

                    <v-card-subtitle class="text-center mt-0">{{plan.desc}}</v-card-subtitle>
                    <v-card-subtitle class="white--text mt-0 pr-2">{{plan.expireDay}} روزه</v-card-subtitle>
                    <v-card-subtitle class="white--text mt-0 pr-2"><span>{{plan.price}} تومان</span></v-card-subtitle>
                </div>
            </div>
            <div>
                <v-card-actions>
                    <v-btn style="background-color:rgba(137, 152, 165, 0.54)" block text @click="buyAccount(plan)">خرید <v-icon class="pr-2">shopping_cart</v-icon></v-btn>
                </v-card-actions>
            </div>
        </v-card>
    </div>
</template>

<script>
export default {
    props:{
        plan:Object,
    },
    data(){
        return{

        }
    },
    methods:{
        buyAccount(plan){
            this.$emit('buyAccount',plan);
        }
    }
}
</script>
<style scoped>
.v-card__title{
    padding: 5px;
    font-size: 13px;
    line-height: 1.3;
}
.v-card__subtitle{
    font-size: 11px;
    line-height: 1.3;
    padding: 4px;
    padding-top: 0;
}
.plan_title{
    border-bottom: 1px solid #f3efe985;
    padding-bottom: 3px;
    padding-left: 5px;
    padding-right: 5px;
}
</style>
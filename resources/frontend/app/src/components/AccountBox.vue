<template>
    <div class="col-12">
        <v-card class="mx-1 bg-unique" dark router :to="'/test'"
        >
            <div class="d-flex flex-no-wrap">
                <v-avatar
                class="ma-2"
                size="25%"
                tile
                >
                    <v-img :src="'/img/' + 'graph.png'"></v-img>
                </v-avatar>

                <div>
                    <v-card-title class="">اکانت فارکس</v-card-title>

                    <v-card-subtitle class="mt-0">اکانت 30 روزه + دسترسی به مقالات تخصصی و اطلاعیه های فارکس</v-card-subtitle>
                </div>
            </div>
            <div>
                <v-card-actions>
                    <v-btn style="background-color:rgba(137, 152, 165, 0.54)" block text>خرید اکانت</v-btn>
                </v-card-actions>
            </div>
        </v-card>
    </div>
</template>

<script>
export default {
    data(){
        return{

        }
    }
}
</script>
<style scoped>
.v-card__title{
    padding: 5px;
    font-size: 16px;
    line-height: 1.3;
}
.v-card__subtitle{
    font-size: 12px;
    line-height: 1.1;
    padding: 4px;
    padding-top: 0;
}
</style>
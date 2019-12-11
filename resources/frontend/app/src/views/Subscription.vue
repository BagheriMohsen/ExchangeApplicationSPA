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
                    <account-box></account-box>
                </div>
            </div>
        </v-tab-item>
        <v-tab-item>
            <div class="container-fluid">
                <div class="row">
                    
                </div>
            </div>
        </v-tab-item>
        <v-tab-item>
            <div class="container-fluid">
                <div class="row">
                    
                </div>
            </div>
        </v-tab-item>
      </v-tabs-items>
    </section>
    
</template>
<script>

import AccountBox from '@/components/AccountBox.vue';

export default {
    components:{
        AccountBox
    },
    data () {
        return {
            tab: null,
        }
    },
    methods:{
        
    },
    created () {
        
    }
}
</script>
<style scoped>
.col-12{
    padding-top: 3px;
    padding-bottom: 3px;
}
</style>
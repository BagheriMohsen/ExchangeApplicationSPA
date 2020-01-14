<template>
    <section>
      <v-tabs 
        dark 
        hide-slider
        v-model="tab"
        background-color="transparent"
        grow
        fixed
        app
      >
        <v-tab class="pa-0 ma-0 caption"
        >
          باینری آپشن
        </v-tab>
        <v-tab class="pa-0 ma-0 caption"
        >
           فارکس
        </v-tab>
      </v-tabs>

      <v-tabs-items class="mt-1"  v-model="tab" style="background:none">
        <v-tab-item>
            <div class="container-fluid">
            <div class="row">
                <div class="col-12" v-for="notif in binaryNotifs" v-bind:key="notif.id">
                    <binary-notif :binaryInfo="notif"></binary-notif>
                </div>
            </div>
        </div>
        </v-tab-item>
        <v-tab-item>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12" v-for="notif in farxNotifs" v-bind:key="notif.id">
                        <farx-notif :notifInfo="notif"></farx-notif>
                    </div>
                </div>
            </div>
        </v-tab-item>
      </v-tabs-items>
    </section>
    
</template>
<script>

    import FarxNotif from '@/components/FarxNotif.vue'
    import BinaryNotif from '@/components/BinaryNotif.vue'
    // import Pusher from 'pusher-js'
    // var moment = require('jalali-moment');
    // moment.locale('fa', { useGregorianParser: true }); 

    export default {
        components:{
            FarxNotif,
            BinaryNotif
        },
        data () {
            return {
                tab: null,
                farxNotifs:[],
                binaryNotifs:[]
            }
        },
        methods:{
            fetchBinaryNotif(){
                this.$http.get('binaries/closeBinaries')
                    .then(res => {
                        this.binaryNotifs = res.data;
                    }).catch(err => console.log(err));
            },
            fetchFarxNotif(){
                this.$http.get('forex/close-expire-list')
                .then(res => {
                    this.farxNotifs = res.data;
                })
                .catch(err => console.log(err));
            },
        },
        created () {
            this.fetchFarxNotif();
            this.fetchBinaryNotif();
        }
    }
</script>
<style scoped>
.col-12{
    padding-top: 3px;
    padding-bottom: 3px;
}
</style>
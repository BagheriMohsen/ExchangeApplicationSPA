<template>
    <div>
        <base-header type="gradient-success" class="pb-6 pb-8 pt-5 pt-md-8 bg-gradient-exchange">
        </base-header>
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col-xl-12 mb-5 mb-xl-0">
                    <card shadow type="secondary">
                      <div class="row justify-content-center">
                        <farx-inputs v-for="notifInput in notifInputs" v-bind:key="notifInput.pair" :notifInput="notifInput" @postNotif="postNotif"></farx-inputs>
                      </div>
                    </card>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
  import FarxInputs from '@/components/FarxInputs.vue';
  export default {
   
    components: {
      FarxInputs
    },
    data() {
      return {
        notifInputs:[
          {
            pair:'EUR/USE',
            startingPrice:'1000',
            forex_category_id:'2',
            sl:'11',
            tp:'12',
            expire:false,
            close:false,
            buy_sell:false,
            reset:false
          },
          {
            pair:'EUR/USE',
            startingPrice:'1000',
            forex_category_id:'2',
            sl:'11',
            tp:'12',
            expire:false,
            close:false,
            buy_sell:false,
            reset:false
          },
        ]
      };
    },
    methods: {
      postNotif(value){
        this.$http.post('http://localhost:8000/forex/forexStore', {
          pair : value.pair,
          startingPrice : value.startingPrice,
          forex_category_id : value.forex_category_id,
          sl : value.sl,
          tp : value.tp,
          expire : value.expire,
          close : value.close,
          buy_sell : value.buy_sell
        })
        .then(response => console.log(response))
        .catch(e => {
          this.errors.push(e)
        })
      }
    },
    mounted() {
     
    }
  };
</script>
<style scoped>
.form-group{
  width: 150px;
}
</style>

<template>
    <div>
        <base-header type="gradient-success" class="pb-6 pb-8 pt-5 pt-md-8 bg-gradient-exchange">
        </base-header>
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col-xl-12 mb-5 mb-xl-0">
                    <card shadow type="secondary">
                      <div class="row justify-content-center">
                        <farx-inputs 
                          v-for="notifInput in notifInputs"
                          v-bind:key="notifInput.id" 
                          :notifInput="notifInput" 
                          @postNotif="postNotif"
                          @expireNotif="expireNotif"
                          @closeNotif="closeNotif"
                          >
                        </farx-inputs>
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
        notifInputs:[]
      };
    },
    methods: {
      fetchNotifs(){
        this.$http.get('http://localhost:8000/forex/')
          .then(res => {this.notifInputs = res.data;console.log(res.data)})
          .catch(e =>this.errors.push(e));
      },
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
        });
        this.fetchNotifs();
      },
      expireNotif(id){
        this.$http.get('http://localhost:8000/forex/forexExpire/' + id)
          .then(response => console.log(response.data))
          .catch(e => this.errors.push(e));
        // this.fetchNotifs();
      },
      closeNotif(id){
        this.$http.get('http://localhost:8000/forex/forexClose/' + id)
          .then(response => console.log(response.data))
          .catch(e => this.errors.push(e));
        // this.fetchNotifs();
      },
    },
    created() {
      this.fetchNotifs();
    }
  };
</script>

<style scoped>
  .form-group{
    width: 150px;
  }
</style>

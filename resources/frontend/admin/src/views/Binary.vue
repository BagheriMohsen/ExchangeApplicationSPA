<template>
    <div>
        <base-header type="gradient-success" class="pb-6 pb-8 pt-5 pt-md-8 bg-gradient-exchange">
           <!-- فارکس -->
        </base-header>

        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col-xl-12 mb-5 mb-xl-0">
                    <card shadow type="secondary">
                      <div slot="header" class="bg-white row align-items-center">
                          <div class="col mb-3">
                          </div>
                      </div>
                      <div class="row justify-content-center">
                          <div class="col-12">
                            <form @submit.prevent="postNotif()">
                              <div class="form-row flex-nowrap">
                                 <div class="form-group">
                                    <input v-model="notif.pair" type="text" class="form-control" id="currency" placeholder="ارز" disabled>
                                </div>
                                <div class="form-group mr-2">
                                    <div class="radio">
                                      <input type="radio" value="buy" v-model="notif.buySell" checked>
                                      <label>خرید</label>
                                    </div>
                                    <div class="radio">
                                      <input type="radio" value="sell" v-model="notif.buySell">
                                      <label>فروش</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input v-model="notif.timeExpire" type="text" class="form-control" id="" placeholder="انتضا زمان">
                                </div>
                                <div class="form-group">
                                  <input v-model="notif.endTime" type="number" class="form-control" id="" placeholder="پایان">
                                </div>
                                <div class="">
                                  <button type="submit" class="btn btn-success">Send</button>
                                </div>
                                <div class="">
                                  <button @click="notif.close = !notif.close" class="btn btn-warning">Close</button>
                                </div>
                              </div>
                            </form>
                          </div>
                      </div>
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
        notif:{
          pair:'EUR/USD',
          timeExpire:'',
          endTime:'',
          close:false,
          buySell:false,
        },
      };
    },
    methods: {
      postNotif(){
        this.$http.post('http://localhost:8000//binaries/store', {
          pair : this.notif.pair,
          time_expire : this.notif.timeExpire,
          endTime : this.notif.endTime,
          close : this.notif.close,
          buy_sell : this.notif.buySell
        })
        .then(response => console.log(response))
        .catch(e => {
          this.errors.push(e)
        })
      },
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

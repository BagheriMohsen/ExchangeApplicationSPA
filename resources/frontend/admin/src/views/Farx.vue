<template>
    <div>
        <base-header type="gradient-success" class="pb-6 pb-8 pt-3 pt-md-5 bg-gradient-exchange">
        </base-header>
        <div class="container-fluid mt--7">
            <div class="row">
              <div class="col-xl-12 mb-5 mb-xl-0">
                <card shadow type="secondary">
                    <form @submit.prevent="postNotif" class="row">
                        <div class="col-sm-8">
                            <div class="form-row flex-nowrap">
                                <div class="form-group">
                                    <select v-model="farx.pair" class="form-control" required>
                                      <option v-for="currency in farx_currencies" v-bind:key="currency.id" :value="currency.name">{{currency.name}}</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input v-model="farx.startingPrice" type="text" class="form-control" id="" placeholder="قیمت شروع">
                                </div>
                                <div class=" form-group" style="width:150px">
                                    <select @change="optionChanged" v-model="farx.forex_category_id" class="form-control" id="">
                                      <option value="1">Buy limit</option>
                                      <option value="2">Sell limit</option>
                                      <option value="3">Buy stop</option>
                                      <option value="4">Sell stop</option>
                                      <option value="5">Market execution</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input v-model="farx.sl" type="text" class="form-control" id="" placeholder="عدد SL">
                                </div>
                                <div class="form-group">
                                    <!-- <label for="currency">عدد TP </label> -->
                                    <input v-model="farx.tp" type="text" class="form-control" id="" placeholder="عدد TP">
                                </div>
                                <div v-if="showBuySell" class="mx-2">
                                    <div class="radio">
                                        <input type="radio" value="buy" v-model="farx.buy_sell">
                                        <label class="mr-1">خرید</label>
                                    </div>
                                    <div class="radio">
                                        <input type="radio" value="sell" v-model="farx.buy_sell">
                                        <label class="mr-2">فروش</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="">
                                <button type="submit" class="btn mx-1">Send</button>
                            </div>
                        </div>
                    </form>
                  <div class="row justify-content-center">
                    <farx-inputs 
                      v-for="notifInput in notifInputs"
                      v-bind:key="notifInput.id" 
                      :notifInput="notifInput" 
                      @updateNotif="updateNotif"
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
        farx:{
          pair:'',
          startingPrice:'',
          sl:'',
          tp:'',
          buy_sell:'',
          close:false,
          expire:false,
          forex_category_id:''
        },
        notifInputs:[],
        showBuySell:false,
        farx_currencies:[]
      };
    },
    methods: {
      fetchNotifs(){
        this.$http.get('http://localhost:8000/forex/')
          .then(res => {this.notifInputs = res.data;console.log(res.data)})
          .catch(e =>this.errors.push(e));
      },
      fetchCurrency(){
        this.$http.get('http://localhost:8000/currency/')
          .then(response => {this.farx_currencies = response.data[1].currency;console.log(this.farx_currencies)})
          .catch(e => this.errors.push(e));
      },
     postNotif(){
        this.$http.post('http://localhost:8000/forex/forexStore/', {
          pair : this.farx.pair,
          startingPrice : this.farx.startingPrice,
          forex_category_id : this.farx.forex_category_id,
          sl : this.farx.sl,
          tp : this.farx.tp,
          expire : this.farx.expire,
          close : this.farx.close,
          buy_sell : this.farx.buy_sell
        })
        .then(response => console.log(response))
        .catch(e => {
          this.errors.push(e)
        });
        this.farx.pair = '';
        this.farx.startingPrice = '';
        this.farx.sl = '';
        this.farx.tp = '';
        this.farx.buy_sell = '';
        this.farx.close = false;
        this.farx.expire = false;
        this.farx.forex_category_id = '';
        this.fetchNotifs();

      },
      updateNotif(value){
        this.$http.post('http://localhost:8000/forex/forexUpdate/' + value.id, {
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
          this.fetchNotifs();
      },
      closeNotif(id){
        this.$http.get('http://localhost:8000/forex/forexClose/' + id)
          .then(response => console.log(response.data))
          .catch(e => this.errors.push(e));
        this.fetchNotifs();
      },
      optionChanged(){
          if(this.farx.forex_category_id == '5'){
              this.showBuySell = true;
          }else{
              this.showBuySell = false;
          }
      }
    },
    created() {
      this.fetchNotifs();
      this.fetchCurrency();
    }
  };
</script>

<style scoped>

  .form-group{
  width: 100px;
  padding: 0px 2px;
}
</style>

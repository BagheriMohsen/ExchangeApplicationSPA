<template>
    <div>
        <base-header type="gradient-success" class="pb-6 pb-8 pt-3 pt-md-5 bg-gradient-exchange">
        </base-header>

        <loading :active.sync="isLoading" 
        :is-full-page="true"></loading>

        <div class="container-fluid mt--7">
            <div class="row">
              <div class="col-xl-12 mb-5 mb-xl-0">
                <card shadow type="secondary">
                    <h4 class="mb-3">افزودن پیام جدید:</h4>
                    <form @submit.prevent="postNotif" class="row">
                        <div class="col-sm-8">
                            <div class="form-row flex-nowrap">
                                <div class="form-group">
                                    <select v-model="farx.pair" class="form-control" required style="padding: 0.55rem 0.5rem;">
                                       <option value="">ارز</option>
                                      <option v-for="currency in farx_currencies" v-bind:key="currency.id" :value="currency.name">{{currency.name}}</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input v-model="farx.startingPrice" type="text" class="form-control" id="" placeholder="قیمت شروع">
                                </div>
                                <div class=" form-group" style="width:150px">
                                    <select @change="optionChanged" v-model="farx.forex_category_id" class="form-control" id="" style="padding: 0.55rem 0.5rem;">
                                      <option value="">انتخاب حالت</option>
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
                                <div title="توضیحات" @click="showModal = true" class="mx-2" style="cursor:pointer">
                                    <i class="far fa-file-alt fa-lg mt-2"></i>
                                </div>
                                <div v-if="showBuySell" class="mx-2">
                                    <div class="radio">
                                        <input type="radio" value="buy" v-model="farx.buy_sell">
                                        <label class="m-0 mr-2">خرید</label>
                                    </div>
                                    <div class="radio">
                                        <input type="radio" value="sell" v-model="farx.buy_sell">
                                        <label class="m-0 mr-2">فروش</label>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-2">
                            <div>
                                <button type="submit" class="btn mx-1"><i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                        <modal :show.sync="showModal">
                          <template slot="header" class="pb-0"> 
                              <h3 class="modal-title">توضیحات</h3>
                          </template>
                          <div>
                              <textarea class="form-control" v-model="farx.desc" rows="5"></textarea>
                          </div>
                      </modal>
                    </form>
                  
                  <hr>
                  <h4 class="mb-3">لیست پیام های فعال:</h4>
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
  import Loading from 'vue-loading-overlay';
  import 'vue-loading-overlay/dist/vue-loading.css';

  export default {
   
    components: {
      FarxInputs,
      Loading
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
          forex_category_id:'',
          desc:''
        },
        notifInputs:[],
        showBuySell:false,
        farx_currencies:[],
        showModal:false,
        isLoading:false
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
        this.isLoading = true;
        this.$http.post('http://localhost:8000/forex/forexStore/', {
          pair : this.farx.pair,
          startingPrice : this.farx.startingPrice,
          forex_category_id : this.farx.forex_category_id,
          sl : this.farx.sl,
          tp : this.farx.tp,
          expire : this.farx.expire,
          close : this.farx.close,
          buy_sell : this.farx.buy_sell,
          desc:this.farx.desc
        })
        .then(response => {
          console.log(response);
          this.$toastr.s("با موفقیت ثبت شد");
          this.fetchNotifs();
          this.isLoading = false;
          })
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
        this.farx.desc = '';
      },
      updateNotif(value){
        this.isLoading = true;
        this.$http.post('http://localhost:8000/forex/forexUpdate/' + value.id, {
          pair : value.pair,
          startingPrice : value.startingPrice,
          forex_category_id : value.forex_category_id,
          sl : value.sl,
          tp : value.tp,
          expire : value.expire,
          close : value.close,
          buy_sell : value.buy_sell,
          desc:value.desc
        })
        .then(response => {
          this.$toastr.s(" با موفقیت آپدیت شد");
          this.fetchNotifs();
          this.isLoading = false;
          })
        .catch(e => {
          this.errors.push(e)
        });
      },
      expireNotif(id){
        this.isLoading = true;
        this.$http.get('http://localhost:8000/forex/forexExpire/' + id)
          .then(response => {
            this.$toastr.s(" با موفقیت منقضی شد");
            this.fetchNotifs();
            this.isLoading = false;
            })
          .catch(e => this.errors.push(e));
      },
      closeNotif(id){
        this.isLoading = true;
        this.$http.get('http://localhost:8000/forex/forexClose/' + id)
          .then(response => {this.$toastr.s(" با موفقیت بسته شد");
          this.fetchNotifs();
          this.isLoading = false;
          })
          .catch(e => this.errors.push(e));
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
.label{
  font-size: .8rem;
}

</style>

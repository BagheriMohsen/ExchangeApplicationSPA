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
                                    <!-- <label for="currency">جفت ارز </label> -->
                                    <input v-model="notif.currency" type="text" class="form-control" id="currency" placeholder="ارز">
                                </div>
                                <div class="form-group">
                                    <!-- <label for="currency"> قیمت شروع </label> -->
                                    <input v-model="notif.startPrice" type="text" class="form-control" id="" placeholder="قیمت شروع">
                                </div>
                                <div class=" form-group">
                                  <!-- <label for="currency">حالت</label> -->
                                  <select @change="optionChanged" v-model="notif.type" class="form-control" id="">
                                    <option value="1">Pending-1</option>
                                    <option value="2">Pending-2</option>
                                    <option value="3">Pending-3</option>
                                    <option value="4">Pending-4</option>
                                    <option value="5">Market-execution</option>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <!-- <label for="currency">عدد SL </label> -->
                                  <input v-model="notif.sl" type="text" class="form-control" id="" placeholder="عدد SL">
                                </div>
                                <div class="form-group">
                                    <!-- <label for="currency">عدد TP </label> -->
                                    <input v-model="notif.tp" type="text" class="form-control" id="" placeholder="عدد TP">
                                </div>
                                <div v-if="notif.showBuySell" class="form-group mr-2">
                                    <div class="radio">
                                      
                                      <input type="radio" value="buy" v-model="notif.buySell" checked>
                                      <label>خرید</label>
                                    </div>
                                    <div class="radio">
                                      
                                      <input type="radio" value="sell" v-model="notif.buySell">
                                      <label>فروش</label>
                                    </div>
                                </div>
                                <div class="">
                                  <button type="submit" class="btn btn-success">Send</button>
                                </div>
                                <div class="">
                                  <button @click="notif.expire = !notif.expire" class="btn btn-danger">Expire</button>
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
          currency:'',
          startPrice:'',
          type:'',
          sl:'',
          tp:'',
          expire:false,
          close:false,
          buySell:false,
          showBuySell:false
        },
        
      };
    },
    methods: {
      saveNotif(){
        this.$http.post(``, {
          currency : this.notif.currency,
          startPrice : this.notif.startPrice,
          type : this.notif.type,
          sl : this.notif.sl,
          tp : this.notif.tp,
          expire : this.notif.expire,
          close : this.notif.close,
          buySell : this.notif.buySell
        })
        .then(response => console.log(response))
        .catch(e => {
          this.errors.push(e)
        })
      },
      optionChanged(){
        if(this.notif.type == '5'){
          this.notif.showBuySell = true;
        }else{
          this.notif.showBuySell = false;
        }
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

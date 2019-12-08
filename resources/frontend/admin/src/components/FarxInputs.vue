<template>
    <div class="col-12">
        <form @submit.prevent="sendNotif" class="row">
            <div class="col-sm-8">
                <div class="form-row flex-nowrap">
                    <div class="form-group">
                        <input v-model="notif.pair" type="text" class="form-control" id="currency" placeholder="ارز" disabled>
                    </div>
                    <div class="form-group">
                        <input v-model="notif.startingPrice" type="text" class="form-control" id="" placeholder="قیمت شروع">
                    </div>
                    <div class=" form-group" style="width:150px">
                        <select @change="optionChanged" v-model="notif.forex_category_id" class="form-control" id="">
                        <option value="1">Buy limit</option>
                        <option value="2">Sell limit</option>
                        <option value="3">Buy stop</option>
                        <option value="4">Sell stop</option>
                        <option value="5">Market execution</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input v-model="notif.sl" type="text" class="form-control" id="" placeholder="عدد SL">
                    </div>
                    <div class="form-group">
                        <!-- <label for="currency">عدد TP </label> -->
                        <input v-model="notif.tp" type="text" class="form-control" id="" placeholder="عدد TP">
                    </div>
                    <div v-if="showBuySell" class="mx-2">
                        <div class="radio">
                            <input type="radio" value="buy" v-model="notif.buy_sell" checked>
                            <label class="mr-1">خرید</label>
                        </div>
                        <div class="radio">
                            
                            <input type="radio" value="sell" v-model="notif.buy_sell">
                            <label class="mr-2">فروش</label>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="col-4">
                <div class="">
                    <button type="submit" class="btn mx-1">Send</button>
                    <button @click="notif.expire = !notif.expire" class="btn btn-danger mx-1">Expire</button>
                    <button @click="notif.close = !notif.close" class="btn btn-warning mx-1">Close</button>
                    <button v-if="notif.close || notif.expire" @click="notif.reset = !notif.reset" class="btn mx-1">
                        <i class="fas fa-recycle fa-lg"></i>
                    </button>
                </div>
            </div>
            
        </form>
    </div>
</template>
<script>
  export default {
    name:'farx-inputs', 
    components: {
      
    },
    props:{
        notifInput:Object
    },
    data() {
      return {
          notif:this.notifInput,
          showBuySell:false
      };
    },
    methods: {
        optionChanged(){
            if(this.notif.forex_category_id == '5'){
                this.showBuySell = true;
            }else{
                this.showBuySell = false;
            }
        },
        sendNotif(){
            this.$emit('postNotif', this.notif);
        }
    },
    mounted() {
     
    }
  };
</script>
<style scoped>
.form-group{
  width: 100px;
  padding: 0px 2px;
}
</style>

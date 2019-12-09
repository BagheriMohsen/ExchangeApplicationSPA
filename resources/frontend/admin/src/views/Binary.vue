<template>
    <div>
        <base-header type="gradient-success" class="pb-6 pb-8 pt-5 pt-md-8 bg-gradient-exchange">
        </base-header>
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col-xl-12 mb-5 mb-xl-0">
                    <card shadow type="secondary">
                      <form @submit.prevent="postNotif" class="row">
                        <div class="col-sm-8">
                            <div class="form-row flex-nowrap">
                                <div class="form-group">
                                    <select v-model="binary.pair" class="form-control" required>
                                      <option v-for="currency in binary_currencies" v-bind:key="currency.id" :value="currency.name">{{currency.name}}</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input v-model="binary.time_expire" type="text" class="form-control" id="" placeholder="مهلت">
                                </div>
                                <div class="form-group">
                                    <input v-model="binary.endTime" type="text" class="form-control" id="" placeholder="زمان آمادگی">
                                </div>
                                <div class="mx-2">
                                    <div class="radio">
                                        <input type="radio" value="buy" v-model="binary.buy_sell" checked>
                                        <label class="mr-1">خرید</label>
                                    </div>
                                    <div class="radio">
                                        <input type="radio" value="sell" v-model="binary.buy_sell">
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
                        <binary-inputs 
                          v-for="notifInput in notifInputs"
                          v-bind:key="notifInput.id" 
                          :notifInput="notifInput" 
                          @updateNotif="updateNotif"
                          @closeNotif="closeNotif"
                          >
                        </binary-inputs>
                      </div>
                    </card>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
  import BinaryInputs from '@/components/BinaryInputs.vue';
  export default {
   
    components: {
      BinaryInputs
    },
    data() {
      return {
        binary:{
          pair:'',
          buy_sell:'',
          close:false,
          endTime:'',
          time_expire:''
        },
        notifInputs:[],
        binary_currencies:[]
      };
    },
    methods: {
      fetchNotifs(){
        this.$http.get('http://localhost:8000/binaries/')
          .then(res => {this.notifInputs = res.data;console.log(res.data)})
          .catch(e =>this.errors.push(e));
      },
      fetchCurrency(){
        this.$http.get('http://localhost:8000/currency/')
          .then(response => {this.binary_currencies = response.data[0].currency})
          .catch(e => this.errors.push(e));
      },
      postNotif(){
        this.$http.post('http://localhost:8000/binaries/store/', {
          pair : this.binary.pair,
          time_expire: this.binary.time_expire,
          endTime: this.binary.endTime,
          close : this.binary.close,
          buy_sell : this.binary.buy_sell
        })
        .then(response => console.log(response))
        .catch(e => {
          this.errors.push(e)
        });
        this.binary.pair = '';
        this.binary.buy_sell = '';
        this.binary.close = false;
        this.binary.endTime = '';
        this.binary.time_expire = '';
        this.fetchNotifs();
      },
      updateNotif(value){
        this.$http.post('http://localhost:8000/binaries/update/' + value.id, {
          pair : value.pair,
          time_expire: value.expire,
          endTime: value.endTime,
          close : value.close,
          buy_sell : value.buy_sell
        })
        .then(response => console.log(response))
        .catch(e => {
          this.errors.push(e)
        });
        this.fetchNotifs();
      },
      closeNotif(id){
        this.$http.get('http://localhost:8000/binaries/close/' + id)
          .then(response => console.log(response.data))
          .catch(e => this.errors.push(e));
        this.fetchNotifs();
      },
    },
    created() {
      this.fetchNotifs();
      this.fetchCurrency();
    }
  };
</script>

<style scoped>
  .form-group{
    width: 150px;
  }
</style>

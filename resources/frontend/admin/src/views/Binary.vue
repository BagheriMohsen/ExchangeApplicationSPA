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
                        <div class="col-sm-10">
                            <div class="form-row">
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
                            <div>
                                <button type="submit" class="btn mx-1"><i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                      </form>
                      <hr>
                      <h4 class="mb-3">لیست پیام های فعال:</h4>
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
  import Loading from 'vue-loading-overlay';
  import 'vue-loading-overlay/dist/vue-loading.css';
  export default {
   
    components: {
      BinaryInputs,
      Loading
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
        binary_currencies:[],
        isLoading:false
      };
    },
    methods: {
      fetchNotifs(){
        this.$http.get('binaries/')
          .then(res => {this.notifInputs = res.data;console.log(res.data)})
          .catch(e =>this.errors.push(e));
      },
      fetchCurrency(){
        this.$http.get('currency/')
          .then(response => {this.binary_currencies = response.data[0].currency})
          .catch(e => this.errors.push(e));
      },
      postNotif(){
        this.isLoading = true;
        this.$http.post('binaries/store', {
          pair : this.binary.pair,
          time_expire: this.binary.time_expire,
          endTime: this.binary.endTime,
          close : this.binary.close,
          buy_sell : this.binary.buy_sell
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
        this.binary.pair = '';
        this.binary.buy_sell = '';
        this.binary.close = false;
        this.binary.endTime = '';
        this.binary.time_expire = '';
        
      },
      updateNotif(value){
        this.isLoading = true;
        this.$http.post('binaries/update/' + value.id, {
          pair : value.pair,
          time_expire: value. time_expire,
          endTime: value.endTime,
          close : value.close,
          buy_sell : value.buy_sell
        }).then(response => {
          console.log(response);
          this.$toastr.s("با موفقیت آپدیت شد");
          this.fetchNotifs();
          this.isLoading = false;
          })
        .catch(e => {
          this.errors.push(e)
        });
      },
      closeNotif(id){
        this.isLoading = true;
        this.$http.get('binaries/close/' + id)
          .then(response => {
            console.log(response);
            this.$toastr.s("با موفقیت بسته شد");
            this.fetchNotifs();
            this.isLoading = false;
          })
          .catch(e => this.errors.push(e));
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
  width: 100px;
  padding: 0px 2px;
} 
.label{
  font-size: .8rem;
}
</style>

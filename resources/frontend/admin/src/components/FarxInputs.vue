<template>
    <div class="col-12">
        <form @submit.prevent="updateNotif" class="row">
            <div class="col-sm-9">
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
                    <div title="توضیحات" @click="showModal = true" class="mx-2" style="cursor:pointer">
                        <i class="far fa-file-alt fa-lg mt-2"></i>
                    </div>
                    <div v-if="notif.forex_category_id == 5" class="mx-2">
                        <div class="radio">
                            <input type="radio" value="buy" v-model="notif.buy_sell" checked>
                            <label class="m-0 mr-2">خرید</label>
                        </div>
                        <div class="radio">
                            <input type="radio" value="sell" v-model="notif.buy_sell">
                            <label class="m-0 mr-2">فروش</label>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="col-3">
                <div v-show="!loading">
                    <button type="submit" class="btn btn-sm mx-1">Send</button>
                    <button @click="expireNotif" type="button" class="btn btn-sm btn-danger mx-1">Expire</button>
                    <button @click="closeNotif" type="button" class="btn btn-sm btn-warning mx-1">Close</button>
                </div>
                <div v-show="loading">
                    <div class="lds-dual-ring"></div>
                </div>
            </div>
            <modal :show.sync="showModal">
                <template slot="header" class="pb-0"> 
                    <h3 class="modal-title">توضیحات</h3>
                </template>
                <h5>توضیحات فارسی</h5>
                          <div>
                              <textarea class="form-control" v-model="notif.fa_desc" rows="5"></textarea>
                          </div>
                          <h5 class="mt-2">توضیحات عربی</h5>
                          <div>
                              <textarea class="form-control" v-model="notif.ar_desc" rows="5"></textarea>
                          </div>
                          <h5 class="mt-2">توضیحات انگلیسی</h5>
                          <div>
                              <textarea class="form-control text-left" v-model="notif.en_desc" rows="5"></textarea>
                          </div>
            </modal>
            
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
                showModal: false,
                loading:false
            };
        },
        methods: {
            updateNotif(){
                this.$emit('updateNotif', this.notif);
            },
            expireNotif(){
                this.$emit('expireNotif', this.notif.id);
            },
            closeNotif(){
                this.$emit('closeNotif', this.notif.id);
            },
        },
        mounted() {
        
        },
        updated(){
        }
    };
</script>
<style scoped>
.form-group{
  width: 100px;
  padding: 0px 2px;
}

</style>

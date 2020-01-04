<template>
    <div>
        <base-header type="gradient-success" class="pb-6 pb-8 pt-3 pt-md-5 bg-gradient-exchange">
        </base-header>
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col-xl-6 mb-5 mb-xl-0">
                    <card shadow type="secondary">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <h4 class="text-center d-block">لیست ارز فارکس</h4>
                                <form class="mt-4" @submit.prevent="addCurrency(2)">
                                    <div class="input-group flex-row-reverse">
                                        <button type="submit" class="input-group-addon btn btn-info">ثبت</button>
                                        <input v-model="farx_currency" class="form-control" type="text" placeholder="نام ارز را وارد کنید">
                                    </div>
                                </form>
                                <table class="table mt-3 text-center">
                                    <thead>
                                        <tr>
                                            <th>نام ارز</th>
                                            <th>عملیات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="currency in currencies[1].currency" v-bind:key="currency.id">
                                            <td>{{currency.name}}</td>
                                            <td>
                                                <a href="javascript:void(0)" @click="removeCurrency(currency.id)">
                                                    <i class="ni ni-fat-remove text-danger" style="font-size:1.5rem"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </card>
                </div>
                <div class="col-xl-6 mb-5 mb-xl-0">
                    <card shadow type="secondary">
                      <div class="row justify-content-center">
                           <div class="col-12">
                                <h4 class="text-center d-block">لیست ارز باینری آپشن</h4>
                                <form class="mt-4" @submit.prevent="addCurrency(1)">
                                    <div class="input-group flex-row-reverse">
                                        <button type="submit" class="input-group-addon btn btn-info">ثبت</button>
                                        <input v-model="binary_currency" class="form-control" type="text" placeholder="نام ارز را وارد کنید">
                                    </div>
                                </form>
                                <table class="table mt-3 text-center">
                                    <thead>
                                        <tr>
                                            <th>نام ارز</th>
                                            <th>عملیات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="currency in currencies[0].currency" v-bind:key="currency.id">
                                            <td>{{currency.name}}</td>
                                            <td>
                                                <a href="javascript:void(0)" @click="removeCurrency(currency.id)">
                                                    <i class="ni ni-fat-remove text-danger" style="font-size:1.5rem"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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
        binary_currency:'',
        farx_currency:'',
        currencies:[]
      };
    },
    methods: {
        fetchCurrency(){
            this.$http.get('https://exchange.tipsy.ir/currency/')
                .then(response => {this.currencies = response.data;console.log(response.data)})
                .catch(e => this.errors.push(e));
        },
        addCurrency(id){
            if(id == 1){
                this.$http.post('https://exchange.tipsy.ir/currency/store/'+id , {
                name: this.binary_currency
                }).then(response => console.log(response))
                .catch(e => {
                    this.errors.push(e)
                });
            }else if(id == 2){
                this.$http.post('https://exchange.tipsy.ir/currency/store/'+id , {
                name: this.farx_currency
                }).then(response => console.log(response))
                .catch(e => {
                    this.errors.push(e)
                });
            }
            this.fetchCurrency();
        },
        removeCurrency(id){
            this.$http.get('https://exchange.tipsy.ir/currency/destroy/'+id)
                .then(response => alert('ارز با موفقیت حذف شد'))
                .catch(e => this.errors.push(e));
            this.fetchCurrency();
        },
    },
    created() {
         this.fetchCurrency();
    }
  };
</script>
<style scoped>

</style>

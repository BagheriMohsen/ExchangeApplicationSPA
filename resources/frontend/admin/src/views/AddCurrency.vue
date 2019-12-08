<template>
    <div>
        <base-header type="gradient-success" class="pb-6 pb-8 pt-5 pt-md-8 bg-gradient-exchange">
        </base-header>
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col-xl-6 mb-5 mb-xl-0">
                    <card shadow type="secondary">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <h4 class="text-center d-block">لیست ارز فارکس</h4>
                                <form class="mt-4" @submit.prevent="addCurrency(farx_currency)">
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
                                        <tr v-for="currency in binary_currencies" v-bind:key="currency.id">
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
                                <form class="mt-4" @submit.prevent="addCurrency(binary_currency,binary_actionUrl)">
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
                                        <tr v-for="currency in binary_currencies" v-bind:key="currency.id">
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
        farx_currencies:[{id:'2',name:'USD/EUR'}],
        binary_currencies:[{id:'2',name:'EUR/USD'}],
        binary_currency:'',
        binary_actionUrl:'',
        farx_currency:'',
        farx_actionUrl:''

      };
    },
    methods: {
        // fetchFarxCurrency(){
        //     this.$http.get('')
        //         .then(response => this.farx_currencies = response.data)
        //         .catch(e => this.errors.push(e));
        // },
        // fetchBinaryCurrency(){
        //     this.$http.get('')
        //         .then(response => this.binary_currencies = response.data)
        //         .catch(e => this.errors.push(e));
        // },
        addFarxCurrency(currency){
            this.$http.post( '' , {
                currency_name: currency
            })
            .then(response => console.log(response))
            .catch(e => {
                this.errors.push(e)
            });
            this.fetchFarxCurrency()
        },
        addBinaryCurrency(currency){
            this.$http.post( '' , {
                currency_name: currency
            })
            .then(response => console.log(response))
            .catch(e => {
                this.errors.push(e)
            });
            this.fetchBinaryCurrency()
        },
        removeBinaryCurrency(id){
            this.$http.get(''+id)
                .then(response => alert('ارز با موفقیت حذف شد'))
                .catch(e => this.errors.push(e));
        },
        removeFarxCurrency(id){
            this.$http.get(''+id)
                .then(response => alert('ارز با موفقیت حذف شد'))
                .catch(e => this.errors.push(e));
            this.fetchFarxCurrency();
        },
        removeBinaryCurrency(id){
            this.$http.get(''+id)
                .then(response => alert('ارز با موفقیت حذف شد'))
                .catch(e => this.errors.push(e));
            this.fetchBinaryCurrency();
        }
    },
    created() {
        this.fetchFarxCurrency();
        this.fetchBinaryCurrency();
    }
  };
</script>
<style scoped>

</style>

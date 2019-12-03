<template>
    <div>
        <base-header type="gradient-success" class="pb-6 pb-8 pt-5 pt-md-8 bg-gradient-exchange">
           
        </base-header>

        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col-xl-12 mb-5 mb-xl-0">
                    <card shadow type="secondary">
                        <div slot="header" class="bg-white row align-items-center">
                            <div class="col">
                            حساب های بانکی   
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-8">
                                <bank-table></bank-table>
                            </div>
                        </div>
                    </card>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
  import BankTable from './Tables/BankTable';
  export default {
    name: 'bankAccount',
    components: {
     BankTable
    },
    data() {
      return {
        
      };
    },
    methods: {
      
    },
    mounted() {
     
    }
  };
</script>
<style></style>

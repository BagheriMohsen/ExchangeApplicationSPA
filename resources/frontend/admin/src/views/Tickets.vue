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
                          تیکت های ارسال شده
                        </div>
                      </div>
                      <div class="row justify-content-center">
                        <ticket-table></ticket-table>
                      </div>
                    </card>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
  import TicketTable from './Tables/TicketTable';
  export default {
    name: 'tickets',
    components: {
     TicketTable
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

<template>
  <div>
    <base-header type="gradient-success" class="pb-6 pb-8 pt-5 pt-md-8 bg-gradient-exchange">
        <!-- Articles -->
    </base-header>
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-12 mb-5 mb-xl-0">
          <card shadow type="secondary">
            <div slot="header" class="bg-white row align-items-center">
              <div class="col">
                <h3 class="mb-0">افزودن مقاله</h3>
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
        article:{
          name:null,
          category:null,
          tag:null,
          body:null
        },
        errors: []
      };
    },
    methods: {
      
    },
    mounted() {
     
    },
    created() {
      
    }
  };
</script>
<style></style>
